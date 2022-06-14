<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- ICON -->
    <script src="https://kit.fontawesome.com/5fbcc24921.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- CSS Custom -->
    <link rel="stylesheet" href="" />
    <style>
        * {
            font-family: "Times New Roman", Times, serif !important;
            padding: 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
        }

        .table-cetak> :not(caption)>*>* {
            padding: 0;
        }

        p {
            font-size: 12px;
            margin-bottom: 0;
        }

        h5 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 0;
        }

        td {
            font-size: 12px;
            padding-left: 0.5% !important;
            border: 1px solid;
        }

        th {
            font-size: 12px;
            border: 1px solid;
        }

        .table-identitas td {
            border: none;
        }

        .text-center-cetak {
            text-align: center;
        }

        .mt20-cetak {
            margin-top: 20px;
        }

        .row-cetak {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6-kiri-cetak {
            float: left;
            width: 50%;
            min-height: 10%;
            max-height: 15%;
        }

        .col-6-kanan-cetak {
            float: right;
            width: 50%;
            min-height: 10%;
            max-height: 15%;
        }

        .col-10-cetak {
            /* flex: 0 0 auto;
        width: 83.33333333%; */
            float: left;
            width: 70%;
            min-height: 25%;
            max-height: 30%;
        }

        .table-cetak {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .overflow-auto-cetak {
            overflow: auto !important;
        }

        .ms-1-cetak {
            margin-left: 0.25rem !important;
        }

        .align-self-end-cetak {
            align-self: flex-end !important;
        }

        .col-2-cetak {
            /* flex: 0 0 auto;
        width: 16.66666667%; */
            float: right;
            width: 30%;
            min-height: 25%;
            max-height: 30%;
        }

        .border-cetak {
            border: 1px solid #dee2e6 !important;
        }

        .ms-3-cetak {
            margin-left: 1rem !important;
        }

        .container-cetak {
            max-width: 720px;
            margin: 0 auto;
        }

        /* @media print {
        #print {
            display: none;
        }

        #title {
            display: none;
        }

        @page {
            margin: 0;
        }

        body {
            margin: 1cm;
        }
    } */
    </style>
    <!-- <title id="title">Formulir_Pendaftaran_'Nama'</title> -->
</head>

<body>
    <!-- kepala -->
    <div class="mt20-cetak">
        <h5 class="text-center-cetak">
            FORMULIR PENDAFTARAN <br />
            PROGRAM BANTUAN BIAYA PENDIDIKAN BAGI <br />
            <?= ($detail_pendaftar['id_status_peserta'] == 1) ? 'PESERTA DIDIK PENDIDIKAN MENENGAH' : 'MAHASISWA/CALON MAHASISWA'; ?>
            YANG BERPRESTASI BAGI
            KELUARHA
            MISKIN <br />
            KABUPATEN BATANG TAHUN ANGGARAN 2022
        </h5>
    </div>
    <!-- end kepala -->
    <div class="container-cetak" style="margin-top: 20px">
        <!-- identitas diri -->
        <div class="mt20-cetak">
            <h5>A. IDENTITAS DIRI</h5>
            <div class="container-cetak">
                <div class="">
                    <div class="col-10-cetak">
                        <table class="table-cetak overflow-auto-cetak table-identitas">
                            <?php $i = 1; ?>
                            <tr>
                                <td style="width: 1%"><?= $i; ?>.</td>
                                <td style="width: 35%">Nama lengkap</td>
                                <td>: <?= $detail_pendaftar['nama_lengkap']; ?></td>
                                <?php $i++ ?>
                            </tr>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>Jenis kelamin</td>
                                <td>: <?= ($detail_pendaftar['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                                </td>
                                <?php $i++ ?>
                            </tr>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= ($detail_pendaftar['id_status_peserta'] == 1 || $detail_pendaftar['id_status_peserta'] == 2) ? 'NISN' : 'NIM'; ?>
                                </td>
                                <td>: <?= $detail_pendaftar['no_induk_pelajar']; ?></td>
                                <?php $i++ ?>
                            </tr>
                            <!-- end no induk -->
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>Tempat, tanggal lahir</td>
                                <td>: <?= $detail_pendaftar['ttl']; ?></td>
                                <?php $i++ ?>
                            </tr>
                            <!-- end ttl -->
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>Agama</td>
                                <td>: <?= $detail_pendaftar['nama_agama']; ?></td>
                                <?php $i++ ?>
                            </tr>
                            <?php if ($detail_pendaftar['id_status_peserta'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Anak yang ke</td>
                                    <td>: <?= $detail_pendaftar['anak_ke']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>No telp/HP yang dapat dihubungi</td>
                                <td>: <?= $detail_pendaftar['no_telepon']; ?></td>
                                <?php $i++ ?>
                            </tr>

                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>Alamat</td>
                                <td>
                                    <!-- <table class="table table-identitas">
                                        <tr>
                                            <td class="border-0" style="width: 30%">: RT 07</td>
                                            <td class="border-0">RW 08</td>
                                        </tr>
                                    </table> -->
                                    <table class="table-cetak ms-1-cetak">
                                        <tr>
                                            <td><?= $detail_pendaftar['alamat_rumah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan : <?= $detail_pendaftar['nama_kecamatan']; ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <?php $i++ ?>
                            </tr>
                            <!-- jika pendaftar berstatus peserta didik -->
                            <?php if ($detail_pendaftar['id_status_peserta'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Jarak dari rumah ke sekolah</td>
                                    <td>: <?= $detail_pendaftar['jarak_sekolah']; ?> Km</td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Transportsi siswa ke sekolah</td>
                                    <td>: <?= $detail_pendaftar['nama_transportasi']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Sekolah</td>
                                    <td>: <?= $detail_pendaftar['nama_sekolah']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Kelas</td>
                                    <td>: <?= $detail_pendaftar['kelas']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Alamat sekolah asal</td>
                                    <td>: <?= $detail_pendaftar['alamat_sekolah']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <!-- jika pendaftar berstatus mahasiswa/calon mahasiswa -->
                            <?php else : ?>
                                <tr>
                                    <td style="width: 1%"><?= $i; ?>.</td>
                                    <td style="width: 35%">Nama Perguruan Tinggi</td>
                                    <td>: <?= $detail_pendaftar['nama_pt']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Akreditasi PT</td>
                                    <td>: <?= $detail_pendaftar['nilai_akreditasi_pt']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Tahun Masuk/Semester Ke</td>
                                    <td>: <?= $detail_pendaftar['tahun_masuk_pt']; ?> /
                                        <?= $detail_pendaftar['semester_ke']; ?> </td>
                                    <?php $i++ ?>
                                </tr>
                                <tr>
                                    <td><?= $i; ?>.</td>
                                    <td>Alamat PT</td>
                                    <td>: <?= $detail_pendaftar['alamat_pt']; ?></td>
                                    <?php $i++ ?>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div class="col-2-cetak align-self-end-cetak"><img style="width: 113px; height: 150px;" src="<?= $image; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end identitas diri -->
        <!-- jenis Prestasi -->
        <h5>B. PILIHAN JENIS PRESTASI YANG DIMILIKI</h5>
        <p>
            <small style="font-style: italic">(diisi sesuai dengan prestasi yang dimiliki, apabila tidak cukup
                dapat ditulis di lembar tersedia</small>
        </p>
        <table class="table-cetak border-cetak">
            <tr>
                <th class="text-center-cetak">No</th>
                <th class="text-center-cetak">Nama Prestasi</th>
                <th class="text-center-cetak">Tingkat</th>
                <th class="text-center-cetak">Juara</th>
                <th class="text-center-cetak">Tahun</th>
            </tr>
            <?php $j = 1; ?>
            <?php foreach ($prestasi as $prestasi) : ?>
                <tr>
                    <td class="text-center-cetak"><?= $j; ?></td>
                    <td><?= $prestasi['nama_prestasi']; ?></td>
                    <td><?= ($prestasi['tingkat'] != null) ? $prestasi['tingkat'] : '-'; ?></td>
                    <td><?= ($prestasi['juara'] != null) ? $prestasi['juara'] : '-'; ?></td>
                    <td><?= $prestasi['tahun_prestasi']; ?></td>
                </tr>
                <?php $j++; ?>
            <?php endforeach; ?>
        </table>
        <!-- end jenis prestasi -->
        <!-- kondisi keluarga -->
        <h5>C. KONDISI KELUARGA</h5>
        <table class="table-cetak">
            <tr>
                <th class="text-center-cetak">DATA</th>
                <th class="text-center-cetak">AYAH</th>
                <th class="text-center-cetak">IBU</th>
                <!-- <th class="text-center-cetak">WALI</th> -->
            </tr>
            <tr>
                <td>a. Nama</td>
                <td><?= $detail_pendaftar['nama_ayah']; ?></td>
                <td><?= $detail_pendaftar['nama_ibu']; ?></td>
                <!-- <td>AAAAA</td> -->
            </tr>
            <?php if ($detail_pendaftar['id_status_peserta'] != 1) : ?>
                <tr>
                    <td>b. Usia</td>
                    <td><?= $detail_pendaftar['usia_ayah']; ?></td>
                    <td><?= $detail_pendaftar['usia_ibu']; ?></td>
                    <!-- <td>AAAAA</td> -->
                </tr>
            <?php endif ?>
            <tr>
                <td>c. Pekerjaan</td>
                <td><?= $detail_pendaftar['pekerjaan_ayah']; ?></td>
                <td><?= $detail_pendaftar['pekerjaan_ibu']; ?></td>
                <!-- <td>AAAAA</td> -->
            </tr>
            <tr>
                <td>d. Pedidikan Terakhir</td>
                <td><?= $detail_pendaftar['pendidikan_ayah']; ?></td>
                <td><?= $detail_pendaftar['pendidikan_ibu']; ?></td>
                <!-- <td>AAAAA</td> -->
            </tr>
            <tr>
                <td>e. Penghasilan Perbulan</td>
                <td><?= $detail_pendaftar['penghasilan_ayah']; ?></td>
                <td><?= $detail_pendaftar['penghasilan_ibu']; ?></td>
                <!-- <td>AAAAA</td> -->
            </tr>
            <tr>
                <td>f. Alamat</td>
                <td><?= $detail_pendaftar['alamat_ayah']; ?></td>
                <td><?= $detail_pendaftar['alamat_ibu']; ?></td>
                <!-- <td>AAAAA</td> -->
            </tr>
        </table>
        <p>
            <small style="font-style: italic">Keterangan: Kolom Wali diisi apabila peserta didik tinggal bersama
                wali/orag tua asuh</small>
        </p>
        <!-- end kondisi keluarga -->
        <!-- apakah calon penerima bantuan  -->
        <h5>D. APAKAH CALON PENERIMA BANTUAN TERDAFTAR SEBAGAI :</h5>
        <div class="ms-3-cetak">
            <p>
                a. Rumah Tangga Sangat Miskin(RTSM) / Rumah Tangga Miskin (RTM)?
                <?= ucfirst($detail_pendaftar['rtsm_rtm']); ?>
            </p>
            <p>
                b. Peserta Program Keluarga Harapan (PKH)/Kart Keluarga Sejahtera
                (KKS) dan Kartu Batang Sehat (KBS)? <?= ucfirst($detail_pendaftar['pkh_kks_kbs']); ?>
            </p>
            <p>c. Penerimaan BSM atau Kartu Indonesia Pintar (KIP)? <?= ucfirst($detail_pendaftar['bsm_kip']); ?></p>
        </div>
        <!-- end apakah calon penerima -->
        <!-- pernah menrima bantuan -->
        <h5>E. APAKAH CALON PENERIMA BEASISIWA PERNAH MENERIMA BANTUAN?</h5>
        <p class="ms-3-cetak">
            <?php if ($detail_pendaftar['pernah_menerima_bantuan'] == 'ya') {
                echo 'Ya, dari ' . $detail_pendaftar['menerima_bantuan_dari'];
            } else {
                echo 'Tidak';
            } ?>
        </p>
        <!-- end penerima bantuan -->
        <p>
            Yang bertandatangan mengetahui di bawah ini, bertanggungjawab secara
            hukum terhadap kebenaran data yang dicantum
        </p>
        <div class="" style="margin-top: 20px ;">
            <div class="col-6-kiri-cetak">
                <div class="text-center-cetak">
                    <p>Mengetahui</p>
                    <p>Orangtua/Wali</p>
                    <div style="height: 50px"></div>
                    <p><?= $detail_pendaftar['nama_ayah']; ?> / <?= $detail_pendaftar['nama_ibu']; ?></p>
                </div>
            </div>
            <div class="col-6-kanan-cetak">
                <div class="text-center-cetak">
                    <p>Batang, <?= $tanggal_sekarang
                                ?></p>
                    <p>Peserta Didik</p>
                    <div style="height: 50px"></div>
                    <p><?= $detail_pendaftar['nama_lengkap']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="mt-3">
            <button id="print" class="btn btn-primary" onclick="window.print()">
                Print this page
            </button>
        </div>
    </div> -->
    <!-- <script>
    window.print();
    </script> -->
</body>

</html>