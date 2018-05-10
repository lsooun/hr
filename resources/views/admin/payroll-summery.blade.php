@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection

@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Employee Payroll Summery')}}</h2>
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
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 20%;">{{language_data('Name')}}</th>
                                    <th style="width: 20%;">{{language_data('Username')}}</th>
                                    <th style="width: 20%;">{{language_data('Designation')}}</th>
                                    <th style="width: 30%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $d)
                                    <tr>
                                        <td data-label="#">{{$d->employee_code}}</td>
                                        <td data-label="{{language_data('Name')}}"><p>{{$d->fname}} {{$d->lname}}</p></td>
                                        <td data-label="{{language_data('Username')}}"><p>{{$d->user_name}}</p></td>
                                        <td data-label="{{language_data('Designation')}}"><p>{{$d->designation_name->designation}}</p></td>
                                        <td>
                                            <a data-label="{{$d->id}}" class="btn btn-success" style="margin-bottom: 5px" href="#"
                                               data-toggle="modal" data-target=".modal_get_salary_statement">
                                                <i class="fa fa-line-chart"></i> {{language_data('Salary Statement')}}
                                            </a>
                                            <a class="btn btn-complete" style="margin-bottom: 5px" href="{{url('reports/employee-summery/'.$d->id)}}">
                                                <i class="fa fa-bar-chart"></i> {{language_data('Employee Summary')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('admin.modal-salary-statement')
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
        @if (app_config('Language') == 2)
        $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
        @else
        $('.data-table').DataTable();
        @endif

        $("[href='#']").click(function (e) {
          var id = $(this).attr('data-label');
          $('#cmd').val(id);
        });
      });
    </script>
@endsection
