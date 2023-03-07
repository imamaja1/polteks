<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Info;
use App\Models\User;
use App\Models\hypertensi;
use App\Models\diabetes;
use App\Models\Score;
use App\Models\analisis_diabetes;
use App\Models\analisis_hypertensi;

use Phpml\Classification\KNearestNeighbors;

class UserControler extends Controller
{
    public function home(){
        $info = info::all();
        return view('user/home', compact('info'));
    }
    public function hypertensi(){
        $data2 = DB::table('hypertensi')
                ->where('id',auth()->user()->id)
                ->get();
        if ($data2[0]->usia == 'kosong') {
            return view('user/hypertensi',['data' => $data2,'data1' => $data2]);
        }
        $data1 = DB::table('analisis_hypertensi')->get();
        $no = 0;
        foreach ($data1 as $key) {
            $traning[$no++] = array('0' => $key->usia, 
                '1' => $key->IMT,
                '2' => $key->riwayat_keluarga_hypertensi,
                '3' => $key->riwayat_diri_hypertensi,
                '4' => $key->tingkat_stres,
                '5' => $key->konsumsi_makanan, 
            );
            $labels[$no-1] = $key->analisis;
        } 
        if($data2[0]->usia<18){
            $usia = '0';
        }else if($data2[0]->usia>18 && $data2[0]->usia<60){
            $usia = '1';
        }else{
            $usia = '2';
        }
        $berat_badan = $data2[0]->BB;
        $tinggi_badan = $data2[0]->TB;
        $IMT = $berat_badan/($tinggi_badan/100*$tinggi_badan/100);
        if($IMT > 25) {
            $IMT = '2';
        } else if ($IMT > 18 && $IMT < 25){
            $IMT = '1';
        }else{
            $IMT = '0';
        }
        if($data2[0]->riwayat_keluarga_hypertensi == 'tidak ada'){
            $riwayat_keluarga_hypertensi = '0';
        }else{
            $riwayat_keluarga_hypertensi = '1';
        }
        if($data2[0]->riwayat_diri_hypertensi == 'tidak ada'){
            $riwayat_diri_hypertensi = '0';
        }else{
            $riwayat_diri_hypertensi = '1';
        }
        if($data2[0]->tingkat_stres == 'rendah'){
            $tingkat_stres = '0';
        }else if($data2[0]->tingkat_stres == 'sedang'){
            $tingkat_stres = '1';
        }else{
            $tingkat_stres = '2';
        }
        if($data2[0]->konsumsi_makanan == 'rendah'){
            $konsumsi_makanan = '0';
        }else if($data2[0]->konsumsi_makanan == 'sedang'){
            $konsumsi_makanan = '1';
        }else{
            $konsumsi_makanan = '2';
        }
        $sampel = array('0' => $usia, '1' => $IMT,'2' => $riwayat_keluarga_hypertensi,'3' => $riwayat_diri_hypertensi,'4' => $tingkat_stres, '5' => $konsumsi_makanan,);    
        $classifier = new KNearestNeighbors();
        $classifier->train($traning, $labels);
        $predik = $classifier->predict([$usia,$IMT,$riwayat_keluarga_hypertensi,$riwayat_diri_hypertensi,$tingkat_stres,$konsumsi_makanan]);
        
        if ($riwayat_keluarga_hypertensi == 0 && $riwayat_keluarga_hypertensi == 0) {
            $data_final = DB::table('analisis_hypertensi')
                ->where('usia', $usia)
                ->where('imt', $IMT)
                ->where('tingkat_stres', $tingkat_stres)
                ->where('tingkat_stres', $konsumsi_makanan)
                ->where('analisis', $predik)
                ->get();
        }else if ($riwayat_keluarga_hypertensi > $riwayat_keluarga_hypertensi) {
            $data_final = DB::table('analisis_hypertensi')
            ->where('usia', $usia)
            ->where('imt', $IMT)
            ->where('analisis', $predik)
            ->where('riwayat_diri_hypertensi',$riwayat_diri_hypertensi)
            
            ->get();
        }else{
            $data_final = DB::table('analisis_hypertensi')
            ->where('usia', $usia)
            ->where('imt', $IMT)
            ->where('analisis', $predik)
            ->where('riwayat_keluarga_hypertensi',$riwayat_keluarga_hypertensi)
            ->get();
        }
        $data_final[0]->imt = $IMT;
        return view('user/hypertensi',['data' => $data_final,'data1' => $data2]);
    }
    public function hypertensi_store(Request $request){
        $validated = $request->validate([
            'usia' => 'required',
            'riwayat_diri_hypertensi' => 'required',
            'riwayat_keluarga_hypertensi' => 'required',
            'tingkat_stres' => 'required',
            'konsumsi_makanan' => 'required',
            'BB' => 'required',
            'TB' => 'required'
        ]);
        hypertensi::where("id", auth()->user()->id)->update($validated);
        $request->session()->flash('status', 'Data Telah diperbaharui !');
        return redirect('/user/hypertensi');
    } 
    public function diabetes(){
        $diabetes = diabetes::where('id',auth()->user()->id)->first();
        $score = 0;
        // umur
        if ($diabetes->usia < 45)  {$score +=0; }
        else if ($diabetes->usia < 55) { $score +=2; }
        else if ($diabetes->usia < 65) { $score +=3; }
        else { $score +=4; }

        // IMT
        $IMT = $diabetes->BB/(($diabetes->TB*2)/100);
        if ($IMT<25) {
            $score +=0;
        }elseif ($IMT < 31) {
            $score +=1;
        }else{
            $score +=3;
        }
        // AKTIFITAS
        $diabetes->aktifitas_fisik == 1 ? $score +=0 : $score +=2;

        // LINGKAR PINGGANG
        if ($diabetes->jenis_kelamin = 1) {
            if ($diabetes->lingkar_pinggang < 94) {
                $score +=0;
            }elseif($diabetes->lingkar_pinggang < 103){
                $score +=3;
            }else{
                $score +=4;
            }
        }

        //makanana
        $diabetes->makanan == 1 ? $score +=0 : $score +=2;

        //tekanan darah tinggi
        $diabetes->darah_tinggi == 1 ? $score +=0 : $score +=2;

        // kadar_gula
        $diabetes->kadar_gula == 1 ? $score +=0 : $score +=2;

        // riwayat_diabetes
        $diabetes->riwayat_diabetes== 1 ? $score +=0 : $score +=2;
        
        $analisis = Score::where('score_awal','<=',$score)->where('score_akhir','>=',$score)->first();

        // return $score;
        return view('user/diabetes', compact('diabetes','score','analisis'));
                
        
        // if ($data2[0]->usia == 'kosong') {
        //     return view('user/diabetes',['data' => $data2,'data1' => $data2]);
        // }
        // $data1 = DB::table('analisis_diabetes')->get();
        // $no = 0;
        // foreach ($data1 as $key) {
        //     $traning[$no++] = array('0' => $key->usia, 
        //         '1' => $key->riwayat_keluarga,    
        //         '2' => $key->konsumsi_gula,
        //         '3' => $key->kendali_makanan,
        //         '4' => $key->aktivitas,
        //         '5' => $key->imt,
        //         '6' => $key->hypertensi, 
        //     );
        //     $labels[$no-1] = $key->analisis;
        // } 
        // if($data2[0]->usia<18){
        //     $usia = '0';
        // }else if($data2[0]->usia>18 && $data2[0]->usia<60){
        //     $usia = '1';
        // }else{
        //     $usia = '2';
        // }
        // $berat_badan = $data2[0]->BB;
        // $tinggi_badan = $data2[0]->TB;
        // $IMT = $berat_badan/($tinggi_badan/100*$tinggi_badan/100);
        // if($IMT > 25) {
        //     $IMT = '2';
        // } else if ($IMT > 18 && $IMT < 25){
        //     $IMT = '1';
        // }else{
        //     $IMT = '0';
        // }

        // if($data2[0]->riwayat_keluarga == 'tidak ada'){
        //     $riwayat_keluarga = '0';
        // }else{
        //     $riwayat_keluarga = '1';
        // }
        // if($data2[0]->konsumsi_gula == 'tidak ada'){
        //     $konsumsi_gula = '0';
        // }else{
        //     $konsumsi_gula = '1';
        // }
        // if($data2[0]->kendali_makanan == 'tidak terkendali'){
        //     $kendali_makanan = '0';
        // }else{
        //     $kendali_makanan = '1';
        // }
        // if($data2[0]->aktivitas == 'rendah'){
        //     $aktivitas = '0';
        // }else if($data2[0]->aktivitas == 'Sedang'){
        //     $aktivitas = '1';
        // }else{
        //     $aktivitas = '2';
        // }
        // if($data2[0]->hypertensi == 'tidak ada'){
        //     $hypertensi = '0';
        // }else{
        //     $hypertensi = '1';
        // }
        // $classifier = new KNearestNeighbors();
        // $classifier->train($traning, $labels);
        // $predik = $classifier->predict([$usia,$riwayat_keluarga,$konsumsi_gula,$kendali_makanan, $aktivitas,$IMT,$hypertensi]);
        // if($kendali_makanan != 0 && $konsumsi_gula > 0){
        //     if($IMT != 0 ){
        //         $data_final = DB::table('analisis_diabetes')
        //         ->where('usia', $usia)
        //         ->where('riwayat_keluarga', $riwayat_keluarga)
        //         ->where('kendali_makanan',$kendali_makanan)
        //         ->where('aktivitas', $aktivitas)
        //         ->where('hypertensi',$hypertensi)
        //         ->where('analisis', $predik)
        //         ->get();
        //     }else{
        //         $data_final = DB::table('analisis_diabetes')
        //         ->where('usia', $usia)
        //         ->where('riwayat_keluarga', $riwayat_keluarga)
        //         ->where('kendali_makanan',$kendali_makanan)
        //         ->where('aktivitas', $aktivitas)
        //         ->where('hypertensi',$hypertensi)
        //         ->where('imt', $IMT)
        //         ->where('analisis', $predik)
        //         ->get();
        //     }
        // }else if($kendali_makanan == 0 && $konsumsi_gula > 0){
        //     $data_final = DB::table('analisis_diabetes')
        //         ->where('usia', $usia)
        //         ->where('riwayat_keluarga', $riwayat_keluarga)
        //         ->where('konsumsi_gula', $konsumsi_gula)
        //         ->where('aktivitas', $aktivitas)
        //         ->where('hypertensi',$hypertensi)
        //         ->where('imt', $IMT)
        //         ->where('analisis', $predik)
        //         ->get();
        // }else{
        //     $data_final = DB::table('analisis_diabetes')
        //         ->where('usia', $usia)
        //         ->where('riwayat_keluarga', $riwayat_keluarga)
        //         ->where('konsumsi_gula', $konsumsi_gula)
        //         ->where('kendali_makanan',$kendali_makanan)
        //         ->where('aktivitas', $aktivitas)
        //         ->where('hypertensi',$hypertensi)
        //         ->where('analisis', $predik)
        //         ->get();
        // }
        // $data_final[0]->imt = $IMT;
        // return view('user/diabetes',['data' => $data_final, 'data1' => $data2]);
    }
    public function diabetes_store(Request $request){
        $validated = $request->validate([
            'usia' => 'required',
            'aktifitas_fisik' => 'required',
            'BB' => 'required',
            'TB' => 'required',
            'lingkar_pinggang' => 'required',
            'obat' => 'required',
            'makanan' => 'required',
            'jenis_kelamin' => 'required',
            'kadar_gula' => 'required',
            'riwayat_diabetes' => 'required',
        ]);
        $validated['id_user'] = auth()->user()->id;
        $update = diabetes::where('id_user',auth()->user()->id)->first();
        if ($update) {
            $update->update($validated);
        }else{
            diabetes::create($validated);
        }
        $request->session()->flash('status', 'Data Telah diperbaharui !');
        return redirect('/user/diabetes');
    } 
}
