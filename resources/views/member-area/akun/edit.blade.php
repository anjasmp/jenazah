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

    

    <form class="mt-4" action="{{ route('profilmember.update', $item->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <h4 class="card-title">Name</h4>
            <input type="text" class="form-control" name="name" value="{{$item->name}}">
        </div>

        <div class="form-group">
            <h4 class="card-title">Email</h4>
            <input type="email" class="form-control" name="email" value="{{$item->email}}">
        </div>

        <div class="form-group">
            <h4 class="card-title">Password</h4>
            <input type="password" class="form-control" name="password" value="{{$item->password}}">
            <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
        </div>

        <div class="form-group">
            <h4 class="card-title">Password Confirm</h4>
            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{$item->password}}">
            <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Ubah</button>
        </div>
    </form>

</div>


@endsection