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

    <title>Beasiswa Batang - Informasi Pendaftaran Beasiswa</title>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/info-awal-style.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>
    <div class="py40">
        <div class="container">
            <div class="nav__back mb-3">
                <a href="/" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <div class="text-center logo2 mb-2">
                <img src="<?= base_url(); ?>/assets/img/logo-batang-hp.png" alt="Logo Dinas Pendidikan dan Kebudayaan Kabupaten Batang" height="40px">
            </div>
            <div class="header d-flex pb-3">
                <div class="logo">
                    <img src="<?= base_url(); ?>/assets/img/logo-batang-hp.png" alt="Logo Dinas Pendidikan dan Kebudayaan Kabupaten Batang">
                </div>
                <div class="mx-auto text-center">
                    <h4 class="fw-bold fs18 mx-auto">PEMERINTAH KABUPATEN BATANG <br>DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
                    <p class="mt-2 fs14 mb-0 lh1">Jalan Slamet Riyadi No.29 Telp.(0285) 391321 Fax.(0285) 391321 Batang 51214
                    </p>
                    <p class="fs14 lh1 mb-0">Laman: www.disdikbud.batangkab.go.id | Email: disdikbud@batangkab.go.id
                    </p>
                </div>
            </div>
            <?= $this->renderSection('content'); ?>
        </div>
    </div>


</body>

</html>