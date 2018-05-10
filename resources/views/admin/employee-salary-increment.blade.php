@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Employee Salary Increment')}}</h2>
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
                                    <th style="width: 10%;">{{language_data('Code')}}</th>
                                    <th style="width: 25%;">{{language_data('Name')}}</th>
                                    <th style="width: 25%;">{{language_data('Designation')}}</th>
                                    <th style="width: 20%;">{{language_data('Payment Type')}}</th>
                                    <th style="width: 20%;" class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employee as $d)
                                    <tr>
                                        <td data-label="{{language_data('Code')}}">{{$d->employee_code}}</td>
                                        <td data-label="{{language_data('Name')}}"><p>{{$d->fname}} {{$d->lname}}</p></td>
                                        <td data-label="{{language_data('Designation')}}"><p>{{$d->designation_name->designation}}</p></td>
                                        <td data-label="{{language_data('Payment Type')}}">
                                            <p>{{language_data($d->payment_type)}}</p>
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-success" href="{{url('payroll/employee-salary-increment-edit/'.$d->id)}}"><i class="fa fa-edit"></i> {{language_data('Edit')}}
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
    {!! Html::script("assets/js/form-elements-page.js")!!}
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}

    <script>
        $(document).ready(function () {
            @if (app_config('Language') == 2)
            $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
            @else
            $('.data-table').DataTable();
            @endif
        });
    </script>
@endsection
