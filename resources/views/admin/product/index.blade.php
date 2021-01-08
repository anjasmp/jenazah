@extends('admin.templates.default')

@section('sub-judul','Paket Pilihan')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif
        <a href="{{ route('product.create')}}" class="btn btn-primary" style="float: right;"> <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Paket</a>
        <div class="table-responsive">
        <table class="table table-striped" id="tablepost">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Fitur</th>
                    <th>About</th>
                    <th>Tipe</th>
                    <th>Pendaftaran (Rp)</th>
                    <th>Harga (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ substr($item->title, 0, 10) }}</td>
                    <td>{!! substr($item->features, 0, 20) !!}</td>
                    <td>{!! substr($item->about, 0, 20) !!}</td>
                    <td>{{ $item->type }}</td>
                    <td><div class="myDIV">{{ $item->register }}</div></td>
                    <td><div class="myDIV">{{ $item->price }}</div></td>
                    
                    <td>
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info">
                        <i class="fa fa-pencil-alt"></i></a>

                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="d-inline">
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