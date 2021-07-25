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

<h4>Kecamatan Se-Kab Jember</h4>

<div class="row mt-3">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-group kecamatan-list">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <a href="#kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="list-group-item list-group-item-action list-kecamatan-handler">
                    <?= $row['nama_kecamatan'] ?>
                </a>
            <?php }  ?>
        </ul>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="sticky-top">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <div id="kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="desa-list mb-2" style="display: none;">
                    <ul class="list-group">
                        <?php foreach ($row['JSON'] as $desa_row) { ?>
                            <!-- <li class="list-group-item"> -->
                            <a href="<?=base_url('desa/detail/'.$desa_row['id_desa'])?>" class="list-group-item list-group-item-action">
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
    });
</script>
<?php
function remove_dots($str)
{
    $str2 = str_replace('.', '-', $str);
    return $str2;
}

?>