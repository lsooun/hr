@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
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
                        <div style="height: 15px">&nbsp;</div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 15%;">{{language_data('Date')}}</th>
                                    <th style="width: 15%;">{{language_data('Clock In')}}</th>
                                    <th style="width: 15%;">{{language_data('Clock Out')}}</th>
                                    <th style="width: 10%;">{{language_data('Late')}}</th>
                                    <th style="width: 10%;">{{language_data('Early Leaving')}}</th>
                                    <th style="width: 10%;">{{language_data('Overtime')}}</th>
                                    <th style="width: 10%;">{{language_data('Total Work')}}</th>
                                    <th style="width: 15%;">{{language_data('Status')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendance as $d)
                                    <tr>
                                        <td data-label="{{language_data('Date')}}">{{get_date_format($d->date)}}</td>
                                        <td data-label="{{language_data('Clock In')}}">{{$d->clock_in}}&nbsp;</td>
                                        <td data-label="{{language_data('Clock Out')}}">{{$d->clock_out}}&nbsp;</td>
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
    {!! Html::script("assets/js/form-elements-page.js")!!}
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
