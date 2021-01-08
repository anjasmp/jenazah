@extends('user.default')

@include('user.partials.header')

@include('user.profil.introstruktur')

@section('content')



<section id="popularContent">
<section id="lazhaq" class="section-bg-lazhaq">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center">
        
        <div class="col" data-aos="zoom-in" data-aos-delay="100">
          <div class="box2">
          <img src="{{ url('user/assets/img/struktur.png')}}" alt="" style="width: 100%">
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
@include('user.partials.footer')

@endsection