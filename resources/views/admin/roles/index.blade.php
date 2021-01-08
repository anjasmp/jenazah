@extends('admin.templates.default')

@section('sub-judul','User')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('roles.create') }}" class="btn btn-primary" style="float: right;">Create Role</a>
        <table class="table table-striped" id="tableuser">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Role</th>
                    <th>Guard</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($role as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->guard_name }}</td>
                    <td>{{ $result->created_at->format('d M Y') }}</td>
                    <td>

                        <form action="{{ route('roles.destroy', $result->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tableuser').dataTable()
})
</script>
@endpush