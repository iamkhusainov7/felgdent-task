<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('assets/img/user1.png')}}" class="img-circle user-img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p> {{ Auth::user()->firstname }}</p>
                            <a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
                                    Online</span></a>
                        </div>
                    </div>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link nav-toggle"> <i class="material-icons">person</i>
                        <span class="title">Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('group.index')}}" class="nav-link nav-toggle"> <i class="material-icons">business</i>
                        <span class="title">Groups</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->