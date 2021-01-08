@extends('admin.templates.default')

@section('sub-judul','Detail Pengaduan')
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

      
                <a href="{{ URL::to('/admin/service/cetak_pdf/{id}') }}" class="btn btn-dark" style="float: right">
                    <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
<br> <br>
    <table class="table table-bordered">
        
        
        <tr>
            <th>ID</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>Nama Alm</th>
            <td>{{ $item->user_families->name }}</td>
        </tr>
        <tr>
            <th>Bin/Binti</th>
            <td>{{ $item->nama_ayah }}</td>
        </tr>

        <tr>
            <th>Tanggal Wafat</th>
            <td>{{ $item->tanggal_wafat }}</td>
        </tr>
        <tr>
            <th>Waktu Wafat</th>
            <td>{{ $item->waktu_wafat }}</td>
        </tr>
        <tr>
            <th>Tempat Wafat</th>
            <td>{{ $item->tempat_wafat }}</td>
        </tr>
        <tr>
            <th>Tempat Pemakaman</th>
            <td>{{ $item->tempat_pemakaman }}</td>
        </tr>
        <tr>
            <th>Scan KK/KTP</th>
            <td><img src="{{ Storage::url($item->kk_atau_ktp) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $item->service_status }}</td>
        </tr>



    </table>

    <a href="{{ route('service.index')}}" class="btn btn-primary">
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