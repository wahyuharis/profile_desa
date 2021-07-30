<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">Wisata Desa</h3>
        <br>
    </div>
</div>

<div class="row">
<?php foreach ($wisata_desa_data as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/'.$row['foto1']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body">
                    <p class="card-text"><b><?=$row['nama_wisata']?></b></p>
                    <p>Ds.<?=$row['nama_desa']?> - Kec.<?=$row['nama_kecamatan']?></p>
                    <a href="<?=base_url('wisata/lihat/').$row['id_wisata']?>" class="btn btn-primary btn-sm btn-block">Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $pagination ?>
    </div>
</div>