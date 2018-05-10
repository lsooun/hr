@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Department')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">

            @include('notification.notify')
            <div class="row">

                <div class="col-lg-4">
                    <div class="panel">
                        <div style="height: 15px">&nbsp;</div>
                        <div class="panel-body">
                            <form class="" role="form" action="{{url('departments/add')}}" method="post">
                                <div class="form-group">
                                    <label>{{language_data('Department Name')}}</label>
                                    <span class="help">{{language_data('e.g.')}} "{{language_data('Account Department')}}"</span>
                                    <input type="text" class="form-control" required name="department">
                                </div>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-success pull-right">
                                    <i class="fa fa-plus"></i> {{language_data('Add')}} </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="panel">
                        <div style="height: 15px">&nbsp;</div>
                        <div class="panel-body p-none">
                            <table class="table data-table table-hover table-ultra-responsive">
                                <thead>
                                <tr>
                                    <th style="width: 55%;">{{language_data('Department Name')}}</th>
                                    <th style="width: 35%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $d)
                                    <tr>
                                        <td data-label="{{language_data('Department Name')}}"><p>{{$d->department}}</p></td>
                                        <td>
                                            <a class="btn btn-success" href="#" data-toggle="modal" data-target=".modal_edit_department_{{$d->id}}">
                                                <i class="fa fa-edit"></i> {{language_data('Edit')}}
                                            </a>
                                            @include('admin.modal-edit-department')

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
            @if (app_config('Language') == 2)
             $('.data-table').DataTable({"language": {"url": "/assets/libs/data-table/Chinese.json"}});
            @else
            $('.data-table').DataTable();
            @endif

            /*For Delete Department*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/departments/delete/" + id;
                    }
                });
            });

        });
    </script>
@endsection