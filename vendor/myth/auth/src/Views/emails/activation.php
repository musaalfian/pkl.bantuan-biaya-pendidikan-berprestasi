<p>Ini adalah email aktivasi untuk akun Anda di <?= site_url() ?>.</p>

<div class="bg-abu p50 d-flex align-content-center justify-content-center">
    <div class="text-center bg-white p25" style="width: 500px;">
        <img class="d-inline sm_none" src="<?= base_url(); ?>/assets/img/logo-kabupaten-batang 2.png" alt="" />
        <p class="fa16 bold mt-3">Sistem Informasi Bantuan Biaya Pendidikan Bagi Peserta Didik Pendidikan Menengah dan Mahasiswa yang Berprestasi Dari Keluarga Msikin</p>
        <p class="mt5">Silkahkan klik dibawah ini unuk melakukan aktivasi akun </p>
        <div class="">
            <a class="btn btn-biru" href="<?= site_url('activate-account') . '?token=' . $hash ?>">Aktivasi</a>
        </div>
    </div>
</div>

<p>Untuk mengaktifkan akun anda, klik link berikut.</p>

<p><a href="<?= site_url('activate-account') . '?token=' . $hash ?>">Aktivasi akun</a>.</p>

<br>

<p>Jika Anda tidak terdaftar di situs web ini, Anda dapat mengabaikan email ini dengan aman.</p>
<br>
<p>Tim seleksi penerima bantuan biaya pendidikan berprestasi Kabupaten Batang</p>