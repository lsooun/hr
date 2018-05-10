@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap-calendar/css/calendar.css") !!}
@endsection



@section('content')

    <section class="wrapper-bottom-sec">

        <div class="p-30"></div>

        <div class="p-15 p-t-none p-b-none m-l-10 m-r-10">
            @include('notification.notify')
        </div>

        <div class="p-30 p-t-none p-b-none">
            <div class="row ">

                <div class="col-sm-4">
                    <div class="bg-success text-white p-30 clearfix text-center">
                        <span class="font-15">
                            @if (app_config('Language') == 2)
                                {{language_data('Today is')}} {{date('Y年 n月j日')}} {{$weekarray[date('w')]}},
                                {{language_data('Time')}} {{date('G:i')}}
                            @else
                                {{language_data('Today is')}} {{date('l dS F - Y')}}, {{language_data('Time')}} : {{date('g:i A')}}
                            @endif
                        </span>
                    </div>

                    <br>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('Recent')}} {{language_data('Support Tickets')}}</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 50%;">{{language_data('Subject')}}</th>
                                    <th style="width: 40px;">{{language_data('Date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recent_tickets as $rt)
                                    <tr>
                                        <td data-label="{{language_data('Subject')}}">
                                            <p>
                                                <a href="{{url('employee/support-tickets/view-ticket/'.$rt->id)}}"> {{$rt->subject}} </a>
                                            </p>
                                        </td>
                                        <td data-label="{{language_data('Date')}}">
                                            <p>{{get_date_format($rt->date)}} </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-sm-4">
                    <div class="bg-complete p-15 text-white font-15 text-center">
                        <div class="row">
                            <span>{{language_data('Attendance')}}</span>
                            <span>{{$attendance}}/{{date('t')}}</span>
                            <span>{{language_data('Holiday')}}</span>
                            <span>{{$holiday}}</span>
                            <span>{{language_data('Award')}}</span>
                            <span>{{$award}}</span>
                        </div>
                    </div>

                    <br>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('Recent')}} {{language_data('Notice')}}</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 70%;">{{language_data('Title')}}</th>
                                    <th style="width: 20px;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recent_notice as $d)
                                    <tr>
                                        <td data-label="{{language_data('Title')}}">
                                            <p>{{$d->title}}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="#" data-toggle="modal" data-target=".modal_view_notice_{{$d->id}}">
                                                <i class="fa fa-eye"></i> {{language_data('View')}}
                                            </a>
                                            @include('employee.modal-view-notice')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-30 p-t-30 text-center">
                        <div class="panel-body">
                            @if(Auth::user()->avatar=='')
                                <img class="user-thumb m-b-15 p-2 " src="<?php echo asset('assets/employee_pic/user.png'); ?>" alt="user" width="90%">
                            @else
                                <img class="user-thumb m-b-15 p-2" src="<?php echo asset('assets/employee_pic/' . Auth::user()->avatar); ?>" alt="user" width="90%">
                            @endif
                            <h4 class="text-uppercase text-info m-b-5 font-15">{{Auth::user()->fname}} {{Auth::user()->lname}}</h4>

                            <p class="bold text-info font-15 m-b-5">{{$user_info->designation_name->designation}}</p>

                            <form action="{{url('employee/attendance/set_clocking')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if($clock_status=='Clock Out')
                                    <input type="hidden" value="Clock In" name="clock_state">
                                    <button class="btn btn-success text-uppercase" type="submit">
                                        <i class="fa fa-arrow-circle-right"></i> {{language_data('Clock In')}}</button>
                                @else
                                    <input type="hidden" value="Clock Out" name="clock_state">
                                    <button class="btn btn-warning text-uppercase" type="submit">
                                        <i class="fa fa-arrow-circle-left"></i> {{language_data('Clock Out')}}</button>

                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-body">

                            <div class="panel-heading">
                                <h3 id="month" class="panel-title"></h3>
                                <div class="pull-right form-inline">
                                    <div class="btn-group">
                                        <button class="btn btn-success" data-calendar-nav="prev"><< {{language_data('Prev')}}</button>
                                        <button class="btn btn-default" data-calendar-nav="today">{{language_data('This Month')}}</button>
                                        <button class="btn btn-complete" data-calendar-nav="next">{{language_data('Next')}} >></button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" value="<?php echo asset('assets/libs/bootstrap-calendar/tmpls/'); ?>" id="_asset_path">

        </div>
    </section>

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
          events_source: _url + '/employee/holiday/ajax-event-calendar',
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

