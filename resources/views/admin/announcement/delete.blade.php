@extends('admin.templates.default')

@section('sub-judul','Announcement Recycle Bin')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($item as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{!! substr($result->content, 0, 50) !!}</td>
                    <td>

                        <form action="{{ route('announcement.kill', $result->id )}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{route('announcement.restore', $result->id )}}" class="btn btn-info"><i class="fa fa-undo-alt"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    $('#tablepost').dataTable()
})
</script>
@endpush