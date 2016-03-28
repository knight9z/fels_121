<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{!! trans('layout.title') !!} </title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('common/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('common/bower_components/metisMenu/dist/metisMenu.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('common/dist/css/sb-admin-2.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('common/bower_components/font-awesome/css/font-awesome.min.css') !!}

</head>

<body>

@yield('content')

</body>

<!-- jQuery -->
{!! Html::script('common/bower_components/font-awesome/css/font-awesome.min.css') !!}

<!-- Bootstrap Core JavaScript -->
{!! Html::script('common/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}

<!-- Metis Menu Plugin JavaScript -->
{!! Html::script('common/bower_components/metisMenu/dist/metisMenu.min.js') !!}

<!-- Morris Charts JavaScript -->
{!! Html::script('common/bower_components/raphael/raphael-min.js') !!}
{!! Html::script('common/bower_components/morrisjs/morris.min.js') !!}

<!-- Custom Theme JavaScript -->
{!! Html::script('common/dist/js/sb-admin-2.js') !!}

</html>