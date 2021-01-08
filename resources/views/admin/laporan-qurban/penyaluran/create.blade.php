@extends('admin.templates.default')

@section('sub-judul','Create Penyaluran Qurban')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    

    <form class="mt-4" action="{{ route('penyaluran-qurban.store')}}" method="POST">
        @csrf
        <h4 class="card-title">Mukaddimah</h4>
        <div class="form-group">
            <textarea class="form-control" name="mukaddimah" id="description" rows="10"></textarea>
        </div>
        <h4 class="card-title">Total Sapi</h4>
        <div class="form-group">
            <input type="number" class="form-control" name="total_sapi">
        </div>
        <h4 class="card-title">Total Kambing</h4>
        <div class="form-group">
            <input type="number" class="form-control" name="total_kambing">
        </div>
        <h4 class="card-title">Total Paket Daging</h4>
        <div class="form-group">
            <input type="number" class="form-control" name="paket_daging">
        </div>
        <h4 class="card-title">Total Penerima</h4>
        <div class="form-group">
            <input type="number" class="form-control" name="penerima">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style="float: right;">Save Penyaluran</button>
        </div>
    </form>

</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'description' );
</script>
@endpush