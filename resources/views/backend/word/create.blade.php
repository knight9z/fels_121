@extends('backend.common')
@section('admin_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('backend/word.title_header') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! trans('backend/word.create.title') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(['url' => 'admin/word/', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <label>{!! trans('backend/word.field.content') !!}</label>
                                            {!! Form::text('content', old('content'), ['class' => 'form-control', 'placeholder' => trans('backend/word.field.content')]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'content'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/word.field.content_answer') !!}</label>
                                            {!! Form::text('content_answer', old('content_answer'), ['class' => 'form-control', 'placeholder' => trans('backend/word.field.content_answer')]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'content_answer'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/word.field.note_answer') !!}</label>
                                            {!! Form::text('note_answer', old('note_answer'), ['class' => 'form-control', 'placeholder' => trans('backend/word.field.note_answer')]) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>{!! trans('backend/word.field.category') !!}</label>
                                            {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'category_id'])

                                        {!! Form::submit(trans('backend/word.create.button'), ['class' => 'btn btn-primary']) !!}
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