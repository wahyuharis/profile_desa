<div class="row">
    <div class="col-md-12">

        <form method="get" class="mb-5" action="<?= base_url('home/search') ?>">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    $tipe_cari = array(
                        '' => 'Semua',
                        'LAGU' => 'Lagu Desa',
                        'WISATA' => 'Wisata Desa',
                        'BATIK' => 'Desain Batik',
                        'UMKM' => 'UMKM Unggulan',
                    );
                    $selected_jenis = $this->input->get('jenis');
                    ?>
                    <?= form_dropdown('jenis', $tipe_cari, $selected_jenis, ' class="form-control" ') ?>
                </div>
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Pencarian">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <div class="row">

            <?php foreach ($search_res as $row) { ?>
                <div class="col-md-3 mb-3">
                    <?php $img_search_list = base_url('assets/desa.png'); ?>
                    <?php
                    if (!empty(trim($row['IMG']))) {
                        $img_search_list = base_url('assets/uploads/files/' . $row['IMG']);
                    }
                    ?>
                    <div class="card">
                        <img class="card-img-top" src="<?= $img_search_list ?>" alt="Card image" style="width:100%;height: 250px;">
                        <div class="card-body" style="height: 100px;">
                            <p class="card-title font-weight-bold"><?= $row['TEXT'] ?></p>

                            <?php if ($row['TYPE'] == 'LAGU') { ?>
                                <a href="<?= base_url('lagu/putar/' . $row['KEY']) ?>" class="btn btn-primary btn-sm btn-block" data-toggle="tooltip" title="Play">
                                    <i class="fas fa-play"></i> Putar
                                </a>
                            <?php  } elseif ($row['TYPE'] == 'DESA') { ?>
                                <a href="<?= base_url('desa/detail/' . $row['KEY']) ?>" class="btn btn-primary btn-sm btn-block" data-toggle="tooltip" title="Play">
                                    <i class="fas fa-eye"></i> LIHAT
                                </a>
                            <?php } else {  ?>
                                <a href="#" class="btn btn-primary btn-sm btn-block stretched-link">LIHAT </a>
                            <?php } ?>

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

    </div>
</div>