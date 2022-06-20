<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Password</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <!-- Fontawesome Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>
  <div class="awal row me-0">
    <div class="awal__content login col-md-6 col-12 bgwhite d-flex justify-content-center align-items-center position-relative">
      <div class="py-5 px-3 px-sm-5 px-md-0">
        <div class="nav__back mb40">
          <a href="<?= route_to('login') ?>" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
        </div>
        <div class="header text-center">
          <h3 class="black fw-bold">Lupa Kata Sandi</h3>
          <h6 class="lightgrey mt-2">Masukkan email Anda dan kami akan mengirimkan
            instruksi untuk mengatur ulang kata sandi Anda.
          </h6>
          <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <div class="content">
          <form action="<?= route_to('forgot') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mt40">
              <label for="email">Email</label>
              <input class=" form-control mt-2 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Masukan email" type="email" id="email" name="email" aria-describedby="emailHelp" />
            </div>
            <div class="daftar__button mt40">
              <button type="submit" id="submit_login" class="btn btn-primary shadow-none fs14 btn__blue w-100">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="awal__gambar col-md-6 col-12 bgblue d-flex align-items-center justify-content-center">
      <div class="">
        <img src="<?= base_url('assets/img/gambar-login.svg'); ?>" alt="Gambar Masuk">
      </div>
    </div>
  </div>
  <script src="<?php base_url() ?>/assets/js/script.js"></script>

</body>

</html>