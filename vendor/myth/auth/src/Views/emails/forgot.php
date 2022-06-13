<p>Seseorang meminta pengaturan ulang kata sandi di alamat email ini untuk <?= site_url() ?>.</p>

<p>Untuk mengatur ulang kata sandi, gunakan kode atau URL ini dan ikuti petunjuknya.</p>

<p>Kode anda: <?= $hash ?></p>

<p>Kunjungi <a href="<?= site_url('reset-password') . '?token=' . $hash ?>">Atur ulang formulir</a>.</p>

<br>

<p>Jika Anda tidak meminta pengaturan ulang kata sandi, Anda dapat mengabaikan email ini dengan aman.</p>