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

class Admin_data_pendaftaran extends BaseController
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
    public function data_pendaftaran_siswa()
    {
        // data pendaftar kategori siswa
        $siswa = $this->MIdentitas->data_seluruh_pendaftar(1)->getResultArray();
        // dd($siswa);
        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'siswa'     => $siswa,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran_siswa', $data);
    }
    public function data_pendaftaran_calon_mhs()
    {
        // data pendaftar kategori siswa
        $calon_mhs = $this->MIdentitas->data_seluruh_pendaftar(2)->getResultArray();

        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'calon_mhs'     => $calon_mhs,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran_calon_mhs', $data);
    }
    public function data_pendaftaran_mahasiswa()
    {
        // data pendaftar kategori siswa
        $mahasiswa = $this->MIdentitas->data_seluruh_pendaftar(3)->getResultArray();

        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'mahasiswa'     => $mahasiswa,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran_mahasiswa', $data);
    }
}
