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
                    <th>KK atau KTP</th>
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
                    <td><a data-fancybox="gallery" href="{{ Storage::url($item->kk_atau_ktp) }}"><img src="{{ Storage::url($item->kk_atau_ktp) }}" style="width:100%;max-width:100px"></a></td>
                    @if ($item->service_status == 'ACCEPTED')
                    <td><span class="badge badge-pill badge-primary" >{{ $item->service_status}}</span></td>
                    @else @if ($item->service_status == 'CANCEL')
                    <td><span class="badge badge-pill badge-danger" >{{ $item->service_status}}</span></td>
                    @else
                    <td><span class="badge badge-pill badge-warning" >{{ $item->service_status}}</span></td>
                    @endif
                    @endif
                    
                    
                    <td>
                        
                        <a href="{{ route('service.show', $item->id) }}" class="btn btn-dark" target="_blank" >
                            <i class="fa fa-download" aria-hidden="true"></i>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@push('scripts')
<script src="{{ asset('user/assets/js/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#tablepost').dataTable()
})
</script>


@endpush