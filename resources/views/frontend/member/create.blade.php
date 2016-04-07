@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{!! trans('frontend/member/create.title') !!}</h3>
                </div>
                <div class="panel-body">
                    @include('layouts.errors')
                        {!! Form::open(['url' => 'member', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('frontend/member/create.placeholder.name'), 'autofocus' => true]) !!}
                            </div>

                            @include('layouts.errors_detail', ['fieldError' => 'name'])

                            <div class="form-group">

                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('frontend/member/create.placeholder.email')]) !!}
                            </div>

                            @include('layouts.errors_detail', ['fieldError' => 'email'])

                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('frontend/member/create.placeholder.password')]) !!}
                            </div>

                            @include('layouts.errors_detail', ['fieldError' => 'password'])

                            <div class="form-group">
                                {!! Form::password('password_repeat', ['class' => 'form-control', 'placeholder' => trans('frontend/member/create.placeholder.password_repeat')]) !!}
                            </div>

                            @include('layouts.errors_detail', ['fieldError' => 'password_repeat'])

                            <div class="form-group">
                                {!! Form::file('image', ['class' => 'form-control', 'placeholder' => trans('frontend/member/create.placeholder.image') ]) !!}
                            </div>

                            @include('layouts.errors_detail', ['fieldError' => 'image'])

                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::submit(trans('frontend/member/create.button'), ['class' => 'btn btn-primary']) !!}

                        </fieldset>
                    {!! Form::close() !!}
                    <!--/form-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
