@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          @if($user->can('Edit Users'))
            <li class="treeview">
              <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                @if($user->can('Edit Permissions'))
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
                  <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
                @endif
              </ul>
            </li>
          @endif

          @if($user->can('Edit Homepage'))
            @if($user->hasrole('Dev'))
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/homepage') }}"><i class="fa fa-home"></i> <span>Home Page</span></a></li>
            @else
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/homepage/1/edit') }}"><i class="fa fa-home"></i> <span>Home Page</span></a></li>
            @endif
          @endif

          <li class="treeview">
            <a href="#"><i class="fa fa-envelope"></i> <span>Contact</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              @if($user->can('View Form Submissions'))
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/contactsubmissions') }}"><i class="fa fa-reply"></i> <span>Contact Submissions</span></a></li>
              @endif
              @if($user->can('Edit Contact Form'))
                  @if($user->hasrole('Dev'))
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/contactform') }}"><i class="fa fa-envelope"></i> <span>Contact Form</span></a></li>
                  @else
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/contactform/1/edit') }}"><i class="fa fa-envelope"></i> <span>Contact Form</span></a></li>
                  @endif
              @endif
            </ul>
          </li>

          @role('Dev')
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
          @endrole

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
