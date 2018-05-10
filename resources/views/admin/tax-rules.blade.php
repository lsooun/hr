@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Tax Rules')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#add-new-award">
                                <i class="fa fa-plus"></i> {{language_data('Add Tax Rule')}}</button>
                            <br>
                        </div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 40%;">{{language_data('Tax Rules')}}</th>
                                    <th style="width: 20%;">{{language_data('Status')}}</th>
                                    <th style="width: 30%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tax_rules as $tx)
                                    <tr>
                                        <td data-label="#">{{$tx->id}}</td>
                                        <td data-label="{{language_data('Tax Rules')}}"><p>{{$tx->tax_name}}</p></td>
                                        @if($tx->status=='active')
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-success text-underline">{{language_data('Active')}}</p></td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <p class="bold text-warning text-underline">{{language_data('Inactive')}}</p></td>
                                        @endif
                                        <td>

                                            <a class="btn btn-success" style="margin-bottom: 5px" href="#"
                                               data-toggle="modal"
                                               data-target=".modal_edit_tax_rules_{{$tx->id}}">
                                                <i class="fa fa-edit"></i> {{language_data('Edit')}}
                                            </a>
                                            @include('admin.modal-edit-tax-rules')

                                            <a class="btn btn-complete" style="margin-bottom: 5px" href="{{url('tax-rules/set-rules/'.$tx->id)}}"><i class="fa fa-list"></i> {{language_data('Set Rules')}}
                                            </a>
                                            <a class="btn btn-danger cdelete" style="margin-bottom: 5px" id="{{$tx->id}}" href="#" >
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

            <!-- Modal -->
            <div class="modal fade" id="add-new-award" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{language_data('Add Tax Rule')}}</h4>
                        </div>
                        <form class="form-some-up" role="form" method="post" action="{{url('tax-rules/post-new-tax')}}">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>{{language_data('Tax Rule Name')}}</label>
                                    <input type="text" class="form-control" required="" name="tax_rule_name">
                                </div>

                                <div class="form-group m-none">
                                    <label for="e20">{{language_data('Status')}}</label>
                                    <select name="status" class="form-control selectpicker" data-live-search="true">
                                        <option value="active">{{language_data('Active')}}</option>
                                        <option value="inactive">{{language_data('Inactive')}}</option>
                                    </select>
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
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/js/form-elements-page.js")!!}
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
                        window.location.href = _url + "/tax-rules/delete-tax-rule/" + id;
                    }
                });
            });

        });
    </script>
@endsection
