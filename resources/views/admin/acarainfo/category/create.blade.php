@extends('admin.templates.default')

@section('sub-judul','Create Category')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <h4 class="card-title">Name Category</h4>

    <form class="mt-4" action="{{ route('category.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Category</button>
        </div>
    </form>

</div>


@endsection