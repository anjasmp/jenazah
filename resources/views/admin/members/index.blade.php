@extends('admin.templates.default')

@section('sub-judul','Daftar Anggota')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        
        <a href="{{ URL::to('/admin/daftar-anggota/cetak_pdf') }}" class="btn btn-dark" target="_blank" style="float: right">
            <i class="fa fa-download" aria-hidden="true"></i>
            </a>

        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penanggung Jawab</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->user_detail->user->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nik }}</td>


                    @if ($item->userfamily_status == 'ACTIVE')
                    <td><span class="badge badge-pill badge-primary" >{{ ($item->userfamily_status) }}</span></td>
                    @else @if ($item->userfamily_status == 'NON ACTIVE')
                    <td><span class="badge badge-pill badge-danger" >{{ ($item->userfamily_status) }}</span></td>
                    @else
                    <td><span class="badge badge-pill badge-warning" >{{ ($item->userfamily_status) }}</span></td>
                    @endif
                    @endif

                    <td>

                        @if ($item->user_detail->transactions->transaction_status === 'SUCCESS')
                            <a href="{{ route('daftar-anggota.edit', $item->id) }}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i></a>
                        @endif
                        

                        <form action="{{ route('daftar-anggota.destroy', $item->id) }}" method="POST" class="d-inline">
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

<script>
    let x = document.querySelectorAll(".myDIV"); 
    for (let i = 0, len = x.length; i < len; i++) { 
        let num = Number(x[i].innerHTML) 
                  .toLocaleString('en'); 
        x[i].innerHTML = num; 
        x[i].classList.add("currSign"); 
    } 
  </script>
@endpush