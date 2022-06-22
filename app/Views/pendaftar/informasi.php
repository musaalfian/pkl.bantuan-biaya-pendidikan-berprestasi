<?= $this->extend('templates/template_pendaftar'); ?>

<?= $this->section('content'); ?>
<!-- Main section -->
<div class="bglight2 py40 informasi__pendaftaran">
    <div class="container">
        <h3 class="blue fs20">Informasi Pendaftaran Bantuan Biaya Pendidikan</h3>
        <div class="persyaratan__section mt-3">
            <h4 class="fs18 bold">Persyaratan Penerimaan Bantuan</h4>
            <?php $i = 1;
            foreach ($persyaratan as $persyaratan) : ?>

                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10"><?= $i; ?></div>
                    <p class=""><?= $persyaratan; ?>.</p>
                </div>
                <?php $i++; ?>
            <?php endforeach ?>
            <div class="persyaratan__content d-flex align-items-baseline mt10">
                <div class="nomor d-flex justify-content-center align-items-center me10"><?= $i; ?></div>
                <p class="">Informasi selengkapnya dapat diunduh <a href="<?= base_url(); ?>/assets/informasi/file/<?= $informasi_pengumuman_pendaftaran['file_informasi_terbaru']; ?>" class="blue text-decoration-underline"> disini </a> </p>
            </div>
        </div>
        <div class="persyaratan__section mt-4">
            <h4 class="fs18 bold">Proses Seleksi</h4>
            <?php $j = 1;
            foreach ($proses_seleksi as $proses_seleksi) : ?>
                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10"><?= $j; ?></div>
                    <p class=""><?= $proses_seleksi; ?></p>
                </div>
                <?php $j++; ?>
            <?php endforeach ?>

        </div>
        <div class="alur__section mt-4">
            <h4 class="fs18 bold">Alur Pendaftaran</h4>
            <div class="mt-2">
                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10">1</div>
                    <p class="bold">Daftar Beasiswa</p>
                </div>
                <div class="mt5 me2rem daftar__beasiswa__section">
                    <div class="d-flex">
                        <p class="no ">1.</p>
                        <p class="ms-2 ">Masuk menu Pendaftaran Daftar Beasiswa atau melalui link www.daftar/beasiswa.com
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">2.</p>
                        <p class="ms-2 ">Pilih beasiswa sesuai dengan kebutuhan Anda</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">3.</p>
                        <p class="ms-2 ">Klik tombol Daftar</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">4.</p>
                        <p class="ms-2 ">Masukkan data Anda sesuai dengan form yang tersedia</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">5.</p>
                        <p class="ms-2 ">Lampirkan dokumen pribadi Anda, seperti foto diri, scan KTP, prestasi, dan lain
                            lain</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">6.</p>
                        <p class="ms-2 ">Setelah data lengkap, klik tombol Daftar</p>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10">2</div>
                    <p class="bold">Proses Seleksi</p>
                </div>
                <div class="mt5 me2rem daftar__beasiswa__section">
                    <div class="d-flex">
                        <p class="no ">1.</p>
                        <p class="ms-2 ">Pemeringkatan prestasi paling tinggi berdasarkan tabel bobot prestasi</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">2.</p>
                        <p class="ms-2 ">Hanya diambil 1 prestasi paling tinggi</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">3.</p>
                        <p class="ms-2 ">Apabila bobot calon penerima sama, diprioritaskan ke ekonomi orang tua
                            (penghasilan)</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">4.</p>
                        <p class="ms-2 ">Tim dapat melakukan uji sederhana bagi hafiz, akan ada pemberitahuan melalui web
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">5.</p>
                        <p class="ms-2 ">Penerimaan bantuan sesuai jadwal yg ditetapkan di web</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">6.</p>
                        <p class="ms-2 ">Keputusan panitia bersifat final</p>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10">3</div>
                    <p class="bold">Pengumuman Penerimaan Bantuan</p>
                </div>
                <div class="mt5 me2rem daftar__beasiswa__section">
                    <div class="">
                        <div class="d-flex">
                            <p class="no ">1.</p>
                            <p class="ms-2 ">Pengumuman penerimaan bantuan biaya pendidikan akan diinfokan melalui akun
                                masing-masing pada menu Pengumuman Beasiswa.</p>
                        </div>
                        <div class="d-flex">
                            <p class="no ">2.</p>
                            <p class="ms-2 ">Untuk peserta yang dinyatakan lolos penerimaan bantuan biaya pendidikan
                                berprestasi, silahkan melengkapi data rekening dengan mengisi nomer rekening, nama pemilik
                                rekening, dan scan buku tabungan di menu Pengumuman Beasiswa.</p>
                        </div>
                        <div class="d-flex">
                            <p class="no">3.</p>
                            <p class="ms-2">Untuk peserta yang belum lolos penerimaan bantuan biaya pendidikan berprestasi
                                dapat mencoba di tahun berikutnya.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <p class="no ">2.</p>
                        <p class="ms-2 ">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore doloribus
                            cumque excepturi suscipit minima neque at maxime, vel culpa enim.</p>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div class="persyaratan__content d-flex align-items-baseline mt-2">
                    <div class="nomor d-flex justify-content-center align-items-center me10">4</div>
                    <p class="bold">Laporan penggunaan Dana</p>
                </div>
                <div class="mt5 me2rem daftar__beasiswa__section">
                    <div class="d-flex">
                        <p class="no ">1.</p>
                        <p class="ms-2 ">Admin akan mengiriman notifikasi apakah Anda lolos seleksi dan layak mendapatkan
                            beasiswa</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">2.</p>
                        <p class="ms-2 ">Jika lolos, maka lengkapi data dengan menambahkan nomor rekening sebagai
                            rekening penerimaan beasiswa</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">3.</p>
                        <p class="ms-2 ">Proses pencairan dana membutuhkan waktu dan Admin akan menginformasikan terkait
                            pencairan dana</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">4.</p>
                        <p class="ms-2 ">Setelah pencairan dana selesai, silahkan isi form laporan penggunaan dana yang
                            tersedia</p>
                    </div>
                    <div class="d-flex">
                        <p class="no ">5.</p>
                        <p class="ms-2 ">Upload kembali form laporan penggunaan dana sebelum batas waktu yang ditentukan
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jadwal mt-4">
            <h4 class="fs18 bold">Jadwal Kegiatan</h4>
            <div class="mt-2 w-100">
                <table class="table table-striped" id="jadwalPendaftaran">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center bold fs14">No</th>
                            <th scope="col" class="fs14">Kegiatan</th>
                            <th scope="col" class="fs14">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($jadwal as $jadwal) : ?>
                            <tr>
                                <?php if ($jadwal['jadwal_kegiatan'] != null) : ?>
                                    <th scope="row" class="text-center fs14"><?= $i; ?></th>
                                    <td class="fs14"><?= $jadwal['jadwal_kegiatan']; ?></td>
                                    <td class="fs14"><?= $jadwal['jadwal_pelaksanaan']; ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End main section -->

<?= $this->endSection(); ?>