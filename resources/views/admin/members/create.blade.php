@extends('admin.templates.default')

@section('sub-judul','Input Musibah Kematian')
@section('content')

<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
    @endif
    
    
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <form action="{{ route('daftar-anggota.store_kematian', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Ayah Alm</label>
        <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Nama Ayah Alm" >
        </div>
        <div class="form-group">
            <label for="title">Tanggal Wafat</label>
            <input type="date" name="tanggal_wafat" id="date" value="{{ old('tanggal_wafat') }}" class="form-control" style="width: 100%; display: inline;">
        </div>
        <div class="form-group">
            <label for="title">Jam Wafat</label>
            <input type="time" class="form-control" name="waktu_wafat" value="{{ old('waktu_wafat') }}" placeholder="Jam Wafat" >
        </div>
        <div class="form-group">
            <label for="title">Tempat Wafat </label>
        <input type="text" class="form-control" name="tempat_wafat" value="{{ old('tempat_wafat') }}" placeholder="Tempat Wafat" >
        </div>
        <div class="form-group">
            <label for="title">Tempat Pemakaman</label>
        <input type="text" class="form-control" name="tempat_pemakaman" value="{{ old('tempat_pemakaman') }}"  placeholder="Tempat Pemakanan" >
        </div>
        <div class="form-group">
            <label for="title">Upload KTP atau KK</label>
            <p style="margin-bottom: -1px; color: gray; font-size: 80%">Image, Size Max:1Mb</p>
        <input type="file" class="form-control" name="kk_atau_ktp" value="{{ old('kk_atau_ktp') }}" placeholder="Upload Scan KK atau KTP" >
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>

    

</div>


@endsection
