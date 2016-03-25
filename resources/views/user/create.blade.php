@extends('admin.common')

@section('admin_content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Forms</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category Create
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <form role="form" method="post" action="{{ url('admin/category') }}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <fieldset>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" placeholder="Title" value="{{ old('title') }}" name="title" type="text" autofocus>
                                    </div>

                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif

                                    <div class="form-group">
                                        <label>Summary</label>
                                        <textarea class="form-control" placeholder="Summary"  name="summary" type="text" >{{ old('summary') }}</textarea>
                                    </div>

                                    @if ($errors->has('summary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('summary') }}</strong>
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