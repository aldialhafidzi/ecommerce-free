
  <body>
    <div align="center" class="p-l-20 p-r-20">
      <div class="col-md-6" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);">
        <div class="p-b-30 m-t-30 p-r-30 p-l-30">
          <div class="panel-default">
            <form class="leave-comment" action="" method="post">
              <h4 class="m-text26 p-b-36 p-t-15">
                <img src="<?= base_url(); ?>/public/images/icons/logo.png" alt="IMG-LOGO" width="40%">
              </h4>
              <h2>Register Form</h2>
              <br>

              <div align="left">
                <!-- <small class="form-text text-danger"><?= form_error('passwordconfirm'); ?></small> -->
                <div class="row">
                  <div class="col-sm-6 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="text" name="firstname" placeholder="First Name">
                    </div>
                    <?= form_error('firstname'); ?>
                  </div>

                  <div class="col-sm-6 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="text" name="lastname" placeholder="Last Name">
                    </div>
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="text" name="username" placeholder="Username">
                    </div>
                    <?= form_error('username'); ?>
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="phone" name="phone" placeholder="Phone Number">
                    </div>
                    <?= form_error('phone'); ?>
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="email" name="email" placeholder="Your E-mail">
                    </div>
                    <?= form_error('email'); ?>
                  </div>

                  <div class="col-sm-12 m-b-20">
                    Address :
                  </div>

                  <div class="col-sm-6 m-b-20">
                    <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                      <select id="province" class="selection-prov sizefull s-text7 p-l-22 p-r-22" name="province">
                        <option value="">Select a province...</option>
                        <?php foreach ($provinces as $prov ):?>
                          <option value="<?= $prov->id ?>"><?= $prov->name ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('province'); ?>
                    </div>
                  </div>

                  <div class="col-sm-6 m-b-20">
                    <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                      <select id="regency" class="selection-reg sizefull" name="regency">
                        <option>Select a regency...</option>
                        <?php foreach ($regencies as $regency ):?>
                          <option value="<?= $regency->id ?>"><?= $regency->name ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('regency'); ?>
                    </div>
                  </div>

                  <div class="col-sm-6 m-b-20">
                    <div class="rs2-select2 rs3-select2 rs4-select2 bo3 of-hidden size15">
                      <select id="district" class="selection-dist sizefull" name="district">
                        <option>Select a district...</option>
                      </select>
                      <?= form_error('district'); ?>
                    </div>
                  </div>



                  <div class="col-sm-6 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="number" name="postcode" placeholder="Postcode / Zip">
                    </div>
                      <?= form_error('postcode'); ?>
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo3 of-hidden ">
                      <textarea class="sizefull s-text7 size20 p-l-22 p-r-22" autocomplete="off" type="text" name="detail_address" placeholder="Detail Address"></textarea>
                    </div>
                      <?= form_error('detail_address'); ?>
                  </div>


                  <div class="col-sm-12 m-b-20">
                    Password :
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" name="password" placeholder="Password">
                    </div>
                    <?= form_error('password'); ?>
                  </div>


                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" name="passwordconfirm" placeholder="Retype Your Password">
                    </div>
                    <?= form_error('passwordconfirm'); ?>
                  </div>
                </div>
              </div>
              <br>
              <div align="center" style="color : rgb(222, 24, 48);">
                <?php echo $this->session->flashdata('msg');?>
              </div>


              <div class="w-size25">
                <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                  Create
                </button>
              </div>
              <br>
              <div align="center">
                  Already Have an Account ? <a href="<?= base_url(); ?>login">Log In</a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <br>
      <br>
        <p class="text-center"> Hat-Store  &copy; 2018 All Right Reserved by Aldi </p>

        <hr style="border-color:#999; border-style:dashed;">


    </div>
