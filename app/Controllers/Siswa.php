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

class Siswa extends BaseController
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
    // Identitas siswa
    public function tambah_identitas_siswa()
    {
        $agama = $this->MAgama->findAll();
        $sekolah = $this->MSekolah->findAll();
        $kecamatan = $this->MKecamatan->orderBy('nama_kecamatan', 'ASC')->findAll();
        $transportasi = $this->MTransportasi->findAll();
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        // dd(user_id());
        session();
        $validation = \Config\Services::validation();
        $opsional = ['ya', 'tidak'];
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'agama'     => $agama,
            'sekolah'     => $sekolah,
            'kecamatan' => $kecamatan,
            'transportasi'  => $transportasi,
            'identitas' => $identitas,
            'opsional'  => $opsional
        ];
        return view('/pendaftar/siswa/form_identitas_siswa', $data);
    }
    public function simpan_tambah_identitas_siswa()
    {
        $user_id = user_id();
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
            'anak_ke'    => 'required|numeric',
            'no_telepon'     => 'required|numeric',
            'jarak_sekolah'    => 'required|numeric',
            'alamat_rumah'    => 'required',
            'kecamatan'    => 'required',
            'transportasi'    => 'required',
            'sekolah'    => 'required',
            'kelas'    => 'required',
            'pernah_menerima_bantuan'    => 'required',
        ])) {
            return redirect()->to('siswa/tambah_identitas_siswa')->withInput();
        }
        if ($this->request->getVar('pernah_menerima_bantuan') == 'ya') {
            $menerima_bantuan = $this->request->getVar('menerima_bantuan_dari');
        } else {
            $menerima_bantuan = '';
        }
        // dd($menerima_bantuan);
        $no_induk = $this->request->getVar('no_induk');
        $this->MIdentitas->insert([
            'no_induk' => $no_induk,
            'no_induk_pelajar' => $this->request->getVar('no_induk_pelajar'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'id_agama' => $this->request->getVar('agama'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'jarak_sekolah' => $this->request->getVar('jarak_sekolah'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),
            'id_transportasi' => $this->request->getVar('transportasi'),
            'id_sekolah' => $this->request->getVar('sekolah'),
            'kelas' => $this->request->getVar('kelas'),
            'id_status_peserta'    => 1,
            'pernah_menerima_bantuan' => $this->request->getVar('pernah_menerima_bantuan'),
            'menerima_bantuan_dari' => $menerima_bantuan,
        ]);
        $this->db->query("UPDATE `users` SET `no_induk`='$no_induk' WHERE `users`.`id` = $user_id");
        session()->setFlashdata('pesan-tambah-identitas-siswa', 'Data identitas diri berhasil ditambahkan.');
        return redirect()->to('siswa/tambah_identitas_siswa');
    }

    // Keluarga siswa
    public function tambah_keluarga_siswa($no_induk)
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');
        $pendidikan = ['SD', 'SMP', 'SMA', 'D1', 'D3', 'D4', 'S1', 'S2', 'S3', 'Lainnya'];
        // dd($keluarga);
        session();
        $validation = \Config\Services::validation();
        $opsional = ['ya', 'tidak'];
        // dd($opsional);
        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'validation'    => $validation,
            'identitas' => $identitas,
            'keluarga'    => $keluarga,
            'pendidikan'    => $pendidikan,
            'opsional'  => $opsional
        ];
        return view('/pendaftar/siswa/form_keluarga_siswa', $data);
    }
    public function simpan_tambah_keluarga_siswa($no_induk)
    {
        if (!$this->validate([
            'nama_ayah'    => 'required|alpha_space',
            'pekerjaan_ayah'      => 'required',
            'pendidikan_ayah'    => 'required',
            'penghasilan_ayah'    => 'required|numeric',
            'alamat_ayah'    => 'required',
            'nama_ibu'     => 'required|alpha_space',
            'pekerjaan_ibu'    => 'required',
            'pendidikan_ibu'    => 'required',
            'penghasilan_ibu'    => 'required|numeric',
            'alamat_ibu'    => 'required',
            'rtsm_rtm'    => 'required',
            'pkh_kks_kbs'    => 'required',
            'bsm_kip'    => 'required',
        ])) {
            return redirect()->to('siswa/tambah_keluarga_siswa/' . $no_induk)->withInput();
        }
        // dd($no_induk);
        // memasukkan data keluarga ke database
        $this->MKeluarga->insert([
            'no_induk'  => $no_induk,
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pendidikan_ayah' => $this->request->getVar('pendidikan_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'alamat_ayah' => $this->request->getVar('alamat_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'pendidikan_ibu' => $this->request->getVar('pendidikan_ibu'),
            'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
            'alamat_ibu' => $this->request->getVar('alamat_ibu'),
            'rtsm_rtm' => $this->request->getVar('rtsm_rtm'),
            'pkh_kks_kbs' => $this->request->getVar('pkh_kks_kbs'),
            'bsm_kip' => $this->request->getVar('bsm_kip'),
        ]);
        session()->setFlashdata('pesan-tambah-keluarga-siswa', 'Data kondisi keluarga berhasil ditambahkan.');
        return redirect()->to('siswa/tambah_keluarga_siswa/' . $no_induk);
    }
    public function tambah_lampiran_siswa($no_induk)
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $kategori = ['perlombaan', 'hafidz', 'lainnya'];
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
            'juara'     => $juara,
            'file'      => $file
        ];
        // dd($file);
        return view('/pendaftar/siswa/form_lampiran_siswa', $data);
    }
    public function simpan_tambah_lampiran_siswa($no_induk)
    {
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
        // dd($scan_prestasi['prestasi_2']);
        if ($kategori_2 == 'hafidz' || $kategori_2 == 'lainnya') {
            if (!$this->validate([
                'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        } else if ($scan_prestasi['prestasi_2']->getError() != 4 || $juara_2 != null || $tingkat_2 != null) {
            if (!$this->validate([
                'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                'tingkat_2' => 'required',
                'juara_2' => 'required',
                'nama_prestasi_2' => 'required',
                'tahun_prestasi_2' => 'required',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        }
        // Validasi Prestasi 3
        if ($kategori_3 == 'hafidz' || $kategori_3 == 'lainnya') {
            if (!$this->validate([
                'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        } else if ($scan_prestasi['prestasi_3']->getError() != 4 || $juara_3 != null || $tingkat_3 != null) {
            if (!$this->validate([
                'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                'tingkat_3' => 'required',
                'juara_3' => 'required',
                'nama_prestasi_3' => 'required',
                'tahun_prestasi_3' => 'required',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');

                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        }
        // Validasi Lampiran file

        // dd($juara_1);
        if ($kategori_1 == 'hafidz' || $kategori_1 == 'lainnya') {
            if (!$this->validate([
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_prestasi_1' => 'uploaded[scan_prestasi_1]|max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'scan_kk' => 'uploaded[scan_kk]|max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'uploaded[scan_kartu_pelajar]|max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'uploaded[scan_sktm]|max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_raport_smt' => 'uploaded[scan_raport_smt]|max_size[scan_raport_smt,2048]|mime_in[scan_raport_smt,application/pdf]',
                'scan_raport' => 'uploaded[scan_raport]|max_size[scan_raport,2048]|mime_in[scan_raport,application/pdf]',
                'scan_pas_foto' => 'uploaded[scan_pas_foto]|max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        } else {
            if (!$this->validate([
                'scan_prestasi_1' => 'uploaded[scan_prestasi_1]|max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'nama_prestasi_1' => 'required',
                'tingkat_1' => 'required',
                'juara_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_kk' => 'uploaded[scan_kk]|max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'uploaded[scan_kartu_pelajar]|max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'uploaded[scan_sktm]|max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_raport_smt' => 'uploaded[scan_raport_smt]|max_size[scan_raport_smt,2048]|mime_in[scan_raport_smt,application/pdf]',
                'scan_raport' => 'uploaded[scan_raport]|max_size[scan_raport,2048]|mime_in[scan_raport,application/pdf]',
                'scan_pas_foto' => 'uploaded[scan_pas_foto]|max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                session()->setFlashdata('pesan-gagal-lampiran-pendaftar', 'Data lampiran gagal disimpan, pendaftar harus mengunggah kembali seluruh file.');
                return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk)->withInput();
            }
        }
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
        // memasukkab data prestasi ke database
        // dd($this->request->getVar('juara_2'));
        for ($i = 1; $i <= 3; $i++) {
            if ($scan_prestasi['prestasi_' . $i]->getError() != 4) {
                if ($this->request->getVar('kategori_' . $i) == 'hafidz') {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'kategori' => 'hafidz',
                        'no_induk' => $no_induk,
                        'tingkat' => null,
                        'juara' => null,
                    ]);
                } else if ($this->request->getVar('tingkat_' . $i) != null) {
                    $this->MPrestasi->insert([
                        'file_prestasi' => $nama_scan_prestasi[$i - 1],
                        'nama_prestasi' => $this->request->getVar('nama_prestasi_' . $i),
                        'tahun_prestasi' => $this->request->getVar('tahun_prestasi_' . $i),
                        'kategori' => "perlombaan",
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
            $this->request->getFile('scan_sktm'),
            $this->request->getFile('scan_raport_smt'),
            $this->request->getFile('scan_raport'),
            $this->request->getFile('scan_pas_foto')
        ];

        // pindahkan file ke scan
        foreach ($scan as $scan) {
            if ($scan->getError() != 4) {
                // mengambil nama file scan dan dimasukkan ke array
                $nama_scan[] = $scan->getName();
                // memindahkan file scan ke folder scan
                $scan->move('assets/scan/' . $no_induk . '/file');
            } else {
                $nama_scan[] = null;
            }
        }

        // memasukkan data lampiran ke database
        $this->MFile->insert([
            'no_induk'  => $no_induk,
            'kk' => $nama_scan[0],
            'ktp' => $nama_scan[1],
            'kartu_pelajar' => $nama_scan[2],
            'sktm' => $nama_scan[3],
            'raport_smt' => $nama_scan[4],
            'raport_legalisasi' => $nama_scan[5],
            'pas_foto' => $nama_scan[6],
        ]);
        // update status pendaftaran
        session()->setFlashdata('pesan-tambah-lampiran-pendaftar', 'Data lampiran berhasil ditambahkan.');
        return redirect()->to('siswa/tambah_lampiran_siswa/' . $no_induk);
    }
    public function simpan_formulir_pendaftaran($no_induk)
    {
        $formulir_pendaftaran = $this->request->getFile('scan_formulir_pendaftaran');
        if ($formulir_pendaftaran->getError() != 4) {
            // mengambil nama file scan dan dimasukkan ke array
            $nama_formulir_pendaftaran = $formulir_pendaftaran->getName();
            // memindahkan file scan ke folder scan
            $formulir_pendaftaran->move('assets/scan/' . $no_induk . '/file');
        } else {
            $nama_formulir_pendaftaran = null;
        }
        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        $this->MFile->update($file['id_file'], [
            'formulir_pendaftaran' => $nama_formulir_pendaftaran
        ]);
        // $data = [
        //     'id_status_pendaftaran'    => 4
        // ];
        // $this->MIdentitas->update($no_induk, $data);
        return redirect()->to('pendaftaran/review_pendaftaran/' . $no_induk);
    }

    public function edit_siswa($no_induk)
    {
        session();
        $validation = \Config\Services::validation();
        $kategori = ['perlombaan', 'hafidz', 'lainnya'];
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
            'opsional'  => $opsional
        ];
        return view('/pendaftar/siswa/edit_form_pendaftar_siswa', $data);
    }
    public function simpan_edit_siswa($no_induk)
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
                'anak_ke'    => 'required|numeric',
                'no_telepon'     => 'required|numeric',
                'jarak_sekolah'    => 'required|numeric',
                'alamat_rumah'    => 'required',
                'kecamatan'    => 'required',
                'transportasi'    => 'required',
                'sekolah'    => 'required',
                'kelas'    => 'required',
                'pernah_menerima_bantuan'    => 'required',

            ])) {
                return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
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
                'no_induk_pelajar'      => 'required',
                'nama_lengkap'      => 'required|alpha_space',
                'jenis_kelamin'    => 'required',
                'ttl'    => [
                    'rule' => 'required',
                    'errors' => [
                        'required' => 'Bagian tempat, tanggal lahir  wajib diisi',
                    ]
                ],
                'agama'    => 'required',
                'anak_ke'    => 'required|numeric',
                'no_telepon'     => 'required|numeric',
                'jarak_sekolah'    => 'required|numeric',
                'alamat_rumah'    => 'required',
                'kecamatan'    => 'required',
                'transportasi'    => 'required',
                'sekolah'    => 'required',
                'kelas'    => 'required',
                'pernah_menerima_bantuan'    => 'required',

            ])) {
                return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
            }
        }
        if ($this->request->getVar('pernah_menerima_bantuan') == 'ya') {
            $menerima_bantuan = $this->request->getVar('menerima_bantuan_dari');
        } else {
            $menerima_bantuan = '';
        }
        // Update data identitas siswa
        $this->MIdentitas->update($identitas['no_induk'], [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'ttl' => $this->request->getVar('ttl'),
            'id_agama' => $this->request->getVar('agama'),
            'anak_ke' => $this->request->getVar('anak_ke'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'jarak_sekolah' => $this->request->getVar('jarak_sekolah'),
            'alamat_rumah' => $this->request->getVar('alamat_rumah'),
            'id_kecamatan' => $this->request->getVar('kecamatan'),
            'id_transportasi' => $this->request->getVar('transportasi'),
            'id_sekolah' => $this->request->getVar('sekolah'),
            'kelas' => $this->request->getVar('kelas'),
            'pernah_menerima_bantuan' => $this->request->getVar('pernah_menerima_bantuan'),
            'menerima_bantuan_dari' => $menerima_bantuan,

        ]);

        /*******************    KELUARGA    ********************/
        $keluarga = $this->MKeluarga->find_keluarga_noinduk($no_induk)->getFirstRow('array');

        // validasi keluarga
        if (!$this->validate([
            'nama_ayah'    => 'required|alpha_space',
            'pekerjaan_ayah'      => 'required',
            'pendidikan_ayah'    => 'required',
            'penghasilan_ayah'    => 'required|numeric',
            'alamat_ayah'    => 'required',
            'nama_ibu'     => 'required|alpha_space',
            'pekerjaan_ibu'    => 'required',
            'pendidikan_ibu'    => 'required',
            'penghasilan_ibu'    => 'required|numeric',
            'alamat_ibu'    => 'required',
            'rtsm_rtm'    => 'required',
            'pkh_kks_kbs'    => 'required',
            'bsm_kip'    => 'required',
        ])) {
            return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
        }
        // dd($no_induk);
        // update data keluarga ke database
        $this->MKeluarga->update($keluarga['id_keluarga'], [
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'pendidikan_ayah' => $this->request->getVar('pendidikan_ayah'),
            'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
            'alamat_ayah' => $this->request->getVar('alamat_ayah'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
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
        // kategori
        $kategori_1 = $this->request->getVar('kategori_1');
        $kategori_2 = $this->request->getVar('kategori_2');
        $kategori_3 = $this->request->getVar('kategori_3');
        // dd($juara_3);

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
        // dd($scan_prestasi);


        // dd($scan_prestasi);
        if ($scan_prestasi['prestasi_2']->getError() != 4) {
            if ($kategori_2 == 'hafidz' || $kategori_2 == 'lainnya') {
                if (!$this->validate([
                    'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                ])) {
                    return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
                }
            } else {
                if (!$this->validate([
                    'scan_prestasi_2' => 'uploaded[scan_prestasi_2]|max_size[scan_prestasi_2,2048]|mime_in[scan_prestasi_2,application/pdf]',
                    'tingkat_2' => 'required',
                    'juara_2' => 'required',
                    'nama_prestasi_2' => 'required',
                    'tahun_prestasi_2' => 'required',
                ])) {
                    return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
                }
            }
        }
        // Validasi Prestasi 3
        if ($scan_prestasi['prestasi_3']->getError() != 4) {
            if ($kategori_3 == 'hafidz' || $kategori_3 == 'lainnya') {
                if (!$this->validate([
                    'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                ])) {
                    return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
                }
            } else {
                if (!$this->validate([
                    'scan_prestasi_3' => 'uploaded[scan_prestasi_3]|max_size[scan_prestasi_3,2048]|mime_in[scan_prestasi_3,application/pdf]',
                    'tingkat_3' => 'required',
                    'juara_3' => 'required',
                    'nama_prestasi_3' => 'required',
                    'tahun_prestasi_3' => 'required',
                ])) {
                    return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
                }
            }
        }
        // Validasi Lampiran file

        // dd($juara_1);
        if ($kategori_1 == 'hafidz' || $kategori_1 == 'lainnya') {
            if (!$this->validate([
                'nama_prestasi_1' => 'required',
                'tahun_prestasi_1' => 'required',
                'scan_prestasi_1' => 'max_size[scan_prestasi_1,2048]|mime_in[scan_prestasi_1,application/pdf]',
                'scan_kk' => 'max_size[scan_kk,2048]|mime_in[scan_kk,application/pdf]',
                'scan_ktp' => 'max_size[scan_ktp,2048]|mime_in[scan_ktp,application/pdf]',
                'scan_kartu_pelajar' => 'max_size[scan_kartu_pelajar,2048]|mime_in[scan_kartu_pelajar,application/pdf]',
                'scan_sktm' => 'max_size[scan_sktm,2048]|mime_in[scan_sktm,application/pdf]',
                'scan_raport_smt' => 'max_size[scan_raport_smt,2048]|mime_in[scan_raport_smt,application/pdf]',
                'scan_raport' => 'max_size[scan_raport,2048]|mime_in[scan_raport,application/pdf]',
                'scan_pas_foto' => 'max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
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
                'scan_raport_smt' => 'max_size[scan_raport_smt,2048]|mime_in[scan_raport_smt,application/pdf]',
                'scan_raport' => 'max_size[scan_raport,2048]|mime_in[scan_raport,application/pdf]',
                'scan_pas_foto' => 'max_size[scan_pas_foto,2048]|mime_in[scan_pas_foto,image/jpg,image/jpeg,image/png]',
            ])) {
                return redirect()->to('siswa/edit_siswa/' . $no_induk)->withInput();
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
                            // 'no_induk' => $no_induk
                        ]);
                    }
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
                            // 'no_induk' => $no_induk
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
            $this->request->getFile('scan_sktm'),
            $this->request->getFile('scan_raport_smt'),
            $this->request->getFile('scan_raport'),
            $this->request->getFile('scan_pas_foto')
        ];
        // menginisialisasi nama file pada database ke array
        $nama_file = ['kk', 'ktp', 'kartu_pelajar', 'sktm', 'raport_smt', 'raport_legalisasi', 'pas_foto'];
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
            'sktm' => $nama_scan[3],
            'raport_smt' => $nama_scan[4],
            'raport_legalisasi' => $nama_scan[5],
            'pas_foto' => $nama_scan[6],
        ]);
        // update status pendaftaran
        $data = [
            'id_status_pendaftaran'    => 4
        ];
        $this->MIdentitas->update($no_induk, $data);
        session()->setFlashdata('pesan-edit-siswa', 'Data diri berhasil diubah.');
        return redirect()->to('home_pendaftar/pengumuman');
    }
}
