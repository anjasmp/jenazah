@extends('member-area.templates.default')

@section('judul','Pengaduan Musibah Kematian')
@section('sub-judul','Pelayanan')
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

    <form action="{{ route('pelayanan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <select class="form-control" name="user_families_id" id="name">
                <option value="" holder>Select Name</option>
                @foreach($user_families as $result)
                <option value="{{ $result->id }}">{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama Ayah Alm</label>
        <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah Alm" value="">
        </div>
        <div class="form-group">
            <label for="title">Tanggal Wafat</label>
            <input type="date" name="tanggal_wafat" id="date" class="form-control" style="width: 100%; display: inline;">
        </div>
        <div class="form-group">
            <label for="title">Jam Wafat</label>
            <input type="time" class="form-control" name="waktu_wafat" placeholder="Jam Wafat" value="">
        </div>
        <div class="form-group">
            <label for="title">Tempat Wafat </label>
        <input type="text" class="form-control" name="tempat_wafat" placeholder="Tempat Wafat" value="">
        </div>
        <div class="form-group">
            <label for="title">Tempat Pemakaman</label>
        <input type="text" class="form-control" name="tempat_pemakaman" placeholder="Tempat Pemakanan" value="">
        </div>
        <div class="form-group">
            <label for="title">Upload KTP atau KK</label>
        <input type="file" class="form-control" name="kk_atau_ktp" placeholder="Upload Scan KK atau KTP" value="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>

    

</div>


@endsection