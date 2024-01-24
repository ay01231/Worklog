<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <table id="myTable" class="display">
        <tbody>
        <?php if (empty($activities)) : ?>
            <tr>
                <td colspan="7">
                    <div class="alert alert-danger" role="alert">
                        Data not found!
                    </div>
                </td>
            </tr>
        <?php endif; ?>
        <?php foreach ($activities as $a) :?>
            <tr>
                <td><?= $a->aktivitas; ?></td>
                <td><?= $a->tanggal; ?></td>
                <td><?= $a->waktu_mulai; ?></td>
                <td><?= $a->waktu_akhir; ?></td>
                <?php
                    echo ('
                    <td><a class="btn btn-info" role="button" href="' . base_url('activities/edit/') .$a->id . '"><i class="fas fa-edit"></i>&nbsp;Edit Activities</a></td>
                    ');
                ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>     