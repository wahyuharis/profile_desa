<div class="row">
    <div class="col-md-12 text-center">
        <br>
        <?php if ($desa['id_kecamatan'] == '35.9.19' || $desa['id_kecamatan'] == '35.9.20' || $desa['id_kecamatan'] == '35.9.21') { ?>

            <h2>Kelurahan <?= $desa['nama_desa'] ?></h2>
        <?php } else { ?>
            <h2>Desa <?= $desa['nama_desa'] ?></h2>
        <?php } ?>
        <br>
    </div>
</div>
<div class="row mb-3">

    <div class="col-md-4"></div>
    <div class="col-md-4">
        <?php
        if (empty(trim($desa['foto_desa']))) {
        ?>
            <img class="img-fluid" src="<?= base_url('assets/desa.png') ?>">
        <?php
        } else {
        ?>
            <img class="img-fluid" src="<?= base_url('assets/uploads/files/' . $desa['foto_desa']) ?>">
        <?php
        }
        ?>
    </div>
    <div class="col-md-4"></div>

</div>

<div class="row mb-3">
    <?php
    $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";
    ?>

    <div class="col-md-12">
        <?php
        if (empty(trim($desa['keterangan']))) {
            echo $lorem;
        } else {
            echo $desa['keterangan'];
        }
        ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12 text-center">
        <?php
        $link_web_desa = '#';
        if (strlen(trim($desa['url_website'])) > 0) {
            $link_web_desa = $desa['url_website'];
        }
        ?>
        <a href="<?= $link_web_desa ?>" class="btn btn-sm btn-primary">Link Web Desa</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">

    </div>
    <div class="col-md-8">
        <div class="row">

        </div>
    </div>

</div>

<div class="row mb-3">
    <div class="col-md-4"></div>

    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/wisata.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="<?= base_url('wisata/by_desa/' . $desa['id_desa']) ?>" class="btn btn-primary  btn-sm  btn-block">Wisata Khas Desa</a>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/batik.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="<?= base_url('batik/by_desa/' . $desa['id_desa']) ?>" class="btn btn-primary  btn-sm  btn-block">Desain Batik Desa</a>
            </div>
        </div>
    </div>


    <div class="col-md-4"></div>
</div>

<div class="row mb-3">
    <div class="col-md-5"></div>

    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/umkm.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="<?= base_url('umkm/by_desa/' . $desa['id_desa']) ?>" class="btn btn-primary  btn-sm  btn-block">UMKM Unggulan Desa</a>
            </div>
        </div>
    </div>
    <div class="col-md-5"></div>

</div>

<!-- <div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-2">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/gitar.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="<?= base_url('lagu/daftar/' . $desa['id_desa']) ?>" class="btn btn-primary btn-sm btn-block">Lagu Khas Desa</a>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div> -->