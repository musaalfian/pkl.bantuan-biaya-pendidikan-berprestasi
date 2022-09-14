<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title; ?></title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <!-- ICON -->
  <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- CSS Custom -->
  <link rel="stylesheet" href="" />
  <style>
  * {
    font-family: "Times New Roman", Times, serif !important;
    padding: 0;
    margin: 0;
  }

  .table> :not(caption)>*>* {
    padding: 0;
  }

  p {
    font-size: 12px;
    margin-bottom: 0;
  }

  h5 {
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 0;
  }

  td {
    font-size: 12px;
    padding-left: 0.5% !important;
    border: 1px solid;
  }

  th {
    font-size: 12px;
    border: 1px solid;
    text-align: center;
  }



  @media (orientation: landscape) {
    #print {
      display: none;
    }

    #title {
      display: none;
    }

    @page {
      margin: 0;
    }


    body {
      margin: 1cm;
    }
  }
  </style>
  <!-- <title id="title">Formulir_Pendaftaran_'Nama'</title> -->
</head>

<body>


  <!-- head -->
  <div class="head-koleksi position-relative pb-2" style="border-bottom: 3px solid black;">
    <div class="text-left position-absolute">
      <img src="<?php base_url() ?>/assets/img/logo-batang-hp.png" style="width: 60px;" alt="">
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



  <!-- kepala -->
  <!-- <div class="container mt20 d-flex justify-content-center">
        !-- <div class="left float-start">
            <img src="../img/logo-batang-hp.png" alt="" style="width: 70px;"> 
        </div> -
        <h5 class="text-center d-flex justify-content-center">
            PENDAFTAR
            PROGRAM BANTUAN BIAYA PENDIDIKAN <br>
            <?php if ($id_status_peserta == 1) {
                echo 'Peserta Didik Pendidikan Menengah ';
            } elseif ($id_status_peserta == 2) {
                echo 'Calon Mahasiswa';
            } else {
                echo 'Mahasiswa';
            } ?> <br> YANG BERPRESTASI BAGI KELUARGA MISKIN <br />
            KABUPATEN BATANG TAHUN 2022
        </h5>
    </div> -->
  <!-- end kepala -->


  <!-- pembuka -->
  <h5 class="mt-4 text-center"> PENDAFTAR PROGRAM BANTUAN BIAYA PENDIDIKAN <br>
    <?php if ($id_status_peserta == 1) {
            echo 'PESERTA DIDIK PENDIDIKAN MENENGAH';
        } elseif ($id_status_peserta == 2) {
            echo 'CALON MAHASISWA';
        } else {
            echo 'MAHASISWA';
        } ?> YANG BERPRESTASI BAGI KELUARGA MISKIN <br />
    KABUPATEN BATANG TAHUN 2022
  </h5>
  <!-- end pembuka -->

  <h5 class="mt-2 bold text-center">Status : <?= ucfirst($status_pendaftaran['nama_status']); ?></h5>

  <?php $i = 1; ?>
  <div class="mt-1">

    <table class="w-100">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kecamatan</th>
        <th>No Telepon</th>
        <th><?= ($id_status_peserta == 1) ? 'Asal Sekolah' : 'Asal Perguruan Tinggi'; ?>
        </th>
        <th><?= ($id_status_peserta == 1) ? 'Kelas' : 'Semester'; ?></th>
        <th>Prestasi</th>
        <th>Nilai Prestasi</th>
      </tr>
      <?php foreach ($daftar_pendaftar as $daftar_pendaftar) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $daftar_pendaftar['nama_lengkap']; ?></td>
        <td><?= $daftar_pendaftar['alamat_rumah']; ?></td>
        <td><?= $daftar_pendaftar['nama_kecamatan']; ?></td>
        <td><?= $daftar_pendaftar['no_telepon']; ?></td>
        <td><?= ($id_status_peserta == 1) ? $daftar_pendaftar['nama_sekolah'] : $daftar_pendaftar['nama_pt']; ?>
        </td>
        <td><?= ($id_status_peserta == 1) ? $daftar_pendaftar['kelas'] : $daftar_pendaftar['semester_ke']; ?>
        </td>
        <td><?= $daftar_pendaftar['nama_prestasi_tertinggi']; ?></td>
        <?php if($daftar_pendaftar['nilai_tertinggi'] == 200) :?>
        <td>Diterima langsung</td>
        <?php else: ?>
        <td><?= $daftar_pendaftar['nilai_tertinggi']; ?></td>
        <?php endif ?>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <?php $i++; ?>

  <!-- <div class="container">
        <div class="mt-3">
            <button id="print" class="btn btn-primary" onclick="window.print()">
                Print this page
            </button>
        </div>
    </div> -->
  <script>
  window.print()
  </script>
</body>

</html>