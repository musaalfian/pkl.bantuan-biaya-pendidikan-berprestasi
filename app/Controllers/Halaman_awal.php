<?php

namespace App\Controllers;

use App\Models\MIdentitas;
use App\Models\MKeluarga;
use App\Models\MPrestasi;
use App\Models\MSekolah;
use App\Models\MStatusFinal;
use App\Models\MStatusPembayaran;
use App\Models\MStatusPendaftaran;
use App\Models\MStatusPeserta;
use App\Models\MTransportasi;
use App\Models\MInformasiTerbaru;

class Halaman_awal extends BaseController
{
    protected $MIdentitas;
    protected $MKeluarga;
    protected $MPrestasi;
    protected $MSekolah;
    protected $MStatusFinal;
    protected $MStatusPembayaran;
    protected $MStatusPendaftaran;
    protected $MStatusPeserta;
    protected $MTransportasi;
    protected $MInformasiTerbaru;

    public function __construct()
    {
        $this->MIdentitas = new MIdentitas();
        $this->MKeluarga = new MKeluarga();
        $this->MPrestasi = new MPrestasi();
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

    public function halaman_awal()
    {
        return view('/pendaftar/halaman_awal/root');
    }
    public function info_awal_pendaftar($id_peserta)
    {
        if ($id_peserta > 0 && $id_peserta <=3) {
            # code...
            $pendaftar = $this->MIdentitas->data_seluruh_pendaftar($id_peserta)->getResultArray();
            $data = [
                'pendaftar' => $pendaftar
            ];
            return view('/pendaftar/info_awal/infoPendaftar', $data);
        }
        return view('/errors/html/error_404');
        // dd($pendaftar);
    }
    public function info_awal_penerima($id_peserta)
    {
        // $penerima = $this->MIdentitas->data_seluruh_penerima($id_peserta)->getResultArray();

        $id_status_final = 1;
        if ($id_peserta == 1) {
            $daftar_penerima = $this->MIdentitas
                ->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah')
                ->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')
                ->join('status_pendaftaran', 'status_pendaftaran.id_status_pendaftaran = identitas.id_status_pendaftaran')
                ->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta')
                ->join('status_final', 'status_final.id_status_final = identitas.id_status_final')
                // ->join('prestasi', 'prestasi.no_induk = identitas.no_induk')
                ->where('identitas.id_status_peserta', $id_peserta)
                ->where('identitas.id_status_final', $id_status_final)
                ->findAll();
            $i = 0;
            foreach ($daftar_penerima as $data) {
                $nilai = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_penerima[$i]['skor_tertinggi'] = $nilai['nilai'];
                $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_penerima[$i]['nama_prestasi_tertinggi'] = $prestasi['nama_prestasi'];
                $i++;
            }
        } else {
            $daftar_penerima = $this->MIdentitas
                ->join('status_pendaftaran', 'status_pendaftaran.id_status_pendaftaran = identitas.id_status_pendaftaran')
                ->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta')
                ->join('status_final', 'status_final.id_status_final = identitas.id_status_final')
                ->where('identitas.id_status_peserta', $id_peserta)
                ->where('identitas.id_status_final', $id_status_final)
                ->findAll();
            $i = 0;
            foreach ($daftar_penerima as $data) {
                $nilai = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_penerima[$i]['skor_tertinggi'] = $nilai['nilai'];
                $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_penerima[$i]['nama_prestasi_tertinggi'] = $prestasi['nama_prestasi'];
                $i++;
            }
        }
        // dd($daftar_penerima);
        $data = [
            'penerima' => $daftar_penerima
        ];
        return view('/pendaftar/info_awal/infoPenerima', $data);
    }
    // Format tanggal indo
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[2];
    }
    public function informasi_pendaftaran($id_informasi)
    {
        function limit_text_detail_informasi($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }


        $informasi_terbaru = $this->MInformasiTerbaru->find($id_informasi);
        $jam = date_create($informasi_terbaru['updated_at']);
        $informasi_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
        $informasi[] = $informasi_terbaru;

        $informasi_3_terbaru = $this->MInformasiTerbaru->ambil_informasi_pendaftaran_awal($id_informasi)->getResultArray();
        foreach ($informasi_3_terbaru as $informasi_3_terbaru) {
            $informasi_3_terbaru['deskripsi_singkat'] = limit_text_detail_informasi($informasi_3_terbaru['deskripsi_informasi_terbaru'], 10);
            $jam = date_create($informasi_3_terbaru['updated_at']);
            $informasi_3_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_3_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
            $kumpulan_3_informasi[] = $informasi_3_terbaru;
        }
        $data = [
            'title'     => 'Beasiswa Batang | Beranda',
            'informasi' => $informasi_terbaru,
            'kumpulan_3_informasi' => $kumpulan_3_informasi,
        ];
        return view('/pendaftar/halaman_awal/detail_informasi', $data);
    }
}