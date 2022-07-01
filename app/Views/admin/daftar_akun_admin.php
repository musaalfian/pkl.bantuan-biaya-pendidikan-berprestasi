<?= $this->extend('templates/template_admin'); ?>
<?= $this->section('content'); ?>
<div class="bgwhite py40">
  <div class="admin-content mx-auto">
    <h3 class="biru">Daftar Akun yang Mendaftar</h3>

    <div class="row mt20">
      <div class="col-lg-4 col-md-6 col-12 mb-3">
        <div class="p-4 br1 bgbiru2 main-shadow text-center">
          <h2 class="">200</h2>
          <p class="fs16">Akun yang Mendaftar</p>
        </div>
      </div>
    </div>
    <div class="p-4 br1 bdgrey bg-white mt20">
      <table class="table py-3 mb-3" id="table_data_pendaftaran">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($siswa as $siswa) : ?>
            <tr>
              <th><?= $i; ?></th>
              <td><?= $siswa['nama_lengkap']; ?></td>
              <td><?= $siswa['nama_sekolah'];; ?></td>
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