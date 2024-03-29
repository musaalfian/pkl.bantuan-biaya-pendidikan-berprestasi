<?= $this->extend('templates/template_info_awal'); ?>

<?= $this->section('content'); ?>
<?php if (count($pendaftar) === 0) : ?>
<h3 class="mt-2 fs16 mb-2">Belum ada pendaftar</h3>

<?php else : ?>
<!-- isi tabel -->
<div class="mt-2">
    <p class="mb-2 fs16">Daftar nama yang terdaftar dalam bantuan biaya pendidikan tingkat
        <?= $pendaftar[0]['nama_peserta']; ?> :</p>
</div>
<!-- isian -->
<div class="">
    <div class="table-responsive tabel">
        <table id="table" class="w-100 table-bordered ">
            <thead class="">
                <tr class="">
                    <th>No.</th>
                    <th>Nama</th>
                    <?php if ($pendaftar[0]['id_status_peserta'] == 1) : ?>
                    <th>Asal Sekolah</th>
                    <?php else : ?>
                    <th>Asal Universitas</th>
                    <?php endif; ?>
                    <th>Status Pendaftaran</th>
                </tr>
            </thead>
            <tbody class="mt-2">
                <?php $i = 1; ?>
                <?php foreach ($pendaftar as $pendaftar) : ?>
                <tr class="data">
                    <td><?= $i++; ?></td>
                    <td><?= $pendaftar['nama_lengkap']; ?></td>
                    <?php if ($pendaftar['id_status_peserta'] == 1) : ?>
                    <td><?= $pendaftar['nama_sekolah']; ?></td>
                    <?php else : ?>
                    <td><?= $pendaftar['nama_pt']; ?></td>
                    <?php endif; ?>
                    <!-- jika masih dalam jadwal pendaftaran status dibuat "proses verifikasi" -->
                    <?php if ($tanggal_seleksi_administrasi > date("Y-m-d")) : ?>
                    <td>Proses Verifikasi Data</td>
                    <?php else : ?>
                    <td><?= $pendaftar['nama_status']; ?></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end isian -->
<!-- endisi tabel -->
<?php endif; ?>
<?= $this->endSection(); ?>