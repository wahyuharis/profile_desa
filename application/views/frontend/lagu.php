<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">LAGU DESA</h3>
        <br>
    </div>
</div>

<div class="row">
    <!-- <div class="col-md-12"> -->

    <?php foreach ($lagu_desa as $row) { ?>
        <div class="col-md-3">
            <div class="card" style="width:250px">
                <img class="card-img-top" src="<?= base_url('assets/desa.png') ?>" alt="Card image" style="width:100%">
                <div class="card-body">
                    <p class="card-text"><b><?=$row['nama_desa']?> - <?=$row['nama_kecamatan']?> </b></p>
                    <a href="<?=base_url('lagu/daftar/').$row['id_desa']?>" class="btn btn-primary btn-sm">Daftar Lagu</a>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- </div> -->
</div>