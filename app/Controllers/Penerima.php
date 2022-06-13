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

class Penerima extends BaseController
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
    public function simpan_tambah_rekening($no_induk)
    {
        // mengambil data rekening yang telah diinput pendaftar
        $no_rek = $this->request->getVar('no_rek');
        $nama_pemilik_rekening = $this->request->getVar('nama_pemilik_rekening');
        $rek_bpd = $this->request->getFile('rek_bpd');

        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        // mengambil nama file scan dan dimasukkan ke array
        $nama_rek_bpd = $rek_bpd->getName();
        // memindahkan file scan ke folder scan
        $rek_bpd->move('assets/scan/' . $no_induk . '/file');

        // melakukan update pada no rekening
        $this->MIdentitas->update($no_induk, ['no_rek' => $no_rek, 'nama_pemilik_rekening' => $nama_pemilik_rekening]);
        // melakukan update pada scan buku tabungan
        $this->MFile->update($file['id_file'], ['rek_bpd' => $nama_rek_bpd]);
        // dd($no_rek);
        return redirect()->to('home_pendaftar/pengumuman');
    }
    public function simpan_tambah_laporan($no_induk)
    {
        // mengambil laporan instrumen yang telah diinput pendaftar
        $laporan = $this->request->getFile('laporan');

        $file = $this->MFile->find_file_noinduk($no_induk)->getFirstRow('array');
        // mengambil nama file scan dan dimasukkan ke array
        $nama_laporan = $laporan->getName();
        // memindahkan file scan ke folder scan
        $laporan->move('assets/scan/' . $no_induk . '/file');

        // melakukan update pada scan buku tabungan
        $this->MFile->update($file['id_file'], ['laporan' => $nama_laporan]);
        // dd($no_rek);
        return redirect()->to('home_pendaftar/pengumuman');
    }
}