<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST AKTIVITAS</title>
</head>

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aktivitas</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($activities)) : ?>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-danger" role="alert">
                            Data not found!
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            <?php foreach ($activities as $a) : ?>
                <tr>
                    <td> <?php echo $activity->id ?></td>
                    <td> <?php echo $activity->aktivitas ?></td>
                    <td> <?php echo $activity->tanggal ?></td>
                    <td> <?php echo $activity->waktu_mulai ?></td>
                    <td> <?php echo $activity->waktu_akhir ?></td>
                    <?php
                    echo ('
                    <td><a class="btn btn-info" role="button" href="' . base_url('activities/edit/') . $a->id . '"><i class="fas fa-edit"></i>&nbsp;Edit Activities</a></td>
                    ');
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>