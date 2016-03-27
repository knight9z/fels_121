
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Elearning - Register</h3>
                </div>
                <div class="panel-body">
                    @include('layouts.errors')

                    <form role="form" method="post" action="{{ url('member') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" value="{{ old('name') }}" name="name" type="name" autofocus>
                            </div>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif


                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" value="{{ old('email') }}" name="email" type="email" autofocus>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif


                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group">
                                <input class="form-control" placeholder="Repeat Password" name="password_repeat" type="password" value="">
                            </div>

                            @if ($errors->has('password_repeat'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_repeat') }}</strong>
                                    </span>
                            @endif

                            <div class="form-group">
                                <input class="form-control" placeholder="Avatar" name="image" type="file" value="">
                            </div>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                            @endif

                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-sign-in"></i> Register
                            </button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




