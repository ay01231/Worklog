<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST AKTIVITAS</title>
</head>

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <form id="filterForm" method="get" action="<?= base_url('activities/index') ?>">
        <label for="filterDate">Filter by Date:</label>
        <input type="date" id="filterDate" name="date" value="<?= $selectedDate ?>">
        <button type="submit">Filter</button>
    </form>
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
                    <td> <?php echo $a->id ?></td>
                    <td> <?php echo $a->aktivitas ?></td>
                    <td> <?php echo $a->tanggal ?></td>
                    <td> <?php echo $a->waktu_mulai ?></td>
                    <td> <?php echo $a->waktu_akhir ?></td>
                    <td> <a href="<?php echo base_url('activities/edit_activities/' . $a->id); ?>">Edit Activity</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button onClick="window.location.href = '<?php echo base_url("activities/add_activities") ?>' ;return false;">Add New</button>
</body>

</html>