<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pendaftaran Beasiswa</title>
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
                <a href="/user/index" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <div class="header d-flex pb-2">
                <div class="logo">
                    <img src="<?= base_url(); ?>/assets/img/logo-batang-hp.png" alt="Logo Dinas Pendidikan dan Kebudayaan Kabupaten Batang">
                </div>
                <h4 class="fw-bold fs24 mx-auto">PEMERINTAH KABUPATEN BATANG <br>DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
            </div>
            <div class="text-center mx-auto">
                <p class="mt-2 fs16 lh1">Jalan Slamet Riyadi No.29 Telp.(0285) 391321 Fax.(0285) 391321 Batang 51214 <br>Laman:
                    www.disdikbud.batangkab.go.id | Email: disdikbud@batangkab.go.id</p>
            </div>
            <?= $this->renderSection('content'); ?>
        </div>
    </div>


</body>

</html>