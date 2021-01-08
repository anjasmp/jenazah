@extends('admin.templates.default')

@section('sub-judul','Reclye Bin Anggota')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penanggung Jawab</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($item as $key => $result)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ ($result->user_detail->user->name ) }}</td>
                    <td>{{ ($result->name) }}</td>
                    <td>{{ ($result->tempat_lahir) }}</td>
                    <td>{{ ($result->tanggal_lahir) }}</td>
                    <td>{{ ($result->nik) }}</td>
                    <td><span class="badge badge-pill badge-primary" >{{ ($result->userfamily_status) }}</span></td>
                    <td>
                        <a href="{{ route('daftar-anggota.restore', $result->id) }}" class="btn btn-info">
                        <i class="fa fa-undo-alt"></i> </a>

                        <form action="{{ route('daftar-anggota.kill', $result->id) }}" method="POST" class="d-inline">
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