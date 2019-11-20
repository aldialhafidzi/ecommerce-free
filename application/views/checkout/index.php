<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    Checkout
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">

    <h2>Checkout</h2>
    <br>

    <div class="row">
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12" style="min-height: 275px;">
            <table class="table" style="width : 100%;">
              <?php $subtotal = 0; ?>
              <?php foreach ($product as $pr) : ?>
                <tr>
                  <td align="center" style="border: 1px solid #e6e6e6; ">
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                      <img src="<?= base_url(); ?>public/images/products/<?= $pr->source ?>" alt="IMG-PRODUCT">
                    </div>
                  </td>
                  <td style="border: 1px solid #e6e6e6; ">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4><?= $pr->name ?></h4>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-sm-6">
                        <?php if ($pr->discount > 0) : ?>
                          <strong style="text-decoration: line-through #000; font-size:12px; padding-right:1rem;">IDR <?php echo ($pr->price * $pr->qty); ?></strong>
                          <strong>IDR <?php echo ($pr->price * $pr->qty *$pr->discount); ?></strong>
                        <?php else : ?>
                          <strong>IDR <?php echo ($pr->price * $pr->qty); ?></strong>
                        <?php endif; ?>
                      </div>
                      <div class="col-sm-6">
                        <?php if ($pr->discount) : ?>
                          <strong style="color: #e65540;">Discount <?php echo ($pr->discount * 100); ?>%</strong>
                        <?php endif; ?>
                      </div>
                      <div class="col-sm-4 s-text8">
                        Qty : <?= $pr->qty ?>
                      </div>
                      <div class="col-sm-8 s-text8">
                        Weight : 10 gr
                      </div>
                    </div>

                  </td>
                </tr>
                <?php if ($pr->discount) {
                    $subtotal = $subtotal + ($pr->price * $pr->qty * $pr->discount);
                  } else {
                    $subtotal = $subtotal + ($pr->price * $pr->qty);
                  } ?>

              <?php endforeach; ?>
            </table>
          </div>


          <div class="col-sm-12">
            <div class=" p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.10); min-height : 350px;">

              <div class="row">
                <div class="col-sm-12">
                  <label for="">Shipping Address</label>
                  <hr>
                </div>

                <input form="form_payment" type="hidden" name="shipping_id" id="shipping_id" value="<?= $user[0]->id_u_address ?>">
                <div id="name_phone" class="p-b-10 col-sm-12 s-text18 w-size20 w-full-sm">
                  <?php if ($this->session->userdata('id_new_address')) : ?>
                    <?= $user[0]->receipt_name ?> - <?= $user[0]->phone ?>
                  <?php else : ?>
                    <?= $user[0]->n_user ?> - <?= $user[0]->phone ?>
                  <?php endif; ?>
                </div>

                <div id="detail_addr" class="p-b-10 col-sm-12">
                  <?= $user[0]->detail_address ?>
                </div>

                <div id="district_addr" class="p-b-10 col-sm-12">
                  <?= ucwords(strtolower($user[0]->n_dist)); ?>, <?= ucwords(strtolower($user[0]->n_rege)); ?>, <?= ucwords(strtolower($user[0]->n_prov)); ?>, <?= ucwords(strtolower($user[0]->postcode)); ?>
                </div>



                <div class="col-sm-12">
                  <br>
                  <a style="color : rgb(242, 16, 63);" id="change_address" href="">Change Address</a>
                  <input type="hidden" name="id_u_addr" id="id_u_addr" value="<?= $this->session->userdata('id_new_address') ?>">
                </div>



                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6" align="right">
                          <div class="size10 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
                            <button id="select_address" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#modal_select_address" data-backdrop="static" data-keyboard="false">
                              Select Address
                            </button>
                          </div>
                        </div>

                        <div class="col-sm-6" align="right">
                          <div class="size10 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
                            <button id="new_address" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
                              New Address
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>

      </div>

      <div class="col-sm-4">

        <div class="row">
          <div class="col-sm-12" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.10); min-height:250px;">
            <br>
            <label for="">Delivery Service :</label>
            <hr>

            <span class="s-text7 w-size19 w-full-sm">
              Courier
            </span>
            <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
              <select form="form_payment" id="courier" class="selection-courier sizefull s-text7 p-l-22 p-r-22" name="courier">
                <option value="">Select courier...</option>
                <?php foreach ($courier as $cr) : ?>
                  <option value="<?= $cr->id ?>"><?= $cr->name ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('courier'); ?>
            </div>

            <span class="s-text7 w-size19 w-full-sm">
              Time Expedition
            </span>

            <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
              <select form="form_payment" id="courier_exp" class="selection-courier_exp sizefull s-text7 p-l-22 p-r-22" name="courier_exp">
                <option value="">Select a service...</option>
                <?php foreach ($expedition as $exp) : ?>
                  <option value="<?= $exp->id ?>"><?= $exp->name ?> (<?= $exp->exp_day ?>)</option>
                <?php endforeach; ?>
              </select>
              <?= form_error('courier_exp'); ?>
            </div>

            <span id="cek_exp" class="s-text7 w-size19 w-full-sm" style="color : rgb(218, 34, 34);">

            </span>
            <br>
          </div>

          <div class="col-sm-12">
            <br>
          </div>

          <div class="col-sm-12" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.10); min-height : 350px;">
            <br>
            <label for="">Shipping Summary :</label>
            <hr>

            <div class="row">

              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-6">
                    Subtotal
                  </div>
                  <div class="col-sm-6" align="right">
                    <strong id="subtotal">IDR <?= $subtotal ?></strong>
                    <input type="hidden" name="in_subtotal" id="in_subtotal" value="<?= $subtotal ?>">
                  </div>
                </div>
              </div>

              <div id="shipping_panel" class="col-sm-12">
              </div>

              <div id="grandtotal_panel" class="col-sm-12">
              </div>


            </div>

            <br>
            <br>
            <div class="row">
              <div align="center" class="col-sm-12">
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                  <button type="button" id="btn_paynow" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Pay Now
                  </button>
                </div>
                <br>
              </div>

            </div>
          </div>
        </div>




      </div>



    </div>




    <!-- <div class="flex-w  p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">



    </div> -->

  </div>
</section>