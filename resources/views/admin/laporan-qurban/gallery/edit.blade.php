@extends('admin.templates.default')

@section('sub-judul','Edit Gallery Qurban')
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

    

    <form class="mt-4" action="{{ route('gallery-qurban.update', $item->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" placeholder="image">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Gallery</button>
        </div>
    </form>

</div>


@endsection