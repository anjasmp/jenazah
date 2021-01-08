@extends('admin.templates.default')

@section('sub-judul','Create User')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    

    <form class="mt-4" action="{{ route('user.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <h4 class="card-title">Name</h4>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <h4 class="card-title">Email</h4>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <h4 class="card-title">Password</h4>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <h4 class="card-title">Password Confirm</h4>
            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="form-group">
            <h4 class="card-title">Role</h4>
            <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                <option value="">Pilih</option>
                @foreach ($role as $row)
                <option value="{{ $row->name }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save user</button>
        </div>
    </form>

</div>


@endsection