<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="exampleModalLabel"> <strong>New Address</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form_new_address" action="<?= base_url() ?>cart/saveAddress" method="post" class="needs-validation" novalidate>
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

              <div class="col-sm-8">
                <label class="s-text7 p-l-15" for="">City Or District</label>
                <div class="col-sm-12 m-b-20">

                  <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                    <select id="district_new_addr" class="select_address sizefull s-text7 p-l-22 p-r-22" name="district_new_addr">
                    </select>
                  </div>
                  <div id="dropDownSelectDistrict"></div>
                  <div class="invalid-feedback">
                    Please select district ...
                  </div>
                  <input type="hidden" name="dist_id" id="dist_id" value="">
                  <input type="hidden" name="prov_id" id="prov_id" value="">
                  <input type="hidden" name="reg_id" id="reg_id" value="">
                </div>
              </div>

              <div class="col-sm-4">
                <label class="s-text7 p-l-15" for="">Post Code</label>
                <div class="col-sm-12 m-b-20">
                  <div class="bo4 size15">
                    <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="postcode" id="postcode" name="postcode" placeholder="Write post code ...">
                    <div class="invalid-feedback">
                      Please write post code ...
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
