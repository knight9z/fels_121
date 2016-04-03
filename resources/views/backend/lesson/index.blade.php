@extends('backend.common')
@section('admin_content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/lesson/index.header_title') !!}</h1>
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
                                    <th>{!! trans('backend/lesson/index.table.id') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.category') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.image') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.title') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.list_word') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.total_word') !!}</th>
                                    <th>{!! trans('backend/lesson/index.table.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lessons as $lesson)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $lesson['id'] !!} </td>
                                        <td class="center"> {!! $lesson['category']['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $lesson['category']['image'], null, ['style' => 'height:50px; width:40px;'] ) !!}
                                        </td>
                                        <td class="center"> {!! $lesson['locale']['title'] !!} </td>
                                        <td class="center">  {!! link_to('./admin/lesson/word/list/' . $lesson['id'], trans('backend/lesson/index.button_list_word'), ['class' => 'btn btn-danger btn-xs', 'title' => 'List word for lesson']) !!}  </td>
                                        <td class="center"> {!! $lesson['count_words'] !!} </td>
                                        <td class="center">
                                            {!! link_to('./admin/lesson/word/add/' . $lesson['id'], trans('backend/lesson/index.button_add_word'), ['class' => 'btn btn-success btn-xs', 'title' => 'Add word for lesson']) !!}
                                            {!! link_to('./admin/lesson/' . $lesson['id'] . '/edit', trans('backend/lesson/index.button_edit'), ['class' => 'btn btn-primary btn-xs']) !!}
                                            <a href="javascript:elearning.confirm_delete('{{ url('./admin/delete/lesson/' . $lesson['id']) }}');" class="btn btn-danger btn-xs"><i title="Delete" class="fa fa-trash-o"></i></a>
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
                    {!! $lessons->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection