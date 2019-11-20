<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>public/images/home/heading-page-01.jpg);">
  <h2 class="l-text2 t-center">
    Thank you for shopping here
  </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
  <div class="container">

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 al-payment">
        <div class="row p-l-15 p-r-15" >

          <div class="col-sm-1"></div>

          <div class="col-sm-10 ">
            <div class="row">
              <div class="col-sm-12 p-b-20" align="center">
                <h2>INVOICE</h2>
                <hr>
              </div>
              <div class="col-sm-12 p-b-20">
                <div class="row">
                  <div class="col-sm-7 s-text7">
                    <div class="row">
                      <div class="col-sm-12">
                        <h5>PT HATSTORE BANDUNG</h5>
                      </div>
                      <div class="col-sm-12">
                        Jl. Gunung Puntang No.30 Pasirmulya Kota Bandung - Jawa Barat

                      </div>
                      <div class="col-sm-12">
                        Telp : 021-123-123-123, Email : hatstore@hatstore.com

                      </div>
                      <div class="col-sm-12">
                        NPWP : 65.123.321.1-123.321

                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="row s-text7">

                      <?php foreach ($payment as $py) :?>
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-3">
                              Invoice
                            </div>
                            <div class="col-sm-9">
                              : <?= $py->invoice ?>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-3">
                              Date
                            </div>
                            <div class="col-sm-9">
                              : <?= $py->confirm_payment_date ?>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-3">
                              Courier
                            </div>
                            <div class="col-sm-9">
                              : <?= $py->c_name ?> <?= $py->cex_name ?> (<?= $py->cex_day ?>)
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-3">
                              Send To
                            </div>
                            <div class="col-sm-9">
                              : <?= $py->detail_address ?> , <?= $py->n_dist ?> <?= $py->postcode ?>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>


                    </div>
                  </div>

                </div>
              </div>

              <div class="col-sm-12">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">
                        <div align="center">
                          Qty
                        </div>
                      </th>
                      <th scope="col">
                        <div align="right">
                          Subtotal
                        </div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($list_shop as $ls ):?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $ls->name ?></td>
                        <td>Rp. <?= $ls->price ?></td>
                        <td align="center"><?= $ls->qty ?></td>
                        <td align="right">Rp. <?php echo ($ls->price * $ls->qty); ?></td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>

              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-12">
                    <hr>
                  </div>
                  <div class="col-sm-12" align="right">

                    <div class="row">
                      <div class="col-sm-6"></div>
                      <div class="col-sm-4">
                        <div class="row">
                          <div class="col-sm-12">
                            <strong>Delivery Service</strong>

                          </div>
                          <div class="col-sm-12">
                            <strong>Grandtotal </strong>

                          </div>
                        </div>

                      </div>

                      <?php foreach ($payment as $py) :?>
                        <div class="col-sm-2">
                          <div class="row">
                            <div class="col-sm-12">
                              <strong>  Rp. <?= $py->price ?></strong>

                            </div>
                            <div class="col-sm-12">
                              <strong>Rp. <?= $py->grandtotal ?></strong>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>


                    </div>

                  </div>

                  <div class="col-sm-12 p-t-20 s-text7">
                    Please save the proof of transaction below, if at any time an error occurs.
                  </div>
                </div>
              </div>

            </div>

          </div>


        </div>
      </div>

      <div class="col-sm-11" align="right">
        <button type="button" class="btn btn-sm btn-success" name="button">Print</button>
      </div>
    </div>


  </div>
</section>
