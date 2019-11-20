<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    Cart
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">
    <!-- Cart item -->
    <div class="container-table-cart pos-relative">
      <div class="wrap-table-shopping-cart bgwhite">
          <table class="table-shopping-cart">
            <tr class="table-head">
              <th class="column-1"></th>
              <th class="column-2">Product</th>
              <th class="column-2">Price</th>
              <th class="column-2">Quantity</th>
              <th class="column-2">Total</th>
              <th class="column-3">Action</th>
            </tr>

            <form id="form_cart" action="<?= base_url(); ?>cart/updateCart" method="post">

              <?php $subtotal = 0; ?>
              <?php foreach ($product as $pr) : ?>
                <tr class="table-row">
                  <td class="column-1">
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                      <img src="<?= base_url(); ?>public/images/products/<?= $pr->source ?>" alt="IMG-PRODUCT">
                    </div>
                  </td>
                  <td class="column-2"><?= $pr->name ?></td>
                  <td class="column-3">IDR <?= $pr->price ?></td>
                  <td class="column-4">
                    <div class="flex-w bo5 of-hidden w-size17">
                      <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                      </button>


                      <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?= $pr->qty ?>">
                      <input type="hidden" name="product_id[]" class="product_id" value="<?= $pr->id ?>">
                      <input type="hidden" name="qty_product[]" class="qty_product" value="<?= $pr->qty ?>">
                      <input type="hidden" name="product_price" id="product_price" value="<?= $pr->price ?>">



                      <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                      </button>
                    </div>
                  </td>
                  <?php if ($pr->discount > 0) : ?>
                    <td class="column-5" id="sub_total">IDR <?php echo ($pr->qty * $pr->price * $pr->discount); ?></td>
                  <?php else : ?>
                    <td class="column-5" id="sub_total">IDR <?php echo ($pr->qty * $pr->price); ?></td>
                  <?php endif; ?>
                  <td><a href="<?= base_url(); ?>cart/removeCart/<?= $pr->id ?>" style="color: red;">Remove</a></td>
                </tr>
                <?php $subtotal += $pr->qty * $pr->price ?>
              <?php endforeach; ?>
            </form>



          </table>
      </div>
    </div>



    <div class=" p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
      <div class="row ">

        <!-- <div class="flex-w flex-m w-full-sm">
          <div class="size11 bo4 m-r-10">
            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
          </div>

          <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
              Apply coupon
            </button>
          </div>
        </div> -->
        <div class="col-sm-12" align="right">
          <div class="size10 trans-0-4 m-t-10 m-b-10">
            <button type="submit" form="form_cart" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
              Update Cart
            </button>
          </div>



        </div>

        <div class="col-sm-12">
          <div class="size11 trans-0-4 m-t-10 m-b-10">
            <a href="<?= base_url(); ?>cart/checkout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
              Proceed to Checkout
            </a>
          </div>
        </div>

      </div>

    </div>

    </form>

    <!-- Total -->

    <!-- <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
      <h5 class="m-text20 p-b-24">
        Cart Totals
      </h5>

      <div class="flex-w flex-sb-m p-b-12">
        <span class="s-text18 w-size19 w-full-sm">
          Subtotal:
        </span>

        <span id="subtotal" class="m-text21 w-size20 w-full-sm">
          IDR <?= $subtotal ?>
        </span>
        <input type="hidden" name="in_subtotal" id="in_subtotal" value="<?= $subtotal ?>">
      </div>


      <div class="flex-w flex-sb bo10 p-t-15 p-b-20">

        <span class="s-text18 w-size19 w-full-sm">
          Shipping:
        </span>

        <div class="w-size20 w-full-sm">
          <p class="s-text8 p-b-23">
            There are no shipping methods available. Please double check your address, or contact us if you need any help.
          </p>

            <label class="s-text19" for="my_address">
              <input checked="checked" type="radio" id="my_address" name="address" value="my_address">
              My Address
            </label>
          <div id="panel_my_address">
            <div class="size20 bo4 m-b-22">
              <textarea class="sizefull s-text7 size20 p-l-22 p-r-22" type="text" name="address_shipping" >
                <?php foreach ($address as $addr) : ?>
                  <?php echo $addr->address . ', ' . $addr->n_dist . ', ' . $addr->n_rege . ', ' . $addr->n_prov; ?>
                <?php endforeach; ?>
              </textarea>
              <?= form_error('my_address'); ?>
            </div>
          </div>

          <div class="size13 m-b-22">
              <label class="s-text19" for="other_address">
                <input type="radio" id="other_address" name="address" value="other_address">
                Other Address
              </label>
            <?= form_error('postcode'); ?>
          </div>


          <div id="panel_other_address">

            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
              <select id="province" class="selection-2" name="province">
                <option>Select a province...</option>
                <?php foreach ($provinces as $prov) : ?>
                  <option value="<?= $prov->id ?>"><?= $prov->name ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('province'); ?>
            </div>

            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
              <select id="regency" class="selection-2" name="regency">
                <option>Select a regency...</option>
              </select>
              <?= form_error('regency'); ?>
            </div>

            <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
              <select id="district" class="selection-2" name="district">
                <option>Select a district...</option>
              </select>
              <?= form_error('district'); ?>
            </div>

            <div class="size13 bo4 m-b-22">
              <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
              <?= form_error('postcode'); ?>
            </div>

            <div class="size13 bo4 m-b-22">
              <textarea class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address_detail" placeholder="Address Detail"></textarea>
              <?= form_error('address_detail'); ?>
            </div>

          </div>




            <br>
            <div class="size14 trans-0-4 m-b-10">
              <button type="button" id="btn_shipping" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Update Totals
              </button>
            </div>


        </div>




      </div>

      <div class="flex-w flex-sb-m p-t-26 p-b-30">
        <span class="m-text22 w-size19 w-full-sm">
          Total:
        </span>

        <span id="grandtotal" class="m-text21 w-size20 w-full-sm">
          IDR <?= $subtotal  ?>
        </span>
        <input type="hidden" id="in_grandtotal" name="in_grandtotal" value="<?= $subtotal ?>">
      </div>

      <div class="size15 trans-0-4">
        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
          Proceed to Checkout
        </button>
      </div>


    </div> -->

  </div>
</section>