@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection

@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Support Tickets')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div style="height: 15px">&nbsp;</div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th>{{language_data('Email')}}</th>
                                    <th>{{language_data('Subject')}}</th>
                                    <th>{{language_data('Date')}}</th>
                                    <th>{{language_data('Status')}}</th>
                                    <th class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($st as $in)
                                    <tr>
                                        <td data-label="{{language_data('Email')}}">{{$in->email}}</td>
                                        <td data-label="{{language_data('Subject')}}">{{$in->subject}}</td>
                                        <td data-label="{{language_data('Date')}}">{{get_date_format($in->date)}}</td>
                                        <td data-label="{{language_data('Status')}}">
                                            @if($in->status=='Pending')
                                                <span class="bold text-danger text-underline">{{language_data('Pending')}}</span>
                                            @elseif($in->status=='Answered')
                                                <span class="bold text-success text-underline">{{language_data('Answered')}}</span>
                                            @elseif($in->status=='Customer Reply')
                                                <span class="bold text-info text-underline">{{language_data('Customer Reply')}}</span>
                                            @else
                                                <span class="bold text-primary text-underline">{{language_data('Closed')}}</span>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            <a href="{{url('employee/support-tickets/view-ticket/'.$in->id)}}" class="btn btn-success"><i class="fa fa-eye"></i> {{language_data('View')}}
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
        });
    </script>

@endsection
