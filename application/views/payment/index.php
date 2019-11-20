<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    Payment
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">


    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 al-payment">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-12 p-b-20" align="center">
                Complete your payment immediately before the stock runs out.
              </div>

              <div class="col-sm-12 box-outer__green p-b-20" align="center">
                The rest of your payment time
                <br>
                <br>
                <div class="row">
                  <div class="col-sm-1">

                  </div>
                  <div class="col-sm-10" align="center">
                    <h5 id="time_left_payment"></h5>
                    <?php if($this->session->userdata('ses_t_pending_id')) : ?>
                      <?php foreach ($t_pending as $tp):?>
                        <input type="hidden" name="time_payment" id="time_payment" value="<?= $tp->payment_limit ?>">
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-1">

                  </div>
                  <br>
                  <br>
                </div>
                <?php foreach ($t_pending as $tp):?>
                  <?php
                      $date = DateTime::createFromFormat('Y-m-d H:i:s', $tp->payment_limit);
                      echo $date->format('D , d F Y - H:i');
                  ?>

              </div>

              <div class="col-sm-12 p-t-20">
                <div class="row">
                  <div class="col-sm-12 al-payment" align="center">
                    <div class="row">
                      <div class="col-sm-12">
                        <i class="sprite-small sprite-<?= $tp->class ?>"></i>
                      </div>
                      <div class="col-sm-12 p-b-20">
                        <?= $tp->name ?> Transfer
                      </div>
                      <div class="col-sm-12">
                        <strong><?= $tp->account_number ?></strong>
                      </div>
                      <div class="col-sm-12">
                        <strong>Hatstore E-commerce</strong>
                      </div>
                    </div>

                  </div>
                </div>
              </div>



                <div class="col-sm-12 p-t-20">

                  <div class="row">
                    <div class="col-sm-6">
                      Payment Code :
                    </div>
                    <div class="col-sm-6">
                      <strong><?= $tp->payment_code ?></strong>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12 p-t-20">
                  <div class="row">
                    <div class="col-sm-6">
                      Amount to be paid :
                    </div>
                    <div class="col-sm-6">
                      <strong style="color : rgb(250, 91, 41);">Rp. <?= $tp->grandtotal ?></strong>
                    </div>
                  </div>

                </div>

                <?php endforeach; ?>

                <div class="col-sm-12 p-t-20">
                  <a style="color : #ffffff;" href="<?= base_url() ?>cart/confirmpay/<?= $tp->tp_id ?>">
                    <button type="button" class="form-control btn btn-success" name="button">
                      Confirm Your Payment
                    </button>
                  </a>
                </div>
            </div>

          </div>

          <div class="col-sm-3"></div>
          <br>
        </div>


      </div>

    </div>


  </div>
</section>
