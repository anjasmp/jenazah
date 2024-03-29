@extends('admin.templates.default')

@section('sub-judul','Edit Transaction')
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

    <form action="{{ route('transaction.update', $item->id )}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="transaction_status">Status</label>
            <select name="transaction_status" required class="form-control">
            <option value="{{ $item->transaction_status }}">
                Jangan ubah ({{ $item->transaction_status }})
            </option>
            <option value="IN_CART">In Cart</option>
            <option value="PENDING">Pending</option>
            <option value="SUCCESS">Success</option>
            <option value="CANCEL">Cancel</option>
            <option value="FINISHED">Finished</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>


    </div>
</div>


@endsection
