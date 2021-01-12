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
        
        @forelse ($items as $item)
            
     
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
            <td><a data-fancybox="gallery" href="{{ Storage::url($item->scan_ktp) }}"><img src="{{ Storage::url($item->scan_ktp) }}" style="width:100%;max-width:300px"></a></td>

        </tr>
        <tr>
            <th>Scan KK</th>
            <td><a data-fancybox="gallery" href="{{ Storage::url($item->scan_kk) }}"><img src="{{ Storage::url($item->scan_kk) }}" style="width:100%;max-width:300px"></a></td>
        </tr>
        
        <tr>
            <td colspan="7" class="text-center">
                <a href="{{ route ('info-tagihan.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-pencil-alt"> </i> Ubah data
                </a>
            </td>
        </tr>
        @empty

        <tr>
            <td colspan="7" class="text-center">Data kosong</td>
    
        </tr>
        
        @endforelse

            
        
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

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