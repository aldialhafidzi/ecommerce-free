<div class="modal fade" id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row p-l-20 p-r-20">
          <div class="col-sm-12 payment p-t-15 p-t-15 p-b-15">
            <h5><strong id="modal_grandtotal">Rp. 64.000</strong></h5>
          </div>
          <div class="col-sm-12 p-t-15 p-t-15 p-b-15">

          </div>

          <div class="col-sm-12 payment p-t-15 p-t-15 p-b-15">
            Transfer Bank
          </div>

          <div class="col-sm-12 payment p-t-15 p-t-15 p-b-15">

            <div class="row">
              <div class="col-12 p-b-15">
                <div class="list-group" id="list-tab" role="tablist">

                  <?php foreach ($banks as $bank ) :?>
                    <a class="list-group-item list-group-item-action bank-transfer" namabank="<?= $bank->name ?>" kelas="<?= $bank->class?>" value="<?= $bank->id ?>" id="list-<?= $bank->class?>-list" data-toggle="list" href="#list-bank" role="tab" aria-controls="bank">
                      <div class="row">
                        <div class="col-sm-5">
                          <i class="sprite-small sprite-<?= $bank->class ?>"></i>
                        </div>
                        <div class="col-sm-7">
                          Bank <?= $bank->name ?>
                        </div>
                      </div>
                    </a>
                  <?php endforeach; ?>


                </div>
              </div>

              <div class="col-12 p-t-15 p-b-15">
                <div class="tab-content" id="nav-tabContent">
                  <input form="form_payment" type="hidden" id="bank_transfer" name="bank_transfer" value="">


                    <div class="tab-pane fade" id="list-bank" role="tabpanel" aria-labelledby="list-bank-list">
                      <form id="form_payment" action="<?= base_url() ?>cart/checkout" method="post">
                      <div class="row">

                        <div class="col-sm-12 p-l-35 p-r-35 p-b-15">
                          <div class="row">
                            <div class="col-sm-12 p-t-15 payment">
                              <div class="row">
                                <div id="t_namabank" class="col-sm-8">
                                  Transfer Bank BNI
                                </div>
                                <div class="col-sm-4 p-t-5" align="right">
                                  <i id="l_bank" class="sprite-small"></i>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>



                          <div class="col-sm-12">
                            <label class="s-text7 p-l-15" for="">Account Number</label>
                            <div class="col-sm-12 m-b-20">
                              <div class="bo4 size15">
                                <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="number" id="account_number" name="account_number" placeholder="Account Number...">
                                <div class="invalid-feedback">
                                  Plase write a full name ...
                                </div>
                                <?= form_error('account_number'); ?>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-12">
                            <label class="s-text7 p-l-15" for="">Name of Account Holder</label>
                            <div class="col-sm-12 m-b-20">
                              <div class="bo4 size15">
                                <input required class="form-control sizefull s-text7 p-l-22 p-r-22"  autocomplete="off" type="text" id="account_name" name="account_name" placeholder="Account Name...">
                                <div class="invalid-feedback">
                                  Plase write a full name ...
                                </div>
                                <?= form_error('account_name'); ?>
                              </div>
                            </div>
                          </div>


                      </div>
                    </form>
                    </div>

                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary coeg_modal" data-dismiss="modal_coeg">Close</button>
        <button type="submit" form="form_payment" class="btn btn-sm btn-success">Pay</button>
      </div>

    </div>
  </div>
</div>
