<div class="web-header">
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-5">
                <div class="navbar">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">
                                Нүүр
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('about') }}">
                                Бидний тухай
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('team') }}">
                                Team
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('book') }}">
                                Game Centers
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{asset("uploads/logo.png")}}" alt="" width="100%">
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="navbar">
                    <ul>
                        
                        <li>
                            <a href="{{route('my_order')}}">
                                Захиалга
                            </a>
                        </li>
                        <li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Бүртгүүлэх') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        @if(Auth::user()->role_as == 1)
                                            <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                                <i class="fa fa-home"></i>admin dashboard
                                            </a>
                                        @endif

                                            @if (Auth::user())
                                                <a class="dropdown-item" href="#">
                                                    хэтэвч: {{ Auth::user()->point }} төг
                                                </a>
                                            @endif


                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> {{ __('гарах') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                    </ul>
                </div>
            </div>
            {{-- <div class="col"></div> --}}
        </div>
    </div>
</div>
