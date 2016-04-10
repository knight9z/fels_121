@extends('frontend.common')

@section('client_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- category -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{!! $statistic['category'] !!}</div>
                                    <div>{!! trans('backend/layout.category') !!}</div>
                                </div>
                            </div>
                        </div>
                        <a href="category">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /category -->

                <!-- word list -->
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{!! $statistic['word'] !!}</div>
                                    <div>{!! trans('backend/layout.word') !!}</div>
                                </div>
                            </div>
                        </div>
                        <a href="   word">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /word list -->

            </div>
        </div>
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Activity</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @foreach ($activities as $activity)
            <div class="row">
                <div class="col-md-4">
                    <li>
                        {!! Html::image(config('constants.path_image') . '/' . $activity->user['avatar'], null, ['style' => 'height:80px; width:80px;', 'class' => 'gravatar'] ) !!}
                        <h3>{!! $activity->user['name'] !!}</h3>
                    </li>
                </div>
                <div class="col-md-7">
                    Complete Lesson {!! $activity->user_lesson->lesson->locale['title'] !!}
                </div>
            </div>

            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
            @endforeach
        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection