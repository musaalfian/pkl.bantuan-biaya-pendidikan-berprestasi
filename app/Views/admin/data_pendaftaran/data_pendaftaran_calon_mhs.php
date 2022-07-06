<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main section-->
<div class="bgwhite py40">
    <div class=" admin-content mx-auto">
        <h3 class="biru">Data Beasiswa Calon Mahasiswa</h3>
        <div class="p-4 br1 bdgrey bg-white mt20 ">
            <table class="table py-3 mb-3" id="table_data_pendaftaran">
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
                        <th><?= $i; ?></th>
                        <td><?= $calon_mhs['nama_lengkap']; ?></td>
                        <td><?= $calon_mhs['nama_pt']; ?></td>
                        <td><?= $calon_mhs['alamat_rumah']; ?></td>
                        <td><?= $calon_mhs['nama_status']; ?></td>
                        <td><a href="<?= base_url(); ?>/admin_detail_pendaftaran/detail_pendaftar/<?= $calon_mhs['no_induk']; ?>"
                                class="fs16">Detail</a></td>
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