@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Award List')}}</h2>
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
                                    <th style="width: 35%;">{{language_data('Award Name')}}</th>
                                    <th style="width: 35%;">{{language_data('Gift')}}</th>
                                    <th style="width: 25%;">{{language_data('Month')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($award as $d)
                                    <tr>
                                        <td data-label="{{language_data('Award Name')}}"><p>{{$d->award_name->award}}</p></td>
                                        <td data-label="{{language_data('Gift')}}"><p>{{$d->gift}}</p></td>
                                        <td data-label="{{language_data('Month')}}"><p>{{$d->month}} {{$d->year}} </p></td>
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
