<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">DAFTAR LAGU DESA</h3>
        <br>
    </div>
</div>

<div class="row">
    <!-- <div class="col-md-12"> -->

    <?php foreach ($lagu_desa as $row) { ?>
        <div class="col-md-3">
            <div class="card" style="width:250px">
                <img class="card-img-top" width="100%" height="240" src="<?= base_url('assets/uploads/files/' . $row['foto']) ?>" alt="Card image" style="width:100%">
                <div class="card-body" style="height: 100px;">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold"><?= $row['nama_lagu'] ?></span>
                        </div>
                        <div class="col-md-12">
                            <a href="<?= base_url('lagu/putar/' . $row['id_lagu']) ?>" class="btn btn-primary btn-sm btn-block" data-toggle="tooltip" title="Play">
                                <i class="fas fa-play"></i> Putar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- </div> -->
</div>