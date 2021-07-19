<?php
$output = null;
$retval = null;
// $cmd = "git log --date=local --pretty=format:%h,%an,%ae,%at,%s  ";
$cmd = 'git log --date=local --pretty=format:"%h,%an,%ae,%ai,%s"';
exec($cmd, $output, $retval);
// echo "Returned with status $retval and output:\n";
// date_default_timezone_set('Asia/Jakarta');


$output2 = array();
foreach ($output as $row) {
    $buff = array();
    $col = explode(",", $row);

    $buff[0] = $col[0];
    $buff[1] = $col[1];
    $buff[2] = $col[2];
    // $buff[3] = gmdate("Y-m-d H:i:s",  $col[3]);;
    $buff[3] =$col[3];
    $buff[4] = $col[4];

    foreach ($col as $k => $v) {
        if ($k > 4) {
            $buff[4] .= ", " . $v;
        }
    }

    array_push($output2, $buff);
}
// print_r($output2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>LAPORAN GIT LAGU DESA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>LAPORAN REGISTER GIT LAGU DESA</h1>
                <p>Programmer menggunakan tool untuk menghistori perubahan program menggunakan GIT dan disimpan di server
                    global bernama github. Dengan GIT selain mempermudah programmer melakukan rollback perubahan dan revisi program, git juga dapat
                    digunakan untuk melaporkan perubuahan dan performa programmer. Jadi Laporan dibawah adalah register yang dilakukan programmer
                    dalam melakukan pengerjaan program
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Commit (URL)</th>
                            <th>Author Name</th>
                            <th>Author Email</th>
                            <th>Tanggal/Jam</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($output2 as $row) { ?>
                            <tr>
                                <?php foreach ($row as $idx => $col) { ?>
                                    <?php if ($idx == 0) { ?>
                                        <td>
                                            <a target="_blank" href="https://github.com/wahyuharis/profile_desa/commit/<?= $col ?>">
                                                <?= $col ?>
                                            </a>
                                        </td>
                                    <?php } else { ?>
                                        <td><?= $col ?></td>
                                    <?php } ?>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>