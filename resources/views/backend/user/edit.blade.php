@extends('backend.common')

@section('admin_content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update User
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                @include('layouts.errors')
                                <form role="form" method="post" action="{{ url('admin/user/' . $user->id) }}" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    {!! method_field('PUT') !!}
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="" value="{{ $user->id }}" name="id" type="hidden">
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Name" value="{{ $user->name }}" name="name" type="text" autofocus>
                                        </div>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" value="{{ $user->email }}" name="email" type="email" >
                                        </div>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif

                                        <div class="form-group">
                                            <label>PassWord</label>
                                            <input class="form-control" placeholder="Nếu bạn muốn thay đổi pass word vui lòng kích vào đây" value="" name="password" type="password" >
                                        </div>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                        <div class="form-group">
                                            <label>PassWord</label>
                                            <input class="form-control" placeholder="Nhấp lại mật khấu" value="" name="password-repeat" type="password" >
                                        </div>

                                        @if ($errors->has('password-repeat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password-repeat') }}</strong>
                                            </span>
                                        @endif

                                        <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control" name="role">
                                                    <option>-- Choice Something Option --</option>
                                                @foreach($roles as $roleId => $role)
                                                    @if($user->role == $roleId)
                                                        <option value="{!! $roleId !!}" selected> {!! $role !!} </option>
                                                    @else
                                                        <option value="{!! $roleId !!}"> {!! $role !!} </option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>


                                        @if ($errors->has('role'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password-repeat') }}</strong>
                                            </span>
                                        @endif

                                        <div class="form-group">
                                            <label>Image</label>
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