@extends('admin.templates.default')

@section('sub-judul','Edit Penerimaan Lazhaq')
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

    

    <form class="mt-4" action="{{ route('penerimaan-qurban.update', $item->id)}}" method="POST">
        @csrf
        @method('patch')
        <h4 class="card-title">Nomor Hewan</h4>
        <div class="form-group">
            <input type="number" class="form-control" name="nomor_hewan" value="{{$item->nomor_hewan}}">
        </div>
        <h4 class="card-title">Tipe</h4>
        <div class="form-group form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipe" id="sapi" value="Sapi" {{ ($item->tipe == "Sapi")? "checked" : "" }}>
            <label class="form-check-label" for="inlineRadio1">Sapi</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipe" id="kambing" value="Kambing" {{ ($item->tipe == "Kambing")? "checked" : "" }}>
            <label class="form-check-label" for="inlineRadio2">Kambing</label>
        </div>

        <h4 class="card-title">Nama</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="nama" value="{{$item->nama}}">
        </div>
        <h4 class="card-title">Atas Nama</h4>
        <div class="form-group">
            <input type="text" class="form-control" name="atas_nama" value="{{$item->atas_nama}}">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Penerimaan</button>
        </div>
    </form>

</div>


@endsection