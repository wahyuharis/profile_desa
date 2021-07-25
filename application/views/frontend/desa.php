<div class="row">
    <div class="col-md-12 text-center">
        <br>
        <h2>Desa <?= $desa['nama_desa'] ?></h2>
        <br>
    </div>
</div>
<div class="row mb-3">

    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php
        if (empty(trim($desa['foto_desa']))) {
        ?>
            <img class="img-fluid" src="<?= base_url('assets/desa.png') ?>">
        <?php
        } else {
        ?>
            <img class="img-fluid" src="<?= base_url('assets/uploads/files/'.$desa['foto_desa']) ?>">
        <?php
        }
        ?>
    </div>
    <div class="col-md-3"></div>

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
        <a class="btn btn-primary">Link Web Desa</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/gitar.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="<?= base_url('lagu/daftar/' . $desa['id_desa']) ?>" class="btn btn-primary btn-block">Lagu Desa</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/wisata.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="#" class="btn btn-primary btn-block">Wisata Desa</a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row mb-3">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/batik.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="#" class="btn btn-primary btn-block">Desain Batik</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="<?= base_url('assets/umkm.png') ?>">
            <div class="card-body text-center" style="vertical-align: middle;">
                <a href="#" class="btn btn-primary btn-block">UMKM Unggulan</a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>