@extends('admin.templates.default')

@section('sub-judul','Edit Daftar Anggota')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
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

    <form action="{{ route('daftar-anggota.update', $item->id )}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="userfamily_status">Status</label>
            <select name="userfamily_status" required class="form-control">
            <option value="{{ $item->userfamily_status }}">
                Jangan ubah ({{ $item->userfamily_status }})
            </option>
            <option value="PENDING">PENDING</option>
            <option value="NON ACTIVE">NON ACTIVE</option>
            <option value="ACTIVE">ACTIVE</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>


    </div>
</div>


@endsection
