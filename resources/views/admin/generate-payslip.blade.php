@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Payslip')}}</h2>
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
                            <form class="" role="form" method="post" action="{{url('payroll/payslip/post-custom-search')}}">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="el2">{{language_data('Date')}}</label>
                                            <input type="text" id="el2" class="form-control monthPicker" required="" name="date" value="{{$date}}">
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
                                            <select class="selectpicker form-control" data-live-search="true" disabled name="designation" id="designation">
                                                <option value="0">{{language_data('Select Designation')}}</option>
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
                        <div style="height: 15px">&nbsp;</div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 15%;">{{language_data('Salary Month')}}</th>
                                    <th style="width: 15%;">{{language_data('Code')}}</th>
                                    <th style="width: 25%;">{{language_data('Name')}}</th>
                                    <th style="width: 30%;">{{language_data('Payment Type')}}</th>
                                    <th style="width: 15%;">{{language_data('Payment Amount')}}</th>
                                    <th style="width: 15%;" class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payroll as $d)
                                    <tr>
                                        <td data-label="{{language_data('Salary Month')}}">{{$d->payment_month}}</td>
                                        <td data-label="{{language_data('Code')}}">{{$d->employee_info->employee_code}}</td>
                                        <td data-label="{{language_data('Name')}}">{{$d->employee_info->fname}} {{$d->employee_info->lname}}</td>
                                        <td data-label="{{language_data('Payment Type')}}"> {{language_data($d->employee_info->payment_type)}}</td>
                                        <td data-label="{{language_data('Payment Amount')}}">{{app_config('Currency')}} {{$d->total_salary}}</td>
                                        <td class="text-right">
                                            <a href="{{url('payroll/view-details/'.$d->id)}}" class="btn btn-complete"><i class="fa fa-eye"></i> {{language_data('Details')}}
                                            </a>

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
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/libs/moment/moment-with-locales.min.js")!!}
    {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/js/form-elements-page.zh-CN.js")!!}
    @else
        {!! Html::script("assets/js/form-elements-page.js")!!}
    @endif
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}
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
                    url: _url + '/payroll/get-designation',
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $("#designation").html(data).removeAttr('disabled').selectpicker('refresh');
                    }
                });
            });

            /*For Delete Payslip*/

            /*For Delete Job Info*/
            $(".makePayment").click(function (e) {
                e.preventDefault();
                var id = this.id;
                var paymentDate = $('#payment_date').val();
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/payroll/pay-payment/" + id + "/" + paymentDate;
                    }
                });
            });

        });
    </script>


@endsection
