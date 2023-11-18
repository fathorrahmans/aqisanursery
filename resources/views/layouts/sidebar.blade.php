<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('admin/images/avatar-4.jpg') }}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="ti-layout-sidebar-left"></i>Logout</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">Menu Utama</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Nav::isRoute('adminBeranda') }}">
                <a href="{{ route('adminBeranda') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Nav::isRoute('dataMonitoring') }}">
                <a href="{{ route('dataMonitoring') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Data Monitoring </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>


    </div>
</nav>
