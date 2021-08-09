<div>
    <div class="igp-header">
        <div class="nav-sec">
            <div class="container">
                <ul class="nav-social">
                    <li>
                        <a style="width: auto;" class="iamnot">Síguenos en: </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.facebook.com/igp.peru"><i class="fa fa-facebook  fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://twitter.com/igp_peru"><i class="fa fa-twitter fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.linkedin.com/company/igpperu/"><i class="fa fa-linkedin  fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://www.instagram.com/igp.peru"><i class="fa fa-instagram fab fa-instagram"></i></a>
                    </li>
                </ul>
                <ul class="nav-contact">
                    {{--<li>
                        <a href=""><i class="fas fa-phone">&#160;</i>(511) 3172300</a>
                    </li>--}}
                    <li>
                        <a href="#" class="iamnot" data-tooltip="Hora actual en este equipo" data-position="bottom center">
                            <strong class="current-time">{{ '' }}</strong>
                            <i class="flag pe"></i>
                        </a>
                    </li>
                    @if(auth()->check())
                        <li>
                            <a href="#" class="iamnot" data-tooltip="El usuario registra visitas para esta sede" data-position="bottom center">
                                <strong>
                                    <i class="icon building"></i>{{ auth()->user()->nombre }}
                                </strong>
                            </a>
                        </li>
                        <li>
                            <div class=" menu">
                                <div class="ui dropdown item">
                                    <span style="color:#F1F1F1">
                                        &nbsp; &nbsp;<i class="icon user"></i>&nbsp {{ auth()->user()->nombre }}
                                    </span>
                                    <i class="dropdown icon" style="color:#FFFFFF;"></i>
                                    <div class="menu">
                                        <a class="item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="remove circle icon"></i> Cerrar Sesión</a>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="li-session">
                            <a href="{{ route('login') }}"><i class="fas fa-user">&#160;</i>Iniciar Sesión</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        {{--<nav class="nav-main">
            <div class="container">
                <ul class="nav-left">
                    <li>
                        <a href=""><img src="{{ asset('images/minam-banner-small.png') }}" alt="" class="logo"/></a>
                    </li>
                    <li class="dp-small">
                        <a href="{{ route('home') }}"><img src="{{ url(env('IGP_TINY_LOGO_URI','')) }}" alt="" class="logo logo-igp" /></a>
                    </li>
                    <li class="dp-normal">
                        <a href="{{ route('home') }}"><img src="{{ url(env('IGP_SMALL_LOGO_URI','')) }}" alt="" class="logo logo-igp" /></a>
                    </li>
                </ul>

                --}}{{--@include('layouts.menu')--}}{{--

            </div>
        </nav>--}}

    </div>
</div>