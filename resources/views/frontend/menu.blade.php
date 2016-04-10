@include('layouts.custom_css')
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">{!! trans('layout.title') !!}</a>
    </div>
    <!-- /.navbar-header -->

    <!-- Top_menu -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!--li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li-->
                <li>
                    {!! link_to('client/member/' . $currentUser->id . '/edit', trans('frontend/layout.menu.setting')) !!}
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{!! url('session/destroy') !!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /Top_menu -->

    <!-- Top_menu -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    {!! link_to('client/member', trans('frontend/layout.menu.all_user')) !!}
                </li>

                <li>
                    {!! link_to('client/dashboard', trans('frontend/layout.menu.home')) !!}
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>

    <!-- Language_menu -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="{!! trans('layout.menu.language') !!}">
                <i class="fa fa-language"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @foreach ($languages as $language)
                    <li>
                        <a href="/change-lang/{!! $language['iso_code'] !!}">
                            @if ($language['is_current_lang'])
                                <i class="fa fa-check"></i>
                            @endif
                            {!! trans('layout.menu.lang.' . $language['iso_code']) !!}
                        </a>
                    </li>
                @endforeach
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /Language_menu -->

    @include('frontend.user')

</nav>