<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <!-- icon bootstraps -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
    .bg-root {
        background-image: url("/assets/img/bg-root.png");
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 100vh;
    }
    </style>
</head>

<body>
    <div class="halaman__awal__section p100 bglight">
        <div class="halaman__awal__content p40 bg-white">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="d-flex align-items-center mb40">
                        <img class="logobatang me-3" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2-1.png"
                            alt="" style="width: 50px;height: auto;">
                        <h4>Dinas Pendidikan dan Kebudayaan <br> Kabupaten Batang</h4>
                    </div>
                    <h3 class="mb20">Sistem Informasi Bantuan Biaya Pendidikan
                        Bagi Peserta Didik Pendidikan Menengah dan
                        Mahasiswa Yang Berprestasi Dari Keluarga Miskin
                    </h3>
                    <h4 class="mb40 fw-normal">Sistem Informasi Program Bantuan Biaya Pendidikan Berprestasi Beasiswa
                        Kabupaten Batang merupakan sistem informasi berbasis website yang digunakan untuk mendaftar
                        program bantuan biaya pendidikan berprestasi dari keluarga miskin di Kabupaten Batang.</h4>
                    <div class="mb40">
                        <h5 class="fw-normal">1. Informasi bantuan biaya pendidikan, silahkan pilih <span
                                class="fw-bold">Informasi</span></h5>
                        <h5 class="fw-normal">2. Melakukan pendaftaran silahkan pilih <span class="fw-bold">Masuk</span>
                        </h5>
                        <h5 class="fw-normal">3. Lihat pendaftar beasiswa, silahkan pilih <span
                                class="fw-bold">Pendaftaran</span></h5>
                        <h5 class="fw-normal">4. Lihat penerima beasiswa, silahkan pilih <span
                                class="fw-bold">Penerima</span></h5>
                        <h5 class="fw-normal">5. Petunjuk pendaftaran bantuan biaya pendidikan berprestasi dari keluarga
                            miskin, <a href="<?= base_url('assets/informasi/file/petunjuk_pendaftaran.pdf'); ?>">Klik
                                disini</a></h5>
                    </div>
                    <div>
                        <a href="/user/index">
                            <button class="btn btn-primary bdr__none w-100">MASUK</button>
                        </a>
                        <div class="d-flex justify-content-evenly flex-wrap fw-normal mt20">
                            <div class="btn__lainnya">
                                <a href="/halaman_awal/informasi_pendaftaran/1"><button
                                        class="btn btn-primary bdr__none fw-normal bg-transparent blue">INFORMASI</button></a>
                            </div>
                            <div class="btn__lainnya">
                                <button class="btn btn-primary bdr__none fw-normal bg-transparent blue dropdown-toggle"
                                    type="button" id="daftar_pendaftar" data-bs-toggle="dropdown" aria-expanded="false">
                                    PENDAFTAR<i class="bi bi-caret-down-fill"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="daftar_pendaftar">
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/1">SMA
                                            Sederajat</a></li>
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/2">Calon
                                            Mahasiswa</a></li>
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/3">Mahasiswa</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn__lainnya">
                                <button
                                    class="penerima btn btn-primary bdr__none fw-normal bg-transparent blue dropdown-toggle"
                                    type="button" id="daftar_penerima" data-bs-toggle="dropdown" aria-expanded="false">
                                    PENERIMA <i class="bi bi-caret-down-fill"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="daftar_penerima">
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/1">SMA
                                            Sederajat</a></li>
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/2">Calon
                                            Mahasiswa</a></li>
                                    <li><a class="dropdown-item"
                                            href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/3">Mahasiswa</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="gambar">
                        <img class="" src="<?= base_url(); ?>/assets/img/foto-disdikbud.jpg" alt="Foto Disdikbud">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>