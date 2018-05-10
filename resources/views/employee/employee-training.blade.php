@extends('employee')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Employee Training')}}</h2>
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
                                    <th style="width: 20%;">{{language_data('Training Type')}}</th>
                                    <th style="width: 20%;">{{language_data('Training Subject')}}</th>
                                    <th style="width: 25%;">{{language_data('Title')}}</th>
                                    <th style="width: 10%;">{{language_data('Training From')}}</th>
                                    <th style="width: 10%;">{{language_data('Training To')}}</th>
                                    <th style="width: 15%;" class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emp_training as $et)
                                    <tr>
                                        <td data-label="{{language_data('Training Type')}}">
                                            <p>{{language_data($et->training_type)}}</p></td>
                                        <td data-label="{{language_data('Training Subject')}}">
                                            <p>{{language_data($et->training_subject)}}</p></td>
                                        <td data-label="{{language_data('Title')}}"><p>{{$et->title}}</p></td>
                                        <td data-label="{{language_data('Training From')}}"><p>{{get_date_format($et->training_from)}}</p>
                                        </td>
                                        <td data-label="{{language_data('Training To')}}"><p>{{get_date_format($et->training_to)}}</p></td>
                                        <td>
                                            <a class="btn btn-success" href="{{url('employee/training/view/'.$et->id)}}"><i class="fa fa-eye"></i> {{language_data('View')}}
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
