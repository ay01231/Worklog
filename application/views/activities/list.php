<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST AKTIVITAS</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body>
    <h1>Hi, <?php echo $username ?></h1>
    <form id="filterForm" method="get" action="<?= base_url('activities/index') ?>">
        <label for="filterDate">Filter by Date:</label>
        <input type="date" id="filterDate" name="date" value="<?= $selectedDate ?>">
        <button type="submit">Filter</button>
        <?php if (array_key_exists('date', $_GET) && $_GET['date'] != '') : ?>
            <a href="<?= base_url('activities/index') ?>">Reset Filter</a>
        <?php endif; ?>
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
                <?php if (empty($activities['data'])) : ?>
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-danger" role="alert">
                                Data not found!
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($activities['data'] as $a) : ?>
                    <tr>
                        <td> <?php echo $a->id ?></td>
                        <td> <?php echo $a->aktivitas ?></td>
                        <td> <?php echo $a->tanggal ?></td>
                        <td> <?php echo $a->waktu_mulai ?></td>
                        <td> <?php echo $a->waktu_akhir ?></td>
                        <td> <a href="<?php echo base_url('activities/edit_activities/' . $a->id); ?>">Edit Activity</a></td>
                    </tr>
                <?php endforeach; ?>
                <!-- <tr>
                    <td colspan="5">Total durasi aktivitas</td>
                    <td><?= $activities['totalHours']['total_time'] ?> jam</td>
                </tr> -->
            </tbody>
        </table>
        <button onClick="window.location.href = '<?php echo base_url("activities/add_activities") ?>' ;return false;">Add New</button>
        <button onClick="window.location.href = '<?php echo base_url("logout") ?>' ;return false;">Logout</button>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    new DataTable('#myTable', {
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
</script>

</html>