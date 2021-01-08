@extends('admin.templates.default')

@section('sub-judul','Penerimaan Lazhaq')
@section('content')

<div class="content-wrapper">
​
    <section class="content">
        <div class="container-fluid">
            
        </div>
    </section>
</div>


<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

        <div class="row">
                <div class="col-md-4">
                        @slot('title')
                        <h4 class="card-title">Add New Permission</h4>
                        @endslot
​
                        <form action="{{ route('users.add_permission') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    Add New
                                </button>
                            </div>
                        </form>
                        @slot('footer')
​
                        @endslot
                </div>
​
                <div class="col">
                        
                        <form action="{{ route('users.roles_permission') }}" method="GET">
                            <div class="form-group">
                                <label for="">Roles</label>
                                <div class="input-group">
                                    <select name="role" class="form-control">
                                        @foreach ($roles as $value)
                                            <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger">Check!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        
                        {{-- jika $permission tidak bernilai kosong --}}
                        @if (!empty($permissions))
                            <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab">Permissions</a>
                                            </li>
                                        </ul>

                                        <div class="row">
                                            <div class="col-sm">
                                              <div class="card">
                                                <div class="card-body">
    
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                @php $no = 1; @endphp
                                                @foreach ($permissions as $key => $row)
                                                    <input type="checkbox" 
                                                        name="permission[]" 
                                                        class="minimal-red" 
                                                        value="{{ $row }}"
                                                        {{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}}
                                                        {{ in_array($row, $hasPermission) ? 'checked':'' }}
                                                        > {{ $row }} <br>
                                                    @if ($no++%4 == 0)
                                                    <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="pull-right">
                                            <button class="btn btn-primary btn">
                                                <i class="fa fa-send"></i> Set Permission
                                            </button>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                </div>
            </div>



    </div>
</div>

@endsection