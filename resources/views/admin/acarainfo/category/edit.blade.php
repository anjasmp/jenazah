@extends('admin.templates.default')

@section('sub-judul','Edit Category')
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

    <h4 class="card-title">Name Category</h4>

    <form class="mt-4" action="{{ route('category.update', $category->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Category</button>
        </div>
    </form>

</div>


@endsection