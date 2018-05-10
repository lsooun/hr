@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.css") !!}
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Job Applicants')}}</h2>
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
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">{{language_data('Position')}}</th>
                                    <th style="width: 15%;">{{language_data('Name')}}</th>
                                    <th style="width: 15%;">{{language_data('Email')}}</th>
                                    <th style="width: 10%;">{{language_data('Phone')}}</th>
                                    <th style="width: 10%;">{{language_data('Status')}}</th>
                                    <th style="width: 30%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($job_applicants as $d)
                                    <tr>
                                        <td data-label="#">{{$d->id}}</td>
                                        <td data-label="{{language_data('Position')}}">
                                            <p>{{\App\Designation::find($d->jobTitle->position)->designation}}</p></td>
                                        <td data-label="{{language_data('Name')}}"><p>{{$d->name}}</p></td>
                                        <td data-label="{{language_data('Email')}}"><p>{{$d->email}}</p></td>
                                        <td data-label="{{language_data('Phone')}}"><p>{{$d->phone}}</p></td>
                                        @if($d->status=='Unread')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Unread')}}</p></td>
                                        @elseif($d->status=='Primary Selected')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-primary text-underline">{{language_data('Primary Selected')}}</p>
                                            </td>
                                        @elseif($d->status=='Call For Interview')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-complete text-underline">{{language_data('Call For Interview')}}</p>
                                            </td>
                                        @elseif($d->status=='Confirm')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Confirm')}}</p></td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-danger text-underline">{{language_data('Rejected')}}</p></td>
                                        @endif
                                        <td>
                                            <a class="btn btn-complete" href="{{url('jobs/download-resume/'.$d->id)}}">
                                                <i class="fa fa-download"></i> {{language_data('Resume')}}
                                            </a>

                                            {{--<a class="btn btn-success" href="#" data-toggle="modal" data-target=".modal_send_sms_{{$d->id}}"><i class="fa fa-mobile-phone"></i> {{language_data('Send SMS')}}--}}
                                            {{--</a>--}}
                                            {{--@include('admin.modal-send-sms-applicant')--}}

                                            <a data-label="{{$d->id}}" data-email="{{$d->email}}" class="btn btn-primary" href="#"
                                                data-toggle="modal" data-target=".modal_send_email">
                                                <i class="fa fa-envelope"></i> {{language_data('Send Email')}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.modal-send-email-applicant')
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
    {!! Html::script("assets/libs/wysihtml5x/wysihtml5x-toolbar.min.js")!!}
    {!! Html::script("assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.js")!!}
    @if (app_config('Language') == 2)
        {!! Html::script("assets/libs/bootstrap3-wysihtml5-bower/locales/bootstrap-wysihtml5.zh-CN.js")!!}
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

            /*For Delete Application Info*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/jobs/delete-application/" + id;
                    }
                });
            });

          $("[href='#']").click(function (e) {
            var id = $(this).attr('data-label');
            $('#cmd').val(id);
            var email = $(this).attr('data-email');
            $('#email').val(email);
          });

        });
    </script>
@endsection
