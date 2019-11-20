<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">

			<div class="item-slick1 item1-slick1" style="background-image: url(<?= base_url(); ?>/public/images/home/master-slide-01.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						Wardah Collection 2018
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
						New arrivals
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
						<!-- Button -->
						<a href="<?= base_url(); ?>shop"" class=" flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item2-slick1" style="background-image: url(<?= base_url(); ?>/public/images/home/master-slide-02.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
						Women Collection 2018
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						New arrivals
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
						<!-- Button -->
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url(<?= base_url(); ?>/public/images/home/master-slide-03.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						Women Collection 2018
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						New arrivals
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
						<!-- Button -->
						<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- Banner -->


<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Featured Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">


				<?php foreach ($featured as $fp) : ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<?php if ($fp['discount']) : ?>
								<?php $disc = $fp['discount'] * 100 ?>
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-label-discount block2-label-discount-<?= $disc ?>">
								<?php else : ?>
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<?php endif; ?>
									<img src="<?= base_url(); ?>/public/images/products/<?= $fp['source'] ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addtocart">
												Add to Cart
											</button>
											<input type="hidden" id="product_id" name="product_id" value="<?= $fp['id'] ?>">
											<input type="hidden" id="product_name" name="product_name" value="<?= $fp['name'] ?>">
										</div>
									</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
											<?= $fp['name'] ?>
										</a>

										<span class="block2-price m-text6 p-r-5" style="color : rgb(242, 21, 123)">
											Rp <?= $fp['price'] ?>
										</span>
									</div>
								</div>
						</div>
					<?php endforeach; ?>

					</div>
			</div>

		</div>
</section>

<!-- Banner2 -->
<section class="banner2 bg5 p-t-55 p-b-55">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
				<div class="hov-img-zoom pos-relative">
					<img src="<?= base_url(); ?>/public/images/banner-08.jpg" alt="IMG-BANNER">

					<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
						<span class="m-text9 p-t-45 fs-20-sm">
							The Beauty
						</span>

						<h3 class="l-text1 fs-35-sm">
							Lookbook
						</h3>

						<a href="#" class="s-text4 hov2 p-t-20 ">
							View Collection
						</a>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
				<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
					<img src="<?= base_url(); ?>/public/images/shop-item-09.jpg" alt="IMG-BANNER">

					<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
						<div class="t-center">
							<a href="product-detail.html" class="dis-block s-text3 p-b-5" style="color:#fff;">
								Gafas sol Hawkers one
							</a>

							<span class="block2-oldprice m-text7 p-r-5" style="color:#fff;">
								$29.50
							</span>

							<span class="block2-newprice m-text8" style="color:yellow;">
								$15.90
							</span>
						</div>

						<div class="flex-c-m p-t-44 p-t-30-xl">
							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 days">
									69
								</span>

								<span class="s-text5">
									days
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 hours">
									04
								</span>

								<span class="s-text5">
									hrs
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 minutes">
									32
								</span>

								<span class="s-text5">
									mins
								</span>
							</div>

							<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
								<span class="m-text10 p-b-1 seconds">
									05
								</span>

								<span class="s-text5">
									secs
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Blog -->


<!-- Instagram -->


<!-- Shipping -->
<section class="shipping bgwhite p-t-62 p-b-46">
	<div class="flex-w p-l-15 p-r-15">
		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
			<h4 class="m-text12 t-center">
				Free Delivery Worldwide
			</h4>

			<a href="#" class="s-text11 t-center">
				Click here for more info
			</a>
		</div>

		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
			<h4 class="m-text12 t-center">
				30 Days Return
			</h4>

			<span class="s-text11 t-center">
				Simply return it within 30 days for an exchange.
			</span>
		</div>

		<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
			<h4 class="m-text12 t-center">
				Store Opening
			</h4>

			<span class="s-text11 t-center">
				Shop open from Monday to Sunday
			</span>
		</div>
	</div>
</section>