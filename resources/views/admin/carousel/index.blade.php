@extends('admin.templates.default')

@section('sub-judul','Carousel')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('carousel.create')}}" class="btn btn-primary" style="float: right;"> <i class="fas fa-plus fa-sm text-white-50"></i> Create carousel</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px" class="img-thumbnail" />
                    </td>
                    <td>
                        <a href="{{ route('carousel.edit', $item->id) }}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('carousel.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data kosong</td>

                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tablepost').dataTable()
})
</script>
@endpush