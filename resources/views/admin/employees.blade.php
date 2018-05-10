@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Employees')}}</h2>
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
                                    <th style="width: 20%;">{{language_data('Name')}}</th>
                                    <th style="width: 20%;">{{language_data('Username')}}</th>
                                    <th style="width: 20%;">{{language_data('Designation')}}</th>
                                    <th style="width: 10%;">{{language_data('Status')}}</th>
                                    <th style="width: 20%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $d)
                                    <tr>
                                        <td data-label="{{language_data('Code')}}">{{$d->employee_code}}</td>
                                        <td data-label="{{language_data('Name')}}"><p>{{$d->fname}} {{$d->lname}}</p>
                                        </td>
                                        <td data-label="{{language_data('Username')}}"><p>{{$d->user_name}}</p></td>
                                        <td data-label="{{language_data('Designation')}}">
                                            <p>{{$d->designation_name->designation}}</p></td>
                                        @if($d->status=='active')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Active')}}</p>
                                            </td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Inactive')}}</p>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-success" href="{{url('employees/view/'.$d->id)}}"><i class="fa fa-edit"></i> {{language_data('Edit')}}
                                            </a>
                                            <a href="#" class="btn btn-danger cdelete" id="{{$d->id}}"><i class="fa fa-trash"></i> {{language_data('Delete')}}
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

        </div>
    </section>

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/libs/data-table/datatables.min.js")!!}
    {!! Html::script("assets/js/bootbox.min.js")!!}

    <script>
      $(document).ready(function () {
        @if (app_config('Language') == 2)
        $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
        @else
        $('.data-table').DataTable();
          @endif

          /*For Delete Designation*/
        $(".cdelete").click(function (e) {
          e.preventDefault();
          var id = this.id;
          @if (app_config('Language') == 2)
          bootbox.setLocale("zh_CN")
          @endif
          bootbox.confirm("您确定吗？", function (result) {
            if (result) {
              var _url = $("#_url").val();
              window.location.href = _url + "/employee/delete-employee/" + id;
            }
          });
        });

      });
    </script>
@endsection
