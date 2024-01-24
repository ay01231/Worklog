<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST AKTIVITAS</title>
</head>

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Aktivitas</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Akhir</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($activities as $activity) { ?>
            <tr>
                <td> <?php echo $activity->id ?></td>
                <td> <?php echo $activity->aktivitas ?></td>
                <td> <?php echo $activity->tanggal ?></td>
                <td> <?php echo $activity->waktu_mulai ?></td>
                <td> <?php echo $activity->waktu_akhir ?></td>
                <td> <a href="<?php echo base_url('activities/edit_activities/' . $activity->id); ?>">Edit</a></td>
            </tr>
        <?php } ?>

    </table>

    <button onClick="window.location.href = '<?php echo base_url("activities/add_activities") ?>' ;return false;">Add New</button>
    <!-- <button onclick="windows.location.href = '<?php echo base_url("activities/edit/id") ?>';return false;">Add New</button> " -->
</body>

</html>