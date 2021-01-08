<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                            

                            <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Pelayanan Jenazah</span></li>
               

                

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-phone" aria-hidden="true"></i><span
                        class="hide-menu">Pengaduan Musibah</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        {{-- @if (auth()->user()->can('index transaction') || auth()->user()->can('edit transaction') || auth()->user()->can('delete transaction') || auth()->user()->can('show transaction')) --}}
                        <li class="sidebar-item"><a href="{{ route('service.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Daftar Pengaduan</span></a>
                        </li>
                        {{-- @endif --}}
                        <li class="sidebar-item"><a href="{{ route('service.show-deletes')}}" class="sidebar-link"><span
                            class="hide-menu"> Tempat Sampah</span></a>
                        </li>
                </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span
                        class="hide-menu">Daftar Anggota</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ route('daftar-anggota.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Daftar Anggota</span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('daftar-anggota.show-deletes')}}" class="sidebar-link"><span
                        class="hide-menu"> Tempat Sampah</span></a>
                        </li>
                    
                </ul>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-credit-card" aria-hidden="true"></i><span
                    class="hide-menu">Transaksi</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                    {{-- @if (auth()->user()->can('index transaction') || auth()->user()->can('edit transaction') || auth()->user()->can('delete transaction') || auth()->user()->can('show transaction')) --}}
                    <li class="sidebar-item"><a href="{{ route('transaction.index')}}" class="sidebar-link"><span
                            class="hide-menu"> Daftar Transaksi</span></a>
                    </li>
                    {{-- @endif --}}
            </ul>
            </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-cubes" aria-hidden="true"></i><span
                        class="hide-menu">Paket Keanggotaan</span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    
                        <li class="sidebar-item"><a href="{{ route('product.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Tambah Paket</span></a>
                        </li>
                   

                   
                        <li class="sidebar-item"><a href="{{ route('product.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Daftar Paket</span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ route('product.show-deletes')}}" class="sidebar-link"><span
                        class="hide-menu"> Tempat Sampah</span></a>
                        </li>
                    
                </ul>
            </li>

            

                
            
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Jumbotron</span></li>
                            {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i class="fa fa-bullhorn" aria-hidden="true"></i><span
                                        class="hide-menu">Announcement</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                                    @if (auth()->user()->can('create announcement'))
                                    <li class="sidebar-item"><a href="{{ route('announcement.create')}}" class="sidebar-link"><span
                                                class="hide-menu"> Create</span></a>
                                    </li>
                                    @endif

                                    @if (auth()->user()->can('index announcement') || auth()->user()->can('edit announcement') || auth()->user()->can('delete announcement') )
                                    <li class="sidebar-item"><a href="{{ route('announcement.index')}}" class="sidebar-link"><span
                                                class="hide-menu"> List</span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="{{ route('announcement.show-deletes')}}" class="sidebar-link"><span
                                        class="hide-menu"> Recycle Bin</span></a>
                                    </li>
                                    @endif
                                </ul>
                            </li> --}}

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                                    class="hide-menu">Carousel</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">

                                {{-- @if (auth()->user()->can('create carousel')) --}}
                                <li class="sidebar-item"><a href="{{ route('carousel.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Create</span></a>
                                </li>
                                {{-- @endif --}}

                                {{-- @if (auth()->user()->can('index carousel') || auth()->user()->can('edit carousel') || auth()->user()->can('delete carousel')) --}}
                                <li class="sidebar-item"><a href="{{ route('carousel.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> List</span></a>
                                </li>
                                {{-- @endif --}}

                            </ul>
                        </li>

                        {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                                class="hide-menu">Prayer Schedule</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">

                            @if (auth()->user()->can('setting prayer schedule'))
                            <li class="sidebar-item"><a href="{{ route('jadwal-sholat.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Settings</span></a>
                            </li>
                            @endif

                        </ul>
                    </li> --}}

                <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Blog</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-paper-plane" aria-hidden="true"></i><span
                            class="hide-menu">Postingan </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">

                            {{-- @if (auth()->user()->can('create post')) --}}
                            <li class="sidebar-item"><a href="{{ route ('post.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Tambah Postingan</span></a>
                            </li>
                            {{-- @endif --}}

                            {{-- @if (auth()->user()->can('index post') || auth()->user()->can('edit post') || auth()->user()->can('delete post')) --}}
                            <li class="sidebar-item"><a href="{{ route ('post.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Postingan</span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{ route ('post.show-deletes')}}" class="sidebar-link"><span
                                    class="hide-menu"> Tempat Sampah</span></a>
                            </li>
                            {{-- @endif --}}
                        </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-th-large" aria-hidden="true"></i><span
                            class="hide-menu">Kategori </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            {{-- @if (auth()->user()->can('create category')) --}}
                            <li class="sidebar-item"><a href="{{ route ('category.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Tambah Kategori</span></a>
                            </li>
                            {{-- @endif --}}

                            {{-- @if (auth()->user()->can('index category') || auth()->user()->can('edit category') || auth()->user()->can('delete category')) --}}
                            <li class="sidebar-item"><a href="{{ route ('category.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Kategori</span></a>
                            </li>
                            {{-- @endif --}}
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-tags" aria-hidden="true"></i><span
                            class="hide-menu">Tag </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        {{-- @if (auth()->user()->can('create tag')) --}}
                            <li class="sidebar-item"><a href="{{ route ('tag.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Tambah Tag</span></a>
                            </li>
                        {{-- @endif --}}

                        {{-- @if (auth()->user()->can('index tag') || auth()->user()->can('edit tag') || auth()->user()->can('delete tag')) --}}
                        <li class="sidebar-item"><a href="{{ route ('tag.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Tag
                                </span></a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </li>

                
        

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Manajemen Pengguna</span></li>
                {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false"><i class="fa fa-user-plus" aria-hidden="true"></i><span
                        class="hide-menu">Peran </span></a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">

                    @if (auth()->user()->can('create role'))
                    <li class="sidebar-item"><a href="{{ route ('roles.create')}}" class="sidebar-link"><span
                                class="hide-menu"> Tambah Peran</span></a>
                    </li>
                    @endif

                    @if (auth()->user()->can('index role') || auth()->user()->can('delete role'))
                    <li class="sidebar-item"><a href="{{ route ('roles.index')}}" class="sidebar-link"><span
                                class="hide-menu"> Daftar Peran
                            </span></a>
                    </li>
                    @endif
                </ul>
            </li> --}}

            {{-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span
                    class="hide-menu">Izin </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                
                @if (auth()->user()->can('permissions'))
                <li class="sidebar-item"><a href="{{ route('users.roles_permission') }}" class="sidebar-link"><span
                            class="hide-menu"> Cek Izin</span></a>
                </li>
                @endif

            </ul>
        </li> --}}

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span
                            class="hide-menu">Pengguna </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">

                        {{-- @if (auth()->user()->can('create users')) --}}
                        <li class="sidebar-item"><a href="{{ route ('user.create')}}" class="sidebar-link"><span
                                    class="hide-menu"> Tambah Pengguna</span></a>
                        </li>
                        {{-- @endif --}}

                        {{-- @if (auth()->user()->can('index users') || auth()->user()->can('edit users') || auth()->user()->can('delete users')) --}}
                        <li class="sidebar-item"><a href="{{ route ('user.index')}}" class="sidebar-link"><span
                                    class="hide-menu"> Daftar Pengguna
                                </span></a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                </li>

                <li class="list-divider"></li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>