
@extends('layouts.default')

@section('login')

<section id="registerNew">


<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #03877e; border-color: #03877e; box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1); !important">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input
                          type="text"
                          class="form-control @error('name') is-invalid @enderror"
                          name="name" 
                          value="{{ old('name') }}"
                          id="exampleInputName"
                          aria-describedby="nameHelp"
                          required
                          autocomplete="name" 
                          autofocus
                        />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                          type="email"
                          class="form-control @error('email') is-invalid @enderror"
                          name="email" 
                          value="{{ old('email') }}"
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
                                {{ __('Register') }}
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

