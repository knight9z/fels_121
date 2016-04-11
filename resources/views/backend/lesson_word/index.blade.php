@extends('backend.common')
@section('admin_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/lesson_word.header_title') . ' ' . $lesson->locale['title'] !!}</h1>
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
                                    <th>{!! trans('backend/lesson_word.index.id') !!}</th>
                                    <th>{!! trans('backend/lesson_word.index.content') !!}</th>
                                    <th>{!! trans('backend/lesson_word.index.content_answer') !!}</th>
                                    <th>{!! trans('backend/lesson_word.index.note_answer') !!}</th>
                                    <th>{!! trans('backend/lesson_word.index.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($words as $word)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $word['id'] !!} </td>
                                        <td class="center"> {!! $word['word']['content'] !!} </td>
                                        <td class="center"> {!! array_get($word, 'word.answer')->locale['content_answer'] !!} </td>
                                        <td class="center"> {!! array_get($word, 'word.answer')->locale['note_answer']  !!} </td>
                                        <td class="center">
                                            {!! Form::open(['url' => 'admin/lesson/detail/word/' . $word['id'] . '/' . $lesson->id, 'method' => 'DELETE']) !!}
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