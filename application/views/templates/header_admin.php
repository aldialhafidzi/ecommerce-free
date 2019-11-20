<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" href="<?= base_url(); ?>/public/images/icons/favicon.png"/>
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/style-gua.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/glyphicons.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/style-que.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/jquerysctipttop.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/node_modules/slim-select/dist/slimselect.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/notify.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/prettify.css">
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/js/datatables/data-tables/css/dataTables.bootstrap4.css" >
    <link rel="stylesheet" href="<?= base_url();?>/public/admin/css/select2.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/util.css">
  	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="<?= base_url();?>/public/admin/js/jquery-3.3.1.js"></script>
    <script src="<?= base_url();?>/public/admin/js/popper.min.js"></script>
    <script src="<?= base_url();?>/public/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>/public/admin/js/script.js"></script>
    <script src="<?= base_url();?>/public/admin/js/notify.js"></script>
    <script src="<?= base_url();?>/public/admin/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url();?>/public/admin/dist/js/BsMultiSelect.js"></script>
    <script src="<?= base_url();?>/public/admin/node_modules/slim-select/dist/slimselect.js"></script>
    <script src="<?= base_url();?>/public/admin/js/bootstrap-multiselect.js"></script>
    <script src="<?= base_url();?>/public/admin/js/datatables/datatables.min.js"></script>
    <script src="<?= base_url();?>/public/admin/js/datatables/absolute.js"></script>
    <script src="<?= base_url();?>/public/admin/js/datatables/sort-currency.js"></script>
    <script src="<?= base_url();?>/public/admin/js/datatables/data-tables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url();?>/public/admin/js/select2.full.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>public/vendor/select2/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>public/vendor/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url();?>/public/js/script_gua.js"></script>


</head>

<body>

  <div class="overlay_admin">

  </div>

    <div class="wrapper">
        <nav id="sidebar">

          <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
          </div>

          <div class="sidebar-header">
            <a class="navbar-brand" href="<?= base_url(); ?>admin" target="_top">
              <img src="<?= base_url(); ?>public/admin/images/logo.png" alt="" height="32px">
            </a>
          </div>

          <ul class="list-unstyled components">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-shopping-cart"></i> &nbsp; Penjualan</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li>
                    <a href="<?= base_url(); ?>public/admin/penjualan"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;  Transaksi</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>public/admin/penjualan/historypenjualan"><i class="fas fa-history"></i>&nbsp;&nbsp;  Histori Penjualan</a>
                  </li>
                  <li>
                    <a href="<?= base_url(); ?>public/admin/penjualan/pelanggan"><i class="fas fa-table"></i>&nbsp;&nbsp;  Data Pelanggan</a>
                  </li>
                </ul>
              </li>

              <hr>
              <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-database"></i> &nbsp; Master</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                      <a href="<?= base_url(); ?>master"><i class="fas fa-cubes"></i>&nbsp;&nbsp;  List Product</a>
                    </li>
                  </ul>
              </li>

              <li>
                <a href="<?= base_url(); ?>admin/listuser"><i class="fas fa-users"></i> &nbsp;  List User</a>
              </li>

              <li>
                <a href="#pembelianmenu" data-toggle="collapse" aria-expanded="false"><i class="far fa-money-bill-alt"></i> &nbsp;  Pembelian</a>
                  <ul class="collapse list-unstyled" id="pembelianmenu">
                    <li>
                      <a href="<?= base_url(); ?>public/admin/pembelian"><i class="fas fa-money-bill-alt"></i>&nbsp;&nbsp;Transaksi</a>
                    </li>
                    <li>
                      <a href="<?= base_url(); ?>public/admin/pembelian/historypembelian"><i class="fas fa-history"></i>&nbsp;&nbsp;Histori Pembelian</a>
                    </li>
                    <li>
                      <a href="<?= base_url(); ?>public/admin/pembelian/supplier"><i class="fas fa-table"></i>&nbsp;&nbsp;Data Pemasok</a>
                    </li>
                  </ul>
              </li>

              <hr>
              <li>
                <a href="#pageLogout" data-toggle="collapse" aria-expanded="false"><i class="fas fa-user-tie"></i> &nbsp;  Admin</a>
                <ul class="collapse list-unstyled" id="pageLogout">
                  <li>
                    <a href="header.php?page=ganti-password"><i class="fas fa-sync-alt"></i>&nbsp;&nbsp; Change Password</a>
                  </li>
                  <li>
                    <a href="<?= base_url();?>login/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="content">

            <nav id="navbar_content" class="navbar navbar-expand-lg navbar-warna bg-navbar fixed-top">
              <div class="row tanda_login">
                <div class="col-sm-4">
                  <a class="navbar-brand" href="<?= base_url() ?>admin" target="_top">
                    <img src="<?= base_url(); ?>public/admin/images/logo.png" alt="" height="32px">
                  </a>
                </div>
                <div id="login_sebagai_"  class="col-sm-8 navbar-text">
                     Your login as <?php if(isset($_SESSION["who_login"])){echo $_SESSION["who_login"];} ?>
                </div>
              </div>

                    <button id="sidebarCollapse"  class="btn btn-primary d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"  aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown" id="p_pending_payment">
                      <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= base_url(); ?>pendingpayment">
                        <i class="fas fa-clipboard-list"></i>
                        &nbsp;Transaction&nbsp;
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>pendingpayment"><i class="fas fa-credit-card"></i>&nbsp;&nbsp;Pending Transaction</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url(); ?>successpayment"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;Success Transaction</a>
                      </div>
                    </li>

                    <li class="nav-item dropdown" id="p_master">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        &nbsp;Master&nbsp;
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>master"><i class="fas fa-cubes"></i>&nbsp;&nbsp;List Product</a>
                      </div>
                    </li>

                    <li class="nav-item dropdown" id="p_list">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        &nbsp;List User / Admin&nbsp;
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>admin/listadmin"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;&nbsp;List Admin</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>admin/listuser"><i class="fas fa-users"></i></i>&nbsp;&nbsp;List User</a>
                      </div>
                    </li>

                  </ul>

                  <form class="form-inline my-2 my-lg-0 navbar-nav ">
                    <div class="nav-item dropdown" id="p_gantipassword">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-tie"></i></span>
                        &nbsp;Admin&nbsp;
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="header.php?page=ganti-password"><i class="fas fa-sync-alt"></i>&nbsp;&nbsp;Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url();?>login/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;Logout&nbsp;</a>
                      </div>
                  </form>

                </div>
              </div>
            </nav>
