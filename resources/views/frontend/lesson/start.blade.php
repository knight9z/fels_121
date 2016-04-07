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
                                    {!! Form::open(['url' => '#', 'method' => 'GET', 'enctype' => "multipart/form-data"]) !!}
                                        <fieldset>
                                            <div class="col-md-6 col-md-offset-3">
                                                <li>
                                                    <h4>esgegs</h4>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="18" name="lesson[word_lessons_attributes][0][answer_id]" id="lesson_word_lessons_attributes_0_answer_id_18">
                                                        </div>
                                                        <div class="col-md-2">
                                                            dsfsdfs
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="19" name="lesson[word_lessons_attributes][0][answer_id]" id="lesson_word_lessons_attributes_0_answer_id_19">
                                                        </div>
                                                        <div class="col-md-2">
                                                            sdfdfdsf
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>

                                            <div class="col-md-6 col-md-offset-3">
                                                <li>
                                                    <h4>esgegs</h4>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="18" name="lesson[word_lessons_attributes][0][answer_id]" id="lesson_word_lessons_attributes_0_answer_id_18">
                                                        </div>
                                                        <div class="col-md-2">
                                                            dsfsdfs
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="radio" value="19" name="lesson[word_lessons_attributes][0][answer_id]" id="lesson_word_lessons_attributes_0_answer_id_19">
                                                        </div>
                                                        <div class="col-md-2">
                                                            sdfdfdsf
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>

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
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection