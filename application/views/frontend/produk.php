<!-- Start Bottom Header -->
<div class="header-bg page-area">
  <div class="home-overly"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider-content text-center">
          <div class="header-bottom">
            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
              <h1 class="title2">Produk Kami</h1>
            </div>
            <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
              <h2 class="title3">Kreasi Santri Untuk Negeri</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Header -->
<div class="blog-page area-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="page-head-blog">
          <div class="single-blog-page">
            <!-- search option start -->
            <form action="<?php echo base_url('Produk/search') ?>" method="post">
              <div class="search-option">
                <input type="text" name="keyword" placeholder="Search...">
                <button class="button" name="search" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
            <!-- search option end -->
          </div>
          <div class="single-blog-page">
            <!-- recent start -->
            <div class="left-blog">
              <h4>recent post</h4>
              <div class="recent-post">
                <!-- start single post -->
                <?php foreach ($produk_terbaru as $probar) : ?>
                  <div class="recent-single-post">
                    <div class="post-img">
                      <a href="<?php echo base_url('Produk/produk_detail/' . $probar->id_produk); ?>">
                        <img src="<?php echo base_url('backend/img/' . $probar->gambar1) ?>" alt="">
                      </a>
                    </div>
                    <div class="pst-content">
                      <a href="<?php echo base_url('Produk/produk_detail/' . $probar->id_produk) ?>"><?= $probar->nama_produk ?>
                      </a>
                      <p><?php echo $probar->tanggal; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
                <!-- End single post -->
              </div>
            </div>
            <!-- recent end -->
          </div>
          <div class="single-blog-page">
            <div class="left-blog">
              <h4>Kategori</h4>
              <ul>
                <?php foreach ($kategori as $k) : ?>
                  <li>
                    <a href="<?php echo base_url('Produk/filter_per_kategori/' . $k->id_kategori . '/' . $k->kategori) ?>"><?= $k->kategori ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End left sidebar -->
      <!-- Start single blog -->
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <?php foreach ($produk as $pro) : ?>
              <div class="single-blog">
                <div class="single-blog-img">
                  <img src="<?php echo base_url('/backend/img/' . $pro['gambar1']) ?>" alt="" />
                </div>

                <div class="blog-meta">
                  <span class="comments-type">
                    <i class="fa fa-cubes"></i>
                    <a href="#">Kategori :<?= $pro['kategori'] ?></a>
                  </span>
                  <span class="date-type">
                    <i class="fa fa-calendar"></i>Tanggal :<?php echo $pro['tanggal'] ?>
                  </span>
                </div>
                <div class="blog-text">
                  <h4>
                    <a href="<?php echo base_url('Produk/produk_detail/' . $pro['id_produk']) ?>"><?php echo $pro['nama_produk'] ?></a>
                  </h4>
                  <p>
                    <?php echo word_limiter($pro['isi_produk'], 100); ?>
                  </p>
                </div>
                <span>
                  <a href="<?php echo base_url('Produk/produk_detail/' . $pro['id_produk']) ?>" class="ready-btn">Selengkapnya</a>
                </span>
              </div>
            <?php endforeach; ?>
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- End Blog Area -->
<div class="clearfix"></div>