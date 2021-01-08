@extends('admin.templates.default')

@section('sub-judul','Tambah Paket Pilihan')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px; ">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('product.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Nama</label>
            <input type="text" class="form-control" name="title" placeholder="Nama" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="title">Fitur</label>
                <textarea class="form-control" name="features" id="fitur" rows="10">{{ old('features') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">About</label>
                <textarea class="form-control" name="about" id="about" rows="10">{{ old('about') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Tipe </label>
            <input type="text" class="form-control" name="type" placeholder="Tipe" value="{{ old('type') }}">
            </div>
            <div class="form-group">
                <label for="title">Biaya Pendaftaran </label>
            <input type="text" class="form-control" name="register" placeholder="Pendaftaran" value="{{ old('type') }}">
            </div>
            <div class="form-group">
                <label for="title">Harga</label>
            <input type="number" class="form-control" name="price" placeholder="Harga" value="{{ old('price') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>


    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'about' );
</script>
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'features' );
</script>
@endpush