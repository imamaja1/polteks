@extends('user.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-3">
            <div class="row min-vh-50">
                <div class="col-12">
                    <div class="card h-100">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h5 class="text-white text-capitalize ps-3">Diabetes</h5>
                        </div>
                    </div>
                    <form action="{{route('user_diabetes_store')}}" method="post">
                    @csrf
                    <div class="card-body row">
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0"> Usia Pasien </label>
                            </div>
                            <div class="col-md-6">
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <label class="form-label" for="usia">Usia</label>
                                    <input type="text" class="form-control" name="usia" id="usia">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0">Aktifitas Fisik (<small>minimal 30 menit sehari</small>)</label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-2 ms-4">
                                    <select class="form-control" id="exampleFormControlSelect1" name="aktifitas_fisik" required>
                                        <option value="">-- pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="2">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0">IMT</label>
                            </div>
                            <div class="col-md-6">
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <label class="form-label" >Berat badan (kg)</label>
                                    <input type="text" class="form-control" name="BB">
                                </div>
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <label class="form-label">Tinggi Badan (cm)</label>
                                    <input type="text" class="form-control" name="TB">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="col-md-5">
                                <label for="exampleFormControlSelect1" class="ms-0" name="riwayat_keluarga" >Lingkar Pinggang <small>*Angka</small> (cm) </label> 
                            </div>
                            <div class="col-md-6">
                                <div class=" input-group input-group-outline my-2 ms-4">
                                    <input type="text" class="form-control" name="lingkar_pinggang"> 
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6 row">
                                <div class="col-md-5">
                                    <label for="exampleFormControlSelect1" class="ms-0" name="riwayat_keluarga" >Makan Sayuran atau buah - buahan (<small>setiap hari</small>)</label>
                                </div>
                                <div class="col-md-6">
                                    <div class=" input-group input-group-outline my-2 ms-4">
                                        <select class="form-control"  name="makanan">
                                            <option >-- pilih --</option>
                                            <option value="1">Ya</option>
                                            <option value="2">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 row">
                                <div class="col-md-5">
                                    <label for="exampleFormControlSelect1" class="ms-0">Minum Obat Tekanan Darah Tinggi Secara Teratur</label>
                                </div>
                                <div class="col-md-6">
                                    <div class=" input-group input-group-outline my-2 ms-4">
                                        <select class="form-control"  name="obat">
                                            <option >-- pilih --</option>
                                            <option value="1">Iya</option>
                                            <option value="2">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-6 row">
                                <div class="col-md-5">
                                    <label for="exampleFormControlSelect1" class="ms-0">Memiliki Kadar Gula (Glukosa) Darah Tinggi</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-2 ms-4">
                                        <select class="form-control" id="exampleFormControlSelect1" name="kadar_gula">
                                            <option >-- pilih --</option>
                                            <option value="1">Iya</option>
                                            <option value="2">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-md-5">
                                    <label for="exampleFormControlSelect1" class="ms-0">Riwayat Keluarga Diabetes</label>
                                </div>
                                <div class="col-md-6">
                                    <div class=" input-group input-group-outline my-2 ms-4">
                                        <select class="form-control"  name="riwayat_diabetes">
                                            <option >-- pilih --</option>
                                            <option value="1">Tidak</option>
                                            <option value="2">Ya, Kakek, Nenek, Paman, Bibi, atau Spupu</option>
                                            <option value="3">Ya, Orangg tua, saudara Kandung, Anak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn bg-gradient-primary my-4 mb-4">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('status'))
    <div class="row" style="padding: 0 5% 0 5%">
    <div class="alert alert-success text-white" role="alert">
        <strong>Berhasil!</strong> {{ $message }}
    </div>
    </div>
    @endif

    <div class=" row container-fluid py-4">
        <div class="col-md-6 mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3">Analisis</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-4">Sekor</div> 
                                <div class="col-md-8 col-8"> 
                                    : {{$score}} Poin
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-8">Kadar Diabetes</div> 
                                <div class="col-md-8 col-8"> 
                                    : {{$analisis->katagori}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-4">Penjelasan</div> 
                                <div class="col-md-8 col-8"> 
                                    : {{$analisis->ket}}
                                </div>
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
                            <div class="col-md-6 col-6">Usia Pasien</div> 
                            <div class="col-md-6 col-6"> 
                                : {{$diabetes->usia}} Tahun
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">Aktifitas Fisik</div> 
                            <div class="col-md-6 col-6"> 
                                @if ( $diabetes->aktifitas_fisik == 1 )
                                    : Ya
                                @else
                                    : Tidak                                    
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">Lingkar Pinggang</div> 
                            <div class="col-md-6 col-6"> 
                                : {{$diabetes->lingkar_pinggang}} cm
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">Kadar Gula (Glukosa)</div> 
                            <div class="col-md-6 col-6"> 
                                @if ($diabetes->kadar_gula == 1)
                                    : Ya
                                @else
                                    : Tidak
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">Obat</div> 
                            <div class="col-md-6 col-6"> 
                                @if ($diabetes->obat == 1)
                                    : Ya
                                @else
                                    : Tidak
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">Riwayat Diabetes</div> 
                            <div class="col-md-6 col-6"> 
                                @if ($diabetes->riwayat_diabetes == 1)
                                    : Ya
                                @else
                                    : Tidak
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">IMT</div> 
                            <div class="col-md-6 col-6"> 
                                @if ($diabetes->BB/(($diabetes->TB*2)/10000) > 25)
                                    : Rendah
                                @elseif ( 18 < $diabetes->BB/(($diabetes->TB*2)/10000) && $diabetes->BB/($diabetes->TB/10000) < 25)
                                    : Normal
                                @else
                                    : Tinggi
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6">Konsumsi Makanan</div> 
                            <div class="col-md-6 col-6"> 
                                @if ($diabetes->makanan == 1)
                                    : Ya
                                @else
                                    : Tidak
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer class="footer py-4">
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
    <aside class=" py-4 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
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
                {{-- <li class="nav-item">
                <a class="nav-link text-white " href="/user/hypertensi">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">favorite</i>
                    </div>
                    <span class="nav-link-text ms-1">Hypertensi</span>
                </a>
                </li> --}}
                <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-info" href="/user/diabetes">
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