@extends('member-area.templates.default')

@section('judul','Pelayanan')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        <h3 style="text-align: center;">Halo, Selamat Datang! <span style="color: #03877e;">{{ Auth::user()->name }}</span> </h3>
        <h1 style="text-align: center;"><span style="color: #03877e;"> <br>PERMINTAAN PELAYANAN JENAZAH</span> </h1>
        
    </div>


    <div class="card-group">
        <div class="card border-center">
        @forelse ($item as $items)
        <a href="{{ route ('pelayanan.create')}}" class="btn btn-danger">
            <div class="card-body">
                <h2>KLIK DISINI !</h2>
            </div>
            </a>
        @empty
        <div class="card-group">
            <div class="card border-center">
                <a href="{{ route ('transaksi.index')}}" class="btn btn-danger">
                <div class="card-body">
                    <h2>Selesaikan Pembayaran</h2>
                </div>
                </a>
            </div>
            </div>
        @endforelse
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