@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/category/index.header_title') !!}</h1>
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
                                    <th>{!! trans('backend/category/index.table.id') !!}</th>
                                    <th>{!! trans('backend/category/index.table.image') !!}</th>
                                    <th>{!! trans('backend/category/index.table.title') !!}</th>
                                    <th>{!! trans('backend/category/index.table.summary') !!}</th>
                                    <th>Lesson</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $category['id'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $category['image'], null, ['style' => 'height:50px; width:40px;', 'class' => 'avatar'] ) !!}
                                        </td>
                                        <td class="center"> {!! $category['locale']['title'] !!} </td>
                                        <td class="center"> {!! $category['locale']['summary'] !!} </td>
                                        <td class="center">
                                            {!! link_to('/client/lesson/' . $category['id'], trans('frontend/layout.child.category.view_lesson'), ['class' => 'btn btn-primary btn-xs']) !!}
                                        </td>
                                    </tr>
                                @endforeach
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
                    {!! $categories->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection