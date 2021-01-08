

@extends('admin.templates.default')

@section('sub-judul','Penerimaan Lazhaq')
@section('content')


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        <form action="{{ route('users.set_role', $user->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>:</td>
                            <td>
                                @foreach ($roles as $row)
                                <input type="radio" name="role" 
                                    {{ $user->hasRole($row) ? 'checked':'' }}
                                    value="{{ $row }}"> {{  $row }} <br>
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
            <button type="submit" class="btn btn-primary btn float-right">
                        Set Role
            </button>

        </form>



    </div>
</div>

@endsection