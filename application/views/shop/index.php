<section class="bgwhite p-t-55 p-b-65">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <div class="leftbar p-r-20 p-r-0-sm">
          <!--  -->
          <h4 class="m-text14 p-b-7">
            Categories
          </h4>

          <ul class="p-b-54">
            <li class="p-t-4">
              <a href="<?= base_url(); ?>shop/" class="s-text13 active1">
                All
              </a>
            </li>

            <li class="p-t-4">
              <a href="<?= base_url(); ?>shop/makeover" class="s-text13">
                Make Over
              </a>
            </li>

            <li class="p-t-4">
              <a href="<?= base_url(); ?>shop/emina" class="s-text13">
                Emina
              </a>
            </li>

            <li class="p-t-4">
              <a href="<?= base_url(); ?>shop/pixy" class="s-text13">
                Pixy
              </a>
            </li>

            <li class="p-t-4">
              <a href="<?= base_url(); ?>shop/wardah" class="s-text13">
                Wardah
              </a>
            </li>

          </ul>

          <!--  -->
          <h4 class="m-text14 p-b-32">
            Filters
          </h4>


          <div class="filter-price p-t-22 p-b-50 bo3">
            <div class="m-text15 p-b-17">
              Price
            </div>

            <div class="wra-filter-bar">
              <div id="filter-bar"></div>
            </div>

            <div class="flex-sb-m flex-w p-t-16">
              <div class="w-size11">
                <!-- Button -->
                <button id="filter_products" class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                  Filter
                </button>
              </div>

              <div class="s-text3 p-t-10 p-b-10">
                Range: IDR<span id="value-lower">0</span> - IDR<span id="value-upper">500000</span>
              </div>
              <input type="hidden" id="valueLow" name="valueLow" value="0">
              <input type="hidden" id="valueHigh" name="valueHigh" value="500000">
            </div>
          </div>

          <div class="filter-color p-t-22 p-b-50 bo3">
            <div class="m-text15 p-b-12">
              Color
            </div>

            <ul class="flex-w">
              <li class="m-r-10">
                <input value="green" class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter">
                <label class="color-filter color-filter1" for="color-filter1"></label>
              </li>

              <li class="m-r-10">
                <input value="blue" class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter">
                <label class="color-filter color-filter2" for="color-filter2"></label>
              </li>

              <li class="m-r-10">
                <input value="yellow" class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter">
                <label class="color-filter color-filter3" for="color-filter3"></label>
              </li>

              <li class="m-r-10">
                <input value="red" class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter">
                <label class="color-filter color-filter4" for="color-filter4"></label>
              </li>

              <li class="m-r-10">
                <input value="brown" class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter">
                <label class="color-filter color-filter5" for="color-filter5"></label>
              </li>

              <li class="m-r-10">
                <input value="black" class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter">
                <label class="color-filter color-filter6" for="color-filter6"></label>
              </li>

              <li class="m-r-10">
                <input value="gray" class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter">
                <label class="color-filter color-filter7" for="color-filter7"></label>
              </li>
            </ul>
          </div>



          <form action="<?= base_url(); ?>shop" method="post">
            <div class="search-product pos-relative bo4 of-hidden">
              <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">
              <button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>

        </div>
      </div>

      <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
        <!--  -->
        <div class="flex-sb-m flex-w p-b-35">
          <div class="flex-w">
            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
              <select onchange="location = '<?= base_url(); ?>shop/'+this.value;" class="selection-2" name="sorting">
                <option>Default Sorting</option>
                <option>Popularity</option>

                <?php if ($sort) : ?>
                  <?php if ($sort === 'lowtohigh') : ?>
                    <option value="lowtohigh" selected>Price: low to high</option>
                  <?php else : ?>
                    <option value="lowtohigh">Price: low to high</option>
                  <?php endif; ?>

                  <?php if ($sort === 'hightolow') : ?>
                    <option value="hightolow" selected>Price: high to low</option>
                  <?php else : ?>
                    <option value="hightolow">Price: high to low</option>
                  <?php endif; ?>
                <?php else : ?>
                  <option value="lowtohigh">Price: low to high</option>
                  <option value="hightolow">Price: high to low</option>
                <?php endif; ?>

              </select>
            </div>

            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
              <select onchange="location = '<?= base_url(); ?>shop/harga/'+this.value;" class="selection-2" name="sorting">
                <option>Price</option>
                <?php if ($sort) : ?>
                  <?php if ($sort === '0-50000') : ?>
                    <option value="0-50000" selected>IDR 0 - IDR 50 000</option>
                  <?php else : ?>
                    <option value="0-50000">IDR 0 - IDR 50 000</option>
                  <?php endif; ?>

                  <?php if ($sort === '50000-100000') : ?>
                    <option value="50000-100000" selected>IDR 50 000 - IDR 100 000</option>
                  <?php else : ?>
                    <option value="50000-100000">IDR 50 000 - IDR 100 000</option>
                  <?php endif; ?>

                  <?php if ($sort === '100000-150000') : ?>
                    <option value="100000-150000" selected>IDR 100 000 - IDR 150 000</option>
                  <?php else : ?>
                    <option value="100000-150000">IDR 100 000 - IDR 150 000</option>
                  <?php endif; ?>

                  <?php if ($sort === '150000-200000') : ?>
                    <option value="150000-200000" selected>IDR 150 000 - IDR 200 000</option>
                  <?php else : ?>
                    <option value="150000-200000">IDR 150 000 - IDR 200 000</option>
                  <?php endif; ?>

                  <?php if ($sort === '200001') : ?>
                    <option value="200001" selected>IDR 200 000+</option>
                  <?php else : ?>
                    <option value="200001">IDR 200 000+</option>
                  <?php endif; ?>

                <?php else : ?>
                  <option value="0-50000">IDR 0 - IDR 50 000</option>
                  <option value="50000-100000">IDR 50 000 - IDR 100 000</option>
                  <option value="100000-150000">IDR 100 000 - IDR 150 000</option>
                  <option value="150000-200000">IDR 150 000 - IDR 200 000</option>
                  <option value="200001">IDR 200 000+</option>
                <?php endif; ?>

              </select>
            </div>
          </div>

          <span class="s-text8 p-t-5 p-b-5">
            Showing 1 – <?= $jml_per_page ?> of <?= $jumlah_data ?> results
          </span>
        </div>

        <!-- Product -->
        <div class="row" id="view-list-product">

          <?php foreach ($goods as $pr) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
              <div class="block2">
                <?php if ($pr->discount) : ?>
                  <?php $disc = $pr->discount * 100 ?>
                  <div class="block2-img wrap-pic-w of-hidden pos-relative block2-label-discount block2-label-discount-<?= $disc ?>">
                  <?php else : ?>
                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                    <?php endif; ?>

                    <img src="<?= base_url(); ?>public/images/products/<?= $pr->source  ?>" alt="IMG-PRODUCT">
                    <div class="block2-overlay trans-0-4">
                      <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                      </a>
                      <div class="block2-btn-addcart w-size1 trans-0-4">
                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addtocart">
                          Add to Cart
                        </button>
                        <input type="hidden" id="product_id" name="product_id" value="<?= $pr->id ?>">
                        <input type="hidden" id="product_name" name="product_name" value="<?= $pr->name ?>">
                      </div>
                    </div>
                    </div>

                    <div class="block2-txt p-t-20">
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="<?= base_url() ?>detailproduct/index/<?= $pr->id ?>" class="block2-name dis-block s-text3 p-b-5">
                            <?= $pr->name  ?>
                          </a>
                        </div>
                        <div class="col-sm-12">
                          <?php if ($pr->discount > 0) : ?>
                            <span class="block2-price m-text6 p-r-5">
                              <strong style="color : rgb(242, 21, 123); text-decoration: line-through rgb(242, 21, 123); font-size:12px;">
                                IDR <?= $pr->price  ?>
                              </strong>
                            </span>

                            <?php $afterDisc = $pr->discount * $pr->price ?>

                            <span class="block2-price m-text6 p-r-5">
                              <strong style="color : rgb(242, 21, 123);">
                                IDR <?= $afterDisc  ?>
                              </strong>
                            </span>
                          <?php else : ?>
                            <span class="block2-price m-text6 p-r-5">
                              <strong style="color : rgb(242, 21, 123);">
                                IDR <?= $pr->price  ?>
                              </strong>
                            </span>
                          <?php endif; ?>
                        </div>
                      </div>




                    </div>
                  </div>
              </div>
            <?php endforeach; ?>

            </div>

            <!-- Pagination -->

            <div class="pagination flex-m flex-w p-t-26" id="view-pagination">
              <?php echo $this->pagination->create_links(); ?>
              <!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a> -->
              <!-- <a href="#" class="item-pagination flex-c-m trans-0-4">2</a> -->
            </div>
        </div>
      </div>
    </div>
</section>