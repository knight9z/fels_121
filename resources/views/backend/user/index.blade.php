@extends('backend.common')
@section('admin_content')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('backend/user/index.header_title') !!}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.errors')
                    @include('layouts.success')
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="dataTable_wrapper">
                            <table class="table table-striped  table-hover" >
                                <thead>
                                <tr>
                                    <th>{!! trans('backend/user/index.table.id') !!}</th>
                                    <th>{!! trans('backend/user/index.table.image') !!}</th>
                                    <th>{!! trans('backend/user/index.table.name') !!}</th>
                                    <th>{!! trans('backend/user/index.table.email') !!}</th>
                                    <th>{!! trans('backend/user/index.table.role') !!}</th>
                                    <th>{!! trans('backend/user/index.table.action') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $value)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $value['id'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $value['avatar'], null, ['style' => 'height:50px; width:40px;'] ) !!}
                                        </td>
                                        <td class="center"> {!! $value['name'] !!} </td>
                                        <td class="center"> {!! $value['email'] !!} </td>
                                        <td class="center">
                                            @if( $value['role'] == \App\User::USER_ROLE_ADMIN)
                                                {!! trans('user.role.admin') !!}
                                            @else
                                                {!! trans('user.role.member') !!}
                                            @endif
                                        </td>
                                        <td class="center">
                                            {!! link_to('admin/user/' . $value['id'] . '/edit', 'Edit', ['class' => 'btn btn-primary btn-xs']) !!}

                                            {!! Form::open(array('url' => 'admin/user/' . $value['id'], 'method' => 'DELETE')) !!}
                                                <button class="btn btn-danger btn-xs" onclick="return confirm('{!! trans('backend/layout.question_delete') !!}');">
                                                    <i title="Delete" class="fa fa-trash-o"></i>
                                                </button>
                                            {!! Form::close() !!}
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