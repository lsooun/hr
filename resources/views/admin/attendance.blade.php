@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Attendance')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('Search Condition')}}</h3>
                        </div>
                        <div class="panel-body">
                            <form class="" role="form" method="post" action="{{url('attendance/post-custom-search')}}">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="el2">{{language_data('Date')}}</label>
                                            <input type="text" id="el2" class="form-control datePicker" required="" name="date" value="{{$date}}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="el3">{{language_data('Employee')}}</label>
                                            <select class="selectpicker form-control" data-live-search="true" name="employee">
                                                <option value="0">{{language_data('Select Employee')}}</option>
                                                @foreach($employee as $d)
                                                    <option value="{{$d->id}}" @if($d->id==$emp_id) selected @endif>{{$d->fname}} {{$d->lname}} ({{$d->employee_code}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="el3">{{language_data('Department')}}</label>
                                            <select class="selectpicker form-control" data-live-search="true" name="department" id="department_id">
                                                <option value="0">{{language_data('Select Department')}}</option>
                                                @foreach($department as $d)
                                                    <option value="{{$d->id}}" @if($dep_id==$d->id) selected @endif> {{$d->department}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="el3">{{language_data('Designation')}}</label>
                                            <select class="selectpicker form-control" data-live-search="true" @if( $des_id == '' ) disabled @endif name="designation" id="designation">
                                                <option value="0">{{language_data('Select Designation')}}</option>
                                                @if($des_id!=0)
                                                    @foreach($designation as $des)
                                                        <option value="{{$des->id}}" @if($des_id==$des->id) selected @endif> {{$des->designation}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-search"></i> {{language_data('Search')}}</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            @if($date=='')
                                <a href="{{url('attendance/get-all-pdf-report')}}" class="btn btn-success pull-right"><i class="fa fa-file-pdf-o"></i> {{language_data('Generate PDF')}}
                                </a><br>
                            @else
                                <a href="{{url('attendance/get-pdf-report/'.$date.'/'.$emp_id.'/'.$dep_id.'/'.$des_id)}}" class="btn btn-success pull-right"><i class="fa fa-file-pdf-o"></i> {{language_data('Generate PDF')}}
                                </a><br>
                            @endif

                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 17%;">{{language_data('Employee Name')}}</th>
                                    {{--                                    <th style="width: 13%;">{{language_data('Designation')}}</th>--}}
                                    <th style="width: 10%;">{{language_data('Date')}}</th>
                                    <th style="width: 10%;">{{language_data('Clock In')}}</th>
                                    <th style="width: 10%;">{{language_data('Clock Out')}}</th>
                                    <th style="width: 5%;">{{language_data('Late')}}</th>
                                    <th style="width: 5%;">{{language_data('Early Leaving')}}</th>
                                    <th style="width: 5%;">{{language_data('Overtime')}}</th>
                                    <th style="width: 10%;">{{language_data('Total Work')}}</th>
                                    <th style="width: 10%;">{{language_data('Status')}}</th>
                                    <th style="width: 5%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendance as $d)
                                    <tr>
                                        <td data-label="{{language_data('Employee Name')}}">
                                            <a href="{{url('employees/view/'.$d->emp_id)}}">{{$d->employee_info->fname}} {{$d->employee_info->lname}}</a>
                                        </td>
                                        {{--                            <td data-label="Designation">{{$d->designation_name->designation}}</td>--}}
                                        <td data-label="{{language_data('Date')}}">{{get_date_format($d->date)}}</td>
                                        <td data-label="{{language_data('Clock In')}}">{{$d->clock_in}}</td>
                                        <td data-label="{{language_data('Clock Out')}}">{{$d->clock_out}}</td>
                                        <td data-label="{{language_data('Late')}}">{{round($d->late/60,2)}} H</td>
                                        <td data-label="{{language_data('Early Leaving')}}">{{round($d->early_leaving/60,2)}} H</td>
                                        <td data-label="{{language_data('Overtime')}}">{{$d->overtime}} H</td>
                                        <td data-label="{{language_data('Total Work')}}">{{round($d->total/60,2)+$d->overtime}} H</td>
                                        @if($d->status=='Absent')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-danger text-underline">{{language_data('Absent')}}</p></td>
                                        @elseif($d->status=='Holiday')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-complete">{{language_data('Holiday')}}</p></td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Present')}}</p></td>
                                        @endif
                                        <td>
                                            <div class="btn-group btn-mini-group dropdown-default">
                                                <a class="btn btn-success dropdown-toggle btn-animated from-top fa fa-caret-down" data-toggle="dropdown" href="#" aria-expanded="false"><span><i class="fa fa-bars"></i></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" class="text-complete setOvertime" id="{{$d->id}}" data-overtime-val="{{$d->overtime}}" data-toggle="tooltip" data-placement="right" title="{{language_data('Set Overtime')}}"><i class="fa fa-clock-o"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('attendance/edit/'.$d->id)}}" data-toggle="tooltip" data-placement="right" title="{{language_data('Edit')}}" class="text-success text-underline"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-danger cdelete" data-toggle="tooltip" data-placement="right" title="{{language_data('Delete')}}" id="{{$d->id}}"><i class="fa fa-trash"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/libs/moment/moment-with-locales.min.js")!!}
    {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/js/form-elements-page.zh-CN.js")!!}
    @else
        {!! Html::script("assets/js/form-elements-page.js")!!}
    @endif
    {!! Html::script("assets/js/bootbox.min.js")!!}
    <script>
        $(document).ready(function () {

            /*For DataTable*/
            @if (app_config('Language') == 2)
            $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
            @else
            $('.data-table').DataTable();
            @endif

            /*For Designation Loading*/
            $("#department_id").change(function () {
                var id = $(this).val();
                var _url = $("#_url").val();
                var dataString = 'dep_id=' + id;
                $.ajax
                ({
                    type: "POST",
                    url: _url + '/attendance/get-designation',
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $("#designation").html(data).removeAttr('disabled').selectpicker('refresh');
                    }
                });
            });

            /*For Delete Attendance*/

            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/attendance/delete-attendance/" + id;
                    }
                });
            });

            /*Set Overtime*/
            $(".setOvertime").click(function (e) {
                e.preventDefault();

                var id = this.id;
                var _url = $("#_url").val();
                var overTimeVal = $(this).data('overtime-val');
                var redirectURL = window.location.href;

                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.prompt({
                    title: "加班时数（小时）：",
                    value: overTimeVal,
                    callback: function (result) {
                        if (result == null || result.length == 0 || isNaN(result)) {
                            result = 0;
                        }
                        var dataString = 'attend_id=' + id + '&overTimeValue=' + result;
                        $.ajax({
                            type: "POST",
                            url: _url + '/attendance/set-overtime',
                            data: dataString,
                            cache: false,
                            success: function (data) {
                                if (data == 'success') {
                                    window.location = redirectURL;
                                } else {
                                    alert('请重试');
                                }

                            }
                        });
                    }
                });
            });

        });
    </script>

@endsection
