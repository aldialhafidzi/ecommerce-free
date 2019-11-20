<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    Confirm Payment
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">


    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 al-payment">
        <div class="row">
          <div class="col-sm-12 p-b-20" align="center">
            Please upload your proof of payment on this form.
          </div>

          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8  p-b-20" align="center">
                <div class="row">
                  <div class="col-sm-12 box-outer__green">
                    <form id="save_payment" action="<?= base_url() ?>cart/confirmpay/<?= $tp_id ?>" method="post" enctype="multipart/form-data">
                      <input required type="file" class="form-control" name="input_file_proof" id="input_file_proof" value="" onchange="readURL(this);">
                      <?= form_error('input_file_proof'); ?>
                    </form>
                  </div>

                  <div class="col-sm-12 p-t-20">
                    <div class="row">
                      <div class="col-sm-12 al-payment">

                          <img id="my_proof_payment" src="#" alt="Proof of your payment" class="jangan-muncul" />

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 p-t-20">
                      <input type="submit" form="save_payment" class="form-control btn btn-success" value="Submit" name="upload_proof">
                  </div>

                </div>
              </div>
              <div class="col-sm-2"></div>


            </div>
          </div>


        </div>
      </div>
    </div>


  </div>
</section>
