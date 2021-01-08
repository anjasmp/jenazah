@extends('admin.templates.default')

@section('sub-judul','Create Gallery Qurban')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif


    <form class="mt-4" action="{{ route('gallery-qurban.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" placeholder="image">

        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Gallery</button>
        </div>
    </form>

</div>


@endsection