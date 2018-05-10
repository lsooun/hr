@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Expense List')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add-new-expense">
                                <i class="fa fa-plus"></i> {{language_data('Add New Expense')}}</button>
                            <br>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 20%;">{{language_data('Item Name')}}</th>
                                    <th style="width: 20%;">{{language_data('Purchase From')}}</th>
                                    <th style="width: 10%;">{{language_data('Purchase Date')}}</th>
                                    <th style="width: 10%;">{{language_data('Amount')}}</th>
                                    <th style="width: 10%;">{{language_data('Status')}}</th>
                                    <th style="width: 25%;" class="text-right">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expense as $d)
                                    <tr>
                                        <td data-label="#">{{$d->id}}</td>
                                        <td data-label="{{language_data('Item Name')}}"><p>{{$d->item_name}}</p></td>
                                        <td data-label="{{language_data('Purchase From')}}"><p>{{$d->purchase_from}}</p></td>
                                        <td data-label="{{language_data('Purchase Date')}}"><p>{{get_date_format($d->purchase_date)}}</p></td>
                                        <td data-label="{{language_data('Amount')}}"><p>{{app_config('Currency')}} {{$d->amount}}</p></td>
                                        @if($d->status=='Approved')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Approved')}}</p></td>
                                        @elseif($d->status=='Pending')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Pending')}}</p></td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-danger text-underline">{{language_data('Cancel')}}</p></td>
                                        @endif

                                        <td class="text-right">

                                            @if($d->bill_copy != '')
                                                <a class="btn btn-complete" href="{{url('expense/download-bill-copy/'.$d->id)}}"><i class="fa fa-download"></i> {{language_data('Bill Copy')}}
                                                </a>
                                            @endif
                                            <a class="btn btn-success" href="{{url('expense/edit/'.$d->id)}}"><i class="fa fa-edit"></i> {{language_data('Edit')}}
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

            <!-- Modal -->
            <div class="modal fade" id="add-new-expense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{language_data('Add New Expense')}}</h4>
                        </div>
                        <form class="form-some-up" role="form" method="post" action="{{url('expense/post-new-expense')}}" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>{{language_data('Item Name')}}</label>
                                    <input type="text" class="form-control" required="" name="item_name">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Purchase From')}}</label>
                                    <input type="text" class="form-control" required="" name="purchase_from">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Purchase By')}}</label>
                                    <select name="emp_name" class="form-control selectpicker" data-live-search="true">
                                        @foreach($employee as $e)
                                            <option value="{{$e->id}}">{{$e->fname}} {{$e->lname}} ({{$e->employee_code}})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Purchase Date')}}</label>
                                    <input type="text" class="form-control datePicker" required="" name="purchase_date">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Amount')}}</label>
                                    <input type="text" class="form-control" name="amount">
                                </div>

                                <div class="form-group m-none">
                                    <label for="e20">{{language_data('Status')}}</label>
                                    <select name="status" class="form-control selectpicker">
                                        <option value="Pending">{{language_data('Pending')}}</option>
                                        <option value="Approved">{{language_data('Approved')}}</option>
                                        <option value="Cancel">{{language_data('Cancel')}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Select Document')}}</label>
                                    <div class="input-group input-group-file">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                {{language_data('Browse')}}
                                                <input type="file" class="form-control" name="bill_copy">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{language_data('Close')}}</button>
                                <button type="submit" class="btn btn-primary">{{language_data('Add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/moment/moment-with-locales.min.js")!!}
    {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
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
                        window.location.href = _url + "/expense/delete-expense/" + id;
                    }
                });
            });

        });
    </script>
@endsection
