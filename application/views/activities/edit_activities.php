<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Input (One Row)</title>
    <style>
        Adjust this style based on your preferences */ .form-row {
            display: flex;
            justify-content: flex-start;
            align-items: stretch;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
        }

        .form-row label {
            width: 120px;
            text-align: right;
            margin-right: 10px;
        }

        .form-row input,
        textarea {
            flex: 1;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <!-- <?php var_dump($activity) ?> -->
    <?php echo validation_errors(); ?>
    <?php echo form_open(site_url("activities/update")); ?>
    <!-- <form action="<?= base_url('activities/update') ?>" method="post" class="form-row"> -->
    <input value="<?php echo $activity['id'] ?>" type="text" name="activity_id" hidden>
    <label for="aktivitas">Aktivitas</label>
    <textarea name="aktivitas" id="aktivitas" cols="30" rows="1"><?php echo $activity['aktivitas'] ?></textarea>
    <label for=" tanggal">Tanggal:</label>
    <input value="<?php echo $activity['tanggal'] ?>" type="date" name="tanggal" id="tanggal">
    <label for="waktu_mulai">Waktu Mulai:</label>
    <input value="<?php echo $activity['waktu_mulai'] ?>" type="time" name="waktu_mulai" id="waktu_mulai">
    <label for="waktu_akhir">Waktu Akhir:</label>
    <input value="<?php echo $activity['waktu_akhir'] ?>" type="time" name="waktu_akhir" id="waktu_akhir">
    <input type="submit" value="Simpan">
    <button type="button" onclick="window.location.href = '<?php echo base_url('activities/index') ?>';return false;">Cancel</button>


    <?php
    if ($this->session->flashdata('success_message')) {
        echo $this->session->flashdata('success_message');
    }
    ?>
    </form>
</body>

</html>