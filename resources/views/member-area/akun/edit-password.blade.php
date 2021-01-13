@extends('member-area.templates.default')

@section('judul','Edit Password')
@section('content')


<div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px;">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif


    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success')}}
        </div>
        @endif

    

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('update-password.update',[$users->id,$users->slug]) }}" method="post">
            @csrf
            @method('PATCH')
 
                    
                       <div class="form-group">
                           <input type="password" id="first-name" class="form-control"  placeholder="Enter old password" name="oldpassword"> 
                       </div>
 
                       <div class="form-group">
                           <input type="password" id="first-name" placeholder="Enter new password" class="form-control" name="newpassword"> 
                       </div>
 
                       <div class="form-group">
                           <input type="password" id="first-name"  class="form-control"placeholder="Enter password confirmation"  name="password_confirmation"> 
                       </div>
 
                       <button type="submit" class="btn btn-primary">Update</button>
                      
                     </form>    

</div>


@endsection