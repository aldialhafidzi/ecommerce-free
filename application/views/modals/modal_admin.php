<div class="modal fade bd-example-modal-lg" id="modal_admin" tabindex="-1" role="dialog" aria-labelledby="modal_adminLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="modal_adminLabel"> <strong>Create User</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form_admin" action="" method="post">
          <input type="hidden" name="u_id" id="u_id" value="">
          <div class="form-row">

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Username</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="text" id="u_uname" name="u_uname" placeholder="Write username ...">
                    <div class="invalid-feedback">
                      Plase write username ...
                    </div>
                  </div>
                  <?= form_error('u_uname'); ?>
                </div>
              </div>

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Name</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="text" id="u_name" name="u_name" placeholder="Write a full name ...">
                    <div class="invalid-feedback">
                      Plase write a full name ...
                    </div>
                  </div>
                  <?= form_error('u_name'); ?>
                </div>
              </div>

              <div class="col-sm-4">
                <label class="s-text7 p-l-15" for="">Phone Number</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="phone" id="u_phone" name="u_phone" placeholder="Write phone number ...">
                    <div class="invalid-feedback">
                      Please write phone number ...
                    </div>
                  </div>
                  <?= form_error('u_phone'); ?>
                </div>
              </div>

              <div class="col-sm-4">
                <label class="s-text7 p-l-15" for="">E-mail</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="email" id="u_email" name="u_email" placeholder="Write E-mail ...">
                    <div class="invalid-feedback">
                      Please write e-mail ...
                    </div>
                  </div>
                  <?= form_error('u_email'); ?>
                </div>
              </div>

              <div class="col-sm-4">
                <label class="s-text7 p-l-15" for="">Access</label>
                <div class="col-sm-12 m-b-20">

                  <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                    <select id="u_access" class="select_address sizefull s-text7 p-l-22 p-r-22" name="u_access">
                      <?php foreach ($access as $acc): ?>
                        <option value="<?= $acc->id ?>"><?= $acc->name ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?= form_error('u_access'); ?>
                  <div id="dropdownAccess"></div>
                  <div class="invalid-feedback">
                    Please select access ...
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="row" id="form_password">

                  <div class="col-sm-6">
                    <label class="s-text7 p-l-15" for="">Password</label>
                    <div class="col-sm-12 m-b-20">
                      <div class="bo4 size15">
                        <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" id="u_password" name="u_password" placeholder="Write a password ...">
                        <div class="invalid-feedback">
                          Please write a password ...
                        </div>
                      </div>
                      <?= form_error('u_password'); ?>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label class="s-text7 p-l-15" for="">Re-Type Password</label>
                    <div class="col-sm-12 m-b-20">
                      <div class="bo4 size15">
                        <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" id="u_rpassword" name="u_rpassword" placeholder="Write again a passowrd ...">
                        <div class="invalid-feedback">
                          Please re-type a password ...
                        </div>
                      </div>
                      <?= form_error('u_rpassword'); ?>
                    </div>
                  </div>

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
