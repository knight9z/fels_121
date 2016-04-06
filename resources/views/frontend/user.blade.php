
<!-- Left_menu -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <section class="user_info">
            <a href="/users/1">
                {!! Html::image(config('constants.path_image') . '/' . $currentUser['avatar'], null, ['style' => 'height:80px; width:80px;', 'class' => 'gravatar'] ) !!}
            </a>
            <h3>{!! $currentUser['name'] !!}</h3>

            <span><a href="#">{!! trans('frontend/layout.user.profile') !!}</a></span>

        </section>
        <section class="stats">
            <div class="stats">
                <a href="#" class="btn btn-success btn-xs">
                    <strong id="following" class="stat">{!! count($currentUser['following']) !!}</strong>
                    {!! trans('frontend/layout.user.following') !!}
                </a>
                <a href="#" class="btn btn-primary btn-xs">
                    <strong id="followers" class="stat">{!! count($currentUser['follower']) !!}</strong>
                    {!! trans('frontend/layout.user.follower') !!}
                </a>
            </div>

        </section>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /Left_menu -->
