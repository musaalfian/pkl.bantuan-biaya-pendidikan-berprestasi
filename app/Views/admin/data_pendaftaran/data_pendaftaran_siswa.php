<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class="bgwhite py40">
    <div class="admin-content mx-auto">
        <h3 class="biru">Data Bantuan Biaya Pendidikan Peserta Didik</h3>
        <div class="p-4 br1 bdgrey bg-white mt20 ">
            <table class="table py-3 mb-3" id="table_data_pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status Pendaftaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $siswa) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $siswa['nama_lengkap']; ?></td>
                            <td><?= $siswa['nama_sekolah'];; ?></td>
                            <td><?= $siswa['alamat_rumah']; ?></td>
                            <td><?= $siswa['nama_status']; ?></td>
                            <td><a href="<?= base_url(); ?>/admin_detail_pendaftaran/detail_pendaftar/<?= $siswa['no_induk']; ?>" class="fs16">Detail</a></td>
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