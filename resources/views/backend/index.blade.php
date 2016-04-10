@extends('backend.common')

@section('admin_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/layout.dashboard') !!}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
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
                        <a href="/admin/category">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{!! $statistic['lesson'] !!}</div>
                                    <div>{!! trans('backend/layout.lesson') !!}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/lesson">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
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
                        <a href="/admin/word">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{!! $statistic['user'] !!}</div>
                                    <div>{!! trans('backend/layout.user') !!}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/user">
                            <div class="panel-footer">
                                <span class="pull-left">{!! trans('backend/layout.detail') !!}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
@endsection