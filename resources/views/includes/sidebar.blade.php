<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="{{asset('material/img/sidebar-1.jpg')}}">
            <div class="logo">
                <a href="/home" class="simple-text">
                    <img width="10%" src="{{asset('material/img/kaltara.png')}}"/>  e-Pak Kaltara
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="/home" class="simple-text">
                    e pak
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{asset('material/img/faces/avatar.jpg')}}" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            Tania Andrew
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
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
                        <a href="dashboard.html">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p>Pages
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="pages/pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a href="pages/timeline.html">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="">
                        <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">power_settings_new</i>
                            <p>Logout</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>