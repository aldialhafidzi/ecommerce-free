<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    List Transaction
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">


    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 al-payment">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="row p-t-20">


              <?php foreach ($list_detail_tr as $ld) :?>
                <div class="col-sm-12 p-t-15 p-b-15" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.10); min-height : 120px;">
                  <div class="row">

                    <div class="col-sm-12 s-text7">
                      <div class="row">

                        <div class="col-sm-2">
                          <img src="<?= base_url(); ?>/public/images/products/<?= $ld->source ?>" class="image_thumb" alt="Cinque Terre" width="100" height="100">
                        </div>

                        <div class="col-sm-8">
                          <div class="row p-t-15">
                            <div class="col-sm-12">
                              <h6><strong><?= $ld->name ?></strong></h6>
                            </div>
                            <div class="col-sm-12 p-t-5">
                              <strong><?= $ld->invoice ?></strong> | Detail Transaction
                            </div>
                            <div class="col-sm-12 p-t-5">
                              <strong><?= $ld->confirm_payment_date ?></strong> | Total Pembayaran Rp. <?= $ld->grandtotal ?>
                            </div>
                            <div class="col-sm-12 p-t-5">
                              Status : Order complete
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2 p-t-50" align="center">
                           <button type="button" class="btn btn-sm btn-success" name="button">Success</button>
                        </div>
                        <div class="col-sm-12">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <br>
                </div>
              <?php endforeach; ?>





            </div>

          </div>

          <div class="col-sm-1"></div>
          <br>
        </div>


      </div>

    </div>


  </div>
</section>
