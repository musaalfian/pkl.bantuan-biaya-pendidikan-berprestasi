<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Password</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
</head>

<body>
  <!-- Main section -->
  <div class="login__section d-flex">
    <div class="daftar__card">
      <h3>Lupa Kata Sandi</h3>
      <?= view('Myth\Auth\Views\_message_block') ?>
      <p class="mt10 text-black">
        Masukkan email Anda dan kami akan mengirimkan
        instruksi untuk mengatur ulang kata sandi Anda.
      </p>
      <div class="daftar__content text-black">
        <form action="<?= route_to('forgot') ?>" method="post" style="overflow: auto">
          <?= csrf_field() ?>
          <div class="mt60">
            <label for="email">Email</label>
            <input class="daftar__input <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Masukan email" type="email" id="email" name="email" aria-describedby="emailHelp" />
            <div class="invalid-feedback">
              <?= session('errors.email') ?>
            </div>
          </div>

          <div class="mt50 daftar__button">
            <button class="daftar__button fs14" style="float: right" type="submit">
              Kirim
            </button>
          </div>
        </form>
        <div class="mt40 d-flex justify-content-end">
          <p>
            Belum punya akun?
            <span><?php if ($config->allowRegistration) : ?>
                <a href="<?= route_to('register') ?>" class="bold blue">Daftar</a>
              <?php endif; ?></span>
          </p>
        </div>
      </div>
    </div>
    <div class="daftar__gambar"></div>
  </div>
  <!-- End main section -->
</body>

</html>