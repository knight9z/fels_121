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
                                    <div class="huge">26</div>
                                    <div>Category</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
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
                                    <div class="huge">124</div>
                                    <div>Word</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
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

            <div class="row">
                <div class="col-md-4">
                    <li>
                        <img alt="Admin" class="gravatar" src="https://secure.gravatar.com/avatar/75d23af433e0cea4c0e45a56dba18b30?s=80">
                        <a href="/users/1">Admin</a>
                    </li>

                </div>
                <div class="col-md-7">
                    Unfollowed
                    User-3
                    -(03/18/2016)
                </div>
            </div>

            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <li>
                        <img alt="Admin" class="gravatar" src="https://secure.gravatar.com/avatar/75d23af433e0cea4c0e45a56dba18b30?s=80">
                        <a href="/users/1">Admin</a>
                    </li>

                </div>
                <div class="col-md-7">
                    Unfollowed
                    User-3
                    -(03/18/2016)
                </div>
            </div>
        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection