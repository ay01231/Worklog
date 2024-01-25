<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mini Project</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/NZFieldLabel---Required.css">
    <style>
        .dataTables_wrapper .dt-buttons {
            float: right;
            margin-bottom: 10px;
        }

        @media print {

            @media print and (-webkit-min-device-pixel-ratio:0) {
                th {
                    /* color: #ccc; */
                    -webkit-print-color-adjust: exact !important;
                }
            }
        }

        @media print {
            @page {
                size: 216mm 330mm;
                margin: 5mm 0mm 0mm 0mm;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"> -->

</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center"
                href="<?= base_url('activities/index') ?>"><span
                    class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg
                        xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em"
                        fill="currentColor" style="font-size: 16px;">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z">
                        </path>
                    </svg></span><span><strong>Worklog</strong></span></a><button data-bs-toggle="collapse"
                class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto"></ul><button class="btn btn-primary"
                    onClick="window.location.href = '<?php echo base_url('logout') ?>';"
                    type="button">Logout&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 24 24" width="1em" fill="currentColor">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z">
                        </path>
                    </svg></button>
            </div>
        </div>
    </nav>
    <div class="container-fluid linear-gradient" style="padding: 45px;">
        <div class="card shadow">

            <div class="card-body" style="margin: 15px;">
                <div class="row">
                    <div class="col-md-12 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <h1 class="text-dark mb-4"><strong>Welcome,
                                    <?php echo $username ?>
                                </strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable">
                                <h4 class="text-dark mb-4"></h4>
                            </div>
                            <h4 class="text-dark mb-4"><span
                                    style="color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity));">Work Summary</span>
                            </h4>
                        </div>
                        <div class="col-md-3 d-xxl-flex justify-content-end align-items-xxl-center text-nowrap">
                            <form id="filterForm" method="get" action="<?= base_url('activities/index') ?>">
                                <label for="filterDate">Filter by Date:</label>
                                <input type="date" id="filterDate" name="date" value="<?= $selectedDate ?>">
                                <button class="btn btn-secondary" type="submit">Filter</button>
                            </form>
                            <?php if (array_key_exists('date', $_GET) && $_GET['date'] != ''): ?>
                                <a style="margin-top: 25px; margin-left: 5px;" href="<?= base_url('activities/index') ?>">Reset Filter</a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-3 d-xxl-flex justify-content-end align-items-xxl-center text-nowrap"
                            style="text-align: right;">
                            <a class="btn btn-primary" role="button"
                                href="<?php echo base_url('activities/add_activities') ?>">Add New&nbsp;&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em"
                                    fill="currentColor">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                </svg></a>
                        </div>
                    </div>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info"
                    style="text-align: center;">
                    <?php if (empty($activities['data'])) { ?>
                        <table class="table my-0">
                        <?php } else { ?>
                            <table class="table my-0" id="myTable">
                            <?php } ?>
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th style="/*max-width: -2px;*/">Activity</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle;">
                                <?php if (empty($activities['data'])): ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-danger" role="alert">
                                                Data not found!
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php
                                $no = 1;
                                foreach ($activities['data'] as $a): ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td class="text-start" style="padding-left: 25px;max-width: 270px;">
                                            <?php echo $a->aktivitas ?>
                                        </td>
                                        <td>
                                            <?php echo $a->tanggal ?>
                                        </td>
                                        <td>
                                            <?php echo $a->waktu_mulai ?>
                                        </td>
                                        <td>
                                            <?php echo $a->waktu_akhir ?>
                                        </td>
                                        <td><a class="btn btn-secondary" role="button"
                                                href="<?php echo base_url('activities/edit_activities/' . $a->id); ?>">Edit&nbsp;&nbsp;<svg
                                                    xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24"
                                                    width="1em" fill="currentColor" style="font-size: 15px;">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z">
                                                    </path>
                                                </svg></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"><b>Total durasi aktivitas</b></td>
                                    <td style="text-align: right;">
                                        <?= $activities['totalHours']['total_time'] ?> jam
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center" style="height: 90px;">
        <div class="container text-white py-4 py-lg-5">
            <p class="text-muted mb-0">Copyright © 2024 Brand</p>
        </div>
    </footer>
    <script src="<?= base_url(''); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(''); ?>assets/js/theme.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "searching": false,
            "dom": 'Bfrtip',
            "buttons": [{ extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate' },
    { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
    { extend: 'excel', className: 'btn btn-primary glyphicon glyphicon-list-alt' },
    { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
    { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print' }],
            columnDefs: [
                {
                    className: "dt-center",
                    targets: [0, 1, 2, 3, 4, 5]
                }],
            
        });
        table.buttons().appendTo( '#example_wrapper .col-md-6:eq(0) btn btn-primary' );
    });
</script>

</html>