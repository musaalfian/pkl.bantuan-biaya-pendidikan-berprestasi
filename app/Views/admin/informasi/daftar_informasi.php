<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Main Section-->
<div class="bgwhite py40">
    <div class="admin-content mx-auto">
        <div class="d-flex align-items-center mb-3">
            <h5 class="biru me-2">Atur Tanggal Pendaftaran dan Tanggal Pengumuman :</h5>
            <!-- input tanggal pengumuman -->
            <a href="" class="btn btn-primary fw-normal" data-bs-toggle="modal" data-bs-target="#input_tanggal_penting">Atur
                tanggal</a>
            <!-- modal input tanggal penting -->
            <div class="modal fade" id="input_tanggal_penting" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Input Tanggal Penting</h3>
                        </div>
                        <form action="<?= base_url(); ?>/admin_informasi/simpan_tanggal_penting" method="POST">
                            <?php foreach ($tanggal_penting as $tanggal_penting) : ?>
                                <div class="modal-body">
                                    <label for=""><?= $tanggal_penting['nama_tanggal_penting']; ?></label>
                                    <input type="date" name="<?= $tanggal_penting['nama']; ?>" value="<?= $tanggal_penting['tanggal_penting']; ?>" class="w-100 p-2 border">
                                </div>
                            <?php endforeach; ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end input tanggal pengumuman -->
        </div>
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h3 class="biru">Daftar Informasi Terbaru</h3>
            <a class="btn btn-primary fw-normal" href="<?= base_url(); ?>/admin_informasi/tambah_informasi_terbaru">
                Tambah Informasi
            </a>
        </div>
        <!-- alert informasi terbaru -->
        <?php if (session()->getFlashdata('pesan-tambah-informasi-terbaru')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan-tambah-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan-hapus-informasi-terbaru')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan-hapus-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan-ubah-informasi-terbaru')) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFlashdata('pesan-ubah-informasi-terbaru'); ?>
            </div>
        <?php endif; ?>
        <!-- end alert informasi terbaru -->
        <div class="p-4 br1 bdgrey bg-white mt20 ">
            <table class="table py-3 mb-3" id="table_data_pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($daftar_informasi as $daftar) : ?>
                    <tr>
                        <?php $date = date_create($daftar['created_at']); ?>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= date_format($date, "d-M-Y"); ?></td>
                        <td><?= $daftar['judul_informasi_terbaru']; ?></td>
                        <td><?= $daftar['deskripsi_singkat']; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#daftar_informasi_terbaru_<?= $daftar['id_informasi_terbaru']; ?>" class="fs16 bg-transparent border-0 blue fw-normal">Detail</button>
                                <a href="<?= base_url(); ?>/admin_informasi/edit_informasi_terbaru/<?= $daftar['id_informasi_terbaru']; ?>" class="p-2"><i class="bi bi-pencil-square"></i></a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#hapus_informasi_terbaru_<?= $daftar['id_informasi_terbaru']; ?>" class="bg-transparent border-0"><i class="bi bi-trash3-fill text-red"></i></button>
                            </div>
                        </td>
                        <?php $i++; ?>
                    </tr>
                <?php endforeach ?>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="row mt40">
            <h3 class="col-6 biru mb-3">Daftar Informasi Untuk Halaman Awal</h3>
        </div>
        <div class="p-4 br1 bdgrey bg-white admin__informasi__awal">
            <table class="table p-4" id="table_data_pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($daftar_informasi_pendaftaran as $data_informasi_pendaftaran) : ?>
                    <tr>
                        <?php $date = date_create($data_informasi_pendaftaran['created_at']); ?>
                        <td><?= $i; ?></td>
                        <td><?= date_format($date, "d-M-Y"); ?></td>
                        <td><?= $data_informasi_pendaftaran['judul_informasi_terbaru']; ?></td>
                        <td><?= $data_informasi_pendaftaran['deskripsi_singkat']; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#daftar_informasi_pendaftaran_<?= $data_informasi_pendaftaran['id_informasi_terbaru']; ?>" class="fw-normal bg-transparent border-0 blue me-2">Detail</button>
                                <a href="<?= base_url(); ?>/admin_informasi/edit_informasi_terbaru/<?= $data_informasi_pendaftaran['id_informasi_terbaru']; ?>" class=""><i class="bi bi-pencil-square blue"></i></a>
                            </div>
                        </td>
                        <?php $i++; ?>
                    </tr>
                <?php endforeach ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal daftar informasi -->
<?php foreach ($daftar_informasi_pendaftaran as $data_informasi_pendaftaran) : ?>
    <div class="modal fade" id="daftar_informasi_pendaftaran_<?= $data_informasi_pendaftaran['id_informasi_terbaru']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <?= $data_informasi_pendaftaran['judul_informasi_terbaru']; ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mt10">Tanggal : <?= $data_informasi_pendaftaran['created_at']; ?></p>
                    <p class="mt10">Deskripsi : <?= $data_informasi_pendaftaran['deskripsi_informasi_terbaru']; ?></p>
                    <p class="mt10">File : </p> <?= $data_informasi_pendaftaran['file_informasi_terbaru']; ?>
                    <?= ($data_informasi_pendaftaran['file_informasi_terbaru'] != null) ? '<a
                    href="' . base_url() . '/assets/informasi/file/' . $data_informasi_pendaftaran["file_informasi_terbaru"] . '">Lihat</a>' :
                        ''; ?>
                    <p class="mt10">Gambar : </p> <img width="100px" src="<?= base_url(); ?>/assets/informasi/img/<?= $data_informasi_pendaftaran['gambar_informasi_terbaru']; ?>" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- modal daftar informasi -->
<?php foreach ($daftar_informasi as $data) : ?>
    <div class="modal fade" id="daftar_informasi_terbaru_<?= $data['id_informasi_terbaru']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?= $data['judul_informasi_terbaru']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mt10">Tanggal : <?= $data['created_at']; ?></p>
                    <p class="mt10">Deskripsi : <?= $data['deskripsi_informasi_terbaru']; ?></p>
                    <p class="mt10">File : </p> <?= $data['file_informasi_terbaru']; ?>
                    <?= ($data['file_informasi_terbaru'] != null) ? '<a
                    href="' . base_url() . '/assets/informasi/file/' . $data["file_informasi_terbaru"] . '">Lihat</a>' :
                        ''; ?>
                    <p class="mt10">Gambar : </p> <img width="100px" src="<?= base_url(); ?>/assets/informasi/img/<?= $data['gambar_informasi_terbaru']; ?>" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- modal hapus informasi terbaru-->
<?php foreach ($daftar_informasi as $data_hapus) : ?>
    <div class="modal fade" id="hapus_informasi_terbaru_<?= $data_hapus['id_informasi_terbaru']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saveModalLabel">
                        Yakin ingin menghapus data informasi?
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Pastikan data yang akan anda hapus sudah benar.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <a href="<?= base_url(); ?>/admin_informasi/hapus_informasi_terbaru/<?= $data_hapus['id_informasi_terbaru']; ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>



<!-- end main section -->
<?= $this->endSection(); ?>