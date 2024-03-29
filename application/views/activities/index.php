<!DOCTYPE html>
<html data-bs-theme="light" lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mini Project</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/NZFieldLabel---Required.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="summary.html"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 16px;">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"></path>
                    </svg></span><span><strong>Worklog</strong></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto"></ul><button class="btn btn-primary" type="button">Logout&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"></path>
                    </svg></button>
            </div>
        </div>
    </nav>
    <div class="container-fluid linear-gradient" style="padding: 45px;">
    <div class="alert alert-danger" role="alert"><span><strong>Username belum terdaftar atau password salah.</strong></span></div>
        <div class="card shadow">
        
            <div class="card-body" style="margin: 13px;">
                <div class="row">
                    <div class="col-md-12 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <h1 class="text-dark mb-4"><strong>Welcome, <?php echo $username ?></strong></h1>
                        </div>
                    </div>
                    <div class="col-md-12 text-nowrap text-center" style="height: 15px;">
                        <div id="dataTable_length-2" class="dataTables_length" aria-controls="dataTable">
                            <h4 class="text-dark mb-4"><span style="color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity));">Work Summary</span></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable">
                            <h4 class="text-dark mb-4"></h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter-1" style="padding-right: 45px;"><a class="btn btn-primary" role="button" href="add%20new%20&amp;%20edit.html">Add New&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                </svg></a><label class="form-label"></label></div>
                    </div>
                </div>
                
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info" style="text-align: center;">
                    <table class="table my-0" id="dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th style="/*max-width: -2px;*/">Activity</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                            <tr>
                                <td>1</td>
                                <td class="text-start" style="padding-left: 25px;max-width: 270px;">abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij</td>
                                <td>21/12/2022</td>
                                <td>13.15 - 14.15</td>
                                <td><a class="btn btn-secondary" role="button" style="margin-right: 10px;" href="add%20new%20&amp;%20edit.html">Edit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 15px;">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                        </svg></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="text-start" style="padding-left: 25px;max-width: 270px;">abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij</td>
                                <td>21/12/2022</td>
                                <td>13.15 -&nbsp;14.15</td>
                                <td><button class="btn btn-secondary" type="button" style="margin-right: 10px;">Edit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 15px;">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                        </svg></button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="text-start" style="padding-left: 25px;max-width: 270px;">abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij</td>
                                <td>21/12/2022</td>
                                <td>13.15 -&nbsp;14.15</td>
                                <td><button class="btn btn-secondary" type="button" style="margin-right: 10px;">Edit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 15px;">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                        </svg></button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="text-start" style="padding-left: 25px;max-width: 270px;">abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij</td>
                                <td>21/12/2022</td>
                                <td>13.15 -&nbsp;14.15</td>
                                <td><button class="btn btn-secondary" type="button" style="margin-right: 10px;">Edit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 15px;">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                        </svg></button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td class="text-start" style="padding-left: 25px;max-width: 270px;">abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij</td>
                                <td>21/12/2022</td>
                                <td>13.15 -&nbsp;14.15</td>
                                <td><button class="btn btn-secondary" type="button" style="margin-right: 10px;">Edit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor" style="font-size: 15px;">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"></path>
                                        </svg></button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script src="<?= base_url(''); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(''); ?>assets/js/theme.js"></script>
</body>

</html>     