@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Word List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filter
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    @include('layouts.errors')
                                    {!! Form::open(array('url' => 'client/word', 'method' => 'GET', 'enctype' => "multipart/form-data")) !!}
                                        <fieldset>

                                            <div class="form-group">
                                                <label>{!!  trans('backend/lesson/create.placeholder.category') !!}</label>
                                                {!! Form::select('category_id', $categories, $oldData['category_id'], array('class' => 'form-control')) !!}
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                {!! Form::select('is_reader', $isReadWords, $oldData['is_reader'], array('class' => 'form-control')) !!}
                                            </div>

                                            <!-- Change this to a button or input when using this as a form -->
                                            {!! Form::submit(trans('backend/lesson/create.button'), ['class' => 'btn btn-primary']) !!}

                                        </fieldset>
                                    {!! Form::close() !!}
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

            @if (isset($words))
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Words</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
                                    <th>{!! trans('backend/word/index.table.id') !!}</th>
                                    <th>{!! trans('backend/word/index.table.category') !!}</th>
                                    <th>{!! trans('backend/word/index.table.image') !!}</th>
                                    <th>{!! trans('backend/word/index.table.content') !!}</th>
                                    <th>{!! trans('backend/word/index.table.content_answer') !!}</th>
                                    <th>{!! trans('backend/word/index.table.note_answer') !!}</th>
                                    <th>{!! trans('backend/word/index.table.count_lesson') !!}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($words as $word)
                                    <tr class="odd gradeX">
                                        <td class="center"> {!! $word['id'] !!} </td>
                                        <td class="center"> {!! $word['category']['locale']['title'] !!} </td>
                                        <td class="center">
                                            {!! Html::image(config('constants.path_image') . '/' . $word['category']['image'], null, ['style' => 'height:50px; width:40px;'] ) !!}
                                        </td>
                                        <td class="center"> {!! $word['content'] !!} </td>
                                        <td class="center"> {!! $word['answer']['locale']['content_answer'] !!} </td>
                                        <td class="center"> {!! $word['answer']['locale']['note_answer'] !!} </td>
                                        <td class="center"> {!! $word['count_lesson'] !!} </td>
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
                    {!! $words->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @endif
        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection