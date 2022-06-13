<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="<?= base_url(); ?>/assets/js/captcha.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <!-- Main section -->
    <div class="login__section d-flex">
        <div class="daftar__card">
            <h3>Masuk</h3>
            <p class="mt10 text-black">
                Selamat datang di website bantuan biaya pendidikan berprestasi
                kabupaten Batang.
            </p>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="daftar__content text-black">
                <form action="<?= route_to('login') ?>" method="POST" style="overflow: auto">
                    <?= csrf_field() ?>
                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="mt40">
                            <label for="email">Nama pengguna/Email</label>
                            <input class="daftar__input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama pengguna / email" type="email" id="username/email" name="login" />
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="mt40">
                            <label for="username/email">Nama pengguna/email</label>
                            <input class="daftar__input <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama pengguna / email" type="text" id="username/email" name="login" />
                            <div class="pesan__error mt10">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="mt20">
                        <label for="sandi">Kata Sandi</label>
                        <input class="daftar__input  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" placeholder="Masukan kata sandi" type="password" id="sandi" name="password" />
                        <span toggle="#sandi" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <div class="pesan__error mt10">
                            <?= session('errors.login') ?>
                        </div>
                    </div>

                    <div class="mt20 captcha__section">
                        <label for="captcha">Captcha</label>
                        <div class="d-flex justify-content-between mt10">
                            <div class="captcha__content">
                                <div id="captcha" class="captcha">
                                    <script>
                                        createCaptcha();
                                    </script>
                                </div>
                            </div>
                            <div class="input">
                                <input class="daftar__input" type="text" name="reCaptcha" id="reCaptcha" placeholder="Masukkan captcha" />
                            </div>
                        </div>
                        <div class="restart mt10">
                            <a href="#" onclick="createCaptcha()" class="fs14 blue">Ubah kode captcha</a>
                        </div>


                        <div id="errCaptcha" class="errmsg mt10 mb10"></div>
                        <input hidden type="text" name="" id="hasilCaptcha">
                        <!-- <button class="btn btn-primary fs14" type="button" onclick="validateCaptcha()">Cek
                            captcha</button> -->
                    </div>
                    <div class="mt40">
                        <div class="check__setuju d-flex align-item-center">
                            <input class="" type="checkbox" value="" id="flexCheckDefault" required />
                            <label class="form-check-label ms-2" for="flexCheckDefault">
                                Saya setuju dengan peraturan layanan
                            </label>
                        </div>
                    </div>
                    <div class="daftar__button mt40">
                        <button type="submit" id="submit_login" class="fs14">Masuk</button>
                    </div>

                </form>
                <div class="d-flex mt40 justify-content-between align-items-end">
                    <div class="">
                        <p>
                            Belum punya akun?
                            <span><?php if ($config->allowRegistration) : ?>
                                    <a href="<?= route_to('register') ?>" class="bold blue">Daftar</a>
                                <?php endif; ?></span>
                        </p>
                    </div>
                    <div class="lupa__sandi">
                        <?php if ($config->activeResetter) : ?>
                            <a href="<?= route_to('forgot') ?>" class="blue">Lupa kata sandi?</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="daftar__gambar">
        </div>
    </div>

    <!-- End main section -->
</body>
<script>
    // $(document).ready(function() {
    //     $("#submit_login").prop("disabled", true);
    // });
    $('form').on('submit', function(e) {
        e.preventDefault();
        validateCaptcha();
        if ($('#hasilCaptcha').val() == 'benar') {
            this.submit();
        }
    });
</script>
<script src="<?php base_url() ?>/assets/js/script.js"></script>

</html>