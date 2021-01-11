@extends('admin.templates.default')

@section('sub-judul','Dashboard')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        <h1 style="text-align: center;">Halo, Selamat Datang! <span style="color: #03877e;">{{ Auth::user()->name }}</span> </h1>
    </div>

    
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $anggota }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Anggota Aktif</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-users" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $pengaduan_musibah }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Daftar Pengaduan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-th-large" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $service }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Meninggal Dunia</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-th-large" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$transaction}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Transaksi
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{$transaction_pending}}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pending</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-spinner" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium">{{$transaction_success}}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Sukses</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>



    



@endsection