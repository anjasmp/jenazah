@extends('member-area.templates.default')

@section('judul','Riwayat Pembayaran')
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
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $item->transaction_status}}</td>
                    <td><div class="myDIV">{{ $item->transaction_total }}</div></td>
                    <td>
                        

                        <a href="{{ URL::to('/member/transaksi/cetak_pdf') }}" class="btn btn-dark" target="_blank">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        </a>

                        @if ( $item->transaction_status == 'PENDING')
                        <a href="{{ route ('transaksi.pay' , $item->id)}}" class="btn btn-danger">
                            <i class="fa fa-credit-card"> Pay</i>
                            </a>
                        @endif
                        
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