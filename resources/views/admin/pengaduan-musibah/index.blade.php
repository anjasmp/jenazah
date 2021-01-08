@extends('admin.templates.default')

@section('sub-judul','Daftar Pengaduan')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        
        <a href="{{ URL::to('/admin/service/cetak_pdf') }}" class="btn btn-dark" target="_blank" style="float: right">
            <i class="fa fa-download" aria-hidden="true"></i>
            </a>

        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penanggung Jawab</th>
                    <th>Nama Alm</th>
                    <th>Tanggal Wafat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->user_families->user_detail->user->name }}</td>
                    <td>{{ $item->user_families->name }}</td>
                    <td>{{ Carbon\Carbon::parse($item->tanggal_wafat)->format('d-m-Y') }}</td>
                    @if ($item->service_status == 'ACCEPTED')
                    <td><span class="badge badge-pill badge-primary" >{{ $item->service_status}}</span></td>
                    @else @if ($item->service_status == 'CANCEL')
                    <td><span class="badge badge-pill badge-danger" >{{ $item->service_status}}</span></td>
                    @else
                    <td><span class="badge badge-pill badge-warning" >{{ $item->service_status}}</span></td>
                    @endif
                    @endif
                    
                    
                    <td>
                        <a href="{{ route('service.show', $item->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                            </a>
                        <a href="{{ route('service.edit', $item->id) }}" class="btn btn-warning">
                        <i class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('service.destroy', $item->id) }}" method="POST" class="d-inline">
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