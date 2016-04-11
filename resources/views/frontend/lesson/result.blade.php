@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Lesson Result</h1>
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
                                    <th>{!! trans('lesson.lesson_word.result.word') !!}</th>
                                    <th>{!! trans('lesson.lesson_word.result.word') !!}Answer</th>
                                    <th>{!! trans('lesson.lesson_word.result.word') !!}Correct</th>
                                    <th>{!! trans('lesson.lesson_word.result.word') !!}Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userLesson->result as $result)
                                        <tr class="odd gradeX @if ($result->is_correct) success @else danger @endif">
                                            <td class="center"> {!! $result->word->content !!} </td>
                                            <td class="center"> @if ($result->answerMember) {!! $result->answerMember->locale['content_answer'] !!}@endif   </td></td>
                                            <td class="center"> {!! $result->correctAnswer->locale['content_answer'] !!} </td>
                                            <td class="center">
                                                @if ($result->is_correct)
                                                    {!! link_to('#', 'TRUE', ['class' => 'btn btn-success btn-xs', 'title' => 'Start Lesson']) !!}
                                                @else
                                                    {!! link_to('#', 'FALSE', ['class' => 'btn btn-danger btn-xs', 'title' => 'Start Lesson']) !!}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>

                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection