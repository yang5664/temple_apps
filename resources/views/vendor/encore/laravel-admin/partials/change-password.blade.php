<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- form -->
      <form role="form" action="{{ Admin::url('auth/changePassword') }}" class="bootstrap-modal-form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">修改密碼</h4>
      </div>
      <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group has-feedback 1">
          <input type="password" class="form-control" placeholder="密碼" name="old_password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback 1">
          <input type="password" class="form-control" placeholder="密碼" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback 1">
          <input type="password" class="form-control" placeholder="請再次輸入新密碼" name="password_confirmation">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('admin::lang.cancel') }}</button>
        <button type="submit" class="btn btn-primary">{{ Lang::get('admin::lang.submit') }}</button>
      </div>
      </form>
      <!-- end of form -->
    </div>
  </div>
</div>