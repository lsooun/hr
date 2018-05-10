@extends('master')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/data-table/datatables.min.css") !!}
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Employee Roles')}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">

                <div class="col-lg-4">
                    <div class="panel">
                        <div class="panel-body">
                            <form class="" role="form" method="post" action="{{url('employees/add-roles')}}">
                                <div style="height: 15px">&nbsp;</div>
                                <div class="form-group">
                                    <label>{{language_data('Role Name')}}</label>
                                    <input type="text" class="form-control" required name="role_name">
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Status')}}</label>
                                    <select class="selectpicker form-control" name="status">
                                        <option value="Active">{{language_data('Active')}}</option>
                                        <option value="Inactive">{{language_data('Inactive')}}</option>
                                    </select>
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
                                    <th style="width: 40%;">{{language_data('Role Name')}}</th>
                                    <th style="width: 15%;">{{language_data('Status')}}</th>
                                    <th style="width: 35%;">{{language_data('Actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emp_roles as $er)
                                    <tr>
                                        <td data-label="{{language_data('Role Name')}}"><p>{{$er->role_name}}</p></td>
                                        @if($er->status=='Active')
                                            <td data-label="{{language_data('Status')}}">
                                                <span class="bold text-success text-underline">{{language_data('Active')}}</span>
                                            </td>
                                        @else
                                            <td data-label="{{language_data('Status')}}">
                                                <span class="bold text-danger text-underline">{{language_data('Inactive')}}</span>
                                            </td>
                                        @endif
                                        <td>
                                            <a class="btn btn-success" style="margin-bottom: 5px" href="#" data-toggle="modal"
                                               data-target=".modal_edit_employee_roles_{{$er->id}}">
                                                <i class="fa fa-edit"></i> {{language_data('Edit')}}
                                            </a>
                                            @include('admin.modal-edit-employee-roles')
                                            <a class="btn btn-complete" style="margin-bottom: 5px" href="{{url('employees/set-roles/'.$er->id)}}">
                                                <i class="fa fa-list"></i> {{language_data('Set Roles')}}
                                            </a>

                                            <a class="btn btn-danger cdelete" style="margin-bottom: 5px" href="#" id="{{$er->id}}">
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

            /*For Delete Designation*/
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                @if (app_config('Language') == 2)
                bootbox.setLocale("zh_CN");
                @endif
                bootbox.confirm("您确定吗？", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = _url + "/employees/delete-roles/" + id;
                    }
                });
            });

        });
    </script>
@endsection
