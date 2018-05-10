@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('View Holiday')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-body">
                            <form class="" role="form" method="post" action="{{url('holiday/post-edit-holiday')}}">
                                <div style="height: 15px">&nbsp;</div>

                                <div class="form-group">
                                    <label>{{language_data('Date')}}</label>
                                    <input type="text" class="form-control datePicker" required name="date" value="{{$holiday->holiday}}">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Occasion')}}</label>
                                    <input type="text" class="form-control" required name="occasion" value="{{$holiday->occasion}}">
                                </div>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{$holiday->id}}" name="cmd">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i> {{language_data('Update')}} </button>
                                <a href="#" class="btn btn-danger cdelete" id="{{$holiday->id}}"><i class="fa fa-trash"></i> {{language_data('Delete')}}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/moment/moment-with-locales.min.js")!!}
    {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/js/form-elements-page.zh-CN.js")!!}
    @else
        {!! Html::script("assets/js/form-elements-page.js")!!}
    @endif
    {!! Html::script("assets/js/bootbox.min.js")!!}

    <script>
        $(document).ready(function () {
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/holiday/delete-holiday/" + id;
                    }
                });
            });
        });
    </script>
@endsection
