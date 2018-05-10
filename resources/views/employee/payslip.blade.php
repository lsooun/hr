@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Payment History')}}</h2>
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
                                    <th style="width: 25%;">{{language_data('Payment Month')}}</th>
                                    <th style="width: 25%;">{{language_data('Payment Date')}}</th>
                                    <th style="width: 15%;">{{language_data('Paid Amount')}}</th>
                                    <th style="width: 20%;">{{language_data('Payment Type')}}</th>
                                    <th style="width: 15%;" class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payslip as $p)
                                    <tr>
                                        <td data-label="{{language_data('Payment Month')}}">{{$p->payment_month}}</td>
                                        <td data-label="{{language_data('Payment Date')}}"><p>{{get_date_format($p->payment_date)}}</p></td>
                                        <td data-label="{{language_data('Paid Amount')}}"><p>{{$p->total_salary}}</p></td>
                                        <td data-label="{{language_data('Payment Type')}}">
                                            <p>{{language_data($p->payment_type)}}</p></td>
                                        <td>
                                            <a class="btn btn-success" href="{{url('employee/payslip/view/'.$p->id)}}"><i class="fa fa-eye"></i> {{language_data('View')}}
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
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}
    {!! Html::script("assets/js/form-elements-page.js")!!}
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
