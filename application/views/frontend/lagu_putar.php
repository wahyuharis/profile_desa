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
                <audio id="player_element" onplay="player_putar()" width="100%" controls autoplay>
                    <source src="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <br>
                <p>Diputar : <?= $lagu['kali_diputar'] ?> x </p>
            <?php } ?>

            <?php if ($ext == 'mp4') { ?>

                <video id="player_element" onplay="player_putar()" width="300" controls autoplay>
                    <source src="<?= base_url('assets/uploads/files/' . $lagu['lagu']) ?>" type="video/mp4">
                </video>
                <p>Diputar : <?= $lagu['kali_diputar'] ?> x </p>
            <?php } ?>


        </center>
    </div>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <?php if (!empty(trim($lagu['link_youtube']))) { ?>
            <a target="_blank" href="<?= $lagu['link_youtube'] ?>" class="btn btn-primary btn-block">Link Youtube</a>
        <?php } ?>
    </div>
    <div class="col-sm-4"></div>
</div>

<script>
    // document.getElementById("audio_player").addEventListener("play", player_putar);
    // document.getElementById("video_player").addEventListener("play", player_putar);

    function player_putar() {
        //   alert("The video has started to play");
        var x = document.getElementById("player_element");
        console.log(x.currentTime);
        if (x.currentTime < 1) {
            var id_lagu = '<?= $lagu['id_lagu'] ?>';
            $.get('<?= base_url('lagu/log_played/') ?>' + id_lagu, function(data, status) {
                // $('#youtube-video').html(data);
            });
        }

    }
</script>