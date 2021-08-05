<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3"><?= ucwords($umkm_desa_detail['nama_umkm']) ?></h3>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div id="wisata_carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#wisata_carousel" data-slide-to="0" class="active"></li>
                <?php if (strlen(trim($umkm_desa_detail['foto2'])) > 0) { ?>
                    <li data-target="#wisata_carousel" data-slide-to="1"></li>
                <?php } ?>

                <?php if (strlen(trim($umkm_desa_detail['foto3'])) > 0) { ?>
                    <li data-target="#wisata_carousel" data-slide-to="2"></li>
                <?php } ?>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/uploads/files/' . $umkm_desa_detail['foto1']) ?>" width="100%" height="200">
                </div>
                <?php if (strlen(trim($umkm_desa_detail['foto2'])) > 0) { ?>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/uploads/files/' . $umkm_desa_detail['foto2']) ?>" width="100%" height="200">
                    </div>
                <?php } ?>
                <?php if (strlen(trim($umkm_desa_detail['foto3'])) > 0) { ?>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/uploads/files/' . $umkm_desa_detail['foto3']) ?>" width="100%" height="200">
                    </div>
                <?php } ?>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#wisata_carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#wisata_carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <?= $umkm_desa_detail['content'] ?>
    </div>
</div>




