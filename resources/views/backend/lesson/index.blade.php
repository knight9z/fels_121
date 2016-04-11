@extends('backend.common')
@section('admin_content')

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/lesson.title_header') !!}</h1>
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
                                    <th>{!! trans('backend/lesson.field.id') !!}</th>
                                    <th>{!! trans('backend/lesson.field.category') !!}</th>
                                    <th>{!! trans('backend/lesson.field.image') !!}</th>
                                    <th>{!! trans('backend/lesson.field.title') !!}</th>
                                    <th>{!! trans('backend/lesson.field.list_word') !!}</th>
                                    <th>{!! trans('backend/lesson.field.total_word') !!}</th>
                                    <th>{!! trans('backend/lesson.field.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($lessons as $lesson)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $lesson['id'] !!} </td>
                                        <td class="center"> {!! $lesson['category']['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $lesson['category']['image'], null, ['class' => 'avatar']) !!}
                                        </td>
                                        <td class="center"> {!! $lesson['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!!
                                                link_to('/admin/lesson/' . $lesson['id'] . '/detail',
                                                trans('backend/lesson/index.button_list_word'),
                                                ['class' => 'btn btn-danger btn-xs'])
                                            !!}
                                        </td>
                                        <td class="center"> {!! $lesson['count_words'] !!} </td>
                                        <td class="center">
                                            {!!
                                                link_to('admin/lesson/' . $lesson['id'] . '/detail/create/',
                                                trans('backend/lesson/index.button_add_word'),
                                                ['class' => 'btn btn-success btn-xs'])
                                            !!}
                                            {!!
                                                link_to('admin/lesson/' . $lesson['id'] . '/edit',
                                                trans('backend/lesson/index.button_edit'),
                                                ['class' => 'btn btn-primary btn-xs'])
                                            !!}

                                            {!! Form::open(['url' => 'admin/lesson/' . $lesson['id'], 'method' => 'DELETE']) !!}
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
                    {!! $lessons->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection