<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    
    {{-- <ul class="navbar-nav navbar-right">
        
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form action="/logout" method="post" id="logout">
                       @csrf
                       <a href="#" class="dropdown-item has-icon text-danger" onclick="logout()">
                           <i class="fas fa-sign-out-alt"></i> Logout
                       </a>
                   </form>
                   
                </div>
            </li>
    </ul> --}}

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="/stisla/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div></a><div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Last Log in <b>{{ date("h:i a") }}</b></div>
                <a href="/admin/setting/{{ auth()->user()->id_user }}/edit" class="dropdown-item {{ ($title == "setting") ? 'active' : '' }} has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
               
            
                <div class="dropdown-divider"></div>
              
                <form action="/logout" method="post" id="logout">
                    @csrf
                    <a href="#" class="dropdown-item has-icon text-danger" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>