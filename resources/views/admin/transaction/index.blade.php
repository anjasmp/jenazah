@extends('admin.templates.default')

@section('sub-judul','Transaction')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        <a href="{{ URL::to('/admin/transaction/cetak_pdf') }}" class="btn btn-dark" target="_blank" style="float: right">
            <i class="fa fa-download" aria-hidden="true"></i>
            </a>

        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Paket Langganan</th>
                    <th>Nama</th>
                    <th>Masa Aktif</th>
                    <th>Total (Rp)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ ($item->product->title) }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ Carbon\Carbon::parse($item->masa_aktif)->format('d-m-Y') }}</td>
                    <td><div class="myDIV">{{ $item->transaction_total }}</div></td>
                    @if ($item->transaction_status == 'SUCCESS')
                    <td><span class="badge badge-pill badge-primary" >{{ $item->transaction_status}}</span></td>
                    @else @if ($item->transaction_status == 'IN_CART')
                    <td><span class="badge badge-pill badge-danger" >{{ $item->transaction_status}}</span></td>
                    @else
                    <td><span class="badge badge-pill badge-warning" >{{ $item->transaction_status}}</span></td>
                    @endif
                    @endif
                    <td>

                        <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                            <i class="fa fa-eye"></i>
                            </a>

                        <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-warning">
                        <i class="fa fa-pencil-alt"></i>
                        </a>

                        <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="d-inline">
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