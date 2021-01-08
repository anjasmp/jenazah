@extends('member-area.templates.default')

@section('judul','Edit Data Kontak')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success')}}
    </div>
    @endif


    <form class="mt-4" action="{{ route('info-tagihan.update', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <h4 class="card-title">Alamat</h4>
        <div class="form-group">
            <textarea 
                  name="alamat"
                  class="form-control mb-2 mr-sm-2"
                  id="alamat" 
                  cols="10"
                  onKeyPress
                  rows="3">{{ old('alamat', $item->alamat) }}
                </textarea>
        </div>

        <h4 class="card-title">Telepon</h4>
        <div class="form-group">
            <input
                  name="telepon"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    value="{{$item->telepon}}"
                    id="inputTelepon"
                  />
        </div>

        <h4 class="card-title">Pekerjaan</h4>
        <div class="form-group">
            <input
                  name="pekerjaan"
                    type="text"
                    class="form-control mb-2 mr-sm-2"
                    value="{{$item->pekerjaan}}"
                    id="inputPekerjaan"
                  />
        </div>

        <h4 class="card-title">Nomor kartu keluarga</h4>
        <div class="form-group">
            <input
                  name="no_kk"
                    type="number"
                    class="form-control mb-2 mr-sm-2"
                    value="{{$item->no_kk}}"
                    id="inputNoKk"
                  />
        </div>

        <h4 class="card-title">Scan KK</h4>
        <div class="form-group">
            <input
                  name="scan_kk"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    placeholder="scan_kk"
                    id="scan_kk"
                  />
        </div>

        <h4 class="card-title">Scan KTP</h4>
        <div class="form-group">
            <input
                  name="scan_ktp"
                    type="file"
                    class="form-control mb-2 mr-sm-2"
                    placeholder="scan_ktp"
                    id="scan_ktp"
                  />
        </div>

       
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Simpan Data</button>
        </div>
    </form>

</div>


@endsection
