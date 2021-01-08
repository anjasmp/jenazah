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
                    src="{{ asset('user/assets/img/logo-warna.png')}}" style="margin-bottom: 20px"
                    alt=""
                  /></a>
                </div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                          type="email"
                          class="form-control @error('email') is-invalid @enderror"
                          name="email" 
                          value="{{ $email ?? old('email') }}"
                          id="exampleInputEmail1"
                          aria-describedby="emailHelp"
                          required 
                          autocomplete="email" 
                          autofocus
                        />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                          type="password"
                          class="form-control @error('password') is-invalid @enderror" 
                          name="password" 
                          required 
                          autocomplete="current-password"
                          id="exampleInputPassword1"
                        />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input
                          type="password"
                          class="form-control @error('password') is-invalid @enderror" 
                          name="password_confirmation" 
                          required 
                          autocomplete="new-password"
                          id="exampleInputPassword1"
                        />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                    <div class="form-group row mb-0" style="margin-top: 30px">
                        <div class="col">
                            <button type="submit" class="btn btn-login btn-block" style="background-color: #03877e; border-color: #03877e; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1); !important">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

</section>
@endsection

