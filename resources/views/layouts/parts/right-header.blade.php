
<ul class="nav navbar-nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

    <!-- END NOTIFICATION DROPDOWN -->
    <!-- BEGIN INBOX DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

    <!-- END INBOX DROPDOWN -->
    <!-- BEGIN TODO DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

    <!-- END TODO DROPDOWN -->
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

    {{--<li>
        <a href="javascript:;" style="color:#cecece">
            <spam data-countime-format="short" class="countime" data-countdown="{{ config('session.lifetime')*60  }}">08h:30:00</spam>
        </a>
    </li>--}}

    <li class="dropdown dropdown-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <!--<img alt="" class="img-circle" src="http://intranet.igp.gob.pe/gestion-rrhh/public/assets/personal/96.jpg" />-->
            <span class="username username-hide-on-mobile">{{ Auth::user()->name }}</span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu ">
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="icon-key"></i> Salir
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
    <!--
    <li class="dropdown dropdown-quick-sidebar-toggler">
        <a href="javascript:;" class="dropdown-toggle">
            <i class="icon-logout"></i>
        </a>
    </li>
    -->
    <!-- END QUICK SIDEBAR TOGGLER -->
</ul>
                    