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
    <div class="col-md-12" id="content_detail">
        <?= $umkm_desa_detail['content'] ?>
    </div>
</div>



<div id="maps_embed" class="row mt-4">
    <div class="col-md-6">
        <?= $umkm_desa_detail['maps'] ?>
    </div>
    <div class="col-md-6">
        <div class="row">
            <?php if (!empty(trim($umkm_desa_detail['url_website_umkm']))) { ?>
                <div class="col-2 text-right">
                    <p class="h1">
                        <i class="fab fa-chrome"></i>
                    </p>
                </div>
                <div class="col-10">
                    <p class="h4">
                        <?= $umkm_desa_detail['url_website_umkm'] ?>
                    </p>
                </div>
        </div>
    <?php } ?>

    <?php if (!empty(trim($umkm_desa_detail['phone']))) { ?>
        <div class="row">
            <div class="col-2 text-right">
                <p class="h1">
                    <i class="fab fa-whatsapp-square"></i>
                </p>
            </div>
            <div class="col-10">
                <p class="h4">
                    <?= $umkm_desa_detail['phone'] ?>
                </p>
            </div>
        </div>
    <?php } ?>


    <?php if (!empty(trim($umkm_desa_detail['email']))) { ?>
        <div class="row">
            <div class="col-2 text-right">
                <p class="h1">
                    <i class="fas fa-envelope"></i>
                </p>
            </div>
            <div class="col-10">
                <p class="h4">
                    <?= $umkm_desa_detail['email'] ?>
                </p>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        var maps = $('#maps_embed').find('iframe');
        maps.css('width', '100%');

        $('#content_detail').find('p').css('font-family', '"Roboto", sans-serif');
        $('#content_detail').find('ul').css('font-family', '"Roboto", sans-serif');
        $('#content_detail').find('li').css('font-family', '"Roboto", sans-serif');

        $('#content_detail').find('span').removeAttr('style')

        $('#content_detail').find('table').addClass('table');
        $('#content_detail').find('table').addClass('table-bordered');
        $('#content_detail').find('table').removeAttr('border');

    });
</script>