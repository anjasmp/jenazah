@extends('admin.templates.default')

@section('sub-judul','Edit announcement')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <form class="mt-4" action="{{ route('announcement.update', $item->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <h4 class="card-title">Content</h4>
        <textarea class="form-control" name="content" id="content" rows="10">{{ $item->content }}</textarea>
        </div>


        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Announcement</button>
        </div>
    </form>

</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'content' );
</script>
@endpush