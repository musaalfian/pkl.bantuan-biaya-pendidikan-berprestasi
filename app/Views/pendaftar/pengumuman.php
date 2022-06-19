<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>

<!-- Jalur beasiswa -->
<div class="py40 pengumuman" id="pengumuman">
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
        <div class="bg-white br25 p-4 p-sm-5 content">
            <h3 class="biru fs24">Terima kasih!</h3>
            <h4 class="mt-3 blue fs16">Anda telah mendaftar, bantuan biaya pendidikan
                berprestasi sedang diproses. Untuk lebih lanjut, silahkan tunggu informasi selanjutnya.</h4>
            <div
                class="alert mt-3 fs14 <?= ($status_pendaftaran['id_status_pendaftaran'] == 4) ? 'alert-primary' : (($status_pendaftaran['id_status_pendaftaran'] == 3) ? 'alert-warning' : (($status_pendaftaran['id_status_pendaftaran'] == 2) ? 'alert-danger' : 'alert-success')); ?>">
                Status pendaftaran : <span><?= $status_pendaftaran['nama_status']; ?></span>
            </div>
            <div class="mt-3">
                <!-- btn edit data -->
                <?php if ($identitas['pesan'] != null) : ?>
                <p class="fs16 fw-bold mb-2">Alasan :</p>
                <div class="alert alert-primary bg-transparent" role="alert">
                    <?= $identitas['pesan']; ?>
                </div>
                <?php endif ?>
                <?php if ($identitas['id_status_pendaftaran'] == 3) { ?>
                <?php if ($identitas['id_status_peserta'] == 1) { ?>
                <a href="<?= base_url(); ?>/siswa/edit_siswa/<?= $identitas['no_induk']; ?>"
                    class="btn btn-primary fw-normal fs14">Ubah
                    Data</a>
                <?php } else if ($identitas['id_status_peserta'] == 2) { ?>

                <a href="<?= base_url(); ?>/pendaftaran/edit_pendaftaran/<?= $identitas['no_induk']; ?>/<?= $identitas['id_status_peserta']; ?>"
                    class="btn btn-primary fw-normal fs14">Ubah
                    Data</a>
                <?php } else if ($identitas['id_status_peserta'] == 3) { ?>
                <a href="<?= base_url(); ?>/pendaftaran/edit_pendaftaran/<?= $identitas['no_induk']; ?>/<?= $identitas['id_status_peserta']; ?>"
                    class="btn btn-primary fw-normal fs14">Ubah
                    Data</a>
                <?php } ?>
                <?php } ?>
                <!-- end btn edit data -->


            </div>
        </div>
        <?php } ?>
        <!-- end status final -->

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
        <div class="p-4 alert alert-success bggreen text-white">
            <h2 class="text-center fs20">
                Selamat! Anda dinyatakan lolos seleksi pendaftaran bantuan biaya pendidikan.
            </h2>
        </div>
        <?php } else if ($status_final['id_status_final'] == 2) { ?>
        <div class="p-4 alert alert-success bgred text-white">
            <h2 class="text-center fs20">
                Maaf, anda dinyatakan belum lolos seleksi pendaftaran bantuan biaya pendidikan.
            </h2>
        </div>
        <?php if ($identitas['pesan'] != null) : ?>
        <p class="fs16 fw-bold mb-2">Alasan :</p>
        <div class="alert alert-primary bg-transparent" role="alert">
            <?= $identitas['pesan']; ?>
        </div>
        <?php endif ?>
        <?php } ?>

        <!-- pengumuman bagi yang lulus -->
        <?php if ($status_final['id_status_final'] == 1) { ?>
        <?php if ($identitas['no_rek'] == null) : ?>
        <div class="mt40 bdblue br10 p-3 p-lg-5 laporan__dana">
            <h4 class="black bold">Segera isi laporan rencana penggunaan dana dan nomor rekening dibawah ini
            </h4>
            <div class="alert alert-primary mt-3">
                <h5 class="bold fs14 mb-2">Ketentuan :</h5>
                <p>1. Semua formulir wajib diisi</p>
                <p>2. Rekening wajib menggunakan rekening bank BPD Jateng</p>
                <p>3. Scan rekening tidak lebih dari 2MB dengan format penamaan file : <strong>(no
                        induk)_scan_bpd.pdf</strong></p>
            </div>
            <!-- laporan penggunaan dana -->
            <div class="mt-3 w-100 content">
                <!-- jika pndaftar sudah mengisi nomer rekening dan laporan -->
                <?php if ($file['laporan'] != null) : ?>
                <div class="alert alert-success">
                    Status pengiriman dana :
                    <span><?= ($identitas['id_status_pembayaran'] == 1) ? 'Belum di transfer' : 'Sudah di transfer'; ?></span>
                </div>
                <?php else : ?>
                <!-- jika pndaftar belum mengisi nomer rekening dan laporan -->
                <form action="" method="post"></form>
                <div class="mt15">
                    <?php if ($identitas['no_rek'] == null) : ?>
                    <div class="d-flex align-items-xl-baseline align-items-start">
                        <h6
                            class="text-white fs12 bgblue bd50 d-flex justify-content-center align-items-center mb-0 me-2">
                            1</h6>
                        <p>Silahkan unduh instrumen penggunaan dana <a
                                href="<?= base_url(); ?>/assets/informasi/file/instrumen_beasiswa.docx"
                                class="fs14 text-decoration-underline">Disini</a></p>
                    </div>
                    <form action="<?= base_url(); ?>/penerima/simpan_tambah_rekening/<?= $identitas['no_induk']; ?>"
                        class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="mt-3">
                            <div class="d-flex align-items-xl-baseline align-items-start">
                                <h6
                                    class="text-white fs12 bgblue bd50 d-flex justify-content-center align-items-center mb-0 me-2">
                                    2</h6>
                                <div class="w-75">
                                    <label for="no_rek" class="form-label fs14">Masukkan nomer rekening <span
                                            class="text-red">*</span></label>
                                    <input type="number" name="no_rek" id="no_rek" class="form-control"
                                        value="<?= old('no_rek'); ?>" required>
                                    <div class="invalid-feedback">
                                        Nomer rekening wajib diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex align-items-xl-baseline align-items-start">
                                <h6
                                    class="text-white fs12 bgblue bd50 d-flex justify-content-center align-items-center mb-0 me-2">
                                    3</h6>
                                <div class="w-75">
                                    <label for="nama_pemilik_rekening" class="form-label fs14">Masukkan nama pemilik
                                        rekening <span class="text-red">*</span></label>
                                    <input type="text" name="nama_pemilik_rekening" id="nama_pemilik_rekening"
                                        class="form-control" value="<?= old('nama_pemilik_rekening'); ?>" required>
                                    <div class="invalid-feedback">
                                        Nama pemilik rekening tidak boleh kosong
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex align-items-xl-baseline align-items-start">
                                <h6
                                    class="text-white fs12 bgblue bd50 d-flex justify-content-center align-items-center mb-0 me-2">
                                    4</h6>
                                <div class="w-75">
                                    <label for="rek_bpd" class="form-label fs14">Scan halaman depan buku tabungan BPD
                                        Jateng <span class="text-red">*</span></label>
                                    <input required type="File" id="rek_bpd" class="form-control" name="rek_bpd"
                                        accept="application/pdf">
                                    <div class="invalid-feedback">
                                        File tidak boleh kosong dan tidak boleh lebih dari 2 MB
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5 w-100 fw-normal">
                                        Kirim
                                    </button>
                                </div>
                            </div>
                        </div>

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
        </div>
        <?php else : ?>
        <div class="mt40">
            <h3>Terima kasih telah mengirim laporan rencana penggunaan dan informasi rekening</h3>
        </div>
        <?php endif; ?>


        <?php } ?>
        <!-- <div class="col-lg-6 col-12">
                <div class="img-contain gambar-laporan"></div>
            </div> -->
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