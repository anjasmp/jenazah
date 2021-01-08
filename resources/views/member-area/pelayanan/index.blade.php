@extends('member-area.templates.default')

@section('judul','Pelayanan')
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
                    <th>No</th>
                    <th>Nama Alm</th>
                    <th>Bin/Binti</th>
                    <th>Tanggal Wafat</th>
                    <th>Waktu Wafat</th>
                    <th>Tempat Wafat</th>
                    <th>Tempat Pemakaman</th>
                    <th>Scan KTP atau KK</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($item as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->user_families->name}}</td>
                    <td>{{ $item->nama_ayah }}</td>
                    <td>{{ $item->tanggal_wafat }}</td>
                    <td>{{ $item->waktu_wafat }}</td>
                    <td>{{ $item->tempat_wafat }}</td>
                    <td>{{ $item->tempat_pemakaman }}</td>
                    <td><img src="{{ Storage::url($item->kk_atau_ktp) }}" alt="" style="width: 150px" class="img-thumbnail" /></td>

                    @if ($item->service_status == 'ACCEPTED')
                    <td><span class="badge badge-pill badge-primary" >{{ $item->service_status}}</span></td>
                    @else @if ($item->service_status == 'CANCEL')
                    <td><span class="badge badge-pill badge-danger" >{{ $item->service_status}}</span></td>
                    @else
                    <td><span class="badge badge-pill badge-warning" >{{ $item->service_status}}</span></td>
                    @endif
                    @endif
                    

                    
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