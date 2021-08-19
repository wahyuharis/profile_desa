<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">DAFTAR DESAIN BATIK DESA <?= strtoupper($desa['nama_desa']) ?></h3>
        <br>
    </div>
</div>

<div class="row">
    <?php foreach ($batik_desa_list as $row) { ?>
        <div class="col-md-3 mb-3">
            <div class="card">
                <img class="card-img-top" width="100%" height="240" src="<?= base_url('assets/uploads/files/' . $row['foto1']) ?>" style="width:100%">
                <div class="card-body" style="height: 100px;">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold"><?= $row['nama_batik'] ?></span>
                        </div>
                        <div class="col-md-12 mt-2">
                            <a href="<?= base_url('batik/lihat/' . $row['id_batik']) ?>" class="btn btn-primary btn-sm btn-block" >
                                 Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>