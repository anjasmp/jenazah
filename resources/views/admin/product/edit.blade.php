@extends('admin.templates.default')

@section('sub-judul','Ubah Paket')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
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

    <form action="{{ route('product.update', $item->id )}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Nama Paket</label>
        <input type="text" class="form-control" name="title" placeholder="Nama" value="{{ $item->title }}">
        </div>
        <div class="form-group">
            <label for="title">Fitur</label>
            <textarea class="form-control" name="features" id="fitur" rows="10">{{ $item->features }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">About</label>
            <textarea class="form-control" name="about" id="about" rows="10">{{ $item->about }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Tipe </label>
        <input type="text" class="form-control" name="type" placeholder="Tipe" value="{{ $item->type }}">
        </div>
        <div class="form-group">
            <label for="title">Pendaftaran </label>
        <input type="text" class="form-control" name="register" placeholder="Pendaftaran" value="{{ $item->register }}">
        </div>
        <div class="form-group">
            <label for="title">Harga</label>
        <input type="number" class="form-control" name="price" placeholder="Harga" value="{{ $item->price }}">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
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