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

class Mahasiswa extends BaseController
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
    public function tambah_identitas_mhs()
    {
        $akreditasi = ['A', 'B', 'C'];
        $semester_ke = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $agama = $this->MAgama->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        $transportasi = $this->MTransportasi->findAll();
        session();
        $validation = \Config\Services::validation();
        $opsional = ['ya', 'tidak'];
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'identitas' => $identitas,
            'agama'     => $agama,
            'kecamatan' => $kecamatan,
            'transportasi'  => $transportasi,
            'akreditasi_pt'    => $akreditasi,
            'semester_ke'    => $semester_ke,
            'validation'    => $validation,
            'opsional'  => $opsional
        ];
        return view('/pendaftar/mhs/form_identitas_mhs', $data);
    }
    public function simpan_tambah_identitas_mhs($id_peserta)
    {
        // dd($this->request->getVar('alamat_pt'));
        $user_id = user_id();
        if (!$this->validate([
            'no_induk'    => 'required|is_unique[identitas.no_induk]',
            'no_induk_pelajar'    => 'required',
            'nama_lengkap'      => 'required|alpha_space',
            'jenis_kelamin'    => 'required',
            'ttl'    => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Bagian tempat, tanggal lahir  wajib diisi',
                ]
            ],
            'agama'    => 'required',
            'no_telepon'     => 'required|numeric',
            'alamat_rumah'    => 'required',
            'kecamatan'    => 'required',
            'nama_pt'    => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Bagian nama perguruan tinggi  wajib diisi',
                ]
            ],
            'akreditasi_pt'    => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Bagian akreditasi perguruan tinggi  wajib diisi',
                ]
            ],
            'tahun_masuk_pt'    => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Bagian tahun masuk perguruan tinggi  wajib diisi',
                ]
            ],
            'alamat_pt'    => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Bagian alamat perguruan tinggi  wajib diisi',
                ]
            ],
            'semester_ke'    => 'required',
            'pernah_menerima_bantuan'    => 'required',
        ])) {
            return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta)->withInput();
        }
        if ($this->request->getVar('pernah_menerima_bantuan') == 'ya') {
            $menerima_bantuan = $this->request->getVar('menerima_bantuan_dari');
        } else {
            $menerima_bantuan = '';
        }
        $no_induk = $this->request->getVar('no_induk');
        $this->MIdentitas->insert([
            'no_induk' => $no_induk,
            'no_induk_pelajar'    => $this->request->getVar('no_induk_pelajar'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'id_agama' => $this->request->getVar('agama'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),
            'nama_pt' => $this->request->getVar('nama_pt'),
            'akreditasi_pt' => $this->request->getVar('akreditasi_pt'),
            'tahun_masuk_pt' => $this->request->getVar('tahun_masuk_pt'),
            'semester_ke' => $this->request->getVar('semester_ke'),
            'alamat_pt' => $this->request->getVar('alamat_pt'),
            'id_status_peserta'    => $id_peserta,
            'pernah_menerima_bantuan' => $this->request->getVar('pernah_menerima_bantuan'),
            'menerima_bantuan_dari' => $menerima_bantuan,
        ]);
        $this->db->query("UPDATE `users` SET `no_induk`='$no_induk' WHERE `users`.`id` = $user_id");
        session()->setFlashdata('pesan-tambah-identitas-mhs', 'Data identitas diri berhasil ditambahkan.');
        return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta);
    }
    // Keluarga mahasiswa
    public function tambah_keluarga_mhs($no_induk)
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        // dd($keluarga);
        session();
        $validation = \Config\Services::validation();
        $opsional = ['ya', 'tidak'];
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'identitas' => $identitas,
            'keluarga'    => $keluarga,
            'pendidikan'    => $pendidikan,
            'opsional'  => $opsional
        ];
        return view('/pendaftar/pendaftaran/form_keluarga', $data);
    }
    public function simpan_tambah_keluarga_mhs($no_induk)
    {
        $id_peserta = $this->MIdentitas->where('no_induk', $no_induk)->findColumn('id_status_peserta');

        if (!$this->validate([
            'nama_ayah'    => 'required|alpha_space',
            'usia_ayah'    => 'required|numeric',
            'pekerjaan_ayah'      => 'required',
            'pendidikan_ayah'    => 'required',
            'penghasilan_ayah'    => 'required|numeric',
            'alamat_ayah'    => 'required',
            'nama_ibu'     => 'required',
            'usia_ibu'     => 'required|numeric',
            'pekerjaan_ibu'    => 'required',
            'pendidikan_ibu'    => 'required',
            'penghasilan_ibu'    => 'required|numeric',
            'alamat_ibu'    => 'required',
            'rtsm_rtm'    => 'required',
            'pkh_kks_kbs'    => 'required',
            'bsm_kip'    => 'required',
        ])) {
            return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
        }
        // dd($no_induk);
        // memasukkan data keluarga ke database
        $this->MKeluarga->insert([
            'no_induk'  => $no_induk,
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'usia_ayah' => $this->request->getVar('usia_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pendidikan_ayah' => $this->request->getVar('pendidikan_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'alamat_ayah' => $this->request->getVar('alamat_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'usia_ibu' => $this->request->getVar('usia_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'pendidikan_ibu' => $this->request->getVar('pendidikan_ibu'),
            'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
            'alamat_ibu' => $this->request->getVar('alamat_ibu'),
            'rtsm_rtm' => $this->request->getVar('rtsm_rtm'),
            'pkh_kks_kbs' => $this->request->getVar('pkh_kks_kbs'),
            'bsm_kip' => $this->request->getVar('bsm_kip'),
        ]);
        session()->setFlashdata('pesan-tambah-keluarga-mhs', 'Data kondisi keluarga berhasil ditambahkan.');
        return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0]);
    }
    public function tambah_lampiran_mhs($no_induk)
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $kategori = ['perlombaan', 'KHS', 'hafidz', 'lainnya'];
        $tingkat = ['internasional', 'nasional', 'provinsi', 'karesidenan', 'kabupaten'];
        $juara = ['juara 1', 'juara 2', 'juara 3', 'paskibra', 'peserta'];
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        // dd($prestasi);
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'identitas'     => $identitas,
            'kategori'      => $kategori,
            'tingkat'   => $tingkat,
            'file'      => $file,
            'juara'     => $juara
        ];
        return view('/pendaftar/mhs/form_lampiran_mhs', $data);
    }
    public function simpan_tambah_lampiran_mhs($no_induk)
    {
        $id_peserta = $this->MIdentitas->where('no_induk', $no_induk)->findColumn('id_status_peserta');

        // juara
        $juara_1 = $this->request->getVar('juara_1');
        $juara_2 = $this->request->getVar('juara_2');
        $juara_3 = $this->request->getVar('juara_3');
        // tingkat
        $tingkat_1 = $this->request->getVar('tingkat_1');
        $tingkat_2 = $this->request->getVar('tingkat_2');
        $tingkat_3 = $this->request->getVar('tingkat_3');
        // kategori
        $kategori_1 = $this->request->getVar('kategori_1');
        $kategori_2 = $this->request->getVar('kategori_2');
        $kategori_3 = $this->request->getVar('kategori_3');
        // Validasi Prestasi 2 & 3
        // ambil scan prestasi 2 & 3
        $scan_prestasi = [
            'prestasi_1' => $this->request->getFile('scan_prestasi_1'),
            'prestasi_2' => $this->request->getFile('scan_prestasi_2'),
            'prestasi_3' => $this->request->getFile('scan_prestasi_3'),
        ];
        // Validasi Prestasi 2
        if ($kategori_2 == 'KHS' || $kategori_2 == 'hafidz' || $kategori_2 == 'lainnya') {
            if (!$this->validate([
                'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        } else if ($scan_prestasi['prestasi_2']->getError() != 4 || $juara_2 != null || $tingkat_2 != null) {
            if (!$this->validate([
                'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                'tingkat_2' => 'required',
                'juara_2' => 'required',
                'nama_prestasi_2' => 'required',
                'tahun_prestasi_2' => 'required',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        }
        // Validasi Prestasi 3
        if ($kategori_3 == 'KHS' || $kategori_3 == 'hafidz' || $kategori_3 == 'lainnya') {
            if (!$this->validate([
                'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        } else if ($scan_prestasi['prestasi_3']->getError() != 4 || $juara_3 != null || $tingkat_3 != null) {
            if (!$this->validate([
                'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                'tingkat_3' => 'required',
                'juara_3' => 'required',
                'nama_prestasi_3' => 'required',
                'tahun_prestasi_3' => 'required',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        }
        // Validasi Lampiran file
        // dd($juara_1);
        if ($kategori_1 == 'hafidz' || $kategori_1 == 'KHS' || $kategori_1 == 'lainnya') {
            if (!$this->validate([
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_prestasi_1' => 'uploaded[scan_prestasi_1]|max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'scan_kk' => 'uploaded[scan_kk]|max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'uploaded[scan_ktp]|max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'uploaded[scan_kartu_pelajar]|max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'uploaded[scan_sktm]|max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_akreditasi_pt' => 'uploaded[scan_akreditasi_pt]|max_size[scan_akreditasi_pt,2048]|mime_in[scan_akreditasi_pt,application/pdf]',
                'scan_proposal' => 'uploaded[scan_proposal]|max_size[scan_proposal,5120]|mime_in[scan_proposal,application/pdf]',
                'scan_pas_foto' => 'uploaded[scan_pas_foto]|max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        } else {
            if (!$this->validate([
                'scan_prestasi_1' => 'uploaded[scan_prestasi_1]|max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'tingkat_1' => 'required',
                'juara_1' => 'required',
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_kk' => 'uploaded[scan_kk]|max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'uploaded[scan_ktp]|max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'uploaded[scan_kartu_pelajar]|max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'uploaded[scan_sktm]|max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_akreditasi_pt' => 'uploaded[scan_akreditasi_pt]|max_size[scan_akreditasi_pt,2048]|mime_in[scan_akreditasi_pt,application/pdf]',
                'scan_proposal' => 'uploaded[scan_proposal]|max_size[scan_proposal,5120]|mime_in[scan_proposal,application/pdf]',
                'scan_pas_foto' => 'uploaded[scan_pas_foto]|max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal ditambahkan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0])->withInput();
            }
        }
        // dd($kategori_2);
        // dd($scan_prestasi);
        // pindahkan file prestasi ke scan
        foreach ($scan_prestasi as $file_scan_prestasi) {
            if ($file_scan_prestasi != null && $file_scan_prestasi->getError() != 4) {
                // mengambil nama file prestasi dan dimasukkan ke array
                $nama_scan_prestasi[] = $file_scan_prestasi->getName();
                // memindahkan file scan prestasi ke folder scan
                $file_scan_prestasi->move('assets/scan/' . $no_induk . '/prestasi');
            } else {
                $nama_scan_prestasi[] = null;
            }
        }
        // dd($nama_scan_prestasi);
        // memasukkab data prestasi ke database
        for ($i = 1; $i <= 3; $i++) {
            if ($scan_prestasi['prestasi_' . $i]->getError() != 4) {
                if ($this->request->getVar('kategori_' . $i) == 'hafidz') {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'kategori' => 'hafidz',
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'no_induk' => $no_induk,
                        'tingkat' => null,
                        'juara' => null,
                    ]);
                } else if ($this->request->getVar('kategori_' . $i) == 'KHS') {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'kategori' => "KHS",
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'no_induk' => $no_induk,
                        'tingkat' => null,
                        'juara' => null,
                    ]);
                } else if ($this->request->getVar('kategori_' . $i) == 'perlombaan') {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'kategori' => $this->request->getVar('kategori_' . $i),
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'tingkat' => $this->request->getVar('tingkat_' . $i),
                        'juara' => $this->request->getVar('juara_' . $i),
                        'no_induk' => $no_induk
                    ]);
                } else {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'kategori' => $this->request->getVar('kategori_' . $i),
                        'tingkat' => null,
                        'juara' => null,
                        'no_induk' => $no_induk
                    ]);
                }
            }
        }

        //ambil file inputan
        $scan = [
            $this->request->getFile('scan_kk'),
            $this->request->getFile('scan_ktp'),
            $this->request->getFile('scan_kartu_pelajar'),
            $this->request->getFile('scan_akreditasi_pt'),
            $this->request->getFile('scan_proposal'),
            $this->request->getFile('scan_sktm'),
            $this->request->getFile('scan_pas_foto')
        ];

        // pindahkan file ke scan
        foreach ($scan as $scan) {
            // mengambil nama file scan dan dimasukkan ke array
            $nama_scan[] = $scan->getName();
            // memindahkan file scan ke folder scan
            $scan->move('assets/scan/' . $no_induk . '/file');
        }

        // memasukkan data lampiran ke database
        $this->MFile->insert([
            'no_induk'  => $no_induk,
            'kk' => $nama_scan[0],
            'ktp' => $nama_scan[1],
            'kartu_pelajar' => $nama_scan[2],
            'akreditasi_pt' => $nama_scan[3],
            'proposal' => $nama_scan[4],
            'sktm' => $nama_scan[5],
            'pas_foto' => $nama_scan[6],
        ]);
        // session()->setFlashdata('pesan-tambah-keluarga-siswa', 'Data kondisi keluarga berhasil ditambahkan.');
        return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0]);
    }
    public function simpan_formulir_pendaftaran($no_induk)
    {
        $id_peserta = $this->MIdentitas->where('no_induk', $no_induk)->findColumn('id_status_peserta');

        $formulir_pendaftaran = $this->request->getFile('scan_formulir_pendaftaran');
        if ($formulir_pendaftaran->getError() != 4) {
            // mengambil nama file scan dan dimasukkan ke array
            $nama_formulir_pendaftaran = $formulir_pendaftaran->getName();
            // memindahkan file scan ke folder scan
            $formulir_pendaftaran->move('assets/scan/' . $no_induk . '/file');
        } else {
            $nama_formulir_pendaftaran = null;
        }
        // dd($nama_formulir_pendaftaran);
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $this->MFile->update($file['id_file'], [
            'formulir_pendaftaran' => $nama_formulir_pendaftaran
        ]);
        return redirect()->to('pendaftaran/tambah_pendaftar/' . $id_peserta[0]);
    }
    public function edit_mhs($no_induk)
    {
        session();
        $validation = \Config\Services::validation();
        $agama = $this->MAgama->findAll();
        $sekolah = $this->MSekolah->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        $transportasi = $this->MTransportasi->findAll();
        $akreditasi = ['A', 'B', 'C'];
        $semester_ke = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');
        $prestasi = $this->MPrestasi->find_prestasi_noinduk($no_induk)->getResultArray();
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        $kategori = ['perlombaan', 'KHS', 'hafidz', 'lainnya'];
        $tingkat = ['internasional', 'nasional', 'provinsi', 'karesidenan', 'kabupaten'];
        $juara = ['juara 1', 'juara 2', 'juara 3', 'paskibra', 'peserta'];
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
            'akreditasi_pt'    => $akreditasi,
            'semester_ke'    => $semester_ke,
            'identitas' => $identitas,
            'keluarga'    => $keluarga,
            'prestasi'  => $prestasi,
            'file'      => $file,
            'pendidikan'    => $pendidikan,
            'tingkat'   => $tingkat,
            'juara'     => $juara,
            'opsional'  => $opsional

        ];
        return view('/pendaftar/mhs/edit_form_pendaftar_mhs', $data);
    }
    public function simpan_edit_mhs($no_induk)
    {
        /*******************    IDENTITAS    ********************/
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $input_no_induk = $this->request->getVar('no_induk');
        // dd($identitas['no_induk']);
        // dd($input_no_induk);
        if ($identitas['no_induk'] != $input_no_induk) {
            if (!$this->validate([
                'no_induk'    => 'required|numeric|is_unique[identitas.no_induk]',
                'no_induk_pelajar'    => 'required',
                'nama_lengkap'      => 'required|alpha_space',
                'jenis_kelamin'    => 'required',
                'ttl'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian tempat, tanggal lahir  wajib diisi',
                    ]
                ],
                'agama'    => 'required',
                'no_telepon'     => 'required|numeric',
                'alamat_rumah'    => 'required',
                'kecamatan'    => 'required',
                'nama_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian nama perguruan tinggi  wajib diisi',
                    ]
                ],
                'akreditasi_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian akreditasi perguruan tinggi  wajib diisi',
                    ]
                ],
                'tahun_masuk_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian tahun masuk perguruan tinggi  wajib diisi',
                    ]
                ],
                'alamat_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian alamat perguruan tinggi  wajib diisi',
                    ]
                ],
                'semester_ke'    => 'required',
                'pernah_menerima_bantuan'    => 'required',

            ])) {
                return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
            }
            // update no induk pendaftar
            $builder = $this->db->table('identitas');
            $builder->set('no_induk', $input_no_induk);
            $builder->where('no_induk', $identitas['no_induk']);
            $builder->update();
            // echo $input_no_induk;
            // dd($no_induk);
            // rename folder file
            rename("assets/scan/" . $no_induk, "assets/scan/" . $input_no_induk);
        } else {
            if (!$this->validate([
                'nama_lengkap'      => 'required|alpha_space',
                'jenis_kelamin'    => 'required',
                'ttl'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian tempat, tanggal lahir  wajib diisi',
                    ]
                ],
                'agama'    => 'required',
                'no_telepon'     => 'required|numeric',
                'alamat_rumah'    => 'required',
                'kecamatan'    => 'required',
                'nama_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian nama perguruan tinggi  wajib diisi',
                    ]
                ],
                'akreditasi_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian akreditasi perguruan tinggi  wajib diisi',
                    ]
                ],
                'tahun_masuk_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian tahun masuk perguruan tinggi  wajib diisi',
                    ]
                ],
                'alamat_pt'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian alamat perguruan tinggi  wajib diisi',
                    ]
                ],
                'semester_ke'    => 'required',
                'pernah_menerima_bantuan'    => 'required',

            ])) {
                return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'] )->withInput();
            }
        }
        if ($this->request->getVar('pernah_menerima_bantuan') == 'ya') {
            $menerima_bantuan = $this->request->getVar('menerima_bantuan_dari');
        } else {
            $menerima_bantuan = '';
        }
        // Update data identitas mahasiswa
        $this->MIdentitas->update($input_no_induk, [
            'no_induk_pelajar'    => $this->request->getVar('no_induk_pelajar'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'id_agama' => $this->request->getVar('agama'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),
            'nama_pt' => $this->request->getVar('nama_pt'),
            'akreditasi_pt' => $this->request->getVar('akreditasi_pt'),
            'tahun_masuk_pt' => $this->request->getVar('tahun_masuk_pt'),
            'semester_ke' => $this->request->getVar('semester_ke'),
            'alamat_pt' => $this->request->getVar('alamat_pt'),
            'pernah_menerima_bantuan' => $this->request->getVar('pernah_menerima_bantuan'),
            'menerima_bantuan_dari' => $menerima_bantuan,

        ]);

        // merubah no induk terbaru
        $no_induk = $input_no_induk;


        /*******************    KELUARGA    ********************/
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');

        // validasi keluarga
        if (!$this->validate([
            'nama_ayah'    => 'required|alpha_space',
            'usia_ayah'    => 'required|numeric',
            'pekerjaan_ayah'      => 'required',
            'pendidikan_ayah'    => 'required',
            'penghasilan_ayah'    => 'required|numeric',
            'alamat_ayah'    => 'required',
            'nama_ibu'     => 'required',
            'usia_ibu'     => 'required|numeric',
            'pekerjaan_ibu'    => 'required',
            'pendidikan_ibu'    => 'required',
            'penghasilan_ibu'    => 'required|numeric',
            'alamat_ibu'    => 'required',
            'rtsm_rtm'    => 'required',
            'pkh_kks_kbs'    => 'required',
            'bsm_kip'    => 'required',
        ])) {
            return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
        }
        // dd($no_induk);
        // update data keluarga ke database
        $this->MKeluarga->update($keluarga['id_keluarga'], [
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'usia_ayah' => $this->request->getVar('usia_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pendidikan_ayah' => $this->request->getVar('pendidikan_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'alamat_ayah' => $this->request->getVar('alamat_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'usia_ibu' => $this->request->getVar('usia_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'pendidikan_ibu' => $this->request->getVar('pendidikan_ibu'),
            'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
            'alamat_ibu' => $this->request->getVar('alamat_ibu'),
            'rtsm_rtm' => $this->request->getVar('rtsm_rtm'),
            'pkh_kks_kbs' => $this->request->getVar('pkh_kks_kbs'),
            'bsm_kip' => $this->request->getVar('bsm_kip'),
        ]);

        /*******************    LAMPIRAN    ********************/
        // juara
        $juara_1 = $this->request->getVar('juara_1');
        $juara_2 = $this->request->getVar('juara_2');
        $juara_3 = $this->request->getVar('juara_3');
        // tingkat
        $tingkat_1 = $this->request->getVar('tingkat_1');
        $tingkat_2 = $this->request->getVar('tingkat_2');
        $tingkat_3 = $this->request->getVar('tingkat_3');
        // dd($juara_3);
        // kategori
        $kategori_1 = $this->request->getVar('kategori_1');
        $kategori_2 = $this->request->getVar('kategori_2');
        $kategori_3 = $this->request->getVar('kategori_3');

        // Validasi Prestasi 2 & 3
        // ambil scan prestasi 2 & 3
        $scan_prestasi = [
            'prestasi_1' => $this->request->getFile('scan_prestasi_1'),
            'prestasi_2' => $this->request->getFile('scan_prestasi_2'),
            'prestasi_3' => $this->request->getFile('scan_prestasi_3'),
        ];

        // pindahkan file prestasi ke scan
        $k = 0;
        $prestasi = $this->MPrestasi->find_prestasi_noinduk($no_induk)->getResultArray();
        // menginisialisasi jika ada prestasi yang null
        for ($i = count($prestasi) + 1; $i <= 3; $i++) {
            $prestasi[] = null;
        }
        // dd($prestasi);

        // dd($scan_prestasi);
        // Validasi Prestasi 2
        if ($scan_prestasi['prestasi_2']->getError() != 4 || $kategori_2 != null) {
            if ($kategori_2 == 'KHS' || $kategori_2 == 'hafidz' || $kategori_2 == 'lainnya') {
                if (!$this->validate([
                    'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                ])) {
                    return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
                }
            } else {
                if (!$this->validate([
                    'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                    'tingkat_2' => 'required',
                    'juara_2' => 'required',
                    'nama_prestasi_2' => 'required',
                    'tahun_prestasi_2' => 'required',
                ])) {
                    return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
                }
            }
        }
        if ($scan_prestasi['prestasi_3']->getError() != 4 || $kategori_3 != null) {
        // Validasi Prestasi 3
            if ($kategori_3 == 'KHS' || $kategori_3 == 'hafidz' || $kategori_3 == 'lainnya') {
                if (!$this->validate([
                    'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                ])) {
                    return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
                }
            } else {
                if (!$this->validate([
                    'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                    'tingkat_3' => 'required',
                    'juara_3' => 'required',
                    'nama_prestasi_3' => 'required',
                    'tahun_prestasi_3' => 'required',
                ])) {
                    return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
                }
            }
        }
        // Validasi Lampiran file

        // dd($juara_1);
        if ($kategori_1 == 'hafidz' || $kategori_1 == 'KHS' || $kategori_1 == 'lainnya') {
            if (!$this->validate([
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_kk' => 'max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_akreditasi_pt' => 'max_size[scan_akreditasi_pt,2048]|mime_in[scan_akreditasi_pt,application/pdf]',
                'scan_proposal' => 'max_size[scan_proposal,5120]|mime_in[scan_proposal,application/pdf]',
                'scan_pas_foto' => 'max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
            }
        } else {
            if (!$this->validate([
                'scan_prestasi_1' => 'max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'tingkat_1' => 'required',
                'juara_1' => 'required',
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_kk' => 'max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_akreditasi_pt' => 'max_size[scan_akreditasi_pt,2048]|mime_in[scan_akreditasi_pt,application/pdf]',
                'scan_proposal' => 'max_size[scan_proposal,5120]|mime_in[scan_proposal,application/pdf]',
                'scan_pas_foto' => 'max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                return redirect()->to('/pendaftaran/edit_pendaftaran/'.$identitas['no_induk'].'/'. $identitas['id_status_peserta'])->withInput();
            }
        }

        foreach ($scan_prestasi as $file_scan_prestasi) {
            if ($file_scan_prestasi->getError() != 4) {
                // mengambil nama file prestasi dan dimasukkan ke array
                $nama_scan_prestasi[] = $file_scan_prestasi->getName();
                // memindahkan file scan prestasi ke folder scan
                $file_scan_prestasi->move('assets/scan/' . $no_induk . '/prestasi');
                if ($prestasi[$k] != null) {
                    //hapus file lama
                    unlink('assets/scan/' . $no_induk . '/prestasi/' . $prestasi[$k]['file_prestasi']);
                }
            } else {
                // mengambil nama file yang tidak ada upload dari user
                if ($prestasi[$k] != null) {
                    $nama_scan_prestasi[] = $prestasi[$k]['file_prestasi'];
                }
            }
            $k++;
        }
        // dd($nama_scan_prestasi);
        // memasukkab data prestasi ke database
        for ($i = 1; $i <= 3; $i++) {
            if ($prestasi[$i - 1] == null) {
                if ($scan_prestasi['prestasi_' . $i]->getError() != 4) {
                    if ($this->request->getVar('kategori_' . $i) == 'hafidz') {
                        $this->MPrestasi->insert([
                            'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'kategori' => 'hafidz',
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'no_induk' => $no_induk,
                            'tingkat' => null,
                            'juara' => null,
                        ]);
                    } else if ($this->request->getVar('kategori_' . $i) == 'KHS') {
                        $this->MPrestasi->insert([
                            'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'kategori' => "KHS",
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'no_induk' => $no_induk,
                            'tingkat' => null,
                            'juara' => null,
                        ]);
                    } else if ($this->request->getVar('tingkat_' . $i) != null) {
                        $this->MPrestasi->insert([
                            'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'kategori' => "perlombaan",
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'tingkat' => $this->request->getVar('tingkat_' . $i),
                            'juara' => $this->request->getVar('juara_' . $i),
                            'no_induk' => $no_induk
                        ]);
                    } else {
                        $this->MPrestasi->insert([
                            'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'kategori' => $this->request->getVar('kategori_' . $i),
                            'tingkat' => null,
                            'juara' => null,
                            'no_induk' => $no_induk
                        ]);
                    }
                }
            } else {
                if ($this->request->getVar('kategori_' . $i) == "hafidz") {
                    $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'kategori' => 'hafidz',
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'tingkat' => null,
                        'juara' => null,
                        'nilai' => 0,
                    ]);
                } else if ($this->request->getVar('kategori_' . $i) == "KHS") {
                    $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'kategori' => 'KHS',
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'tingkat' => null,
                        'juara' => null,
                        'nilai' => 0,
                    ]);
                    // jika pendaftar upload file
                } else if ($this->request->getVar('tingkat_' . $i) != null && $scan_prestasi['prestasi_' . $i]->getError() != 4) {
                    if ($nama_scan_prestasi != null) {
                        // dd($nama_scan_prestasi[$i - 1]);
                        $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                            'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'kategori' => "perlombaan",
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'tingkat' => $this->request->getVar('tingkat_' . $i),
                            'juara' => $this->request->getVar('juara_' . $i),
                            'nilai' => 0,
                        ]);
                    }
                    // jika pendaftar tidak upload file
                } else if ($this->request->getVar('tingkat_' . $i) != null && $scan_prestasi['prestasi_' . $i]->getError() == 4) {
                    if ($nama_scan_prestasi != null) {
                        // dd($nama_scan_prestasi[$i - 1]);
                        $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                            // 'file_prestasi' => $nama_scan_prestasi[$i - 1],
                            'kategori' => "perlombaan",
                            'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                            'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                            'tingkat' => $this->request->getVar('tingkat_' . $i),
                            'juara' => $this->request->getVar('juara_' . $i),
                            'nilai' => 0,
                        ]);
                    }
                } else if ($scan_prestasi['prestasi_' . $i]->getError() != 4) {
                    $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'kategori' => $this->request->getVar('kategori_' . $i),
                        'tingkat' => null,
                        'juara' => null,
                        'no_induk' => $no_induk,
                        'nilai' => 0,
                    ]);
                } else {
                    $this->MPrestasi->update($prestasi[$i - 1]['id_prestasi'], [
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'kategori' => $this->request->getVar('kategori_' . $i),
                        'tingkat' => null,
                        'juara' => null,
                        'no_induk' => $no_induk,
                        'nilai' => 0,
                    ]);
                }
            }
        }

        //ambil file inputan
        $scan = [
            $this->request->getFile('scan_kk'),
            $this->request->getFile('scan_ktp'),
            $this->request->getFile('scan_kartu_pelajar'),
            $this->request->getFile('scan_akreditasi_pt'),
            $this->request->getFile('scan_proposal'),
            $this->request->getFile('scan_sktm'),
            $this->request->getFile('scan_pas_foto')
        ];
        // menginisialisasi nama file pada database ke array
        $nama_file = ['kk', 'ktp', 'kartu_pelajar', 'akreditasi_pt', 'proposal', 'sktm', 'pas_foto'];
        // pindahkn file scan ke folder scan
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $l = 0;
        // dd($file[$nama_file[$l]]);
        foreach ($scan as $scan) {
            if ($scan->getError() != 4) {
                // mengambil nama file scan dan dimasukkan ke array
                $nama_scan[] = $scan->getName();
                // memindahkan file scan scan ke folder scan
                $scan->move('assets/scan/' . $no_induk . '/file');
                if ($file[$nama_file[$l]] != null) {
                    //hapus file scan yang lama
                    unlink('assets/scan/' . $no_induk . '/file/' . $file[$nama_file[$l]]);
                }
            } else {
                // mengambil nama file yang tidak ada upload dari user
                $nama_scan[] = $file[$nama_file[$l]];
            }
            $l++;
        }

        // memasukkan data lampiran ke database
        $this->MFile->update($file['id_file'], [
            'kk' => $nama_scan[0],
            'ktp' => $nama_scan[1],
            'kartu_pelajar' => $nama_scan[2],
            'akreditasi_pt' => $nama_scan[3],
            'proposal' => $nama_scan[4],
            'sktm' => $nama_scan[5],
            'pas_foto' => $nama_scan[6],
        ]);
        // update status pendaftaran
        $data = [
            'id_status_pendaftaran'    => 4
        ];
        $this->MIdentitas->update($no_induk, $data);
        session()->setFlashdata('pesan-edit-mahasiswa', 'Data diri berhasil diubah.');
        return redirect()->to('home_pendaftar/pengumuman');
    }
}