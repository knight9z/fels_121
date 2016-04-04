@extends('backend.common')

@section('admin_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! trans('backend/user/create.header_title') !!}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! trans('backend/user/update.title') !!}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                {!! Form::open(array('url' => 'admin/user/' . $user->id, 'method' => 'PUT', 'enctype' => "multipart/form-data")) !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="" value="{{ $user->id }}" name="id" type="hidden">
                                        </div>

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.name') !!}</label>
                                            {!! Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => trans('backend/user/update.placeholder.name'), 'autofocus' => true)) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'name'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.email') !!}</label>
                                            {!! Form::email('email', $user->email, array('class' => 'form-control', 'placeholder' => trans('backend/user/update.placeholder.email'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'email'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.password') !!}</label>
                                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('backend/user/update.placeholder.password'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'password'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.password_repeat') !!}</label>
                                            {!! Form::password('password_repeat', array('class' => 'form-control', 'placeholder' => trans('backend/user/update.placeholder.password_repeat'))) !!}
                                        </div>

                                        @include('layouts.errors_detail', ['fieldError' => 'password_repeat'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.role') !!}</label>
                                            {!! Form::select('role', $roles, $user->role, array('class' => 'form-control')) !!}
                                        </div>
                                        @include('layouts.errors_detail', ['fieldError' => 'role'])

                                        <div class="form-group">
                                            <label>{!! trans('backend/user/update.placeholder.image') !!}</label>
                                            {!! Form::file('image', array('class' => 'form-control', 'placeholder' => trans('backend/user/update.placeholder.image') )) !!}
                                        </div>

                                        <!-- Change this to a button or input when using this as a form -->
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