@extends('frontend.common')
@section('client_content')
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
                                    <th>{!! trans('backend/lesson/index.table.total_word') !!}</th>
                                    <th>{!! trans('frontend/layout.child.lesson.button') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lessons as $lesson)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $lesson['id'] !!} </td>
                                        <td class="center"> {!! $lesson['category']['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $lesson['category']['image'], null, ['style' => 'height:50px; width:40px;', 'class' => 'avatar'] ) !!}
                                        </td>
                                        <td class="center"> {!! $lesson['locale']['title'] !!} </td>
                                        <td class="center"> {!! $lesson['count_words'] !!} </td>
                                        <td class="center">

                                            {!! Form::open(array('url' => 'client/start/lesson/' . $lesson['id'], 'method' => 'POST')) !!}
                                                {!! Form::hidden('user_id', $currentUser['id'], array('class' => 'form-control')) !!}
                                                {!! Form::hidden('lesson_id', $lesson['id'], array('class' => 'form-control')) !!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('backend/layout.question_delete') !!}');">
                                                    {!! trans('frontend/layout.child.lesson.button') !!}
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