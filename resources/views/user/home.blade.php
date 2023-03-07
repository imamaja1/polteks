@extends('user.layout')

@section('content')
    <div class="container-fluid py-0">
        <div class="row">
            <div class="col-lg-12  mb-3">
                <div class="card z-index-2 ">
                    <div class="card-body">
                        <h5 class="mb-0 ">Info Hypertensi dan Diabetes</h5>
                    </div>
                    </div>
                </div>
            </div>
      
            @if ($message = Session::get('status'))
            <div class="alert alert-success text-white" role="alert">
              <strong>Berhasil!</strong> {{ $message }}
            </div>
            @endif
            
            <div class="row" style="text-align: justify">   
              <?php 
                foreach ($info as $data) {
              ?>
                
              <div class="col-md-3 col-sm-6 py-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                        <img class="card-img-top" src="/gambar/<?=$data->gambar ?>" alt="Card image cap" height="140em">
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0"><?=$data->judul?></h6>
                      <hr class="horizontal dark my-3">
                      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$data->id ?>">View</a>
                    </div>
                  </div>
                </div>
                 <!-- Modal -->
                <div class="modal fade" id="exampleModal<?=$data->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel"><?=$data->judul?></h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?=$data->penjelasan?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  } 
                ?>
            
            </div>
       
         
        </div>
        <div class="row mt-4">
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
    <aside class="py-4  sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
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
            <a class="nav-link text-white active bg-gradient-info" href="/user">
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