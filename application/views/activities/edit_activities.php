<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mini Project</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/NZFieldLabel---Required.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="<?php echo base_url('activities/index') ?>"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 16px;">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"></path>
                    </svg></span><span><strong>Worklog</strong></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto"></ul><button class="btn btn-primary" onClick="window.location.href = '<?php echo base_url('logout') ?>';" type="button">Logout&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path>
                    </svg></button>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="card shadow linear-gradient">
            <div class="card-body" style="margin: 13px;">
                <section class="position-relative py-4 py-xl-5">
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-8">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <h2 class="text-center mb-4" style="color: var(--bs-emphasis-color);">Work Log</h2>
                                        <?php echo validation_errors(); ?>
                                        <?php echo form_open(site_url("activities/update")); ?>
                                            <label class="form-label" style="color: var(--bs-emphasis-color);">Description&nbsp;<span style="color: rgb(255,16,1);">*</span></label>
                                            <div class="mb-3">
                                            <input value="<?php echo $activity['id'] ?>" type="text" name="activity_id" hidden>
                                                <textarea class="form-control" id="aktivitas" name="aktivitas" rows="6" placeholder="Enter Description..."><?php echo $activity['aktivitas'] ?></textarea></div>
                                                <label class="form-label" style="color: var(--bs-emphasis-color);">Date&nbsp;<span style="color: rgb(255,16,1);">*</span></label>
                                                
                                                <input class="form-control" value="<?php echo $activity['tanggal'] ?>" type="date" name="tanggal" id="tanggal" style="margin-bottom: 18px;">
                                            
                                                <div class="row">

                                                <div class="col"><label class="form-label" style="color: var(--bs-emphasis-color);">Time Start&nbsp;<span style="color: rgb(255,16,1);">*</span></label><h1></h1>
                                            
                                                <input class="form-control" value="<?php echo $activity['waktu_mulai'] ?>" type="time" name="waktu_mulai" id="waktu_mulai" /></div>
                                                
                                                <div class="col"><label class="form-label" style="color: var(--bs-emphasis-color);">Time End&nbsp;<span style="color: rgb(255,16,1);">*</span></label><h1></h1>
                                            
                                                <input class="form-control" value="<?php echo $activity['waktu_akhir'] ?>" type="time" name="waktu_akhir" id="waktu_akhir" /></div>
                                            </div>
                                            <div class="mb-3"></div>
                                            <div class="text-end">
                                            
                                            <button class="btn btn-secondary" type="button" onclick="window.location.href = '<?php echo base_url('activities/index') ?>';return false;">Cancel</button>
                                            
                                            <input class="btn btn-primary" type="submit" value="Simpan">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                    </div>
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

</html>