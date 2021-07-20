<div class="row">
    <div class="col-md-12 text-center">
        <h3 class="mt-3"></h3>
        <br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">


        <center>

            <h3><?= ucwords($lagu['nama_lagu']) ?></h3>

            <?php if ($ext == 'mp3') { ?>
                <img width="300px" src="<?= base_url('assets/uploads/files/' . $lagu['foto']) ?>">
                <br>
                <audio width="100%" controls autoplay>
                    <source src="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            <?php } ?>

            <?php if ($ext == 'mp4') { ?>

                <video width="100%" controls autoplay>
                    <source src="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>" type="video/mp4">
                </video>

            <?php } ?>

            <?php if ($ext == 'avi') { ?>

                <video width="320" height="240" controls>
                    <source src="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>">
                </video>
                <!-- <a href="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>">lagu</a> -->


            <?php } ?>
        </center>

    </div>
</div>