@extends('admin.templates.default')

@section('sub-judul','Tag')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('tag.create') }}" class="btn btn-primary" style="float: right;"><i class="fas fa-plus fa-sm text-white-50"></i> Create Tag</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tableTag">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name Tag</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tag as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $result->name }}</td>
                    <td>

                        <form action="{{ route('tag.destroy', $result->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('tag.edit', $result->id)}}" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
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
    $('#tableTag').dataTable()
})
</script>
@endpush