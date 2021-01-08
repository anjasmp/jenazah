@extends('admin.templates.default')

@section('sub-judul','Detail Transaction')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px; ">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        

    <table class="table table-bordered">
        
        
        <tr>
            <th>ID</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>Paket Langganan</th>
            <td>{{ $item->product->title }}</td>
        </tr>
        <tr>
            <th>Nama Penanggung Jawab</th>
            <td>{{ $item->user->name }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $item->user_detail->alamat }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $item->user_detail->telepon }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $item->user_detail->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Nomor Kartu Keluarga</th>
            <td>{{ $item->user_detail->no_kk }}</td>
        </tr>
        <tr>
            <th>Scan KTP</th>
            <td><img src="{{ Storage::url($item->user_detail->scan_ktp) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>
        <tr>
            <th>Scan KK</th>
            <td><img src="{{ Storage::url($item->user_detail->scan_kk) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>
     
        <tr>
            <th>Daftar Kartu Keluarga</th>
            <td>
                <table class="table table-bordered">
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Status</th>
                    </tr>
                    @forelse ($item->user_detail->user_families as $detail)
                    <tr>
                        
                        <td>{{ $detail->nik }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->tempat_lahir }}, {{ Carbon\Carbon::parse($detail->tanggal_lahir)->format('d-m-Y') }}</td>
                        @if ($detail->userfamily_status == 'ACTIVE')
                        <td><span class="badge badge-pill badge-primary" >{{ ($detail->userfamily_status) }}</span></td>
                        @else @if ($detail->userfamily_status == 'NON ACTIVE')
                        <td><span class="badge badge-pill badge-danger" >{{ ($detail->userfamily_status) }}</span></td>
                        @else
                        <td><span class="badge badge-pill badge-warning" >{{ ($detail->userfamily_status) }}</span></td>
                        @endif
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data kosong</td>
    
                    </tr>
                    @endforelse


                </table>
            </td>
        </tr>
    

        <tr>
            <th>Masa Aktif</th>
            <td>{{ Carbon\Carbon::parse($item->masa_aktif)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Transaction Total (Rp)</th>
            <td><div class="myDIV"> {{ $item->transaction_total }}</div></td>
        </tr>
        <tr>
            @if ($item->transaction_status == 'SUCCESS')
                        <td><span class="badge badge-pill badge-primary" >{{ $item->transaction_status }}</span></td>
                        @else @if ($item->transaction_status == 'PENDING')
                        <td><span class="badge badge-pill badge-danger" >{{ $item->transaction_status }}</span></td>
                        @else
                        <td><span class="badge badge-pill badge-warning" >{{ $item->transaction_status }}</span></td>
                        @endif
                        @endif
        </tr>



    </table>

    <a href="{{ route('transaction.index')}}" class="btn btn-primary">
        <i class="fa fa-chevron-left"></i>
        </a>
    


    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('src/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'about' );
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