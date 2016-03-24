@extends('admin.common')

@section('admin_content')
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                        <div class="dataTable_wrapper">
                            <table class="table table-striped  table-hover" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php//  var_dump($data);die; ?>
                                @foreach($data as $value)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $value['id'] !!} </td>
                                        <td class="center"> {!! $value['avatar'] !!} </td>
                                        <td class="center"> {!! $value['name'] !!} </td>
                                        <td class="center"> {!! $value['email'] !!} </td>
                                        <td class="center"> {!! $value['role'] !!} </td>
                                        <td class="center"> {!! $value['id'] !!} </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
@endsection