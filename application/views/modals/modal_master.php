<div class="modal fade bd-example-modal-lg" id="modal_master" tabindex="-1" role="dialog" aria-labelledby="modal_masterLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title p-l-15" id="modal_masterLabel"> <strong>Edit Product</strong></h5>
        <button type="button" class="close coeg_modal" data-dismiss="modal_coeg" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="form_product" action="<?= base_url() ?>master/updateProduct" method="post" enctype="multipart/form-data">
          <div class="form-row">

            <div class="col-sm-6">
              <label class="s-text7 p-l-15" for="">Product Code</label>
              <div class="col-sm-12 m-b-20">
                <div class="bo4 size15">
                  <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="text" id="p_code" name="p_code" placeholder="Plase Write code product ...">
                  <?= form_error('p_code'); ?>
                  <div class="invalid-feedback">
                    Please write code product...
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label class="s-text7 p-l-15" for="">Product Name</label>

              <div class="col-sm-12 m-b-20">
                <div class="bo4 size15">
                  <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="text" id="p_name" name="p_name" placeholder="Write full name ...">
                  <?= form_error('p_name'); ?>
                  <div class="invalid-feedback">
                    Plase write a product name ...
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="s-text7 p-l-15" for="">Type</label>
              <div class="col-sm-12 m-b-20">
                <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                  <select id="p_type" class="select_address sizefull s-text7 p-l-22 p-r-22" name="p_type">
                    <?php foreach ($types as $tp) : ?>
                      <option value="<?= $tp->id ?>"><?= $tp->name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <?= form_error('p_type'); ?>
                <div id="dropdownType"></div>
                <div class="invalid-feedback">
                  Please select color ...
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="s-text7 p-l-15" for="">Categori</label>
              <div class="col-sm-12 m-b-20">
                <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                  <select id="p_categori" class="select_address sizefull s-text7 p-l-22 p-r-22" name="p_categori">
                    <?php foreach ($categories as $cat) : ?>
                      <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <?= form_error('p_categori'); ?>
                <div id="dropdownCategori"></div>
                <div class="invalid-feedback">
                  Please select color ...
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="s-text7 p-l-15" for="">Color</label>
              <div class="col-sm-12 m-b-20">
                <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                  <select id="p_color" class="select_address sizefull s-text7 p-l-22 p-r-22" name="p_color">
                    <option value="black">Black</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="orange">Orange</option>
                    <option value="red">Red</option>
                    <option value="white">White</option>
                    <option value="yellow">Yellow</option>
                  </select>
                </div>
                <?= form_error('p_color'); ?>
                <div id="dropdownColor"></div>
                <div class="invalid-feedback">
                  Please select color ...
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="s-text7 p-l-15" for="">Stock</label>
              <div class="col-sm-12 m-b-20">
                <div class="bo4 size15">
                  <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="number" id="p_stock" name="p_stock" placeholder="Write product stock ...">
                  <?= form_error('p_stock'); ?>
                  <div class="invalid-feedback">
                    Please write product stock ...
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label class="s-text7 p-l-15" for="p_featured">Featured</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" id="p_featured" name="p_featured" aria-label="Checkbox for following text input">
                    <?= form_error('p_featured'); ?>
                  </div>
                </div>
                <input for="p_featured" type="text" class="form-control s-text7" value="Jadikan Featured ?" aria-label="Text input with checkbox" disabled>
              </div>
              <div class="invalid-feedback">
                Please write price product...
              </div>
            </div>

            <input type="hidden" name="p_id" id="p_id" value="">


            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <label class="s-text7 p-l-15" for="">Price Product</label>
                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 size15">
                      <input required class="form-control sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="number" id="p_price" name="p_price" placeholder="Plase Write price product ...">
                      <?= form_error('p_price'); ?>
                      <div class="invalid-feedback">
                        Please write price product...
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label class="s-text7 p-l-15" for="">Discount</label>
                  <div class="col-sm-12 m-b-20">
                    <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                      <select id="p_discount" class="select_discount sizefull s-text7 p-l-22 p-r-22" name="p_discount">
                        <option value=""></option>
                        <option value="0.1">10%</option>
                        <option value="0.2">20%</option>
                        <option value="0.3">30%</option>
                        <option value="0.4">40%</option>
                        <option value="0.5">50%</option>
                        <option value="0.6">60%</option>
                        <option value="0.7">70%</option>
                      </select>
                    </div>
                    <?= form_error('p_discount'); ?>
                    <div id="dropdownColor"></div>
                    <div class="invalid-feedback">
                      Please select color ...
                    </div>
                  </div>
                </div>
              </div>
            </div>






            <div class="col-sm-12">
              <label class="s-text7 p-l-15" for="">Image</label>
              <div class="col-sm-12 m-b-20">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image 1</th>
                      <th>Image 2</th>
                      <th>Image 3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td width="33%">
                        <div class="row">
                          <div class="col-sm-12" align="center">
                            <img id="img_p1" src="<?= base_url(); ?>public/images/products/man-cap.jpg" class="image_thumb" alt="Cinque Terre" width="90" height="100">
                          </div>
                          <div class="col-sm-12 p-t-10">
                            <input type="file" class="form-control sizefull s-text7" id="p_image1" name="p_image1" value="" onchange="readURLMasterImage1(this);">
                          </div>
                        </div>
                      </td>
                      <td width="33%">
                        <div class="row">
                          <div class="col-sm-12" align="center">
                            <img id="img_p2" src="<?= base_url(); ?>public/images/products/man-cap.jpg" class="image_thumb" alt="Cinque Terre" width="90" height="100">
                          </div>
                          <div class="col-sm-12 p-t-10">
                            <input type="file" class="form-control sizefull s-text7" id="p_image2" name="p_image2" value="" onchange="readURLMasterImage2(this);">
                          </div>
                        </div>
                      </td>
                      <td width="33%">
                        <div class="row">
                          <div class="col-sm-12" align="center">
                            <img id="img_p3" src="<?= base_url(); ?>public/images/products/man-cap.jpg" class="image_thumb" alt="Cinque Terre" width="90" height="100">
                          </div>
                          <div class="col-sm-12 p-t-10">
                            <input type="file" class="form-control sizefull s-text7" id="p_image3" name="p_image3" value="" onchange="readURLMasterImage3(this);">
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <p class="statusMsg"></p>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="s-text7 p-l-15" for="">Description Product</label>
              <div class="col-sm-12 m-b-20">
                <div class="of-hidden">
                  <textarea required class="form-control sizefull s-text7 bo4 size20 p-l-22 p-r-22" autocomplete="off" type="number" id="p_description" name="p_description" placeholder="Write detail address like street, home number, building name etc ..."></textarea>
                  <div class="invalid-feedback">
                    Plase write description product ...
                  </div>
                </div>
              </div>
            </div>

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary coeg_modal" data-dismiss="modal_coeg">Cancel</button>
        <button type="submit" class="btn btn-sm btn-success submit_form_master">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#p_color").select2({
    minimumResultsForSearch: 5,
    dropdownParent: $('#dropdownColor')
  });

  $("#p_categori").select2({
    minimumResultsForSearch: 5,
    dropdownParent: $('#dropdownCategori')
  });

  $("#p_type").select2({
    minimumResultsForSearch: 5,
    dropdownParent: $('#dropdownType')
  });

  $("#p_discount").select2({
    minimumResultsForSearch: 5,
    dropdownParent: $('#dropdownType')
  });
</script>