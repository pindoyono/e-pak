<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('material/img/sidebar-1.jpg')}}">
            <div class="logo">
                <a href="{{route('home')}}" class="simple-text">
                    <img width="10%" src="{{asset('material/img/kaltara.png')}}"/>  e-Pak Kaltara
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="{{route('home')}}" class="simple-text">
                    e pak
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                    @if(Auth::user()->avatar)
                        <img src="{{asset('storage/'.Auth::user()->avatar)}}" />
                    @else
                        <img src="{{asset('material/img/placeholder.jpg')}}" alt="...">
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
                                    <a href="{{ route('users.profile', Auth::user()->id) }}">Profile</a>
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
                    <li class="active">
                        <a href="{{route('home')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
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
                                    <a href="{{route('kegiatans.index')}}">
                                        <i class="fas fa-layer-group"></i>
                                        <p>Kegiatan</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endrole
                    <li class="">
                        @role('super admin')
                        <a href="{{route('home')}}">
                        @endrole
                        @role('guru')
                        <a href="{{route('biodatas.create_biodata',Auth::user()->id   )}}">
                        @endrole
                            <i class="fas fa-id-card"></i>
                            <p>Biodata</p>
                        </a>
                    </li>
                    
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