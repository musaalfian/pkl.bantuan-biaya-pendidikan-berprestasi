<?= $this->extend('templates/template_admin'); ?>

<?= $this->section('content'); ?>
<!-- Page content-->
<div class="bgwhite py40">
    <div class=" admin-content  mx-auto">
        <div class="d-flex justify-content-between align-items-end">
            <h3 class="biru">Data Penerima Beasiswa Mahasiswa</h3>
            <a data-bs-toggle="modal" data-bs-target="#ubahStatusPembayaranKeseluruhan" class="btn btn-primary fw-normal">
                Edit status pembayaran
            </a>
        </div>
        <div class="p-4 br1 bdgrey bg-white mt20 " id="daftar-penerima-content">
            <table class="table py-3 mb-3" id="table_data_pendaftaran">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Perguruan Tinggi</th>
                        <th scope="col">Rekening</th>
                        <th scope="col">Laporan</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Ubah</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($identitas as $data) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $data['nama_lengkap']; ?></td>
                            <td><?= $data['nama_pt']; ?></td>
                            <td class="bold <?= ($data['no_rek']) != null ? 'green' : 'red' ?> ">
                                <?= ($data['no_rek']) != null ? 'Sudah' : 'Belum' ?></td>
                            <td class="bold <?= ($data['laporan']) != null ? 'green' : 'red' ?> ">
                                <?= ($data['laporan']) != null ? 'Sudah' : 'Belum' ?></td>
                            <td class="bold <?= ($data['nama_status_pembayaran']) == 'sudah transfer' ? 'green' : 'red' ?> " id="statusPembayaran"> <?= $data['nama_status_pembayaran']; ?></td>
                            <td><a href="" class="fs16 fw-normal" data-bs-toggle="modal" data-bs-target="#detail_penerima_<?= $data['no_induk']; ?>">Detail</a></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#ubahStatusPembayaran_<?= $data['no_induk']; ?>">
                                    <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Status Pembayaran"></i>
                                </a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#ubahNorek_<?= $data['no_induk']; ?>">
                                    <i class="fa-solid fa-pen-to-square" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Nomor Rekening"></i>
                                </a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#ubahNominal_<?= $data['no_induk']; ?>">
                                    <i class="fa-solid fa-sack-dollar" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Nominal Beasisiwa"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<?php foreach ($identitas as $data) : ?>
    <div class="modal fade" id="detail_penerima_<?= $data['no_induk']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">DETAIL PENERIMA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- nama 
          alamat rumah
          asal sekolah
          no telepon
          scan rekening
          rekening
          scan laporan -->
                    <p class="mt10">Nama : <?= $data['nama_lengkap']; ?></p>
                    <p class="mt10">Alamat Rumah : <?= $data['alamat_rumah']; ?></p>
                    <p class="mt10">No telepon : <?= $data['no_telepon']; ?></p>
                    <p class="mt10"> No rekening : <?= $data['no_rek']; ?></p>
                    <p class="mt10">Scan Rekening : <a href="<?= base_url(); ?>/assets/scan/<?= $data['no_induk']; ?>/file/<?= $data['rek_bpd']; ?>">Download
                            scan rekening</a></p>
                    <p class="mt10">Laporan : <a href="<?= base_url(); ?>/assets/scan/<?= $data['no_induk']; ?>/file/<?= $data['laporan']; ?>">Download
                            Laporan penggunaan Dana</a></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- modal edir status pembayaran keseluruhan -->
<div class="modal fade" id="ubahStatusPembayaranKeseluruhan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title bold" id="exampleModalLabel">Status Pembayaran Keseluruhan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?php base_url() ?>/admin_daftar_penerima/ubah_status_pembayaran_keseluruhan/3" method="POST">
                    <div class="form-check">

                        <?php foreach ($status_pembayaran as $status_pembayarans) : ?>
                            <input type="radio" id="statusPembayaranSemua_<?= $status_pembayarans['id_status_pembayaran']; ?>" class="form-check-input" name="statusPembayaran" value="<?= $status_pembayarans['id_status_pembayaran']; ?>">
                            <label class="form-check-label" for="statusPembayaranSemua_<?= $status_pembayarans['id_status_pembayaran']; ?>">
                                <?= $status_pembayarans['nama_status_pembayaran']; ?>
                            </label>
                        <?php endforeach ?>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal edir status pembayaran keseluruhan -->

<!-- modal status PEmbayaran -->
<?php foreach ($identitas as $data) : ?>
    <div class="modal fade" id="ubahStatusPembayaran_<?= $data['no_induk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Status Pembayaran</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="bold">
                        Status Pembayaran : <span class="<?= ($data['nama_status_pembayaran']) == 'sudah transfer' ? 'green' : 'red' ?> ">
                            <?= $data['nama_status_pembayaran']; ?></span>
                    </p>
                    <form action="<?php base_url() ?>/admin_daftar_penerima/ubah_status_pembayaran/<?= $data['no_induk'] ?>/3" method="POST">
                        <!-- <select class="form-select mt-2" id="statusPembayaran" name="statusPembayaran">
                        <option selected hidden>---</option>
                        <?php foreach ($status_pembayaran as $status_pembayarans) : ?>
                        <option
                            <?= ($status_pembayarans['id_status_pembayaran'] == $data['id_status_pembayaran']) ? 'selected' : ''; ?>
                            name="statusPembayaran" value="<?= $status_pembayarans['id_status_pembayaran']; ?>">
                            <?= $status_pembayarans['nama_status_pembayaran']; ?></option>
                        <?php endforeach ?>
                    </select> -->
                        <!-- <select class="form-select mt-2" id="statusPembayaran" name="statusPembayaran">
                        <option selected hidden>---</option> -->
                        <div class="form-checks mt-3 mb-3">
                            <?php foreach ($status_pembayaran as $status_pembayarans) : ?>
                                <input type="radio" id="statusPembayaran" class="form-check-input ms-2" <?= ($status_pembayarans['id_status_pembayaran'] == $data['id_status_pembayaran']) ? 'checked' : ''; ?> name="statusPembayaran" value="<?= $status_pembayarans['id_status_pembayaran']; ?>">
                                <label class="form-check-label" for="statusPembayaran">
                                    <?= $status_pembayarans['nama_status_pembayaran']; ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                        <!-- </select> -->
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- modal edit no rekening -->
<?php foreach ($identitas as $datas) : ?>
    <div class="modal fade" id="ubahNorek_<?= $datas['no_induk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Nomor Rekening</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php base_url() ?>/admin_daftar_penerima/ubah_nomor_rekening/<?= $datas['no_induk'] ?>/3" method="POST">
                        <p class="bold">Nomor Rekening saat ini : <?= $datas['no_rek']; ?></p>
                        <label for="" class="mt-2">Ubah Nomor rekening</label>
                        <input value="<?= $datas['no_rek']; ?>" type="number" class="rounded mt-2 p-2 w-100" name="nomorRekening">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- modal edit nominal -->
<?php foreach ($identitas as $datas) : ?>
    <div class="modal fade" id="ubahNominal_<?= $datas['no_induk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nominal Beasiswa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php base_url() ?>/admin_daftar_penerima/ubah_nominal/<?= $datas['no_induk'] ?>/3" method="POST">
                        <p class="bold">Nominal Beasiswa Saat Ini : Rp. <?= $datas['nominal']; ?></p>
                        <label for="" class="mt-2">Ubah Nominal Beasiswa</label>
                        <span>
                            Rp.
                            <input type="number" value="<?= $datas['nominal']; ?>" placeholder="Masukkan Nominal Angka" class="d-inline p-2  mt-2 rounded w-100 ml-2" name="nominal">
                        </span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>


<?= $this->endSection(); ?>