<div class="modal fade bd-example-modal-lg" id="modal_acc_pending_payment_" tabindex="-1" role="dialog" aria-labelledby="modal_acc_pending_payment_Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="modal_acc_pending_payment_Label"> <strong>Request</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form_acc_pending_payment" action="<?= base_url() ?>pendingpayment/saveTransaction" method="post" class="needs-validation" novalidate>
          <input type="hidden" name="in_tp_id" id="in_tp_id" value="">
          <div class="form-row">
              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Receipent's Name</label>

                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="text" id="n_user" name="n_user" placeholder="Write full name ...">
                    <div class="invalid-feedback">
                      Plase write a full name ...
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <label class="s-text7 p-l-15" for="">Phone Number</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="phone" id="phone" name="phone" placeholder="Write phone number ...">
                    <div class="invalid-feedback">
                      Please write phone number ...
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <label class="s-text7 p-l-15" for="">Detail Address</label>
                <div class="col-sm-12 m-b-20">
                  <div class="of-hidden">
                    <textarea required class="form-control sizefull s-text7 bo4 size20 p-l-22 p-r-22" autocomplete="off" type="number" id="detail_address" name="detail_address" placeholder="Write detail address like street, home number, building name etc ..."></textarea>
                    <div class="invalid-feedback">
                      Plase write detail address ...
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <table class="table">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>Product</td>
                      <td>Qty</td>
                    </tr>
                  </thead>
                  <tbody id="detail_tr_pending">

                    <tr>
                      <td>1</td>
                      <td>
                        <div class="row">
                          <div class="col-sm-3">
                            <img src="<?= base_url(); ?>public/images/products/man-cap.jpg" class="image_thumb" alt="Cinque Terre" width="50" height="60">

                          </div>
                          <div class="col-sm-9">
                            Cap Base Ball Cap Base sidebarCollapseCap Base Ball

                          </div>
                        </div>
                      </td>
                      <td>10</td>
                    </tr>

                  </tbody>
                </table>
              </div>





          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary coeg_modal" data-dismiss="modal_coeg">Cancel</button>
        <button type="submit"  class="btn btn-sm btn-success">Accept</button>
      </div>
    </form>
    </div>
  </div>
</div>
