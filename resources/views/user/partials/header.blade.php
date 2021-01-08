<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an text logo -->
            {{-- <h3 style="color: white !important; margin-top: 7px">Unit Pelayanan Jenazah</h3> --}}
            <a href="/"><img src="{{ asset ('user/assets/img/upj-white.png')}}" alt="" class="img-fluid"></a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="/">Home</a></li>
                <li class="drop-down"><a href="#">Profile</a>
                    <ul>
                        <li><a href="{{ route('profil.sejarah') }}">Sejarah</a></li>
                        <li class="drop-down"><a href="#">Manajemen</a>
                            <ul>
                                <li><a href="{{ route('profil.struktur') }}">Struktur</a></li>
                                <li><a href="{{ route('profil.proker') }}">Program Kerja</a></li>
                                <li><a href="{{ route('profil.struktur_opera') }}">Struktur Operasional</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class=""><a href="{{ route('post.list') }}">Blog</a>
                    <ul>
                        {{-- @foreach($category_widget as $result1)
                        <li><a href="{{ route('post.category', $result1->slug )}}">{{ $result1->name }}</a></li>
                        @endforeach --}}
                    </ul>
                </li>
              

                <li><a href="#pricing" class="btn-get-started scrollto">Pilihan Paket</a></li>
                
                @guest

                <li class="drop-down"><a href="#"><i class="fa fa-user-circle-o fa-lg" style="color: rgb(255, 255, 255) !important" aria-hidden="true"></i></a>
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user"
                                    aria-hidden="true"></i>&nbsp;{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus"
                            aria-hidden="true"></i>&nbsp;{{ __('Register') }}</a>
                        </li>
                        @endif
                    </ul>
                </li>


                @else
                
                <li><a href="{{ route('pelayanan.home') }}" class="btn btn-primary" style="border-radius: 50px; margin-top: 5px; ">Member Area</a></li>
              
                <li class="drop-down"><a href="#"><img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="user"
                    class="rounded-circle" width="30"></a>
                    <ul>
                        @role('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index')}}"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a>
                        </li>
                        @endrole

                        <li class="nav-item">
                            <a class="dropdown-item" style="color:  #03877e; border-style: none;"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           <i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        </li>
                    
                    </ul>
                </li>

                @endguest

            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->