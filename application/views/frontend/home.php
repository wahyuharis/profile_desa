
        <h4>Kecamatan Se-Kab Jember</h4>


<div class="row mt-3">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-group kecamatan-list">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <a href="#kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="list-group-item list-group-item-action list-kecamatan-handler">
                    <?= $row['nama_kecamatan'] ?>
                </a>
            <?php }  ?>
        </ul>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="sticky-top">
            <?php foreach ($kecamatan_desa as $row) { ?>
                <div id="kecamatan-<?= remove_dots($row['id_kecamatan']) ?>" class="desa-list mb-2" style="display: none;">
                    <ul class="list-group">
                        <?php foreach ($row['JSON'] as $desa_row) { ?>
                            <a href="#" class="list-group-item list-group-item-action"><?= $desa_row['nama_desa'] ?></a>
                        <?php } ?>
                    </ul>
                </div>
            <?php }  ?>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.list-kecamatan-handler').click(function(e) {
            e.preventDefault();
            var ids = $(this).attr('href');
            $('.desa-list').hide();
            $('.list-kecamatan-handler').removeClass('active');
            $(ids).fadeIn('slow');
            $(this).addClass('active');
        });

        var first = $('.kecamatan-list').children().first();
        first.addClass('active');
        $(first.attr('href')).fadeIn('slow');
        //    console.log(first.html());
    });
</script>
<?php
function remove_dots($str)
{
    $str2 = str_replace('.', '-', $str);
    return $str2;
}

?>