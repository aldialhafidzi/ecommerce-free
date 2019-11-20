<div class="modal fade bd-example-modal-lg" id="modal_changePassword" tabindex="-1" role="dialog" aria-labelledby="modal_changePasswordLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="modal_changePasswordLabel"> <strong>Change Password</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form_change_password" action="<?= base_url() ?>admin/changepasswordadmin" method="post">
          <input type="hidden" name="user_id_cp" id="user_id_cp" value="<?= $this->session->userdata('ses_user_id') ?>">
          <div class="form-row">

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Old Password</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="password" id="old_password" name="old_password" placeholder="Write old password ...">
                  </div>
                  <?= form_error('old_password'); ?>
                </div>
              </div>

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">New Password</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="password" id="new_password" name="new_password" placeholder="Write new password ...">
                  </div>
                  <?= form_error('new_password'); ?>
                </div>
              </div>

              <div class="col-sm-6">

              </div>

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Rewrite New Password</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="password" id="confirm_password" name="confirm_password" placeholder="Rewrite new password ...">
                  </div>
                  <?= form_error('confirm_password'); ?>
                </div>
              </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary coeg_modal" data-dismiss="modal_coeg">Cancel</button>
        <button type="submit"  class="btn btn-sm btn-success">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script type="text/javascript">

  $("#u_access").select2({
    minimumResultsForSearch: 5,
    dropdownParent: $('#dropdownAccess')
  });

</script>
