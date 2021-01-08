@extends('admin.templates.default')

@section('sub-judul','Category')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('category.create') }}" class="btn btn-primary" style="float: right;"><i class="fas fa-plus fa-sm text-white-50"></i> Create Category</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tableCategory">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($category as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $result->name }}</td>
                    <td>

                        <form action="{{ route('category.destroy', $result->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('category.edit', $result->id)}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
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
    $('#tableCategory').dataTable()
})
</script>
@endpush