<!DOCTYPE html>
<html lang="en">

<head>
  <title>J-Kraf</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
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
    <div class="row">
      <div class="col-md-7">
        <div id="demo" class="carousel slide mb-5" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
          </ul>
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= base_url('assets/uploads/files/slide-1.jpg') ?>" alt="" width="100%" height="300">
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/uploads/files/slide-2.jpg') ?>" alt="" width="100%" height="300">
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="<?= base_url('assets/uploads/files/slide-3.jpg') ?>" alt="" width="100%" height="300">
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>We had such a great time in LA!</p>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
      <div class="col-md-5">
        <h1>Website Potensi Lokal Jember</h1>
        <p class="lead">Diciptakan Sebagai Wadah Digital Karya Warga Jember. Kota Kecil Dengan Potensi Menakjubkan Seperti Seni Musik Dan Fashion, Wisata Dan UKM Unggulan</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
          <?php 
          
          ?>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 mt-5">
        <div class="row mb-3">
          <div class="col-md-8 col-sm-12">
            <h1>Desa</h1>
            <p class="lead">Temukan Desa Dengan Potensi Wisata Menarik, Karya Musik Pemuda, Dan UKM Unggulan.</p>
          </div>
          <div class="col-md-4 col-sm-12 pt-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Desa, Kecamatan ">
              <div class="input-group-append">
                <button class="input-group-text" type="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-3 mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


          <div class="col-md-3 mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


          <div class="col-md-3 mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


          <div class="col-md-3 mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 mt-5">
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <h1>Wisata</h1>
            <p class="lead">Temukan Desa Dengan Potensi Wisata Menarik, Karya Musik Pemuda, Dan UKM Unggulan.</p>
          </div>
          <div class="col-md-4 col-sm-12 pt-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Desa, Kecamatan ">
              <div class="input-group-append">
                <button class="input-group-text" type="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


        </div>
      </div>

    </div>
    <div class="row mt-5">
      <div class="col-md-12 mt-5">
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <h1>Karya Musik</h1>
            <p class="lead">Temukan Karya Lokal Pemuda Jember Yang Siap Memikat Hati.</p>
          </div>
          <div class="col-md-4 col-sm-12 pt-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Desa, Kecamatan ">
              <div class="input-group-append">
                <button class="input-group-text" type="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


        </div>
      </div>

    </div>

    <div class="row mt-5">
      <div class="col-md-12 mt-5">
      </div>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <h1>UKM Unggulan</h1>
            <p class="lead">Temukan UKM Unggulan Dengan Produk Menarik Mulai Dari Kuliner, Fashion, Pertanian, DLL.</p>
          </div>
          <div class="col-md-4 col-sm-12 pt-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Desa, Kecamatan ">
              <div class="input-group-append">
                <button class="input-group-text" type="button"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>
          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>

          <div class="col-md-3  mt-2 mb-2">
            <div class="card">
              <img class="card-img-top" src="<?= base_url('lte/dist/img/kosong.png') ?>" style="width: 100%;height: 200px;">
              <div class="card-body">
                <h5 class="card-title">Nama Desa - Kecamatan</h5>
                <a class="btn btn-primary">Lihat</a>
              </div>
            </div>
          </div>


        </div>
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


</body>

</html>