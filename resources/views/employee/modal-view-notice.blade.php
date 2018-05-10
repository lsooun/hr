<div class="modal fade modal_view_notice_{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{language_data('View')}} {{language_data('Notice Board')}}</h4>
            </div>
            <form class="form-some-up form-block">

                <div class="modal-body">
                    <div class="form-group">
                        <label>{{language_data('Title')}} :</label>
                        <p>{{$d->title}}</p>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>{{language_data('Published Date')}} :</label>
                        <p>{{get_date_format($d->updated_at)}}</p>
                    </div>

                    <br>
                    <div class="form-group">
                        <label>{{language_data('Description')}} :</label>
                        {!!$d->description!!}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{language_data('Close')}}</button>
                </div>

            </form>
        </div>
    </div>

</div>

