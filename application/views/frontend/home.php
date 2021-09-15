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
                <?php $incr = 0; ?>
                <?php foreach ($slider as $srow) : ?>
                    <?php
                    $active = "";
                    if ($incr < 1) {
                        $active = " active ";
                    }
                    ?>
                    <div class="carousel-item <?= $active ?>">
                        <img src="<?= base_url('assets/uploads/files/' . $srow['img']) ?>" alt="" width="100%" height="300">
                        <div class="carousel-caption">
                            <h3><?= $srow['title'] ?></h3>
                            <p><?= $srow['sub_title'] ?></p>
                        </div>
                    </div>
                    <?php $incr++; ?>
                <?php endforeach; ?>
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
        <p class="lead">Diciptakan sebagai wadah digital karya pemerintah dan warga Jember. Kabupaten Jember mempunyai potensi menakjubkan seperti seni musik, fashion, wisata, batik dan UKM Unggulan.</p>
    </div>
</div>

<div class="row mt-3">
    <div class="col-6" style="height: 400px;overflow-y: scroll;">
        <ul class="list-group kecamatan-list">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <a href="#kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="list-group-item list-group-item-action list-kecamatan-handler">
                    <?= $row['nama_kecamatan'] ?>
                </a>
            <?php }  ?>
        </ul>
        <br>
    </div>
    <div class="col-6" style="height: 400px;overflow-y: scroll;">
        <div class="sticky-top">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <div id="kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="desa-list mb-2" style="display: none;">
                    <ul class="list-group">
                        <?php foreach ($row['JSON'] as $desa_row) { ?>
                            <!-- <li class="list-group-item"> -->
                            <a href="<?= base_url('desa/detail/' . $desa_row['id_desa']) ?>" class="list-group-item list-group-item-action">
                                <?= $desa_row['nama_desa'] ?>
                            </a>
                            <!-- </li> -->
                        <?php } ?>
                    </ul>
                </div>
            <?php }  ?>
        </div>

    </div>
</div>


<center>
    <h1 class="mt-5 mb-3">Lagu Desa</h1>
</center>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row as">
            <?php foreach ($lagu_desa as $row) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= base_url('assets/uploads/files/' . $row['foto']) ?>" alt="Card image" style="width:100%;height:250px;">
                        <div class="card-body">
                            <p class="card-text"><b><?= $row['nama_lagu'] ?></b></p>
                            <p>Ds.<?= $row['nama_desa'] ?> - Kec.<?= $row['nama_kecamatan'] ?></p>
                            <a href="<?= base_url('lagu/putar/') . $row['id_lagu'] ?>" class="btn btn-primary btn-sm btn-block">Putar</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<center>
    <h1 class="mt-5 mb-3">Wisata Desa</h1>
</center>
<div class="row as2">
    <?php foreach ($wisata_desa as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/' . $row['foto1']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body">
                    <p class="card-text"><b><?= $row['nama_wisata'] ?></b></p>
                    <p>Ds.<?= $row['nama_desa'] ?> - Kec.<?= $row['nama_kecamatan'] ?></p>
                    <a href="<?= base_url('wisata/lihat/') . $row['id_wisata'] ?>" class="btn btn-primary btn-sm btn-block">Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<center>
    <h1 class="mt-5 mb-3">UMKM Unggulan</h1>
</center>

<div class="row as3">
    <?php foreach ($umkm_desa as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/' . $row['foto1']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body" style="height: 170px;">
                    <p class="card-text"><b><?= $row['nama_umkm'] ?></b></p>
                    <p>Ds.<?= $row['nama_desa'] ?> - Kec.<?= $row['nama_kecamatan'] ?></p>
                    <a href="<?= base_url('umkm/lihat/') . $row['id_umkm'] ?>" class="btn btn-primary btn-sm btn-block">Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<center>
    <h1 class="mt-5 mb-3">Batik Desa</h1>
</center>
<div class="row as4">
    <?php foreach ($batik_desa as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/' . $row['foto1']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body" style="height: 170px;">
                    <p class="card-text"><b><?= $row['nama_batik'] ?></b></p>
                    <p>Ds.<?= $row['nama_desa'] ?> - Kec.<?= $row['nama_kecamatan'] ?></p>
                    <a href="<?= base_url('batik/lihat/') . $row['id_batik'] ?>" class="btn btn-primary btn-sm btn-block">Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    $(document).ready(function() {
        $('.list-kecamatan-handler').click(function(e) {
            e.preventDefault();
            var ids = $(this).attr('href');
            $('.desa-list').hide();
            $('.list-kecamatan-handler').removeClass('active');
            $(ids).fadeIn('slow');
            $(this).addClass('active');
        });

        var first = $('.kecamatan-list').children().first();
        first.addClass('active');
        $(first.attr('href')).fadeIn('slow');
        //    console.log(first.html());

        <?php if (count($lagu_desa) > 4) { ?>
            $('.as').slick({
                dots: true,
                infinite: false,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        <?php } ?>

        <?php if (count($wisata_desa) > 4) { ?>
            $('.as2').slick({
                dots: true,
                infinite: false,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        <?php } ?>


        <?php if (count($umkm_desa) > 4) { ?>
            $('.as3').slick({
                dots: true,
                infinite: false,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        <?php } ?>

        <?php if (count($batik_desa) > 4) { ?>
            $('.as4').slick({
                dots: true,
                infinite: false,
                autoplay: true,
                autoplaySpeed: 2000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        <?php } ?>

    });
</script>
<?php
function remove_dots($str)
{
    $str2 = str_replace('.', '-', $str);
    return $str2;
}
?>