<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Elearning </title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('common/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('common/bower_components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('common/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('common/bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

</head>

<body>

@yield('content')

</body>

<!-- jQuery -->
<script src="{!! asset('common/bower_components/jquery/dist/jquery.min.js') !!}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('common/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{!! asset('common/bower_components/metisMenu/dist/metisMenu.min.js') !!}"></script>

<!-- Morris Charts JavaScript -->
<!--script src="{!! asset('common/bower_components/raphael/raphael-min.js') !!}"></script>
<script src="{!! asset('common/bower_components/morrisjs/morris.min.js') !!}"></script-->

<!-- Custom Theme JavaScript -->
<script src="{!! asset('common/dist/js/sb-admin-2.js') !!}"></script>

<script type="text/javascript">
    var elearning ;
    $(document).ready(function(){
        elearning = {
            confirm_delete: function(url){
                var conf = confirm('Are you sure ?');
                if(conf)
                {
                    window.location.href = url;
                }
            },
        }
    })

</script>

</html>