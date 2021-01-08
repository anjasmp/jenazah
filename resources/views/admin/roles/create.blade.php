@extends('admin.templates.default')

@section('sub-judul','Create Role')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    

    <form class="mt-4" action="{{ route('roles.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <h4 class="card-title">Roles</h4>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" required>
        </div>

       
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Role</button>
        </div>
    </form>

</div>


@endsection