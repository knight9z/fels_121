@extends('backend.common')

@section('admin_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('backend/category.title_header') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! trans('backend/category.update.title') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(array('url' => 'admin/category/'. $category->id, 'method' => 'PUT', 'enctype' => "multipart/form-data")) !!}
                                    <fieldset>

                                        <div class="form-group">
                                            {!! Form::hidden('locale_id', $category->locale['id'], array('class' => 'form-control')) !!}
                                        </div>

                                        <div class="form-group">
                                            <label>{!! trans('backend/category.field.title') !!}</label>
                                            {!! Form::text('title', $category->locale['title'], array('class' => 'form-control', 'placeholder' => trans('backend/category.field.title'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'title'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/category.field.summary') !!}</label>
                                            {!! Form::text('summary', $category->locale['summary'], array('class' => 'form-control', 'placeholder' => trans('backend/category.field.summary'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'summary'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/category.field.image') !!}</label>
                                            {!! Form::file('image', array('class' => 'form-control', 'placeholder' => trans('backend/category.field.image') )) !!}
                                        </div>
                                        @include('layouts.errors_detail', ['fieldError' => 'image'])

                                                <!-- Change this to a button or input when using this as a form -->
                                        {!! Form::submit(trans('backend/category.update.button'), ['class' => 'btn btn-primary']) !!}

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