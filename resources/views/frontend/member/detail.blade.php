@extends('frontend.common')

@section('client_content')
    <div id="wrapper">
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Detail</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <section class="user_info">
                        <a href="#">
                            {!! Html::image(config('constants.path_image') . '/' . $user['avatar'], null, ['class' => 'gravatar'] ) !!}
                        </a>
                        <h3>{!! $user['name'] !!}</h3>

                        <span><a href="#">{!! trans('frontend/layout.user.profile') !!}</a></span>

                    </section>
                    <section class="stats">
                        <div class="stats">
                            <a href="#" class="btn btn-success btn-xs">
                                <strong id="following" class="stat">0</strong>
                                {!! trans('frontend/layout.user.following') !!}
                            </a>
                            <a href="#" class="btn btn-primary btn-xs">
                                <strong id="followers" class="stat">2</strong>
                                {!! trans('frontend/layout.user.follower') !!}
                            </a>
                        </div>
                    </section>
                </div>
                <div class="col-md-7">
                    {!! Form::open(['url' => '#', 'method' => 'POST']) !!}
                        <button type="button" class="btn btn-primary btn-lg btn-block">{!! trans('frontend/member.detail.follow') !!}</button>
                    {!! Form::close() !!}

                    {!! Form::open(['url' => '#', 'method' => 'DELETE']) !!}
                        <button type="button" disabled class="btn btn-danger btn-lg btn-block">{!! trans('frontend/member.detail.unfollow') !!}</button>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>

        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection