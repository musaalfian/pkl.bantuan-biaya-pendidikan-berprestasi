<?php

namespace App\Controllers;


use App\Models\MAgama;
use App\Models\MFile;
use App\Models\MPrestasi;
use App\Models\MKecamatan;
use App\Models\MIdentitas;
use App\Models\MKeluarga;
use App\Models\MSekolah;
use App\Models\MStatusFinal;
use App\Models\MStatusPembayaran;
use App\Models\MStatusPendaftaran;
use App\Models\MStatusPeserta;
use App\Models\MTransportasi;

class Pendaftaran extends BaseController
{
    protected $MAgama;
    protected $MFile;
    protected $MPrestasi;
    protected $MKecamatan;
    protected $MIdentitas;
    protected $MKeluarga;
    protected $MSekolah;
    protected $MStatusFinal;
    protected $MStatusPembayaran;
    protected $MStatusPendaftaran;
    protected $MStatusPeserta;
    protected $MTransportasi;

    public function __construct()
    {
        $this->MAgama = new MAgama();
        $this->MFile = new MFile();
        $this->MPrestasi = new MPrestasi();
        $this->MKecamatan = new MKecamatan();
        $this->MIdentitas = new MIdentitas();
        $this->MKeluarga = new MKeluarga();
        $this->MSekolah = new MSekolah();
        $this->MStatusFinal = new MStatusFinal();
        $this->MStatusPembayaran = new MStatusPembayaran();
        $this->MStatusPendaftaran = new MStatusPendaftaran();
        $this->MStatusPeserta = new MStatusPeserta();
        $this->MTransportasi = new MTransportasi();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }
    // menampilkan form tambah data pendaftaran
    public function tambah_pendaftar($id_peserta)
    {
        // form identitas
        $agama = $this->MAgama->findAll();
        $sekolah = $this->MSekolah->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        $transportasi = $this->MTransportasi->findAll();
        $akreditasi = ['A', 'B', 'C'];
        $semester_ke = ['1', '2', '3', '4', '5', '6', '7', '8'];
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        // dd($identitas);
        // form keluarga
        if ($identitas != null) {
            $keluarga = $this->MKeluarga->find_keluarga_noinduk($identitas['no_induk'])->getFirstRow('array');
        } else {
            $keluarga = null;
        }
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        // form lampiran
        if ($identitas != null) {
            $file = $this->MFile->find_file_noinduk($identitas['no_induk'])->getFirstRow('array');
        } else {
            $file = null;
        }
        if ($id_peserta == 1) {
            $kategori = ['perlombaan', 'hafidz', 'lainnya'];
        } elseif ($id_peserta == 2) {
            $kategori = ['perlombaan', 'ujian sekolah', 'hafidz', 'lainnya'];
        } else {
            $kategori = ['perlombaan', 'KHS', 'hafidz', 'lainnya'];
        }
        $tingkat = ['internasional', 'nasional', 'provinsi', 'karesidenan', 'kabupaten'];
        $juara = ['juara 1', 'juara 2', 'juara 3', 'paskibra', 'peserta'];
        if ($identitas != null) {
            $prestasi = $this->MPrestasi->find_prestasi_noinduk($identitas['no_induk'])->getResultArray();
        } else {
            $prestasi = null;
        }
        // validasi form
        session();
        $validation = \Config\Services::validation();
        $opsional = ['ya', 'tidak'];
        // dd($id_peserta);
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'opsional'  => $opsional,
            'id_peserta'  => $id_peserta,
            'akreditasi_pt'    => $akreditasi,
            'semester_ke'    => $semester_ke,
            // form identitas
            'agama'     => $agama,
            'sekolah'     => $sekolah,
            'kecamatan' => $kecamatan,
            'transportasi'  => $transportasi,
            'identitas' => $identitas,
            // form keluarga
            'keluarga'    => $keluarga,
            'pendidikan'    => $pendidikan,
            // form lampiran
            'kategori'      => $kategori,
            'tingkat'   => $tingkat,
            'juara'     => $juara,
            'file'      => $file,
            'prestasi'      => $prestasi
        ];
        return view('/pendaftar/pendaftaran/form_pendaftaran', $data);
    }
    // menampilkan form review data pendaftaran
    public function review_pendaftaran($no_induk)
    {
        session();
        $validation = \Config\Services::validation();
        $kategori = ['perlombaan', 'hafidz', 'KHS', 'ujian sekolah', 'lainnya'];
        $agama = $this->MAgama->findAll();
        $sekolah = $this->MSekolah->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        $transportasi = $this->MTransportasi->findAll();
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');
        $prestasi = $this->MPrestasi->find_prestasi_noinduk($no_induk)->getResultArray();
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        $tingkat = ['internasional', 'nasional', 'provinsi', 'karesidenan', 'kabupaten'];
        $juara = ['juara 1', 'juara 2', 'juara 3', 'paskibra', 'peserta'];
        $akreditasi = ['A', 'B', 'C'];
        $semester_ke = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
        for ($i = count($prestasi) + 1; $i <= 3; $i++) {
            $prestasi[] = null;
        }
        $opsional = ['ya', 'tidak'];
        // dd($prestasi);
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'identitas' => $identitas,
            'kategori'  => $kategori,
            'agama'     => $agama,
            'sekolah'     => $sekolah,
            'kecamatan' => $kecamatan,
            'transportasi'  => $transportasi,
            'identitas' => $identitas,
            'keluarga'    => $keluarga,
            'prestasi'  => $prestasi,
            'file'      => $file,
            'pendidikan'    => $pendidikan,
            'tingkat'   => $tingkat,
            'juara'     => $juara,
            'opsional'  => $opsional,
            'akreditasi_pt' =>   $akreditasi,
            'semester_ke'    => $semester_ke,
        ];
        return view('/pendaftar/pendaftaran/review_pendaftaran', $data);
    }
    // menyimpan data pendaftaran
    public function simpanPendaftaran($no_induk)
    {
        $data = [
            'id_status_pendaftaran'    => 4
        ];
        $this->MIdentitas->update($no_induk, $data);
        // menambhakan log identitas
        $log_identitas = [
            'no_induk' => $no_induk,
            'id_status_pendaftaran_log' => 4,
        ];
        $this->MIdentitasLog->insert($log_identitas);
        return redirect()->to('home_pendaftar/pengumuman');
    }
    // menampilkan form edit pendaftaran
    public function edit_pendaftaran( )
    {
        session();
        $validation = \Config\Services::validation();
        // Form identitas
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $no_induk = user()->no_induk;
        $id_peserta = $identitas['id_status_peserta'];
        $agama = $this->MAgama->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        // Form keluarga
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        // Form lampiran
        $prestasi = $this->MPrestasi->find_prestasi_noinduk($no_induk)->getResultArray();
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $tingkat = ['internasional', 'nasional', 'provinsi', 'karesidenan', 'kabupaten'];
        $juara = ['juara 1', 'juara 2', 'juara 3', 'paskibra', 'peserta'];
        $akreditasi = ['A', 'B', 'C'];
        $semester_ke = ['1', '2', '3', '4', '5', '6', '7', '8'];

        // Siswa
        if ($id_peserta == 1) {
            $sekolah = $this->MSekolah->findAll();
            $transportasi = $this->MTransportasi->findAll();
            $kategori = ['perlombaan', 'hafidz', 'lainnya'];
        } // Calom mahasiswa
        elseif ($id_peserta == 2) {
            $kategori = ['perlombaan', 'hafidz', 'lainnya'];
            $sekolah = null;
            $transportasi = null;
            $kategori = ['perlombaan', 'ujian sekolah', 'hafidz', 'lainnya'];
        } // Mahasiswa 
        else {
            $kategori = ['perlombaan', 'KHS', 'hafidz', 'lainnya'];
            $sekolah = null;
            $transportasi = null;
        }
        for ($i = count($prestasi) + 1; $i <= 3; $i++) {
            $prestasi[] = null;
        }
        $opsional = ['ya', 'tidak'];
        // dd($validation->getError('scan_prestasi_2'));
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'identitas' => $identitas,
            'id_peserta' => $id_peserta,
            'kategori'  => $kategori,
            'agama'     => $agama,
            'sekolah'     => $sekolah,
            'kecamatan' => $kecamatan,
            'transportasi'  => $transportasi,
            'identitas' => $identitas,
            'keluarga'    => $keluarga,
            'prestasi'  => $prestasi,
            'file'      => $file,
            'pendidikan'    => $pendidikan,
            'tingkat'   => $tingkat,
            'juara'     => $juara,
            'akreditasi_pt'     => $akreditasi,
            'semester_ke'     => $semester_ke,

            'opsional'  => $opsional
        ];
        return view('/pendaftar/pendaftaran/edit_form_pendaftaran', $data);
    }
    // simpan edit formulir pendaftaran
    public function simpanEditPendaftaran()
    {
        $no_induk = user()->no_induk;
        $id_peserta = $this->MIdentitas->where('no_induk', $no_induk)->findColumn('id_status_peserta');
        $formulir_pendaftaran = $this->request->getFile('scan_formulir_pendaftaran');
        $formulir_pendaftaran_lama = $this->request->getVar('scan_formulir_pendaftaran_lama');
        if (!$this->validate(
            [
                'scan_formulir_pendaftaran' => 'uploaded[scan_formulir_pendaftaran]|mime_in[scan_formulir_pendaftaran,application/pdf]',
            ],
            [   // Errors
                'scan_formulir_pendaftaran' => [
                    'mime_in' => 'Scan prestasi harus berupa file PDF',
                ],
            ]
        )) {
            return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
        }
        if ($formulir_pendaftaran->getError() != 4) {
            // mengambil nama file scan dan dimasukkan ke array
            $nama_formulir_pendaftaran = $formulir_pendaftaran->getName();
            // memindahkan file scan ke folder scan
            $formulir_pendaftaran->move('assets/scan/' . $no_induk . '/file');
            unlink('assets/scan/' . $no_induk . '/file/' . $formulir_pendaftaran_lama);
        } else {
            $nama_formulir_pendaftaran = null;
        }
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $this->MFile->update($file['id_file'], [
            'formulir_pendaftaran' => $nama_formulir_pendaftaran
        ]);
        // update status pendaftaran
        $data = [
            'id_status_pendaftaran'    => 4,
            'status_edit_pendaftaran'    => 2
        ];
        $this->MIdentitas->update($no_induk, $data);
        return redirect()->to('home_pendaftar/pengumuman');
    }
}