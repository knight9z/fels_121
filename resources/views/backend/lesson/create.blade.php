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
                        {!! trans('backend/lesson.create.title') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(array('url' => 'admin/lesson/', 'method' => 'POST', 'enctype' => "multipart/form-data")) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <label>{!!  trans('backend/lesson.field.title') !!}</label>
                                            {!! Form::text('title', old('title'), array('class' => 'form-control', 'placeholder' => trans('backend/lesson.field.title'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'title'])

                                        <div class="form-group">
                                            <label>{!!  trans('backend/lesson.field.category') !!}</label>
                                            {!! Form::select('category_id', $categories, old('category_id'), array('class' => 'form-control')) !!}
                                        </div>
                                        
                                        @include('layouts.errors_detail', ['fieldError' => 'category_id'])

                                        <!-- Change this to a button or input when using this as a form -->
                                        {!! Form::submit(trans('backend/lesson.create.button'), ['class' => 'btn btn-primary']) !!}

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