<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="<?= base_url(); ?>/assets/js/captcha.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <div class="awal row me-0 align-items-center">
        <div class="awal__content col-md-6 col-12 bgwhite d-flex justify-content-center align-items-center">
            <div class="p-3 py-5 p-md-5">
                <div class="nav__back mb40">
                    <a href="/" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
                </div>
                <div class="header text-center">
                    <h3 class="black fw-bold">Daftar</h3>
                    <h6 class="grey mt-2">Silahkan buat akun dengan mengisi data dibawah ini
                    </h6>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                </div>
                <div class="content">
                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mt40">
                            <label for="email">Email</label>
                            <input class=" form-control mt-2 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Masukan email" autofocus type="email" id="email" name="email" aria-describedby="emailHelp" value="<?= old('email') ?>" />
                        </div>
                        <div class="mt-3">
                            <label for="username">Nama pengguna</label>
                            <input class="form-control mt-2 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama pengguna" type="text" id="username" name="username" value="<?= old('username') ?>" />
                        </div>
                        <div class="mt-3">
                            <label for="sandi">Kata Sandi</label>
                            <div class="input__sandi position-relative mt-2">
                                <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off" placeholder="Masukan kata sandi" type="password" id="password" name="password" autocomplete="off" />
                                <span class="eye position-absolute"><i class="bi bi-eye-fill" area-hidden="true" onclick="toogle()" id="eye"></i></span>
                            </div>
                            <span id="StrengthDisp" class="badge displayBadge mt-2" style="text-align: start !important ;"></span>

                        </div>
                        <div class="mt-3">
                            <label for="sandi">Ulangi kata sandi</label>
                            <div class="input__sandi position-relative mt-2">
                                <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" placeholder="Ulangi kata sandi" type="password" id="pass_confirm" name="pass_confirm" autocomplete="off" />
                                <span class="eye2 position-absolute"><i class="bi bi-eye-fill" area-hidden="true" onclick="toogle()" id="eye"></i></span>
                            </div>
                        </div>
                        <div class="mt-3 captcha__section">
                            <label for="captcha">Captcha</label>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="input w-50">
                                    <input class="form-control" type="text" name="reCaptcha" id="reCaptcha" placeholder="Masukkan captcha" />
                                </div>
                                <div class="captcha__content w-50 ms-2 position-relative">
                                    <div id="captcha" class="captcha form-control">
                                        <script>
                                            createCaptcha();
                                        </script>
                                    </div>
                                    <div class="ubah__captcha position-absolute">
                                        <a href="#" onclick="createCaptcha()" class="fs14 text-white"><i class="fa-solid fa-arrow-rotate-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div id="errCaptcha" class="errmsg mt10 mb10"></div>
                            <input hidden type="text" name="" id="hasilCaptcha">
                            <!-- <button class="btn btn-primary fs14" type="button" onclick="validateCaptcha()">Cek
                            captcha</button> -->
                        </div>
                        <div class="mt40 form-check ceklis">
                            <input type="checkbox" class="form-check-input" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault">Saya setuju dengan peraturan layanan</label>
                        </div>
                        <div class="daftar__button mt40">
                            <button type="submit" id="submit_login" class="btn btn-primary shadow-none fs14 btn__blue">Daftar</button>
                        </div>
                    </form>
                    <div class="mt40">
                        <p class="fs16">
                            Sudah punya akun?
                            <a href="<?= route_to('login') ?>" class="fw-bold blue fs16">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="awal__gambar besar col-md-6 col-12 px-4 bgblue align-items-center justify-content-center">
            <img src="<?= base_url('assets/img/gambar-login.svg'); ?>" alt="Gambar Masuk">
        </div>
    </div>
</body>
<script src="<?php base_url() ?>/assets/js/script.js"></script>
<script src="<?php base_url() ?>/assets/js/indicatorPass.js"></script>
<script>
    $('form').on('submit', function(e) {
        e.preventDefault();
        validateCaptcha();
        if ($('#hasilCaptcha').val() == 'benar') {
            this.submit();
        }
    });
</script>

</html>