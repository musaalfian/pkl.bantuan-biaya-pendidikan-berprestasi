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
    public function simpanPendaftaran($no_induk)
    {
        $data = [
            'id_status_pendaftaran'    => 4
        ];
        $this->MIdentitas->update($no_induk, $data);
        return redirect()->to('home_pendaftar/pengumuman');
    }
}