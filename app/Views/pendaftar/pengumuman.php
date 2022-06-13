<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Jalur beasiswa -->
<div class="bg-abu py40">
    <div class="container">
        <!-- tanggal pengumuman -->
        <?php date_default_timezone_set("Asia/Jakarta");
        $tanggal_sekarang = getdate(date("U"));
        $tanggal = date_create($tanggal_pengumuman);
        $tanggal_pengumuman_tahun = date_format($tanggal, 'Y');
        $tanggal_pengumuman_bulan = date_format($tanggal, 'm');
        $tanggal_pengumuman_tanggal = date_format($tanggal, 'd');
        ?>
        <!-- mengecek apakah status final sudah ada? -->
        <?php if (
            $status_final == null ||
            $tanggal_sekarang['year'] <= $tanggal_pengumuman_tahun &&
            $tanggal_sekarang['mon'] <= $tanggal_pengumuman_bulan &&
            ($tanggal_sekarang['mday'] < $tanggal_pengumuman_tanggal ||
                ($tanggal_sekarang['mon'] <= $tanggal_pengumuman_bulan - 1 &&
                    $tanggal_sekarang['mday'] <= 31))
        ) { ?>
        <h3>Anda sudah mendaftar, pendaftaran bantuan biaya pendidikan berprestasi sedang diproses</h3>
        <p class="mt-2">Untuk lebih lanjut silahkan tunggu informasi selanjutnya. Terima kasih</p>
        <p class="p-2 bg-white w-50 bold mt20 mb20">
            Status pendaftaran : <span><?= $status_pendaftaran['nama_status']; ?></span>
        </p>
        <?php } ?>

        <!-- end status final -->
        <!-- btn edit data -->
        <?php if ($identitas['pesan'] != null) : ?>
        <div class="mb20 alert alert-danger" role="alert">
            Pesan :
            <?= $identitas['pesan']; ?>
        </div>
        <?php endif ?>
        <?php if ($identitas['id_status_pendaftaran'] == 3) { ?>
        <?php if ($identitas['id_status_peserta'] == 1) { ?>
        <a href="<?= base_url(); ?>/siswa/edit_siswa/<?= $identitas['no_induk']; ?>" class="btn btn-primary">Ubah
            Data</a>
        <?php } else if ($identitas['id_status_peserta'] == 2) { ?>

        <a href="<?= base_url(); ?>/calon_mhs/edit_calon_mhs/<?= $identitas['no_induk']; ?>"
            class="btn btn-primary">Ubah
            Data</a>
        <?php } else if ($identitas['id_status_peserta'] == 3) { ?>
        <a href="<?= base_url(); ?>/mahasiswa/edit_mhs/<?= $identitas['no_induk']; ?>" class="btn btn-primary">Ubah
            Data</a>
        <?php } ?>
        <?php } ?>
        <!-- end btn edit data -->
        <!-- pengumuman kelulusan-->

        <?php if (
            $status_final != null &&
            $tanggal_sekarang['year'] >= $tanggal_pengumuman_tahun &&
            $tanggal_sekarang['mon'] >= $tanggal_pengumuman_bulan &&
            ($tanggal_sekarang['mday'] >= $tanggal_pengumuman_tanggal ||
                ($tanggal_sekarang['mon'] >= $tanggal_pengumuman_bulan + 1 &&
                    $tanggal_sekarang['mday'] >= 1))
        ) { ?>
        <?php if ($status_final['id_status_final'] == 1) { ?>
        <div class="p-4 pengumuman_lolos mt40">
            <h2 class="text-white text-center">
                Anda dinyatakan
                <span class="d-inline-block">LOLOS</span>
                seleksi beasiswa
            </h2>
        </div>
        <?php } else if ($status_final['id_status_final'] == 2) { ?>
        <div class="p-4 pengumuman_belum_lolos mt40">
            <h2 class="text-white text-center">
                Maaf, anda dinyatakan
                <span class="d-inline-block">BELUM LOLOS</span>
                seleksi beasiswa
            </h2>
        </div>
        <?php } ?>
        <!-- pengumuman bagi yang lulus -->
        <?php if ($status_final['id_status_final'] == 1) { ?>
        <?php if ($identitas['no_rek'] == null) : ?>
        <div class="mt40">
            <h3>Segera isi laporan rencana penggunaan dana dan nomor rekening</h3>
        </div>
        <?php else : ?>
        <div class="mt40">
            <h3>Terima kasih telah mengirim laporan rencana penggunaan dan informasi rekening</h3>
        </div>
        <?php endif; ?>

        <!-- laporan penggunaan dana -->
        <div class="row mt40">
            <div class="col-lg-6 col-12">
                <!-- jika pndaftar sudah mengisi nomer rekening dan laporan -->
                <?php if ($file['laporan'] != null) : ?>
                <p class="p-2 bg-white bold mt20 mb20">
                    Status pengiriman dana :
                    <span><?= ($identitas['id_status_pembayaran'] == 1) ? 'Belum di transfer' : 'Sudah di transfer'; ?></span>
                </p>
                <?php else : ?>
                <!-- jika pndaftar belum mengisi nomer rekening dan laporan -->
                <h3>Laporan Penggunaan Dana</h3>
                <form action="" method="post"></form>
                <div class="mt15">
                    <?php if ($identitas['no_rek'] == null) : ?>
                    <p>1. Silahkan unduh instrumen penggunaan dana dibawah ini</p>
                    <div class="unduh">
                        <a href="<?= base_url(); ?>/assets/informasi/file/instrumen_beasiswa.docx"
                            class="btn btn-primary bold ms-3 mt15">Unduh</a>
                    </div>
                    <form action="<?= base_url(); ?>/penerima/simpan_tambah_rekening/<?= $identitas['no_induk']; ?>"
                        class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="mt15">
                            <label for="no_rek" class="form-label">2. Isi nomer rekening </label>
                            <small class="text-red ms-3">*Wajib diisi</small>
                            <input type="number" name="no_rek" id="no_rek" class="form-control d-flex ms-3"
                                value="<?= old('no_rek'); ?>" required>
                            <div class="invalid-feedback ms-3">
                                Nomer rekening wajib diisi
                            </div>
                        </div>
                        <div class="mt15">
                            <label for="nama_pemilik_rekening" class="mt15">3. Isi nama pemilik rekening</label>
                            <small class="text-red ms-3">*Wajib diisi dan sesuai dengan nama pendaftar</small>
                            <input type="text" name="nama_pemilik_rekening" id="nama_pemilik_rekening"
                                class="form-control d-flex ms-3" value="<?= old('nama_pemilik_rekening'); ?>" required>
                            <div class="invalid-feedback ms-3">
                                Nama pemilik rekening tidak boleh kosong
                            </div>
                        </div>
                        <div class="mt15">
                            <label class="mt15" for="rek_bpd">
                                4. Scan halaman depan buku tabungan BPD Jateng
                            </label>
                            <small class="text-red">Format nama file :
                                (noinduk)_scan_bpd, Contoh: 240601191_scan_bpd</small> <br>
                            <small class="text-red ms-3">*Wajib diisi dan tidak lebih dari 2 MB</small>
                            <div class="mt15">
                                <input required type="File" id="rek_bpd" class="form-control ms-3" name="rek_bpd"
                                    accept="application/pdf">
                                <div class="invalid-feedback ms-3">
                                    File tidak boleh kosong dan tidak boleh lebih dari 2 MB
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary ms-3 mt15 d-flex justify-content-center w-100">
                            Kirim
                        </button>
                    </form>
                    <?php else : ?>
                    <form action="<?= base_url(); ?>/penerima/simpan_tambah_laporan/<?= $identitas['no_induk']; ?>"
                        class="needs-validation" method="POST" id="tambah_laporan" enctype="multipart/form-data"
                        novalidate>
                        <label for="laporan" class="mt15">
                            Isi dan upload scan laporan instrumen penggunaan dana
                        </label>
                        <small class="text-red">Format nama file :
                            (noinduk)_scan_laporan, Contoh: 240601191_scan_laporan</small> <br>
                        <small class="text-red">*Wajib diisi dan tidak lebih dari 5 MB</small>
                        <div class="mt15">
                            <input class="form-control" id="laporan" name="laporan" type="File" required
                                accept="application/pdf" />
                            <div class="invalid-feedback">
                                File tidak boleh kosong dan tidak boleh lebih dari 5 MB
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt15 d-flex justify-content-center w-100">
                            Kirim
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php } ?>
            <div class="col-lg-6 col-12">
                <div class="img-contain gambar-laporan"></div>
            </div>
        </div>
        <!-- end laporan penggunaan dana -->
        <?php } else { ?>
        <!-- jeda kosong sebelum pengumuman -->
        <div class="mb100"></div>
        <?php } ?>
    </div>
</div>
<!-- End jalur beasiswa -->
<script>
// scan rekening bpd
$("#rek_bpd").change(function() {

    console.log('iohuihiuh');
    // 2 MB
    if (this.files[0].size > 2097152) {
        $(this).addClass('is-invalid');
        // alert("File scan halaman depan buku tabungan lebih dari 2 MB!");
        this.value = "";
    } else {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
    };
});
// end scan rekening BPD

// scan instrumen laporan penggunaan dana
$("#laporan").change(function() {

    // 2 MB
    if (this.files[0].size > 5120000) {
        $(this).addClass('is-invalid');
        this.value = "";
    } else {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
    };
});
// end scan instrumen laporan penggunaan dana
</script>
<?= $this->endSection(); ?>