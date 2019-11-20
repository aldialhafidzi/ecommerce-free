<div class="modal fade bd-example-modal-lg" id="modal_select_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="exampleModalLabel"> <strong>Select Address</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url() ?>cart/selectAddress" method="post">
      <div class="modal-body">

          <div class="form-row">

            <div class="col-sm-12">
              <div class="m-l-20 m-r-20 p-t-15 p-b-5 bo8 p-l-10 p-r-20 p-lr-30-sm al-choose-address">
                Create New Address
              </div>
            </div>

            <?php if($this->session->userdata('u_listaddr')) : ?>
              <?php $i = 1; ?>
              <?php foreach ($this->session->userdata('u_listaddr') as $listaddr ) :?>
                <div class="col-sm-12 p-b-20">
                  <div class="m-l-20 m-r-20 p-t-15 p-b-10 bo8 p-l-10 p-r-20 p-lr-30-sm" style=" border-radius : 1%; border: solid 1px #42b549; min-height : 80px;">
                  <div class="row">

                      <div class="col-sm-8">
                          <div class="p-b-10 col-sm-12 w-size20 w-full-sm">
                            <h6><strong><?= $listaddr['receipt_name'] ?></strong></h6>
                          </div>

                          <div class="s-textaddr p-b-5 col-sm-12">
                            <?= $listaddr['phone'] ?>
                          </div>

                          <div class="s-textaddr p-b-5 col-sm-12">
                            <?= $listaddr['detail_address'] ?>
                          </div>

                          <div class="s-textaddr p-b-5 col-sm-12">
                            <?= ucwords(strtolower($listaddr['n_prov']));  ?>, <?= ucwords(strtolower($listaddr['n_rege'])); ?>, <?= ucwords(strtolower($listaddr['n_dist'])); ?>, <?= ucwords(strtolower($listaddr['postcode'])); ?>
                          </div>
                        </div>



                      <div class="col-sm-4 p-t-40"  >
                        <div class="row">
                          <div class="col-sm-6" align="right" data-toggle="buttons">
                            <?php if($this->session->userdata('id_new_address') == $listaddr['id_u_address']): ?>
                              <label class="btn btn-sm btn-success color_label" style="font-size: 12px; cursor: pointer;">
                            <?php else: ?>
                              <label class="btn btn-sm btn-secondary color_label" style="font-size: 12px; cursor: pointer;">
                            <?php endif; ?>
                              <input value="<?= $listaddr['id_u_address'] ?>" type="radio"  name="addr_" id="addr_<?= $i ?>" checked autocomplete="off"> Select Address
                            </label>

                          </div>
                          <div class="col-sm-6">
                            <button type="button" name="button" class="btn btn-sm btn-danger" style="font-size: 12px;">Delete </button>

                          </div>
                        </div>

                      </div>


                    </div>
                  </div>

              </div>
              <?php $i++; ?>
              <?php endforeach; ?>
            <?php endif; ?>

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
