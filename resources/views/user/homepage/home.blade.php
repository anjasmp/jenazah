@extends('user.default')

@include('user.partials.header')

@section('content')


@include('user.homepage.intro')

<hr style="width: 40%; margin-bottom: -100px; margin-top: -50px;"/>

@include('user.homepage.pelayananjenazah')


<hr style="width: 40%; margin-top: 100px; margin-bottom: 100px"/>

@include('user.homepage.acarainfo')

<hr style="width: 40%;"/>

@include('user.homepage.contact')


<!-- ======= Footer ======= -->
@include('user.partials.footer')


@endsection

@push('scripts')
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