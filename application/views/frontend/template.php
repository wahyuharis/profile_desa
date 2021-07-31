<?php
$ci = &get_instance();
$sprites_res = $ci->db->get('sprites')->result_array();
// print_r2($slider);
$sprites = array();
foreach ($sprites_res as $row) {
  $sprites[$row['name']] = $row;
}

// print_r2($sprites);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title ?> </title>

  <meta name="image" content="<?= base_url($meta_img) ?>" />
  <meta property="og:image" content="<?= base_url($meta_img)  ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="icon" href="<?= base_url() ?>assets/logo_admin.ico">
  <link rel="stylesheet" href="<?= base_url() ?>node_modules/bootstrap/dist/css/bootstrap-materia.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/custom.css">

  <script src="<?= base_url() ?>node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>node_modules/knockout/build/output/knockout-latest.js"></script>
  <script src="<?= base_url() ?>fontawesome/js/all.min.js"></script>
</head>

<body>
  <header class="header-top-dark d-none d-md-block d-lg-block pt-2 pb-1" style="height: 40px;">
    <!-- <header class="bg-dark  pt-2 pb-1 text-white" style="height: 40px;"> -->
    <div class="container">
      <div class="row">
        <div class="col-6">
          <img src="<?= base_url('assets/uploads/files/' . $sprites['top_header']['img']) ?>" style="width:20px;height: 20px;margin-top: -2px;">
          &nbsp;
          <?= $sprites['top_header']['caption'] ?>
        </div>
        <div class="col-6 text-right" style="font-size: 17px;">
          <a class="sosmed-header sosmed-header-instagram" href="#"><i class="fab fa-instagram"></i></a>
          &nbsp;
          <a class="sosmed-header sosmed-header-youtube" href="#"><i class="fab fa-youtube"></i></a>
          &nbsp;
          <a class="sosmed-header sosmed-header-twitter" href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </header>
  <div role="banner" class="d-none d-md-block d-lg-block banner-before-slider">
    <!-- <div role="banner" class="banner-before-slider"> -->
    <div class="container">
      <div class="row">
        <div class="col-4 pt-4 pb-4">
          <img src="<?= base_url('assets/uploads/files/' . $sprites['mid_header']['img']) ?>" width="100px" height="100px" class="float-right">
        </div>
        <div class="col-8 pt-4 text-dark banner-text">
          <?= $sprites['mid_header']['caption'] ?>
        </div>
      </div>
    </div>
    <img class="banner-before-slider-img" src="<?= base_url('assets/uploads/files/' . $sprites['banner']['img']) ?>">
  </div>

  <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
      <a class="navbar-brand d-block d-md-none" href="#">
        <img style="height: 30px;width: 30px;" src="<?= base_url('assets/kominfo.png') ?>">
        <b>Jekraf</b>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <?php
          $segment0 = $this->uri->segment(1);
          $segment0 = strtolower($segment0);

          $nav_active = "";
          if ($segment0 == '' || $segment0 == 'home') {
            $nav_active = 'active';
          }
          ?>
          <li class="nav-item <?= $nav_active ?>">
            <a class="nav-link" href="<?= base_url() ?>">
              Home
            </a>
          </li>
          <?php
          $nav_active = "";
          if ($segment0 == 'lagu') {
            $nav_active = 'active';
          }
          ?>
          <li class="nav-item <?= $nav_active ?>">
            <a class="nav-link" href="<?= base_url('lagu/') ?>">Lagu Desa</a>
          </li>
          <?php
          $nav_active = "";
          if ($segment0 == 'wisata') {
            $nav_active = 'active';
          }
          ?>
          <li class="nav-item <?= $nav_active ?>">
            <a class="nav-link" href="<?= base_url('wisata/') ?>">Wisata Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">UMKM Unggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Desain Batik</a>
          </li>

        </ul>
        <form method="get" action="<?= base_url('home/search/') ?>" class="form-inline my-2 my-lg-0">
          <input name="search" class="form-control form-search-nav mr-sm-2" type="text" placeholder="Search">
          <button class="btn2 my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

  </nav>

  <main role="main" class="container" style="">



    <div class="row mt-3">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">

            <?php
            $blength = count($breadcrump);
            $bincr = 1;
            ?>
            <?php foreach ($breadcrump as $btitle => $burl) { ?>
              <?php
              $bactive = '';
              if ($bincr == $blength) {
              ?>
                <li class="breadcrumb-item <?= $bactive ?>" aria-current="page"><?= $btitle ?></li>
              <?php
              } else {
              ?>
                <li class="breadcrumb-item"><a href="<?= base_url($burl) ?>"><?= $btitle ?></a></li>
              <?php
              }
              ?>
              <?php $bincr++; ?>
            <?php } ?>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <?= $content ?>
      </div>
    </div>
  </main>

  <footer class="footer-bottom-black pt-5">
    <div class="container">

      <div class="row">
        <div class="col-md-5 fkiri">
          <p class="judul">Dikembangkan oleh :</p>
          <div class="row mb-3">
            <div class="col-12">
              <img width="100%" src="<?= base_url('assets/uploads/files/' . $sprites['footer']['img']) ?>">
            </div>
          </div>

          <?= $sprites['footer']['caption'] ?>
        </div>

        <div class="col-md-5">
          <p class="judul">Lokasi :</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.305799930494!2d113.69954891384033!3d-8.171915594118198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6943ace876f09%3A0x3badfa144578a391!2sDinas%20Komunikasi%20Dan%20Informatika%20(Kominfo)%20Kabupaten%20Jember!5e0!3m2!1sid!2sid!4v1621121345922!5m2!1sid!2sid" width="100%" height="220px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="col-md-2">
          <p class="judul">Media sosial :</p>
          <div class="social-footer">
            <a class="twitter-social sosmed-transition sosmed-transition-twitter" href="https://twitter.com/kominfojember" target="_blank"><i class="fab fa-twitter" style="width: 30px;height:50px"></i></a>
            <a class="facebook-social sosmed-transition sosmed-transition-facebook" href="https://www.facebook.com/Dinas-Komunikasi-Informatika-Kabupaten-Jember-1911954692385233/" target="_blank"><i class="fab fa-facebook" style="width: 30px;height:50px"></i></a>
            <a class="instagram-social sosmed-transition sosmed-transition-instagram" href="https://www.instagram.com/kominfojember/" target="_blank"><i class="fab fa-instagram" style="width: 30px;height:50px"></i></a>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <footer role="footer" style="width:100%;background-color: #394c63;margin-top: 0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-white pt-3 pb-1" style="font-size: 12px;">
          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script> Dinas Komunikasi Dan Informatika Kabupaten Jember.
          </p>
        </div>
      </div>
    </div>
  </footer>


  <button onclick="topFunction()" id="scrolltop" title="Go to top" class="btn btn-primary">
    <i class="fas fa-chevron-up"></i>
  </button>
  <script>
    //Get the button:
    mybutton = document.getElementById("scrolltop");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      $("html, body").animate({
        scrollTop: 0
      }, 500);
    }
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });

    document.addEventListener("DOMContentLoaded", function() {
      window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
          // remove padding top from body
          document.body.style.paddingTop = '0';
        }
      });
    });
  </script>
</body>

</html>