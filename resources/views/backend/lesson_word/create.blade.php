@extends('backend.common')
@section('admin_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('backend/lesson.title_header') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! trans('backend/lesson.title_header') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(['url' => 'admin/lesson/' . $lessonId . '/detail', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <label>{!!  trans('backend/lesson_word.create.title') !!}</label>
                                            {!! Form::text('word_id', old('word_id'), array('class' => 'form-control', 'id' => 'word_id', 'data-lesson-id' => $lessonId)) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'word_id'])

                                        {!! Form::submit(trans('backend/lesson.button_add'), ['class' => 'btn btn-primary']) !!}
                                    </fieldset>
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
@endsection

