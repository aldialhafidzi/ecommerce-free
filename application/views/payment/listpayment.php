<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    List Pending Payment
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
            <div class="row">
              <div class="col-sm-12 p-b-20" align="center">
                Complete your payment immediately before the stock runs out.
              </div>

            <?php foreach ($list_pending as $lp ) :?>

              <div class="col-sm-12 box-outer__green" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.10); min-height : 250px;">
                <div class="row p-l-20 p-t-20">
                  <div class="col-sm-8 s-text7">
                    <div class="row">
                      <div class="col-sm-12">
                        Total : <strong style="color :rgb(250, 91, 41);">Rp. <?= $lp->grandtotal ?></strong> | Tanggal Pembelian <strong><?php
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $lp->payment_initial);
                            echo $date->format('D , d F Y , H:i');
                        ?></strong>
                      </div>
                      <div class="col-sm-12 p-t-20 s-text8">
                        Bayar Sebelum <strong><?php
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $lp->payment_limit);
                            echo $date->format('D , d F Y , H:i');
                        ?></strong>
                      </div>
                      <div class="col-sm-12 p-t-20">
                        Metode Pembayaran : Transfer Bank Manual
                      </div>
                      <div class="col-sm-12">

                        Kode Pembayaran : <strong style="color :rgb(250, 91, 41);"><?= $lp->payment_code ?></strong>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 p-t-30">
                    <div class="row">
                      <div class="col-sm-12" align="center">

                        <img  src="<?= base_url(); ?>/public/images/icons/png_bank/<?= $lp->class ?>.png" alt="IMG-<?= $lp->class ?>">

                      </div>
                      <div class="col-sm-12 p-t-30" align="center">
                        <a href="<?= base_url() ?>payment/redirectToConfirmPayment/<?= $lp->tp_id ?>" style="width : 150px;" class="btn btn-success btn-sm" name="button">Confirm Payment</a>
                      </div>
                      <div class="col-sm-12 p-t-5" align="center">
                        <button style="width : 150px;" type="submit" class="btn btn-danger btn-sm" name="button">Cancel Transaction</button>
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
