<?= $this->extend('templates/template_admin'); ?>
<?= $this->section('content'); ?>
<div class="bgwhite py40">
  <div class="admin-content mx-auto">
    <h3 class="biru">Daftar Akun yang Mendaftar</h3>

    <div class="row mt20">
      <div class="col-lg-4 col-md-6 col-12 mb-3">
        <div class="p-4 br1 bgbiru2 main-shadow text-center">
          <h2 class=""><?= $jumlahAkun; ?></h2>
          <p class="fs16">Akun Pendaftar</p>
        </div>
      </div>
    </div>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="p-4 br1 bdgrey bg-white mt20">
      <a href="<?= base_url('home_admin/tambahAdmin'); ?>" class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary shadow-none fs16 btn__blue p-3 rounded-2">
          <i class="fa-solid fa-user-plus"></i>
          <span>Tambah Admin</span>
        </button>
      </a>
      <table class="table py-3 mb-3" id="table_data_pendaftaran">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Aktif</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($daftarAkun as $daftarAkun) : ?>
          <tr>
            <th><?= $i; ?></th>
            <td><?= $daftarAkun['username']; ?></td>
            <td><?= $daftarAkun['email']; ?></td>
            <td><?= ($daftarAkun['active'] == 1) ? 'Aktif' : 'Belum Aktif' ?></td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- end main section -->
<?= $this->endSection(); ?>