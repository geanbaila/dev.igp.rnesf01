<!-- BEGIN HEADER INNER -->
<div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        <a href="{{url("/")}}">
{{--            <img src="{{ url(config('institution.mini_logo')) }}" class="logo-default" alt="">--}}
            IGP
        </a>
        <div class="menu-toggler sidebar-toggler font-white">
            <span></span>
        </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span></span>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->

    <div class="nav-social-container">
        <ul class="nav-social">
            <li class="hidden-xs">
                <a style="width: auto;" class="iamnot">Síguenos en: </a>
            </li>
            <li>
                <a target="_blank" href="https://www.facebook.com/igp.peru"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://twitter.com/igp_peru"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.linkedin.com/company/igpperu/"><i class="fa fa-linkedin"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.instagram.com/igp.peru"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.youtube.com/igp_videos"><i class="fa fa-youtube"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.flickr.com/people/156092703@N08/"><i class="fa fa-flickr"></i></a>
            </li>
        </ul>
    </div>

    <!-- BEGIN TOP NAVIGATION MENU -->
    @if(Auth::check())
        <div class="top-menu">
            @include('layouts.parts.right-header')
        </div>
@endif
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->