@extends('backend.common')
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
                                @foreach($users as $value)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $value['id'] !!} </td>
                                        <td class="center">
                                            <img style="height:50px; width:40px;" src="{!! config('constants.path_image') . '/' . $value['avatar'] !!} ">
                                        </td>
                                        <td class="center"> {!! $value['name'] !!} </td>
                                        <td class="center"> {!! $value['email'] !!} </td>
                                        <td class="center">
                                            @if( $value['role'] == \App\User::USER_ROLE_ADMIN)
                                                ADMIN
                                            @else
                                                MEMBER
                                            @endif
                                        </td>
                                        <td class="center">
                                            <a href="{!! url('./admin/user/' . $value['id'] . '/edit') !!}" class="btn btn-primary btn-xs"><i title="Edit book" class="fa fa-pencil"></i></a>
                                            <a href="javascript:elearning.confirm_delete('{{ url('./admin/user') }}');" class="btn btn-danger btn-xs"><i title="Delete" class="fa fa-trash-o"></i></a>
                                        </td>
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

                <!-- pagination -->
                <div class="row pull-right page-padding">
                    {!! $users->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection