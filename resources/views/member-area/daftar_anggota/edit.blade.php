@extends('member-area.templates.default')

@section('judul','Edit Anggota')
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


    <form class="mt-4" action="{{ route('anggota.update', $items->id)}}" method="POST">
        @csrf
        @method('patch')
        <h4 class="card-title">Nama</h4>
        <div class="form-group">
            <input
                      type="text"
                      name="name"
                      class="form-control mb-2 mr-sm-2"
                      id="name"
                      required
                      value="{{$items->name}}"
                      placeholder="Name"
                    />
        </div>

        <h4 class="card-title">Nomor Induk Kependudukan</h4>
        <div class="form-group">
            <input
                        type="number"
                        name="nik"
                        class="form-control"
                        id="nik"
                        required
                        value="{{$items->nik}}"
                        placeholder="NIK"
                      />
        </div>
        <h4 class="card-title">Tempat Lahir</h4>
        <div class="form-group">
            <input
                        type="text"
                        name="tempat_lahir"
                        class="form-control"
                        id="tempatLahir"
                         required
                         value="{{$items->tempat_lahir}}"
                        placeholder="Tempat Lahir"
                     />
        </div>

        <h4 class="card-title">Tanggal Lahir</h4>
        <div class="form-group">
            <input
                        type="date"
                        name="tanggal_lahir"
                        class="form-control"
                        id="tanggalLahir"
                        required
                        value="{{$items->tanggal_lahir}}"
                        placeholder="Tanggal Lahir"
                      />
        </div>
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Simpan Data</button>
        </div>
    </form>

</div>


@endsection
