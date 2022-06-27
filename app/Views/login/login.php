<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Capctha -->
    <script src="<?php base_url() ?>/assets/js/captcha.js"></script>

</head>

<body>
    <div class="awal row m-0">
        <div class="awal__content login col-md-6 col-12 bgwhite d-flex justify-content-center align-items-center">
            <div class="py-5 px-3 px-sm-5 px-md-0">
                <div class="nav__back mb40">
                    <a href="/" class="fw-bold blue fs20"><i class="fa-solid fa-arrow-left-long"></i></a>
                </div>
                <div class="header text-center">
                    <h3 class="black fw-bold">Masuk</h3>
                    <h6 class="lightgrey mt-2">Silahkan masuk dengan akun
                        yang sudah Anda buat
                    </h6>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                </div>
                <div class="content">
                    <form action="<?= route_to('login') ?>" method="POST">
                        <?= csrf_field() ?>
                        <?php if ($config->validFields === ['email']) : ?>
                        <div class="mt40">
                            <label for="email">Nama pengguna/Email</label>
                            <input
                                class="form-control mt-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                placeholder="Masukan nama pengguna / email" type="email" id="username/email"
                                name="login" autofocus />
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <?php else : ?>
                        <div class="mt40">
                            <label for="username/email">Nama pengguna/email</label>
                            <input
                                class="form-control mt-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                placeholder="Masukan nama pengguna / email" type="text" id="username/email" name="login"
                                autofocus />
                            <div class="pesan__error mt10">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="mt-3">
                            <label for="sandi">Kata Sandi</label>
                            <div class="input__sandi position-relative mt-2">
                                <input
                                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                    placeholder="<?= lang('Auth.password') ?>" placeholder="Masukan kata sandi"
                                    type="password" id="sandi" name="password" />
                                <span class="eye position-absolute"><i class="bi bi-eye-fill" area-hidden="true"
                                        onclick="toogle()" id="eye"></i></span>
                            </div>
                            <div class="pesan__error mt10">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                        <div class="mt-3 captcha__section">
                            <label for="captcha">Captcha</label>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="input w-50">
                                    <input class="form-control" type="text" name="reCaptcha" id="reCaptcha"
                                        placeholder="Masukkan captcha" />
                                </div>
                                <div class="captcha__content w-50 ms-2 position-relative">
                                    <div id="captcha" class="captcha form-control">
                                        <script>
                                        createCaptcha();
                                        </script>
                                    </div>
                                    <div class="ubah__captcha position-absolute">
                                        <a href="#" onclick="createCaptcha()" class="fs14 text-white"><i
                                                class="fa-solid fa-arrow-rotate-right"></i></a>
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
                            <label class="form-check-label" for="flexCheckDefault">Saya setuju dengan peraturan
                                layanan</label>
                        </div>
                        <div class="daftar__button mt40">
                            <button type="submit" id="submit_login"
                                class="btn btn-primary shadow-none fs14 btn__blue w-100">Masuk</button>
                        </div>
                    </form>
                    <div class="d-flex mt40 flex-wrap justify-content-between align-items-end">
                        <div class="">
                            <p class="fs16">
                                Belum punya akun?
                                <span><?php if ($config->allowRegistration) : ?>
                                    <a href="<?= route_to('register') ?>" class="bold blue fs16">Daftar</a>
                                    <?php endif; ?></span>
                            </p>
                        </div>
                        <div class="lupa__sandi">
                            <?php if ($config->activeResetter) : ?>
                            <a href="<?= route_to('forgot') ?>" class="blue fs16">Lupa kata sandi?</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="awal__gambar col-md-6 col-12 bgblue align-items-center d-flex justify-content-center">
            <div class="">
                <img src="<?= base_url('assets/img/gambar-login.svg'); ?>" alt="Gambar Masuk">
            </div>
        </div>
    </div>
</body>

<script src="<?php base_url() ?>/assets/js/script.js"></script>
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