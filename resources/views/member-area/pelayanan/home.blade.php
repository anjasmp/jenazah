@extends('member-area.templates.default')

@section('judul','Pelayanan')
@section('content')



<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        <h3 style="text-align: center;">Halo, Selamat Datang! <span style="color: #03877e;">{{ Auth::user()->name }}</span> </h3>
        <br>

        @if ($masa_aktif <= 7  && $masa_aktif !== null)

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Waktunya perpanjang!</h4>
            <p>Masa aktif kamu akan segera berakhir, lakukan perpanjang pembayaran sekarang!</p>
            <hr>
            <a href="http://" class="btn btn-primary" >Perpanjang Sekarang!</a>
        </div>
        @endif


        @if ($end_transaction !== null)
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Yuk, Lakukan pembayaran!</h4>
            <p>Masa aktif sudah berakhir, aktifkan keanggotaan untuk tetap mendapatkan pelayanan!</p>
            <hr>
            <a href="http://" class="btn btn-danger" >Aktifkan Sekarang!</a>
        </div>

        @endif


        @if ($item)
        <h1 style="text-align: center;"><span style="color: #03877e;"> <br>PERMINTAAN PELAYANAN JENAZAH</span> </h1>
        @else @if ($item)
        <h1 style="text-align: center;"><span style="color: #03877e;"> <br>STATUS ANGGOTA : NON ACTIVE </span> </h1>
        @else
        <h1 style="text-align: center;"><span style="color: #03877e;"> <br>ANDA BELUM TERDAFTAR </span> </h1>
        @endif
        @endif


    </div>


    <div class="card-group">
        <div class="card border-center">

            @if ($item)
            <a href="{{ route ('pelayanan.create')}}" class="btn btn-danger">
                <div class="card-body">
                    <h2>KLIK DISINI !</h2>
                </div>
                </a>
            @else @if ($item)
            <div class="card-group">
                <div class="card border-center">
                    <a href="{{ route ('transaksi.index')}}" class="btn btn-danger">
                    <div class="card-body">
                        <h2>Selesaikan Pembayaran</h2>
                    </div>
                    </a>
                </div>
            </div>
            @else
            <div class="card-group">
                <div class="card border-center">
                    <a href="{{ route ('product.list')}}" class="btn btn-danger">
                    <div class="card-body">
                        <h2>Daftar Keanggotaan</h2>
                    </div>
                    </a>
                </div>
            </div>
            @endif
            @endif

        </div>
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
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $service }}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Anggota Meninggal Dunia</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span><i class="fa fa-th-large" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>

    

        
        
    
</div>


@endsection