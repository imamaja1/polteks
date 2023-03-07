@extends('user.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="row ">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h5 class="text-white text-capitalize ps-3">Hypertensi</h5>
                        </div>
                    </div>
                    <form action="/user/hypertensi" method="post">
                    @csrf
                    <div class="card-body row">
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0"> Usia Pasien </label>
                            </div>
                            <div class="col-md-6">
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <label class="form-label" for="usia">Usia</label>
                                    <input type="text" class="form-control" name="usia" id="usia" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0"> Riwayat Diri Hypertensi</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="riwayat_diri_hypertensi">
                                        <option value="tidak ada">Tidak ada</option>
                                        <option value="ada">ada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0"> Riwayat Keluarga Hypertensi</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="riwayat_keluarga_hypertensi">
                                        <option value="tidak ada">Tidak ada</option>
                                        <option value="ada">ada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0"> Tingkat stress</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="tingkat_stres">
                                        <option value="rendah">Tidak ada</option>
                                        <option value="sedang">ada</option>
                                        <option value="sedang">tinggi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0">Konsumsi makana (kanana asin/garam dan junk food )</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="konsumsi_makanan">
                                        <option value="rendah">rendah</option>
                                        <option value="sedang">sedang</option>
                                        <option value="tinggi">tinggi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-6">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0">IMT</label>
                            </div>
                            <div class="col-md-6">
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <label class="form-label">Berat Badan</label>
                                    <input type="text" class="form-control" name="BB">
                                </div>
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <label class="form-label">Tinggi Badan</label>
                                    <input type="text" class="form-control" name="TB">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn bg-gradient-primary my-4 mb-4">Submit</button>
                      </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" row container-fluid py-4">
        <div class="col-md-6 mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card h-100">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h5 class="text-white text-capitalize ps-3">Analisis</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ( $data[0]->usia === 'kosong')
                            <h3> Kosong </h3>
                        @else
                            <h3> {{ $data[0]->analisis}} </h3>
                        @endif
                       
                        <div>
                            @if ( $data[0]->usia === 'kosong')
                            <h3> Kosong </h3>
                            @else
                                {{ $data[0]->penjelasan}}
                            @endif
                        <br>
                        </div><br>
                        <h4> Pencegahan </h4>
                        <div style="text-align: justify">
                            @if ( $data[0]->usia === 'kosong')
                                Kosong
                            @else
                            <?php
                            $a = 0;
                            $b = 0;
                            $datax = [];
                            foreach ($data as $value) {
                                if ($a!=0) {
                                    for ($i=0; $i < $a; $i++) { 
                                        if ($datax[$i] == $value->pencegahan){
                                            $b++;
                                        }
                                    }
                                }
                                if ($b==0) {
                                    echo $value->pencegahan."<br>";
                                    $datax[$a] = $value->pencegahan;
                                    $a++;
                                }
                                $b=0;
                            }
                            ?>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="row ">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h5 class="text-white text-capitalize ps-3">Data Sebelumnya</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-6"> Pasien </div> <div class="col-md-6 col-6"> : 
                               <?php
                                if ($data[0]->usia == 'kosong') {
                                    echo 'kosong';
                                }else{
                                    if ($data[0]->usia == 0) {
                                        echo $data1[0]->usia.' (Remaja)';
                                    } elseif ($data[0]->usia == 1) {
                                        echo $data1[0]->usia.' (Dewasa)';
                                    }else {
                                        echo $data1[0]->usia.' (Lanjut usia)';
                                    }
                                }
                               ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-0 col-6"> IMT </div> <div class="col-md-6 col-6"> : 
                                <?php
                                if ($data[0]->usia == 'kosong') {
                                    echo 'kosong';
                                }else{
                                    if ($data[0]->IMT == 0) {
                                        echo 'Rendah';
                                    } elseif ($data[0]->IMT == 1) {
                                        echo 'Normal';
                                    }else {
                                        echo 'Tinggi';
                                    }
                                }
                               ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6"> Riwayat Keluaga Telah terkana hypertensi </div> <div class="col-md-6 col-6"> : {{$data1[0]->riwayat_keluarga_hypertensi}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6"> Riwayat diri hypertensi </div> <div class="col-md-6 col-6"> : {{$data1[0]->riwayat_diri_hypertensi}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6"> Tingkat stress </div> <div class="col-md-6 col-6"> : {{$data1[0]->tingkat_stres}} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6"> Konsumsi makana (kanana asin/garam dan junk food ) </div> <div class="col-md-6 col-6"> : {{$data1[0]->konsumsi_makanan}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>
                    </div>
                </div>
            
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('aside')
    <aside class=" py-4 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="../assets/img/Tanpa judul.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">WPDSM</span>
        </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link text-white " href="/user">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-info" href="/user/hypertensi">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">favorite</i>
                    </div>
                    <span class="nav-link-text ms-1">Hypertensi</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="/user/diabetes">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">bloodtype</i>
                    </div>
                    <span class="nav-link-text ms-1">Diabetes</span>
                </a>
                </li>
                <hr class="horizontal light mt-0 mb-2">
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <a   class="nav-link text-white" >
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                            </div>
                        <button class="nav-link-text ms-1" style=" all: unset;cursor: pointer;">log out</button>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
@endsection