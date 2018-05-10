@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap-calendar/css/calendar.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Holiday')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')

            <div class="row">
                <div class="panel">
                    <div class="panel-body">

                        <div class="panel-heading">
                            <h3 id="month" class="panel-title"></h3>
                            <div class="pull-right form-inline">
                                <div class="btn-group">
                                    <button class="btn btn-success" data-calendar-nav="prev"><< </button>
                                    <button class="btn btn-default" data-calendar-nav="today">今天</button>
                                    <button class="btn btn-complete" data-calendar-nav="next"> >></button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <input type="hidden" value="<?php echo asset('assets/libs/bootstrap-calendar/tmpls/'); ?>" id="_asset_path">

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/bootstrap-calendar/js/underscore.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/libs/bootstrap-calendar/js/language/zh-CN.js")!!}
    @endif
    {!! Html::script("assets/libs/bootstrap-calendar/js/calendar.min.js")!!}
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    <script>
        $(document).ready(function () {
            var _asset_url = $("#_asset_path").val() + '/';
            var _url = $("#_url").val();
            var calendar = $('#calendar').calendar({
                @if (app_config('Language') == 2)
                language: 'zh-CN',
                @endif
                weekbox: false,
                tmpl_path: _asset_url,
                events_source: _url + '/holiday/ajax-event-calendar',
                onAfterViewLoad: function (view) {
                    $('#month').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                }
            });

            $('.btn-group button[data-calendar-nav]').each(function () {
                var $this = $(this);
                $this.click(function () {
                    calendar.navigate($this.data('calendar-nav'));
                });
            });

        });
    </script>


@endsection
