<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class=" bg-abu p40">
    <div class=" admin-content  mx-auto">
        <h3 class="biru">Data Beasiswa <span class="orange">Calon Mahasiswa</span> </h3>
        <div class="p-4 br20 bg-white mt20 ">
            <table class="table p-4" id="table_data_pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Perguruan Tinggi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status Pendaftaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($calon_mhs as $calon_mhs) : ?>
                    <tr>
                        <th>1</th>
                        <td><?= $calon_mhs['nama_lengkap']; ?></td>
                        <td><?= $calon_mhs['nama_pt'];; ?></td>
                        <td><?= $calon_mhs['alamat_rumah']; ?></td>
                        <td><?= $calon_mhs['nama_status']; ?></td>
                        <td><a href="<?= base_url(); ?>/Admin_Detail_Pendaftaran/detail_pendaftar/<?= $calon_mhs['no_induk']; ?>"
                                class="btn btn-primary">Detail</a></td>
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