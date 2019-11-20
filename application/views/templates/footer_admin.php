<br>
  <p class="text-center " > Aplikasi Penjualan &copy; 2018 by Aldi </p>
  <hr style="border-color:#999; border-style:dashed; ">
      </div>
    </div>
  <div class="overlay"></div>
</body>


<script type="text/javascript">

    $(window).on('load',function(){
      var lebar_browser = $(window).width();
      if (lebar_browser > 576){
        $("#login_sebagai_").html("Your login as admin");
        $("#login_sebagai_").addClass("col-sm-8 navbar-text");
        $("#content").addClass("content");
        $("#content").removeClass("content_mobile");
      }
      else{
        $("#login_sebagai_").html("");
        $("#login_sebagai_").removeClass("col-sm-8 navbar-text");
        $("#content").addClass("content_mobile");
        $("#content").removeClass("content");
      }
    });


    $(document).ready(function () {

      $('#tabel_master').DataTable(
        {
          columnDefs: [
           { type: 'currency', targets: 4 }
         ]
        }
      );

      $(window).resize(function(){
        var lebar_browser = $(window).width();
        if (lebar_browser > 576){
          $("#login_sebagai_").html("Your login as admin");
          $("#login_sebagai_").addClass("col-sm-8 navbar-text");
          $("#content").addClass("content");
          $("#content").removeClass("content_mobile");
        }
        else{
          $("#login_sebagai_").html("");
          $("#login_sebagai_").removeClass("col-sm-8 navbar-text");
          $("#content").addClass("content_mobile");
          $("#content").removeClass("content");
        }
      });

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
            $("#navbar_content").addClass("fixed-top");
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            $("#navbar_content").addClass("fixed-top");
        });
    });
</script>
</html>

<?php if($this->session->flashdata('edit_success')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('edit_success') ?>",
        text: "Edit data successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('add_success')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('add_success') ?>",
        text: "Data added successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('delete_data')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('delete_data') ?>",
        text: "Data deleted successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('create_admin')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('create_admin') ?>",
        text: "Create admin successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('update_admin')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('update_admin') ?>",
        text: "Update admin successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('delete_admin')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('delete_admin') ?>",
        text: "Delete admin successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('delete_user')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('delete_user') ?>",
        text: "Delete user successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>

<?php if($this->session->flashdata('change_password')) : ?>
<script type="text/javascript">
    swal({
        title: "<?= $this->session->flashdata('change_password') ?>",
        text: "Change password successfully ...",
        icon: "success",
        button: "OK",
      });
</script>
<?php endif; ?>
