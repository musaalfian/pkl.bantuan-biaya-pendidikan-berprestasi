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
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/styleInfoAwal.css">
</head>

<body>
    <div class="container mt-3">
        <!-- head -->
        <div class="head-koleksi position-relative pb-2" style="border-bottom: 3px solid black;">
            <div class="text-left position-absolute">
                <img src="<?= base_url(); ?>/assets/img/logo-batang-hp.png" style="width: 60px;" alt="">
            </div>
            <span class="text-center flex-column">
                <h4>PEMERINTAH KABUPATEN BATANG <br>DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
            </span>
            <div class="alamat text-center">
                <p><small>Jalan Slamet Riyadi No.29 Telp.(0285) 391321 Fax.(0285) 391321 Batang 51214 <br>Laman:
                        www.disdikbud.batangkab.go.id | Email: disdikbud@batangkab.go.id
                    </small></p>
            </div>
        </div>
        <!-- end head -->

        <?= $this->renderSection('content'); ?>

    </div>
</body>

</html>