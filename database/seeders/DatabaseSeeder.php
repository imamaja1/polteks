<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
                'id'=> 1,
                'name'	=> 'user',
                'email'	=> 'user@gmail.com',
                'password'	=> bcrypt('user')
        ]);

        \App\Models\hypertensi::insert([
            'id_user'=> 1,
            'usia' => 'kosong',
            'BB' => '1',
            'TB' => '100',
            'riwayat_diri_hypertensi' => 'kosong',
            'riwayat_keluarga_hypertensi' => 'kosong',
            'konsumsi_makanan' => 'kosong',
            'tingkat_stres' => 'kosong',
        ]);

        \App\Models\diabetes::insert([
            'id_user'=> 1,
            'usia' => 'kosong',
            'kendali_makanan' => 'kosong',
            'riwayat_keluarga' => 'kosong',
            'konsumsi_gula' => 'kosong',
            'BB' => '1',
            'TB' => '100',
            'aktivitas' => 'kosong',
            'hypertensi' => 'kosong'
        ]);

        \App\Models\Info::insert([
            ['judul'=> 'PENGERTIAN HIPERTENSI','gambar'	=> '1.jpeg','penjelasan'	=> '<p>Hipertensi adalah peningkatan tekanan darah sistolik lebih dari 140 mmHg dan tekanan darah diastolic lebih dari 90 mmHg pada dua kali pengukuran dengan selang waktu 5 menit dalam keaadaan cukup istirahat atau tenang. Hipertensi merupakan silent killer dimana gejala dapat bervariasi pada masing-masing individu dan hampir sama dengan gejala penyakit lainnya</p>'],
            ['judul'=> 'PENGERTIAN DIABETES','gambar'	=> '2.jpeg','penjelasan'	=> '<p>Diabetes (DM) merupakan suatu kelompok penyakit metabolik dengan karakteristik hiperglikemia (peningkatan kadar gula dalam darah) yang terjadi karena kelainan sekresi insulin, kerja insulin atau kedua-duanya. Diabetes merupakan penyakit menahun yang dapat meningmulkan berbagai komplikasi yang berdampak terhadap kualitas hidup penyandangnya dan peningkatan biaya kesehatan yang cukup besar. Dengan mengetahui bahwa diabetes dan komplikasinya merupakan problem kesehatan yang serius, diharapkan kita semua peduli terhadap tindakan pencegahan baik tindakan pencegahan primer maupun sekunder.</p>'],
            ['judul'=> 'FAKTOR DIABETES TIPE 1','gambar'	=> '3.jpeg','penjelasan'	=> '<ol><li>Faktor riwayat keluarga atau keturunan, Ketika seseorang akan lebih memiliki risiko terkena diabetes tipe1 jika ada anggota keluarga yang mengidap penyakit yang sama karena berhubungan dengan gen tertentu.</li><li>Faktor geografi, Orang yang tinggal di daerah yang jauh dari khatulistiwa, seperti Finlandia dan Sardinia, berisiko terkena diabetes tipe 1. Hal ini disebabkan karena kurangnya vitamin D yang bisa didapatkan dari sinar matahari, sehingga memicu penyakit autoimun.</li><li>Faktor usia, penyakit ini paling banyak terdeteksi pada anak anak usia 4-7 tahun, kemudian pada anak-anak usia 10-14 tahun.</li><li>Faktor pemicu lainnya seperti mengonsumsi susu sapi pada usia terlalu dini, air yang mengandung natrium sitrat, sereal dan gluten sebelum usia 4 bulan atau setelah 7 bulan, memiliki ibu dengan riwayat preklampsia serta menderita sakit kuning saat lahir.</li></ol>'],
            ['judul' => 'FAKTOR DIABETES TIPE 2','gambar'	=> '4.jpeg','penjelasan'	=> '<ol><li>Berat badan berlebih atau obesitas</li><li>Distribusi lemak perut yang tinggi</li><li>Gaya hidup tidak aktif dan jarang beraktifitas atau berolahraga</li><li>&nbsp;Riwayat penyakit diabetes tipe 2 dalam keluarga</li><li>Usia di atas 45 tahun, walaupun tidak menutup kemungkinan dapat terjadi sebelum usia 45 tahun.</li><li>Riwayat diabetes saat hamil, wanita dengan sindrom ovarium polikistik yang dintandai dengan menstruasi tidak teratur, pertumbuhan rambut berlebihan dan obesitas</li></ol>'],
            ['judul'=> 'GEJALA DIABETES','gambar'	=> '5.jpeg','penjelasan'	=> '<ol><li>Peningkatan rasa haus, peningkatan frekuensi buang air kecil &lt;br&gt;</li><li>Adanya gangguan penglihatan , seperti pandangan yang kabur atau tidak jelas.</li><li>Mudah lelah atau rasa kelelahan terus-menerus</li><li>Terjadi infeksi pada tubuh terus-menerus yang umumnya terjadi pada bagian gusi, kulit, maupun area vagina (pada wanita).</li><li>Penurunan berat badan yang tidak jelas apa penyebabnya</li><li>Kehadiran keton dalam urin, keton adalah produk sampingan dari pemecahan otot dan lemak yang terjadi ketika tidak ada cukup insulin yang tersedia</li></ol>'],
            ['judul'=> 'NILAI RUJUKAN DIABETES','gambar'	=> '6.jpeg','penjelasan'	=> '<ol><li>Gula plasma puasa, kurang dari126 mg/dl, tidak ada asupan kalori selama minimal 8 jam</li><li>Glukosa plasma, kurang dari 200 mg/dl, 2 jam setelah tes toleransi glukosa oral (TTGO) dengan beban glukosa 75 gram</li><li>Glukosa plasma sewaktu ≥ 200 mg/dl dengan keluhan klasik</li></ol>'],
            ['judul'=> 'GEJALA HIPERTENSI','gambar'	=> '7.jpeg','penjelasan'	=> 'GEJALA HIPERTENSI'],
            ['judul'=> 'NILAI RUJUKAN HIPERTENSI','gambar'	=> '8.jpeg','penjelasan'	=> '<ol><li>Normal, &lt;120 mmHg/ &lt;80 mmHg</li><li>Pra hipertensi, (120 – 139 mmHg/ 80-89 mmHg), berisiko lebih tinggi terkena hipertensi. Jika 110-85 mmHg atau 130/79 mmHg berisiko hipertensi.</li><li>Hipertensi I, (149-159 mmHg/ 90-99 mmHg), memerlukan pengobatan karena risiko terjadinya kerusakan pada organ lebih tinggi</li><li>Hipertensi II, ( &gt; 160 mmHg/ &gt; 100 mmHg), membutuhkan lebih dari 1 obat, kerusakan organ tubuh mungkin sudah terjadi, kelainan kardiovaskular belum tentu bergejala.</li><li>Hipertensi II, ( &gt;180 mmHg/ &gt; 120 mmHg), segera hubungi dokter jika mengalami tanda-tanda kerusakan organ seperti nyeri dada, sesak nafas, sakit pinggang, mati rasa, perubahan penglihatan dan kesulitan berbicara</li></ol>']
        ]);
        
    }
}
