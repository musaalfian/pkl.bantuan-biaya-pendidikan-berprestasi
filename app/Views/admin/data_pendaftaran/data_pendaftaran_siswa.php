<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class=" bg-abu p40">
    <div class=" admin-content p-4 mx-auto">
        <h3>Data Beasiswa Peserta Didik</h3>
        <div class="p-4 bg-white mt20 ">
            <table class="table p-4" id="table_data_pendaftaran">
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
                            <td><a href="<?= base_url(); ?>/admin_detail_pendaftaran/detail_pendaftar/<?= $siswa['no_induk']; ?>" class="btn btn-primary">Detail</a></td>
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