@extends('user.default')

@include('user.partials.header')

@include('user.profil.intro-struktur-opera')

@section('content')



<section id="popularContent">
<div class="container" style=" margin-bottom: 50px;" >
  <div class="card-body" style="box-shadow: 0 10px 29px 0 rgba(68, 88, 144, 0.1); padding-bottom: 70px; ">
    <div class="box2">
    <img src="{{ asset('user/assets/img/struktur-opera.png')}}" alt="" style="width: 100%">
    </div>
  </div>
</div>
</section>

@include('user.partials.footer')

@endsection

