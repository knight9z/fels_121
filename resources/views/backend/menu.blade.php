<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        {!! link_to_action('AdminsController@index', trans('backend/layout.title_menu'), [], ['class' => 'navbar-brand']) !!}

    </div>
    <!-- /.navbar-header -->

    <!-- Top_menu -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="divider"></li>
                <li><a href="{!! url('session/destroy') !!}"><i class="fa fa-sign-out fa-fw"></i> {!! trans('backend/layout.logout') !!}</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /Top_menu -->

    <!-- Left_menu -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                             {!! link_to('admin/user', 'Lists') !!}
                        </li>
                        <li>
                            {!! link_to('admin/user/create', 'Create') !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw"></i> {!! trans('backend/layout.menu.category') !!} <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.list') ) !!}
                        </li>
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.create') ) !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-tasks fa-fw"></i> {!! trans('backend/layout.menu.lesson') !!} <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.list') ) !!}
                        </li>
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.create') ) !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-comments fa-fw"></i> {!! trans('backend/layout.menu.word') !!}  <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.list') ) !!}
                        </li>
                        <li>
                            {!! link_to('#', trans('backend/layout.menu_action.create') ) !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /Left_menu -->

</nav>