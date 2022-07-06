<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class="bgwhite py40">
    <div class="admin-content mx-auto">
        <h3 class="biru">Data Bantuan Biaya Pendidikan
            <?= ($id_peserta == 1) ? 'SMA/SMK/MA Sederajat' : (($id_peserta == 2) ? 'Calon Mahasiswa' : 'Mahasiswa'); ?>
        </h3>
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
                    <?php foreach ($pendaftar as $pendaftar) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><?= $pendaftar['nama_lengkap']; ?></td>
                        <?php if ($id_peserta == 1) : ?>
                        <td><?= $pendaftar['nama_sekolah'];; ?></td>
                        <?php else : ?>
                        <td><?= $pendaftar['nama_pt']; ?></td>
                        <?php endif ?>
                        <td><?= $pendaftar['alamat_rumah']; ?></td>
                        <td><?= $pendaftar['nama_status']; ?></td>
                        <td><a href="<?= base_url(); ?>/admin_detail_pendaftaran/detail_pendaftar/<?= $pendaftar['no_induk']; ?>"
                                class="fs16">Detail</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end of pendaftar -->
        <h3 class="biru mt-3">Data Pendaftar Perbaikan</h3>
        <div class="p-4 br1 bdgrey bg-white mt20 ">
            <table class="table py-3 mb-3" id="table_data_pendaftaran_perbaikan">
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
                    <?php foreach ($pendaftar_perbaikan as $pendaftar_perbaikan) : ?>
                    <tr>
                        <th><?= $i; ?></th>
                        <td><?= $pendaftar_perbaikan['nama_lengkap']; ?></td>
                        <?php if ($id_peserta == 1) : ?>
                        <td><?= $pendaftar_perbaikan['nama_sekolah'];; ?></td>
                        <?php else : ?>
                        <td><?= $pendaftar_perbaikan['nama_pt']; ?></td>
                        <?php endif ?>
                        <td><?= $pendaftar_perbaikan['alamat_rumah']; ?></td>
                        <td><?= $pendaftar_perbaikan['nama_status']; ?></td>
                        <td><a href="<?= base_url(); ?>/admin_detail_pendaftaran/detail_pendaftar/<?= $pendaftar_perbaikan['no_induk']; ?>"
                                class="fs16">Detail</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end of pendaftar perbaikan -->
    </div>
</div>
<!-- end main section -->
<?= $this->endSection(); ?>