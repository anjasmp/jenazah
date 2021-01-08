<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <span class="hide-menu">Pelayanan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('pelayanan.home')}}"
                        aria-expanded="false">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span class="hide-menu">Pengaduan Musibah</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('pelayanan.index')}}"
                    aria-expanded="false">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <span class="hide-menu">Riwayat Pengaduan</span>
                     </a>
                </li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Pembayaran</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('langganan.index')}}"
                        aria-expanded="false">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span class="hide-menu">Langganan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('info-tagihan.index')}}"
                    aria-expanded="false">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <span class="hide-menu">Informasi</span>
                     </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route ('transaksi.index')}}"
                    aria-expanded="false">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span class="hide-menu">Transaksi</span>
                     </a>
                </li>



                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Paket keanggotaan</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route ('anggota.index')}}"
                    aria-expanded="false">
                    <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Daftar Anggota</span>
                    </a>
                </li>

                

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Akun Saya</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ route('profilmember.index')}}"
                    aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Profil</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="/admin"
                    aria-expanded="false">
                    <i data-feather="settings" class="feather-icon"></i>
                    <span class="hide-menu">Data Pribadi</span>
                     </a>
                </li> --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>