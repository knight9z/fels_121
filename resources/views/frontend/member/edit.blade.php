@extends('frontend.common')
@section('client_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('frontend/member.edit.title_header') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! trans('frontend/member.edit.title') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(['url' => 'client/member/' . $user->id, 'method' => 'PUT', 'enctype' => "multipart/form-data"]) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="" value="{{ $user->id }}" name="id" type="hidden">
                                        </div>

                                        <div class="form-group">
                                            <label>{!! trans('frontend/member.edit.field.name') !!}</label>
                                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => trans('frontend/member.edit.field.name'), 'autofocus' => true]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'name'])

                                        <div class="form-group">
                                            <label>{!! trans('frontend/member.edit.field.email') !!}</label>
                                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => trans('frontend/member.edit.field.email')]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'email'])

                                        <div class="form-group">
                                            <label>{!! trans('frontend/member.edit.field.password') !!}</label>
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('frontend/member.edit.field.password')]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'password'])

                                        <div class="form-group">
                                            <label>{!! trans('frontend/member.edit.field.password_repeat') !!}</label>
                                            {!! Form::password('password_repeat', ['class' => 'form-control', 'placeholder' => trans('frontend/member.edit.field.password_repeat')]) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'password_repeat'])

                                        <div class="form-group">
                                            <label>{!! trans('frontend/member.edit.field.image') !!}</label>
                                            {!! Form::file('image', ['class' => 'form-control', 'placeholder' => trans('frontend/member.edit.field.image')]) !!}
                                        </div>

                                        {!! Form::submit(trans('backend/user/update.button'), ['class' => 'btn btn-primary']) !!}

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