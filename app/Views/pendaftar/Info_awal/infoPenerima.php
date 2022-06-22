<?= $this->extend('templates/template_info_awal'); ?>

<?= $this->section('content'); ?>
<?php if (count($penerima) === 0) : ?>
    <h3 class="mt-2 fs16 mb-2">Belum ada pendaftar</h3>
<?php else : ?>
    <!-- isi tabel -->
    <div class="mt-2">
        <p class="mb-2 fs16">Daftar nama yang <span class="bold">lolos</span> pendaftaran beasiswa tingkat
            <?= $penerima[0]['nama_peserta']; ?></p>
    </div>
    <!-- isian -->
    <div class="">
        <div class="table-responsive tabel">
            <table id="table" class="w-100 table-bordered ">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th><?= ($penerima[0]['id_status_peserta'] == 1) ? 'Asal Sekolah' : 'Asal Perguruan Tinggi'; ?>
                        </th>
                        <th><?= ($penerima[0]['id_status_peserta'] == 1) ? 'Kelas' : 'Semester'; ?></th>
                        <th>Nominal</th>
                        <th>Keterangan</th>

                    </tr>
                </thead>
                <tbody class="mt-2">
                    <?php $i = 1; ?>
                    <?php foreach ($penerima as $penerima) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $penerima['nama_lengkap']; ?></td>
                            <td><?= ($penerima['id_status_peserta'] == 1) ? $penerima['nama_sekolah'] : $penerima['nama_pt']; ?>
                            </td>
                            <td><?= ($penerima['id_status_peserta'] == 1) ? $penerima['kelas'] : $penerima['semester_ke']; ?>
                            </td>
                            <td><?= $penerima['nominal']; ?></td>
                            <?php if ($penerima['skor_tertinggi'] == 200) : ?>
                                <td>Diterima langsung</td>
                            <?php else : ?>
                                <td>Skor <?= $penerima['skor_tertinggi']; ?></td>
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