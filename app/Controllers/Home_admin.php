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
use \Myth\Auth\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;

class Home_admin extends BaseController
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
    protected $MUser;

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
        $this->MUser = new UserModel();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }

    // dashboard admin
    public function index()
    {
        // jumlah pendaftar
        $jumlah_proses_pendaftar = $this->MIdentitas->countAllResults();
        $jumlah_pendaftar = $this->MIdentitas->where('id_status_pendaftaran !=', 'null')->countAllResults();
        $jumlah_pendaftar_memenuhi = $this->MIdentitas->jumlah_pendaftar_status_pendaftaran(1);
        $jumlah_pendaftar_tidak_memenuhi = $this->MIdentitas->jumlah_pendaftar_status_pendaftaran(2);
        $jumlah_pendaftar_perbaikan = $this->MIdentitas->jumlah_pendaftar_status_pendaftaran(3);
        $jumlah_pendaftar_proses = $this->MIdentitas->jumlah_pendaftar_status_pendaftaran(4);

        // data pendaftar kategori siswa
        $siswa = $this->MIdentitas->data_seluruh_pendaftar(1, 5, 'Desc')->getResultArray();
        // data pendaftar kategori calon mahasiswa
        $calon_mahasiswa = $this->MIdentitas->data_seluruh_pendaftar(2, 5, 'Desc')->getResultArray();
        // data pendaftar kategori mahasiswa
        $mahasiswa = $this->MIdentitas->data_seluruh_pendaftar(3, 5, 'Desc')->getResultArray();

        // dd($siswa);
        $data = [
            'title'     => 'Beasiswa Batang | Dashboard Admin',
            'jumlah_proses_pendaftar'  => $jumlah_proses_pendaftar,
            'jumlah_pendaftar'  => $jumlah_pendaftar,
            'jumlah_pendaftar_memenuhi'  => $jumlah_pendaftar_memenuhi,
            'jumlah_pendaftar_tidak_memenuhi'  => $jumlah_pendaftar_tidak_memenuhi,
            'jumlah_pendaftar_perbaikan'  => $jumlah_pendaftar_perbaikan,
            'jumlah_pendaftar_proses'  => $jumlah_pendaftar_proses,
            'siswa'     => $siswa,
            'calon_mahasiswa'   => $calon_mahasiswa,
            'mahasiswa'     => $mahasiswa
        ];
        return view('/admin/index', $data);
    }
    // menampilkan data akun pendaftar
    public function daftarAkun()
    {
        $daftarAkun = $this->db->table('users')
            ->select('users.username, users.email, users.active')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->where('auth_groups_users.group_id', 2)
            ->get()->getResultArray();

        $jumlahAkun = $this->db->table('users')
            ->select('users.username, users.email, users.active')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->where('auth_groups_users.group_id', 2)
            ->countAllResults();

        $data = [
            'title'     => 'Beasiswa Batang | Daftar Akun',
            'daftarAkun' => $daftarAkun,
            'jumlahAkun' => $jumlahAkun
        ];
        return view('/admin/daftar_akun_admin', $data);
    }
  public function tambahAdmin()
  {
    session();
    $validation = \Config\Services::validation();

    $data = [
      'title'     => 'Beasiswa Batang | Tambah Akun Admin',
      'validation' => $validation
    ];
    return view('/admin/tambah_admin', $data);
  }
}