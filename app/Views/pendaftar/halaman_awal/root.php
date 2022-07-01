<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Website Bantuan Biaya Pendidikan Berprestasi Dari Keluarga Miskin. Menyajikan Informasi Pendaftaran Bantuan Biaya Pendidikan dan Melakukan Pendataftaran Bantuan Biaya Pendidikan Berprestasi.">
    <meta name="author" content="Dinas Pendidikan dan Kebudayaan Kabupaten Batang">
    <meta name="keywords" content="beasiswa, bantuan, biaya, pendidikan, batang, dinas, beasiswa batang,bantuan biaya,bantuan biaya pendidikan,biaya pendidikan,bantuan biaya batang,bantuan biaya pendidikan batang,dinas pendidikan,dinas pendidikan dan kebudayaan,dinas pendidikan batang">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="Bantuan Biaya Pendidikan Berprestasi Kabupaten Batang" />
    <!-- website name -->
    <meta property="og:site" content="https://bandikmentibatang.com/" /> <!-- website link -->
    <meta property="og:title" content="Bantuan Biaya Pendidikan Berprestasi Kabupaten Batang" />
    <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Website Bantuan Biaya Pendidikan Berprestasi Dari Keluarga Miskin. Menyajikan Informasi Pendaftaran Bantuan Biaya Pendidikan dan Melakukan Pendataftaran Bantuan Biaya Pendidikan Berprestasi." />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="https://www.batangkab.go.id/src/front/img/batang128.png" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <title>Beasiswa Batang</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />

    <!-- Custom Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="awal row me-0">
        <div class="awal__content col-md-6 col-12 bgwhite d-flex justify-content-center align-items-center">
            <div class="py-5 px-3 px-sm-5 px-md-0">
                <div class="logo__dinas d-flex align-items-center">
                    <img src="<?= base_url('assets/img/logo-batang.png'); ?>" width="30px" height="100%" alt="Logo Kabupaten Batang" class="me-2">
                    <h6 class="fs14 black mb-0">Dinas Pendidikan dan Kebudayaan <br> Kabupaten Batang</h6>
                </div>
                <div class="tagline mt60">
                    <h4 class="fw-bold blue fs20">Sistem Informasi Bantuan Biaya Pendidikan
                        Bagi Peserta Didik Pendidikan Menengah dan
                        Mahasiswa yang Berprestasi
                        Dari Keluarga Miskin
                    </h4>
                    <div class="d-flex mt40">
                        <div class="daftar">
                            <a href="/user/index" class="me-2">
                                <button class="btn btn-primary bgorange shadow-none fs14 text-white btn__orange">Masuk</button>
                            </a>
                        </div>
                        <div class="informasi">
                            <a href="/halaman_awal/informasi_pendaftaran/1">
                                <button class="btn btn-primary shadow-none fs14 btn__blue">Informasi
                                    Pendaftaran</button>
                            </a>
                        </div>
                    </div>
                    <div class="info__lainnya mt40">
                        <h6 class="fs14 black">Unduh informasi terkait data pendaftar dan data penerima :</h6>
                        <div class="d-flex mt-3">
                            <div class="pendaftar me-2">
                                <button class="btn btn-primary btn__white fw-normal bg-transparent black fs14 dropdown-toggle shadow-none d-flex align-items-center" type="button" id="daftar_pendaftar" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pendaftar <i class="fa-solid fa-angle-down ms-2"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="daftar_pendaftar">
                                    <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/1">SMA
                                            Sederajat</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/2">Calon
                                            Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_pendaftar/3">Mahasiswa</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="penerima">
                                <div class="btn__lainnya">
                                    <button class="penerima btn btn-primary btn__white bdr__none fw-normal bg-transparent black fs14 dropdown-toggle shadow-none d-flex align-items-center" type="button" id="daftar_penerima" data-bs-toggle="dropdown" aria-expanded="false">
                                        Penerima <i class="fa-solid fa-angle-down ms-2"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="daftar_penerima">
                                        <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/1">SMA
                                                Sederajat</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/2">Calon
                                                Mahasiswa</a></li>
                                        <li><a class="dropdown-item" href="<?= base_url(); ?>/halaman_awal/info_awal_penerima/3">Mahasiswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="awal__gambar col-md-6 col-12 bgblue align-items-center justify-content-center">
            <div class="">
                <img src="<?= base_url('assets/img/gambar-login.svg'); ?>" alt="Gambar Masuk">
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- JS Custom -->
    <script src="<?= base_url('/assets/js/script.js'); ?>"></script>
    <script src="https://kit.fontawesome.com/55f12d8286.js" crossorigin="anonymous"></script>
</body>

</html>