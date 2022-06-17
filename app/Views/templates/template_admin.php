<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ICON -->
    <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js">
    </script>

    <!-- CKEditor -->
    <script src="<?= base_url('ckeditor5-build-classic/ckeditor.js') ?>" type="text/javascript"></script>

    <!-- Dropify -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dropify/dist/css/dropify.css" />
    <script src="<?= base_url('dropify/dist/js/dropify.js') ?>" type="text/javascript"></script>

    <!-- toolstip -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</head>

<body>

    <div class="admin d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="sidebar__admin bg-biru" sty id="sidebar-wrapper">
            <div class="sidebar-heading bg-hitam tengah py-4 border-b">
                <div class="username bold d-flex align-items-center">
                    <i class="bi bi-person-circle me-2" style="font-size: 35px"></i>
                    <h4 class="bold">ADMIN</h4>
                </div>
            </div>
            <div class="sidebar__item list-group px-3 mt15">
                <div class="p-2 menu nav_admin_dashboard" id="">
                    <a class="nav_admin_dashboard item__active" href="<?= base_url(); ?>/home_admin/index"><i class="bi bi-house-door-fill"></i>
                        Dashboard</a>
                </div>
                <div class="p-2 menu nav_admin_data_pendaftaran">
                    <div class="dropdown nav_admin_data_pendaftaran" id="">
                        <a class="dropdown-toggle nav_admin_data_pendaftaran" href="#" role="button" id="" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-card-text"></i>Data Pendaftaran
                        </a>

                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_siswa">Peserta
                                    Didik</a></li>
                            <li><a class="dropdown-item" href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_calon_mhs">Calon
                                    Mahasiswa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url(); ?>/admin_data_pendaftaran/data_pendaftaran_mahasiswa">Mahasiswa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-2 menu nav_admin_data_penerima">
                    <div class="dropdown nav_admin_data_penerima">
                        <a class="dropdown-toggle nav_admin_data_penerima" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-check-circle-fill"></i></i>Daftar Penerima
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/admin_daftar_penerima/daftar_penerima/1">Peserta
                                    Didik</a></li>
                            <li><a class="dropdown-item" href="/admin_daftar_penerima/daftar_penerima/2">Calon
                                    Mahasiswa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/admin_daftar_penerima/daftar_penerima/3">Mahasiswa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-2 menu nav_admin_download">
                    <a class="nav_admin_download" href="<?= base_url(); ?>/admin_download/view_download_file"><i class="bi bi-box-arrow-in-down"></i>Download</a>
                </div>
                <div class="p-2 menu nav_admin_informasi_pendaftaran">
                    <a class="nav_admin_informasi_pendaftaran" href="<?= base_url(); ?>/admin_informasi/informasi_pendaftaran"><i class="bi bi-info-circle-fill"></i>Informasi Pendaftaran</a>
                </div>
                <div class="p-2 menu nav_admin_informasi_terbaru">
                    <a class="nav_admin_informasi_terbaru" href="<?= base_url(); ?>/admin_informasi/daftar_informasi"><i class="bi bi-info-circle-fill"></i>Informasi Terbaru</a>
                </div>
                <div class="p-2 menu ">
                    <a class="" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-door-open-fill"></i>Logout</a>
                </div>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper " class="wrap" style="width: 100%">
            <!-- Top navigation-->
            <nav class="navbar nav-admin navbar-expand-lg border-bottom bg-biru p-2 py-3 border-s" id="navbar">
                <div class="icon-navbar">
                    <!-- <i class="bi bi-list icon_list" style="cursor: pointer; font-size: 20px" id="sidebarToggle"></i> -->
                    <i class="bi bi-three-dots-vertical icon_dot" style="cursor: pointer; font-size: 20px" id="sidebarToggle"></i>
                </div>
                <div class="logo-admin d-flex align-items-center mx-auto">
                    <img class="me-2" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png" alt="">
                    <h4 class="d-flex align-items-center ms-2">
                        Dinas Pendidikan dan Kebudayaan <br />
                        Kabupaten Batang
                    </h4>
                </div>
            </nav>

            <!-- Main Content -->
            <?= $this->renderSection('content'); ?>

            <!-- end Main content -->


            <!-- Footer -->
            <footer class="p25 bg-white tengah bottom-0">
                <small class="mx-auto bold" style="color: #B0B0B0;font-size: 10px;"> <span class="biru">©2022.</span>
                    Dinas
                    Pendidikan dan Kebudayaan Kabupaten Batang. All rights reserved</small>
            </footer>
            <!-- End footer -->
        </div>
    </div>

    <!-- LOGOUT  Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        Anda yakin akan keluar?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pilih "Logout" dibawah jika anda ingin mengakhiri sesimu sekarang.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- JS Custom -->
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
    <script>
        // sidebar
        window.addEventListener("DOMContentLoaded", (event) => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector("#sidebarToggle");
            if (sidebarToggle) {
                sidebarToggle.addEventListener("click", (event) => {
                    event.preventDefault();
                    document.body.classList.toggle("sb-sidenav-toggled");
                    localStorage.setItem(
                        "sb|sidebar-toggle",
                        document.body.classList.contains("sb-sidenav-toggled")
                    );
                });
            }
        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>