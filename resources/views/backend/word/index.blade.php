@extends('backend.common')
@section('admin_content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/word/index.header_title') !!}</h1>
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
                                    <th>{!! trans('backend/word/index.table.id') !!}</th>
                                    <th>{!! trans('backend/word/index.table.category') !!}</th>
                                    <th>{!! trans('backend/word/index.table.image') !!}</th>
                                    <th>{!! trans('backend/word/index.table.content') !!}</th>
                                    <th>{!! trans('backend/word/index.table.content_answer') !!}</th>
                                    <th>{!! trans('backend/word/index.table.note_answer') !!}</th>
                                    <th>{!! trans('backend/word/index.table.count_lesson') !!}</th>
                                    <th>{!! trans('backend/word/index.table.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($words as $word)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $word['id'] !!} </td>
                                        <td class="center"> {!! $word['category']['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $word['category']['image'], null, ['style' => 'height:50px; width:40px;'] ) !!}
                                        </td>
                                        <td class="center"> {!! $word['content'] !!} </td>
                                        <td class="center"> {!! $word['answer']['locale']['content_answer'] !!} </td>
                                        <td class="center"> {!! $word['answer']['locale']['note_answer'] !!} </td>
                                        <td class="center"> {!! $word['count_lesson'] !!} </td>
                                        <td class="center">
                                            {!! link_to('./admin/word/' . $word['id'] . '/edit', trans('backend/word/index.button_edit'), ['class' => 'btn btn-primary btn-xs']) !!}

                                            {!! Form::open(array('url' => 'admin/word/' . $word['id'], 'method' => 'DELETE')) !!}
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
                    {!! $words->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection