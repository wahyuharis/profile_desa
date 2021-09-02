<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3">LAGU KHAS DESA</h3>
        <br>
    </div>
</div>

<!-- <div class="row">
<?php foreach ($lagu_desa_data as $row) { ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/uploads/files/' . $row['foto']) ?>" alt="Card image" style="width:100%;height:250px;">
                <div class="card-body">
                    <p class="card-text"><b><?= $row['nama_lagu'] ?></b></p>
                    <p>Ds.<?= $row['nama_desa'] ?> - Kec.<?= $row['nama_kecamatan'] ?></p>
                    <a href="<?= base_url('lagu/putar/') . $row['id_lagu'] ?>" class="btn btn-primary btn-sm btn-block">Putar</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div> -->

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Judul Lagu</th>
                    <th>Putar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $start +1;
                ?>

                <?php foreach ($lagu_desa_data as $row) { ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?= $row['nama_kecamatan'] ?></td>
                        <td><?= $row['nama_desa'] ?></td>
                        <td><?= $row['nama_lagu'] ?></td>
                        <td><a href="<?= base_url('lagu/putar/') . $row['id_lagu'] ?>" class="btn btn-primary btn-sm btn-block">Putar</a></td>
                    </tr>

                    <?php
                    $no++;
                    ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $pagination ?>
    </div>
</div>