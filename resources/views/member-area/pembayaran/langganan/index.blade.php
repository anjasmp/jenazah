@extends('member-area.templates.default')

@section('judul','Langganan Saat ini')
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
                    <th>Paket Langganan</th>
                    <th>Penanggung Jawab</th>
                    <th>Tanggal Aktif</th>
                    <th>Tanggal Berakhir</th>
                    <th>Harga (Rp)</th>
                    <th>Status</th>
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>

            <tbody>
             
                <tr>
                    <td>{{ ($items->product->title) }}</td>
                    <td>{{ $items->user->name }}</td>
                    <td>{{ Carbon\Carbon::parse($items->created_at)->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($items->masa_aktif)->format('d-m-Y') }}</td>
                    <td><div class="myDIV">{{ $items->transaction_total }}</div></td>

                    @if ($items->transaction_status == 'SUCCESS')
                    <td>ACTIVE</td>
                    @else
                    <td>NON ACTIVE</td>
                    @endif
                    

                </tr>
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