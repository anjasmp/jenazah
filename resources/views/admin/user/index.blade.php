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
        <a href="{{ route('user.create') }}" class="btn btn-primary" style="float: right;">Create User</a>
        <table class="table table-striped" id="tableuser">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name user</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($user as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $result->name }}</td>
                    @foreach ($result->getRoleNames() as $role)
                    <td><label for="" class="badge badge-info">{{ $role }}</label></td>
                    @endforeach
                    <td>{{ $result->email }}</td>
                    <td>
                        <a href="{{ route('users.roles', $result->id) }}" class="btn btn-primary btn">
                        <i class="fa fa-user-secret"></i></a>

                        <a href="{{ route('user.edit', $result->id) }}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('user.destroy', $result->id) }}" method="POST" class="d-inline">
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