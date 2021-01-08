@extends('admin.templates.default')

@section('sub-judul','Edit Post')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <form class="mt-4" action="{{ route('post.update', $post->id )}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <h4 class="card-title">Title Post</h4>
            <input type="text" class="form-control" name="title" value="{{ $post->title}}">
        </div>
        <div class="form-group">
            <h4 class="card-title">Category</h4>
            <select class="form-control" name="category_id" id="category_id">
                <option value="" holder>Select Category</option>
                @foreach($category as $result)
                <option value="{{ $result->id }}"
                    @if($post->category_id == $result->id)
                    selected
                    @endif
                >{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h4 class="card-title">Tags</h4>
            <select class="form-control" id="multiple" name="tags[]" multiple="multiple">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" @foreach($post->tags as $value)
                    @if($tag->id == $value->id)
                    selected
                    @endif
                    @endforeach
                    >{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h4 class="card-title">Content</h4>
            <textarea class="form-control" name="content" id="content"
                rows="10">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <h4 class="card-title">Thumbnail</h4>
            <input type="file" class="form-control" name="image">
        </div>


        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Update Post</button>
        </div>
    </form>

</div>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#multiple').select2();
});
</script>
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'content' );
</script>
@endpush