
  <body>
    <div align="center" class="p-l-20 p-r-20">
      <div class="col-md-6" style="background-color : #f7f7f7; border-radius : 2%; box-shadow: 0px 6px 10px 0px rgba(0,0,0,0.25);">
        <div class="p-b-30 m-t-30 p-r-30 p-l-30">
          <div class="panel-default">
            <form class="leave-comment" action="" method="post">
              <h4 class="m-text26 p-b-36 p-t-15">
                <img src="<?= base_url(); ?>/public/images/icons/logo.png" alt="IMG-LOGO" width="40%">
              </h4>
              <h2>Change Password</h2>
              <br>

              <div align="left">
                <!-- <small class="form-text text-danger"><?= form_error('passwordconfirm'); ?></small> -->
                <div class="row">

                  <div class="col-sm-12 m-b-20">
                    Email :
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="email" name="email" placeholder="Your E-mail">
                    </div>
                    <?= form_error('email'); ?>
                  </div>


                  <div class="col-sm-12 m-b-20">
                    Password :
                  </div>

                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" name="old_password" placeholder="Old Password">
                    </div>
                    <?= form_error('old_password'); ?>
                  </div>


                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" name="password" placeholder="New Password">
                    </div>
                    <?= form_error('password'); ?>
                  </div>


                  <div class="col-sm-12 m-b-20">
                    <div class="bo4 of-hidden size15">
                      <input class="sizefull s-text7 p-l-22 p-r-22" autocomplete="off" type="password" name="passwordconfirm" placeholder="Retype Your New Password">
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
                  Change
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
