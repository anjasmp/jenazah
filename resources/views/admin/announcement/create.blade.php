@extends('admin.templates.default')

@section('sub-judul','Create announcement')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <form class="mt-4" action="{{ route('announcement.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h4 class="card-title">Content</h4>
            <p style="font-weight: lighter">*Max 182 Characters </p>
            <textarea class="form-control" name="content" id="content" rows="10"></textarea>
        </div>


        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Announcement</button>
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