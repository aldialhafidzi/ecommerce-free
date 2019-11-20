<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $judul ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url(); ?>/public/images/icons/favicon.png" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/fonts/elegant-font/html-css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/select2/select2.min.css">
	<!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'> -->
	<!-- <link data-require="select2@*" data-semver="3.5.1" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.css" />
	<link data-require="select2@*" data-semver="3.5.1" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2-bootstrap.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/lightbox2/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/css/css_gua.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/vendor/noui/nouislider.min.css">
</head>
<div class="overlay"></div>

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">


			<div class="wrap_header" style="background-color:#74ddf5bd;">
				<!-- Logo -->
				<a href="<?= base_url(); ?>" class="logo">
					<img src="<?= base_url(); ?>/public/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">

						<ul class="main_menu">
							<?php if ($page === 'home') : ?>
								<li class="sale-noti">
									<a style="color:#000;" href="<?= base_url(); ?>">Home</a>
								</li>
							<?php else : ?>
								<li>
									<a style="color:#fff;" href="<?= base_url(); ?>">Home</a>
								</li>
							<?php endif; ?>

							<?php if ($page === 'shop') : ?>
								<li class="sale-noti">
									<a style="color:#000;" href="<?= base_url(); ?>shop">Shop</a>
								</li>
							<?php else : ?>
								<li>
									<a style="color:#fff;" href="<?= base_url(); ?>shop">Shop</a>
								</li>
							<?php endif; ?>

							<?php if ($page === 'contact') : ?>
								<li class="sale-noti">
									<a style="color:#000;" href="<?= base_url(); ?>contact">Contact</a>
								</li>
							<?php else : ?>
								<li>
									<a style="color:#fff;" href="<?= base_url(); ?>contact">Contact</a>
								</li>
							<?php endif; ?>

							<?php if ($page === 'about') : ?>
								<li class="sale-noti">
									<a style="color:#000;" href="<?= base_url(); ?>about">About</a>
								</li>
							<?php else : ?>
								<li>
									<a style="color:#fff;" href="<?= base_url(); ?>about">About</a>
								</li>
							<?php endif; ?>
						</ul>

					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<!-- <a href="#" class="header-wrapicon1 dis-block"> -->
					<?php if ($this->session->userdata('masuk') == TRUE) : ?>
						<a href="#" class="sale-noti js-show-header-dropdown1"><?= $this->session->userdata('ses_nama'); ?> &nbsp;</a>
						<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('ses_user_id'); ?>">

					<?php endif; ?>
					<img src="<?= base_url(); ?>/public/images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown1" alt="ICON">

					<div class="header-cart header-dropdown1">

						<div class="row">
							<div class="col-sm-12">

								<?php if ($this->session->userdata('masuk') == TRUE) : ?>
									<ul class="list-group">
										<a href="<?= base_url() ?>payment" class="list-group-item d-flex justify-content-between align-items-center">
											Pending Payments
											<span class="badge badge-black badge-pill">
												<?= $this->session->userdata('ses_count_pp') ?>
											</span>
										</a>
										<a href="<?= base_url() ?>user" class="list-group-item d-flex justify-content-between align-items-center">
											List of transactions
											<span class="badge badge-black badge-pill">
												<?= $this->session->userdata('ses_count_lt') ?>
											</span>
										</a>
									</ul>
								<?php endif; ?>


							</div>
						</div>
						<br>

						<div class="header-cart-buttons">
							<?php if ($this->session->userdata('masuk') == TRUE) : ?>
								<div class="col-sm-12">
									<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
										<a href="<?= base_url(); ?>login/logout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Logout
										</a>
									</div>
								</div>

							<?php endif; ?>

							<?php if ($this->session->userdata('masuk') != TRUE) : ?>
								<div class="col-sm-12">
									<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
										<a href="<?= base_url(); ?>login" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Login
										</a>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($this->session->userdata('masuk') == TRUE) : ?>
								<div class="col-sm-12">
									<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
										<a href="<?= base_url(); ?>login/changepassword" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Change Password
										</a>
									</div>
								</div>
							<?php endif; ?>

							<?php if ($this->session->userdata('masuk') != TRUE) : ?>
								<div class="col-sm-12">
									<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
										<a href="<?= base_url(); ?>login/register" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Register
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>

					</div>

					<!-- </a> -->
					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="<?= base_url(); ?>/public/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
							<?php if ($this->session->userdata('carts')) : ?>
								<?= count($this->session->userdata('carts')); ?>
							<?php else : ?>
								0
							<?php endif; ?>
						</span>

						<div class="header-cart header-dropdown1">
							<div class="row">
								<div class="col-sm-12">
									<?php if ($this->session->userdata('masuk') == TRUE) : ?>
										<ul class="list-group">
											<a href="<?= base_url() ?>payment" class="list-group-item d-flex justify-content-between align-items-center">
												Pending Payments
												<span class="badge badge-black badge-pill">
													<?= $this->session->userdata('ses_count_pp') ?>
												</span>
											</a>
											<a href="<?= base_url() ?>user" class="list-group-item d-flex justify-content-between align-items-center">
												List of transactions
												<span class="badge badge-black badge-pill">
													<?= $this->session->userdata('ses_count_lt') ?>
												</span>
											</a>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<br>

							<div class="header-cart-buttons">
								<?php if ($this->session->userdata('masuk') == TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/logout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Logout
											</a>
										</div>
									</div>

								<?php endif; ?>

								<?php if ($this->session->userdata('masuk') != TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Login
											</a>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($this->session->userdata('masuk') == TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/changepassword" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Change Password
											</a>
										</div>
									</div>
								<?php endif; ?>

								<?php if ($this->session->userdata('masuk') != TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/register" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Register
											</a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="header-cart header-dropdown">

							<?php if ($this->session->userdata('carts')) : ?>
								<ul class="header-cart-wrapitem">
									<?php $total = 0; ?>
									<?php $i = 0; ?>
									<?php foreach ($_SESSION['carts'] as $list) : ?>
										<?php $total += $_SESSION['carts'][$i]['price'] * $_SESSION['carts'][$i]['qty']; ?>
										<li class="header-cart-item">
											<div class="header-cart-item-img">
												<img src="<?= base_url(); ?>public/images/products/<?= $_SESSION['carts'][$i]['source'] ?>" alt="IMG">
											</div>
											<div class="header-cart-item-txt">
												<a href="#" class="header-cart-item-name">
													<?= $_SESSION['carts'][$i]['name'] ?>
												</a>
												<span class="header-cart-item-info">
													<?= $_SESSION['carts'][$i]['qty'] ?> x <?= $_SESSION['carts'][$i]['price'] ?>
												</span>
											</div>
										</li>
										<?php $i++; ?>
									<?php endforeach; ?>
								</ul>

								<div class="header-cart-total">
									Total: IDR <?= $total ?>
								</div>
							<?php endif; ?>



							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?= base_url(); ?>cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?= base_url(); ?>cart/checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?= base_url(); ?>" class="logo-mobile">
				<img src="<?= base_url(); ?>/public/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<?php if ($this->session->userdata('masuk') == TRUE) : ?>
						<a href="#" class="sale-noti js-show-header-dropdown1"><?= $this->session->userdata('ses_nama'); ?> &nbsp;</a>
						<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('ses_user_id'); ?>">

					<?php endif; ?>
					<a href="#" class="header-wrapicon1 dis-block js-show-header-dropdown1">
						<img src="<?= base_url(); ?>/public/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?= base_url(); ?>/public/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">
							<?php if ($this->session->userdata('carts')) : ?>
								<?= count($this->session->userdata('carts')); ?>
							<?php else : ?>
								0
							<?php endif; ?>
						</span>

						<div class="header-cart header-dropdown1">
							<div class="row">
								<div class="col-sm-12">
									<?php if ($this->session->userdata('masuk') == TRUE) : ?>
										<ul class="list-group">
											<a href="<?= base_url() ?>payment" class="list-group-item d-flex justify-content-between align-items-center">
												Pending Payments
												<span class="badge badge-black badge-pill">
													<?= $this->session->userdata('ses_count_pp') ?>
												</span>
											</a>
											<a href="<?= base_url() ?>user" class="list-group-item d-flex justify-content-between align-items-center">
												List of transactions
												<span class="badge badge-black badge-pill">
													<?= $this->session->userdata('ses_count_lt') ?>
												</span>
											</a>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							<br>

							<div class="header-cart-buttons">
								<?php if ($this->session->userdata('masuk') == TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/logout" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Logout
											</a>
										</div>
									</div>

								<?php endif; ?>

								<?php if ($this->session->userdata('masuk') != TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Login
											</a>
										</div>
									</div>
								<?php endif; ?>
								<?php if ($this->session->userdata('masuk') == TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/changepassword" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Change Password
											</a>
										</div>
									</div>
								<?php endif; ?>

								<?php if ($this->session->userdata('masuk') != TRUE) : ?>
									<div class="col-sm-12">
										<div class="size15 trans-0-4 m-t-10 m-b-10 p-l-10 p-r-10">
											<a href="<?= base_url(); ?>login/register" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
												Register
											</a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<div class="header-cart header-dropdown">
							<?php if ($this->session->userdata('carts')) : ?>
								<ul class="header-cart-wrapitem">
									<?php $total = 0; ?>
									<?php $i = 0; ?>
									<?php foreach ($_SESSION['carts'] as $list) : ?>
										<?php $total += $_SESSION['carts'][$i]['price'] * $_SESSION['carts'][$i]['qty']; ?>
										<li class="header-cart-item">
											<div class="header-cart-item-img">
												<img src="<?= base_url(); ?>public/images/products/<?= $_SESSION['carts'][$i]['source'] ?>" alt="IMG">
											</div>
											<div class="header-cart-item-txt">
												<a href="#" class="header-cart-item-name">
													<?= $_SESSION['carts'][$i]['name'] ?>
												</a>
												<span class="header-cart-item-info">
													<?= $_SESSION['carts'][$i]['qty'] ?> x <?= $_SESSION['carts'][$i]['price'] ?>
												</span>
											</div>
										</li>
										<?php $i++; ?>
									<?php endforeach; ?>
								</ul>

								<div class="header-cart-total">
									Total: IDR <?= $total ?>
								</div>
							<?php endif; ?>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<a href="" <?= base_url(); ?>cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<a href="<?= base_url(); ?>cart/checkout" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu">
			<nav class="side-menu">
				<ul class="main-menu">

					<!-- <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li> -->

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="<?= base_url(); ?>">Home</a>
						<ul class="sub-menu">
							<li><a href="<?= base_url(); ?>">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="shop">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="shop">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>