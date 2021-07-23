<div class="row">
    <div class="col-md-12">

        <form method="get" class="mb-5" action="<?= base_url('home/search') ?>">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    $tipe_cari = array(
                        '' => 'Semua',
                        'lagu' => 'Lagu Desa',
                        'wisata' => 'Wisata Desa',
                        'batik' => 'Desain Batik',
                        'umkm' => 'UMKM Unggulan',
                    );
                    ?>
                    <?= form_dropdown('jenis', $tipe_cari, '', ' class="form-control" ') ?>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Pencarian">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <div class="row">

            <?php foreach ($search_res as $row) { ?>
                <div class="col-md-3 mb-3">
                    <?php $img_desa = base_url('assets/desa.png'); ?>
                    <div class="card">
                        <img class="card-img-top" src="<?= $img_desa ?>" alt="Card image" style="width:100%;height: 250px;">
                        <div class="card-body" style="height: 100px;">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="#" class="btn btn-primary btn-sm stretched-link">See Profile</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>