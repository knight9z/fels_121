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
            @include('layouts.errors')
            @include('layouts.success')
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
                                <strong id="following" class="stat">{!! count($user->following) !!}</strong>
                                {!! trans('frontend/layout.user.following') !!}
                            </a>
                            <a href="#" class="btn btn-primary btn-xs">
                                <strong id="followers" class="stat">{!! count($user->follower) !!}</strong>
                                {!! trans('frontend/layout.user.follower') !!}
                            </a>
                        </div>
                    </section>
                </div>
                <div class="col-md-7">
                    @if (!$currentUser->relationship_id)
                    {!! Form::open(array('url' => 'client/relationship', 'method' => 'POST')) !!}
                        {!! Form::hidden('follower_id', $currentUser->id, array('class' => 'form-control')) !!}
                        {!! Form::hidden('following_id', $user['id'], array('class' => 'form-control')) !!}
                        {!! Form::submit(trans('frontend/member.detail.follow'), ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    {!! Form::close() !!}
                    @else
                        {!! Form::open(array('url' => 'client/relationship/'. $currentUser->relationship_id , 'method' => 'DELETE')) !!}
                            {!! Form::hidden('follower_id', $currentUser->id, array('class' => 'form-control')) !!}
                            {!! Form::hidden('following_id', $user['id'], array('class' => 'form-control')) !!}
                            {!! Form::submit(trans('frontend/member.detail.unfollow'), ['class' => 'btn btn-danger btn-lg btn-block']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>


            @if (isset($user->following) && count($user->following))
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Following Me</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                @foreach ($user->following as $following)
                    <div class="col-md-5">
                        <section class="user_info">
                            <a href="#">
                                {!! Html::image(config('constants.path_image') . '/' . $following->follower_users['avatar'], null, ['class' => 'gravatar'] ) !!}
                            </a>
                            <h3>{!! $following->follower_users['name'] !!}</h3>
                            <span><a href="#">{!! trans('frontend/layout.user.profile') !!}</a></span>
                        </section>
                        <section class="stats">
                            <div class="stats">
                                <a href="#" class="btn btn-success btn-xs">
                                    <strong id="following" class="stat">{!! count($following->follower_users->following) !!}</strong>
                                    {!! trans('frontend/layout.user.following') !!}
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">
                                    <strong id="followers" class="stat">{!! count($following->follower_users->follower) !!}</strong>
                                    {!! trans('frontend/layout.user.follower') !!}
                                </a>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                @endforeach
            @endif

            @if (isset($user->follower) && count($user->follower))
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Follower</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                @foreach ($user->follower as $follower)
                    <div class="col-md-5">
                        <section class="user_info">
                            <a href="#">
                                {!! Html::image(config('constants.path_image') . '/' . $follower->following_users['avatar'], null, ['class' => 'gravatar'] ) !!}
                            </a>
                            <h3>{!! $follower->following_users['name'] !!}</h3>
                            <span><a href="#">{!! trans('frontend/layout.user.profile') !!}</a></span>

                        </section>
                        <section class="stats">
                            <div class="stats">
                                <a href="#" class="btn btn-success btn-xs">
                                    <strong id="following" class="stat">{!! count($follower->following_users->following) !!}</strong>
                                    {!! trans('frontend/layout.user.following') !!}
                                </a>
                                <a href="#" class="btn btn-primary btn-xs">
                                    <strong id="followers" class="stat">{!! count($follower->following_users->follower) !!}</strong>
                                    {!! trans('frontend/layout.user.follower') !!}
                                </a>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection