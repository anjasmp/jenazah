@extends('layouts.default')

@section('login')

<section id="registerNew">

<main class="login-container">
      <div class="container">
        <div class="row page-login d-flex align-items-center">
          <div class="section-left col-12 col-md-6">
            {{-- <img src="{{ asset('user/assets/img/masjid-login.jpg')}}" alt="" style="max-width: 400px; border-radius: 10px; box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);"> --}}
            
          </div>
          <div class="section-right col-12 col-md-4">
            <div class="card">
              <div class="card-body">
                
                <div class="text-center">
                    <a href="/">
                  <img
                    src="{{ asset('user/assets/img/upj-1.png')}}" style="margin-bottom: 20px"
                    alt=""
                  /></a>
                </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
	                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

</section>
@endsection
