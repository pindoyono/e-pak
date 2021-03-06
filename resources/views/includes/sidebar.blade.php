<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('material/img/hutan_malinau.jpg')}}">
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text">
            <img width="10%" src="{{asset('material/img/kaltara.png')}}"/>  e-PAKGURU
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="{{route('home')}}" class="simple-text">
            E-PAKGURU
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
            @if(Auth::user()->avatar == 'avatars/saat-ini-tidak-ada-file.jpg')
                <img src="{{asset('material/img/saat-ini-tidak-ada-file.jpg')}}" alt="...">
            @else 
                <img src="{{asset('storage/'.Auth::user()->avatar)}}" width="10px"/> 
            @endif
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{Auth::user()->name}}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('users.profile', Crypt::encrypt(Auth::user()->id)) }}">Profile</a>
                        </li>
                        <li>
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ Request::segment(1) === 'home' || Request::is('/')  ? 'active' : null }}">
                <a href="{{route('home')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::segment(1) === 'create_biodata'  ? 'active' : null }}">
                <a href="{{route('biodatas.create_biodata', Crypt::encrypt(Auth::user()->id)   )}}">
                    <i class="fas fa-id-card"></i>
                    <p>Biodata</p>
                </a>
            </li>
            @role('super admin')
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <!-- <i class="material-icons">miscellaneous_services</i> -->
                    <i class="fas fa-cogs"></i>
                    <p>Pengaturan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="{{route('setups.index')}}">
                                <i class="fas fa-cog"></i>
                                <p>Setup</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sekolahs.index')}}">
                                <i class="fas fa-school"></i>
                                <p>Sekolah</p>
                                
                            </a>
                        </li>
                        <li>
                            <a href="{{route('roles.index')}}">
                                
                                <i class="fas fa-user-tag"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}">
                                <i class="fas fa-users"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('jabatans.index')}}">
                                <i class="fas fa-chart-line"></i>
                                <p>Nilai AK</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('mapels.index')}}">
                                <!-- <i class="fas fa-chart-line"></i> -->
                                <i class="material-icons">library_books</i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('lampirans.index')}}">
                                <!-- <i class="fas fa-chart-line"></i> -->
                                <i class="material-icons">library_books</i>
                                <p>Lampiran 2 PKB</p>
                            </a>
                        </li>
                        <li class="{{ Request::segment(1) === 'kegiatans'  ? 'active' : null }}">
                            <a href="{{route('kegiatans.index')}}">
                                <i class="fas fa-layer-group"></i>
                                <p>Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- <li class="">
                <a href="{{route('biodatas.create_biodata', Crypt::encrypt(Auth::user()->id)   )}}">
                    <i class="fas fa-id-card"></i>
                    <p>Biodata</p>
                </a>
            </li> -->
            @endrole
            @role('guru')
            <li class="{{ Request::segment(1) === 'kepegawaians'  ? 'active' : null }}">
                <a href="{{route('kepegawaians.index' )}}">
                    <i class="fas fa-files-o "></i>
                    <p>Berkas Kepegawaian</p>
                </a>
            </li>
            <li class="{{ Request::segment(1) === 'dupaks' || Request::segment(1) === 'bukti' || Request::segment(1) === 'berkas'  ? 'active' : null }}">
                <a href="{{route('dupaks.index' )}}">
                    <i class="fas fa-clipboard-list "></i>
                    <p>Usul Dupak</p>
                </a>
            </li>
            @endrole

            @role('penilai')
            <li class="{{ Request::segment(1) === 'dupaks_penilai' || Request::segment(1) === 'berita_acara' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.index' )}}">
                    <i class="fas fa-clipboard-list "></i>
                    <p>Daftar Usulan PAK <span>penilai</span></p>
                </a>
            </li>

            <li class="{{ Request::segment(1) === 'rekap' || Request::segment(1) === 'rekap' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.rekap' )}}">
                    <i class="fas fa-chart-line "></i>
                    <p>Rekap KENPA (III A) <span></span></p>
                </a>
            </li>

            <li class="{{ Request::segment(1) === 'rekap_3b' || Request::segment(1) === 'rekap_3b' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.rekap_3b' )}}">
                    <i class="fas fa-chart-line "></i>
                    <p>Rekap KENPA (Selain III A) <span></span></p>
                </a>
            </li>

            <li class="{{ Request::segment(1) === 'rekap_pak_tahunan' || Request::segment(1) === 'rekap_pak_tahunan' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.rekap_pak_tahunan' )}}">
                    <i class="fas fa-chart-line "></i>
                    <p>Rekap PAK TAHUNAN <span></span></p>
                </a>
            </li>

            @endrole

            @role('admin provinsi')
            <li class="{{ Request::segment(1) === 'dupaks_penilai' || Request::segment(1) === 'berita_acara' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.index' )}}">
                    <i class="fas fa-clipboard-list "></i>
                    <p>DUPAK <span>(Tim Provinsi)</span></p>
                </a>
            </li>

            @endrole

            @role('verifikator')
            <li class="{{ Request::segment(1) === 'dupaks_penilai' || Request::segment(1) === 'berita_acara' || Request::segment(1) === 'verifikasi' ? 'active' : null }}">
                <a href="{{route('dupaks_penilai.index' )}}">
                    <i class="fas fa-clipboard-list "></i>
                    <p>Daftar Usulan PAK <span>verifikator</span></p>
                </a>
            </li>
            @endrole
            
            @role('super admin')
            <li class="{{ Request::segment(1) === 'sarans' ? 'active' : null }}">
                <a href="{{route('sarans.index' )}}">
                    <i class="fas fa-inbox "></i>
                    <p>Saran Dan Masukan Admin</p>
                </a>
            </li>
            @else
            <li class="{{ Request::segment(1) === 'sarans' ? 'active' : null }}">
                <a href="{{route('sarans.create' )}}">
                    <i class="fas fa-inbox "></i>
                    <p>Saran Dan Masukan</p>
                </a>
            </li>
            @endrole
            
            <li class="">
                <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                    <p>Logout</p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
            </li>

        </ul>
    </div>
</div>