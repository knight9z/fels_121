@extends('frontend.common')
@section('client_content')
    <div id="wrapper">
        <!-- /#page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! trans('frontend/member.title')!!}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            @if (isset($users))
                @foreach ($users as $user)
                    <div class="row">
                        <div class="col-md-4">
                            <li>
                                {!! Html::image(config('constants.path_image') . '/' . $user['avatar'], null, ['class' => 'gravatar'] ) !!}
                                {!! link_to('/client/member/' . $user['id'], $user['name']) !!}
                            </li>

                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                @endforeach

                <!-- pagination -->
                <div class="row pull-right page-padding">
                    {!! $users->links() !!}
                </div>
                <!-- /.col-lg-12 -->
            @endif
        </div>

        <!-- /#page-wrapper -->
    </div>
@endsection