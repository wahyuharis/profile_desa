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
        <p class="lead">Diciptakan sebagai wadah digital karya warga Jember. Kota kecil dengan potensi menakjubkan seperti seni musik, fashion, wisata dan UKM Unggulan.</p>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h4>Kecamatan Se-Kabupaten Jember</h4>
        <ul class="list-group kecamatan-list">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <a href="#kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="list-group-item list-group-item-action list-kecamatan-handler">
                    <?= $row['nama_kecamatan'] ?>
                </a>
            <?php }  ?>
        </ul>
        <br>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h4>Daftar Kelurahan</h4>
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