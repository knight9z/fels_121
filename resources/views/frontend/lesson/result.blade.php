@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Lesson Result 1/2</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.errors')
                    @include('layouts.success')
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="dataTable_wrapper">
                            <table class="table table-striped  table-hover" >
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Word</th>
                                    <th>Answer</th>
                                    <th>Correct</th>
                                    <th>Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX danger">
                                        <td class="center"> 1</td>
                                        <td class="center"> Hello </td>
                                        <td class="center">
                                           Chào
                                        </td>
                                        <td class="center"> Tạm biệt </td>
                                        <td class="center">
                                            {!! link_to('#', 'TRUE', ['class' => 'btn btn-success btn-xs', 'title' => 'Start Lesson']) !!}
                                            {!! link_to('#', 'FALSE', ['class' => 'btn btn-danger btn-xs', 'title' => 'Start Lesson']) !!}
                                        </td>
                                    </tr>

                                    <tr class="odd gradeX success">
                                        <td class="center"> 1</td>
                                        <td class="center"> Hello </td>
                                        <td class="center">
                                            Chào
                                        </td>
                                        <td class="center"> Tạm biệt </td>
                                        <td class="center">
                                            {!! link_to('#', 'TRUE', ['class' => 'btn btn-success btn-xs', 'title' => 'Start Lesson']) !!}
                                            {!! link_to('#', 'FALSE', ['class' => 'btn btn-danger btn-xs', 'title' => 'Start Lesson']) !!}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->
                </div>

                <!-- pagination -->
                <div class="row pull-right page-padding">
                    {!! $lessons->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection