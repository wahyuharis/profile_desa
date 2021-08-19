<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">Desain Batik</h3>
        <br>
    </div>
</div>


<div class="row">
<?php foreach ($batik_desa_list as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/'.$row['foto1']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body" style="height: 170px;">
                    <p class="card-text"><b><?=$row['nama_batik']?></b></p>
                    <p>Ds.<?=$row['nama_desa']?> - Kec.<?=$row['nama_kecamatan']?></p>
                    <a href="<?=base_url('batik/lihat/').$row['id_batik']?>" class="btn btn-primary btn-sm btn-block">Lihat</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
