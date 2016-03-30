@extends('backend.common')
@section('admin_content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/category.title_header') !!}</h1>
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
                                    <th>{!! trans('backend/category.field.id') !!}</th>
                                    <th>{!! trans('backend/category.field.image') !!}</th>
                                    <th>{!! trans('backend/category.field.title') !!}</th>
                                    <th>{!! trans('backend/category.field.summary') !!}</th>
                                    <th>{!! trans('backend/category.field.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $category['id'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $category['image'], null, ['style' => 'height:50px; width:40px;'] ) !!}
                                        </td>
                                        <td class="center"> {!! $category['locale']['title'] !!} </td>
                                        <td class="center"> {!! $category['locale']['summary'] !!} </td>
                                        <td class="center">
                                            {!! link_to('./admin/category/' . $category['id'] . '/edit', trans('backend/category.index.button_edit'), ['class' => 'btn btn-primary btn-xs']) !!}

                                            {!! Form::open(array('url' => 'admin/category/' . $category['id'], 'method' => 'DELETE')) !!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('backend/layout.question_delete') !!}');">
                                                        <i title="Delete" class="fa fa-trash-o"></i>
                                                </button>
                                            {!! Form::close() !!}
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