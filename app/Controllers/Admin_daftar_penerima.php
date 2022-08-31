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
use App\Models\MInformasiTerbaru;

class Admin_daftar_penerima extends BaseController
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
    protected $MInformasiTerbaru;
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
        $this->MInformasiTerbaru = new MInformasiTerbaru();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }

    // ke halaman
    public function daftar_penerima($id_peserta)
    {
        $query = $this->MIdentitas->daftar_penerima($id_peserta);
        $identitas = $query->getResultArray();
        // dd($identitas);
        $status_pemb = $this->MStatusPembayaran->findAll();
        $data = [
            'identitas' => $identitas,
            'title'     => 'Beasiswa Batang | Data Penerimaa Admin',
            'status_pembayaran' => $status_pemb
        ];
        if ($id_peserta == 1) {
            return view('/admin/daftar_penerima/daftar_penerima_siswa', $data);
        } elseif ($id_peserta == 2) {
            return view('/admin/daftar_penerima/daftar_penerima_calon_mhs', $data);
        } else {
            return view('/admin/daftar_penerima/daftar_penerima_mahasiswa', $data);
        }
    }


    public function ubah_status_pembayaran_keseluruhan($id_peserta)
    {
        $id_status_pembayaran = $this->request->getVar('statusPembayaran');

        $this->MIdentitas->ubah_status_pembayaran_keseluruhan($id_status_pembayaran, $id_peserta);
        if ($id_peserta == 1) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/1');
        } elseif ($id_peserta == 2) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/2');
        } else {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/3');
        }
    }
    public function ubah_status_pembayaran($no_induk, $id_peserta)
    {
        $query = $this->request->getVar('statusPembayaran');

        $data = [
            'id_status_pembayaran' => $query
        ];
        $this->MIdentitas->update($no_induk, $data);
        if ($id_peserta == 1) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/1');
        } elseif ($id_peserta == 2) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/2');
        } else {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/3');
        }
    }
    public function ubah_nomor_rekening($no_induk, $id_peserta)
    {
        $query = $this->request->getVar('nomorRekening');

        $data = [
            'no_rek' => $query
        ];
        // dd($data);
        $this->MIdentitas->update($no_induk, $data);
        if ($id_peserta == 1) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/1');
        } elseif ($id_peserta == 2) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/2');
        } else {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/3');
        }
    }
    public function ubah_nominal($no_induk, $id_peserta)
    {
        $query = $this->request->getVar('nominal');

        $data = [
            'nominal' => $query
        ];
        // dd($data);
        $this->MIdentitas->update($no_induk, $data);
        if ($id_peserta == 1) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/1');
        } elseif ($id_peserta == 2) {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/2');
        } else {
            return redirect()->to('admin_daftar_penerima/daftar_penerima/3');
        }
    }
}