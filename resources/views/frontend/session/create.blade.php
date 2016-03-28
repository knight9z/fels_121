@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('frontend/session/create.title') !!}</h3>
                    </div>
                    <div class="panel-body">
                        @include('layouts.errors')
                            {!! Form::open(array('url' => 'session', 'method' => 'post', 'enctype' => "multipart/form-data")) !!}

                            <fieldset>
                                <div class="form-group">
                                    {!! Form::email('email', old('email'), array('class' => 'form-control', 'placeholder' => trans('frontend/session/create.placeholder.email'))) !!}
                                </div>

                                @include('layouts.errors_detail', ['fieldError' => 'email'])

                                <div class="form-group">
                                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('frontend/session/create.placeholder.password'))) !!}
                                </div>

                                @include('layouts.errors_detail', ['fieldError' => 'password'])

                                <!-- Change this to a button or input when using this as a form -->
                                {!! Form::submit(trans('frontend/session/create.button'), ['class' => 'btn btn-primary']) !!}

                                {!! link_to('member/create', trans('frontend/session/create.create_member'), ['class' => 'btn btn-success']) !!}

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection