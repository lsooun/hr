@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Leave Application')}}</h2>
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
                                    <th style="width: 10%;">{{language_data('Employee Code')}}</th>
                                    <th style="width: 15%;">{{language_data('Name')}}</th>
                                    <th style="width: 10%;">{{language_data('Leave Type')}}</th>
                                    <th style="width: 15%;">{{language_data('Leave From')}}</th>
                                    <th style="width: 15%;">{{language_data('Leave To')}}</th>
                                    <th style="width: 15%;">{{language_data('Status')}}</th>
                                    <th style="width: 20%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leave as $d)
                                    <tr>
                                        <td data-label="{{language_data('Employee Code')}}"><p>
                                                <a href="{{url('employees/view/'.$d->employee_id->id)}}"> {{$d->employee_id->employee_code}}</a>
                                            </p></td>
                                        <td data-label="{{language_data('Name')}}"><p>
                                                {{$d->employee_id->fname}} {{$d->employee_id->lname}}
                                            </p></td>
                                        <td data-label="{{language_data('Leave Type')}}">
                                            <p>{{$d->leave_type->leave}}</p></td>
                                        <td data-label="{{language_data('Leave From')}}">
                                            <p>{{get_date_format($d->leave_from)}}</p></td>
                                        <td data-label="{{language_data('Leave To')}}">
                                            <p>{{get_date_format($d->leave_to)}}</p></td>
                                        @if($d->status=='approved')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Approved')}}</p>
                                            </td>
                                        @elseif($d->status=='pending')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Pending')}}</p>
                                            </td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-danger text-underline">{{language_data('Rejected')}}</p>
                                            </td>
                                        @endif

                                        <td>
                                            <a class="btn btn-success" href="{{url('leave/edit/'.$d->id)}}">
                                                <i class="fa fa-eye"></i> {{language_data('View')}}
                                            </a>
                                            <a href="#" class="btn btn-danger cdelete" id="{{$d->id}}">
                                                <i class="fa fa-trash"></i> {{language_data('Delete')}}
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
    {!! Html::script("assets/js/bootbox.min.js")!!}

    <script>
      $(document).ready(function () {
          /*For DataTable*/
        @if (app_config('Language') == 2)
        $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
        @else
        $('.data-table').DataTable();
          @endif

          /*For Delete Job Info*/
        $(".cdelete").click(function (e) {
          e.preventDefault();
          var id = this.id;
          @if (app_config('Language') == 2)
          bootbox.setLocale("zh_CN");
          @endif
          bootbox.confirm("您确定吗？", function (result) {
            if (result) {
              var _url = $("#_url").val();
              window.location.href = _url + "/leave/delete-leave-application/" + id;
            }
          });
        });

      });
    </script>
@endsection
