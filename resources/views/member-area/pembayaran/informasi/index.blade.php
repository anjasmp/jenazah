@extends('member-area.templates.default')

@section('judul','Informasi Pembayaran')
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

        
    <h3>Kontak Penagihan</h3>

    <table class="table table-bordered">
        
        @foreach ($items as $item)
        <tr>
            <th>Nomor Anggota</th>
            <td>{{ $item->no_anggota }}</td>
        </tr>
        <tr>
            <th>Nama Penanggung Jawab</th>
            <td>{{ $item->user->name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $item->user->email }}</td>
        </tr>

        <tr>
            <th>Alamat</th>
            <td>{{ $item->alamat }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $item->telepon }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $item->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Nomor Kartu Keluarga</th>
            <td>{{ $item->no_kk }}</td>
        </tr>
        <tr>
            <th>Scan KTP</th>
            <td><img src="{{ Storage::url($item->scan_ktp) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>
        <tr>
            <th>Scan KK</th>
            <td><img src="{{ Storage::url($item->scan_kk) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>
        @endforeach

            <tr>
                <td colspan="7" class="text-center">
                    <a href="{{ route ('info-tagihan.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-pencil-alt"> Ubah data</i>
                    </a>
                </td>
            </tr>
        
    </table>
{{-- 
    <br><br>
    <h3>Metode Pembayaran</h3>

    <table class="table table-bordered">
        
      
        <tr>
            <th>Nama Bank</th>
            <td>Mandiri Syariah</td>
        </tr>
        <tr>
            <th>Nomor Rekening</th>
            <td>32.701.702.09</td>
        </tr>

        <tr>
            <th>Nama Pemilik Rekening</th>
            <td>Anjas Mulya Putra</td>
        </tr>

       
        
    </table> --}}

    


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