@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Word List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filter
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    @include('layouts.errors')
                                    {!! Form::open(array('url' => '/client/start/lesson/'. $userLesson->id, 'method' => 'PUT', 'enctype' => "multipart/form-data")) !!}
                                        {!! Form::hidden('user_id', $currentUser['id'], array('class' => 'form-control')) !!}
                                        {!! Form::hidden('lesson_id', $userLesson['lesson_id'], array('class' => 'form-control')) !!}
                                        <fieldset>
                                            @foreach ($userLesson->result as $number => $question)
                                            <div class="col-md-6 col-md-offset-3">
                                                <li>
                                                    <h4> {!! $question->word->content !!}</h4>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="{!! $question->word_answer_wrong_id_1 !!}" name="result[{!! $question->id !!}]" id="result_{!! $question->id !!}">

                                                        </div>
                                                        {!! $question->wrongAnswer1->locale['content_answer'] !!}
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="{!! $question->word_answer_wrong_id_2 !!}" name="result[{!! $question->id !!}]" id="result_{!! $question->id !!}">
                                                        </div>
                                                        {!! $question->wrongAnswer2->locale['content_answer'] !!}
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="{!! $question->word_answer_wrong_id_3 !!}" name="result[{!! $question->id !!}]" id="result_{!! $question->id !!}">
                                                        </div>
                                                        {!! $question->wrongAnswer3->locale['content_answer'] !!}
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="{!! $question->word_answer_correct_id !!}" name="result[{!! $question->id !!}]" id="result_{!! $question->id !!}">
                                                        </div>
                                                        {!! $question->correctAnswer->locale['content_answer'] !!}
                                                    </div>

                                                </li>
                                            </div>
                                            @endforeach
                                        </fieldset>
                                        <!-- Change this to a button or input when using this as a form -->
                                        {!! Form::submit(trans('backend/lesson/create.button'), ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection