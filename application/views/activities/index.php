<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Input (One Row)</title>
    <style>
        /* Adjust this style based on your preferences */
        .form-row {
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
    <form action="<?= base_url('activity/save') ?>" method="post" class="form-row">
        <label for="jenis_proyek">Jenis Proyek:</label>
        <input type="text" name="jenis_proyek">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="1" placeholder="Deskripsi Singkat"></textarea>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal">
        <label for="waktu_mulai">Waktu Mulai:</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai">
        <label for="waktu_akhir">Waktu Akhir:</label>
        <input type="time" name="waktu_akhir" id="waktu_akhir">
        <input type="submit" value="Simpan">
    </form>
</body>

</html>