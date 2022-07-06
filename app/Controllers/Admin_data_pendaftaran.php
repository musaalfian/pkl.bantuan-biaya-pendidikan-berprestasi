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
        $pendaftar = $this->MIdentitas->data_seluruh_pendaftar(1)->getResultArray();
        $pendaftar_perbaikan = $this->MIdentitas->data_seluruh_pendaftar_perbaikan(1)->getResultArray();
        // dd($pendaftar);
        $id_peserta = 1;
        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'pendaftar'     => $pendaftar,
            'pendaftar_perbaikan'     => $pendaftar_perbaikan,
            'id_peserta'     => $id_peserta,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran', $data);
    }
    public function data_pendaftaran_calon_mhs()
    {
        // data pendaftar kategori siswa
        $pendaftar = $this->MIdentitas->data_seluruh_pendaftar(2)->getResultArray();
        $pendaftar_perbaikan = $this->MIdentitas->data_seluruh_pendaftar_perbaikan(2)->getResultArray();
        $id_peserta = 2;

        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'pendaftar'     => $pendaftar,
            'pendaftar_perbaikan'     => $pendaftar_perbaikan,
            'id_peserta'     => $id_peserta,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran', $data);
    }
    public function data_pendaftaran_mahasiswa()
    {
        // data pendaftar kategori siswa
        $pendaftar = $this->MIdentitas->data_seluruh_pendaftar(3)->getResultArray();
        $pendaftar_perbaikan = $this->MIdentitas->data_seluruh_pendaftar_perbaikan(3)->getResultArray();
        $id_peserta = 3;

        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'pendaftar'     => $pendaftar,
            'pendaftar_perbaikan'     => $pendaftar_perbaikan,
            'id_peserta'     => $id_peserta,
        ];
        return view('/admin/data_pendaftaran/data_pendaftaran', $data);
    }
}