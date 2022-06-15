<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ganti Kata Sandi</title>
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
  <div class="awal row me-0 align-items-center">
    <div class="awal__content col-md-6 col-12 bgwhite d-flex justify-content-center align-items-center">
      <div class="p-3 px-sm-4 w-75">
        <div class="nav__back mb40">
          <a href="<?= route_to('forgot') ?>" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
        </div>
        <div class="header text-center">
          <h3 class="black fw-bold">Ganti Kata Sandi</h3>
          <h6 class="grey mt-2">Silahkan masukkan kode yang Anda terima
            dari email Anda.
          </h6>
          <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        <div class="content">
          <form action="<?= route_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mt40">
              <label for="token">Token</label>
              <input type="text" class="form-control mt-2 <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>" />
              <div class="invalid-feedback">
                <?= session('errors.token') ?>
              </div>
            </div>
            <div class="mt-3">
              <label for="token">Email</label>
              <input type="email" class="form-control mt-2 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
              <div class="invalid-feedback">
                <?= session('errors.email') ?>
              </div>
            </div>
            <div class="mt-3">
              <label for="password">Kata Sandi Baru</label>
              <div class="input__sandi position-relative mt-2">
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" id="sandi" />
                <span class="eye position-absolute"><i class="bi bi-eye-fill" area-hidden="true" onclick="toogle()" id="eye"></i></span>
              </div>
              <div class="invalid-feedback">
                <?= session('errors.password') ?>
              </div>
            </div>
            <div class="mt-3">
              <label for="pass_confirm">Ulangi Kata Sandi Baru</label>
              <div class="input__sandi position-relative mt-2">
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" id="ulangiSandi" />
                <span class="eye position-absolute"><i class="bi bi-eye-fill" area-hidden="true" onclick="toogle2()" id="eye2"></i></span>
              </div>
              <div class="invalid-feedback">
                <?= session('errors.pass_confirm') ?>
              </div>
            </div>
            <div class="daftar__button mt40">
              <button type="submit" id="submit_login" class="btn btn-primary shadow-none fs14 btn__blue">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="awal__gambar gambar__sandi col-md-6 col-12 px-4 bgblue align-items-center justify-content-center">
      <img src="<?= base_url('assets/img/gambar-login.svg'); ?>" alt="Gambar Masuk">
    </div>
  </div>
  <script src="<?php base_url() ?>/assets/js/script.js"></script>

</body>

</html>