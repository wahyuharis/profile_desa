<!DOCTYPE html>
<html lang="en">

<head>
  <title>J-Kraf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $title ?> </title>

  <meta name="image" content="<?= base_url($meta_img) ?>" />
  <meta property="og:image" content="<?= base_url($meta_img)  ?>">

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
  <header class="bg-dark d-none d-md-block d-lg-block pt-2 pb-1 text-white" style="height: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <img src="<?= base_url('assets/uploads/files/logo-header.png') ?>" style="width:20px;height: 20px;">
          &nbsp;
          PEMERINTAH KABUPATEN JEMBER
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
    <div class="container">
      <div class="row">
        <div class="col-4 pt-4 pb-4">
          <img src="<?= base_url('assets/uploads/files/e8867-600px-lambang-kabupaten-jember.png') ?>" width="100px" height="100px" class="float-right">
        </div>
        <div class="col-8 pt-4 text-dark banner-text">
          <h1>Jember Ekonomi Kreatif</h1>
          <h5>Bersama Pemuda Jember Membangun Ekonomi Kreatif</h5>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
      <a class="navbar-brand d-block d-md-none" href="#">
        <img style="height: 30px;width: 30px;" src="<?= base_url('lte/dist/img/kosong.png') ?>">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Lagu Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Wisata Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Desain Batik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">UMKM UNGGULAN</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn2 my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

  </nav>

  <main role="main" class="container" style="min-height: 1200px;">
    


    <div class="row mt-3">
      <div class="col-md-12">
        <?= $content ?>
      </div>
    </div>
  </main>

  <footer style="width:100%;background-color: #34495e;margin-top: 200px;min-height: 300px;">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </footer>

  <footer role="footer" style="width:100%;background-color: #4b6584;margin-top: 0px;">
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
      $("html, body").animate({scrollTop: 0}, 500);
    }
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>

</html>