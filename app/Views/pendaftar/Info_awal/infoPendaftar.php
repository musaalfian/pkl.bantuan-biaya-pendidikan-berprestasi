<?= $this->extend('templates/template_info_awal'); ?>

<?= $this->section('content'); ?>
<?php

if (count($pendaftar) === 0) : ?>
    <h3>Belum ada pendaftar</h3>

<?php else : ?>
    <!-- isi tabel -->
    <div class="mt-2">
        <p>Daftar nama yang terdaftar dalam pendaftaran beasiswa tingkat <?= $pendaftar[0]['nama_peserta']; ?></p>
    </div>
    <!-- isian -->
    <div class="" style="margin-top: 10px;">
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
                            <td><?= $pendaftar['nama_status']; ?></td>
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