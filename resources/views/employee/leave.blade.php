@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    {!! Html::style("assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Leave Application')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('All Leave Details')}}</h3>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table table-hover">
                                @foreach($leave_type as $lt)
                                    <tr>
                                        <td>{{$lt->leave}}</td>
                                        <td>{{$lt->leave_quota}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>{{language_data('Total Leave')}}</td>
                                    <td>{{$total_leave}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="panel">
                        <div class="panel-heading">
                            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#new-leave">
                                <i class="fa fa-plus"></i> {{language_data('New Leave')}}
                            </button>
                            <br>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 20%;">{{language_data('Leave Type')}}</th>
                                    <th style="width: 15%;">{{language_data('Leave From')}}</th>
                                    <th style="width: 15%;">{{language_data('Leave To')}}</th>
                                    <th style="width: 15%;">{{language_data('Status')}}</th>
                                    <th style="width: 30%;">{{language_data('Remark')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leave as $d)
                                    <tr>
                                        <td data-label="{{language_data('Leave Type')}}"><p>{{$d->leave_type->leave}}</p></td>
                                        <td data-label="{{language_data('Leave From')}}"><p>{{get_date_format($d->leave_from)}}</p></td>
                                        <td data-label="{{language_data('Leave To')}}"><p>{{get_date_format($d->leave_to)}}</p></td>
                                        @if($d->status=='approved')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Approved')}}</p></td>
                                        @elseif($d->status=='pending')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Pending')}}</p></td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-danger text-underline">{{language_data
                                                ('Rejected')}}</p></td>
                                        @endif

                                        <td data-label="{{language_data('Remark')}}">
                                            {{$d->remark}}&nbsp;
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="new-leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{language_data('Request For New Leave')}}</h4>
                        </div>
                        <form class="form-some-up" role="form" method="post" action="{{url('employee/leave/post-new-leave')}}">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label>{{language_data('Leave Type')}}</label>
                                    <select name="leave_type" id="e20" class="form-control selectpicker" data-live-search="true">
                                        @foreach($leave_type as $lt)
                                            <option value="{{$lt->id}}">{{$lt->leave}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Leave From')}}</label>
                                    <input type="text" class="form-control datePicker" name="leave_from" required="">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Leave To')}}</label>
                                    <input type="text" class="form-control datePicker" name="leave_to" required="">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Leave Reason')}}</label>
                                    <textarea class="textarea-wysihtml5 form-control" name="leave_reason"></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{language_data('Close')}}</button>
                                <button type="submit" class="btn btn-primary">{{language_data('Send')}}</button>
                            </div>
                        </form>
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
    {!! Html::script("assets/libs/wysihtml5x/wysihtml5x-toolbar.min.js")!!}
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/libs/bootstrap3-wysihtml5-bower/locales/bootstrap-wysihtml5.zh-CN.js")!!}
        {!! Html::script("assets/js/form-elements-page.zh-CN.js")!!}
    @else
        {!! Html::script("assets/js/form-elements-page.js")!!}
    @endif
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}

    <script>
        $(document).ready(function () {
            /*For DataTable*/
            @if (app_config('Language') == 2)
            $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
            @else
            $('.data-table').DataTable();
            @endif
        });
    </script>
@endsection
