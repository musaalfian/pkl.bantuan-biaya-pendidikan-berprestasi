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
use App\Models\MTanggalPenting;
use App\Models\MInformasiPendaftaran;
use Config\Database;
use PhpParser\Node\Expr\AssignOp\Concat;
use Dompdf\Dompdf;

class Home_pendaftar extends BaseController
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
    protected $MInformasiPendaftaran;
    protected $MTanggalPenting;



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
        $this->MInformasiPendaftaran = new MInformasiPendaftaran();
        $this->MTanggalPenting = new MTanggalPenting();

        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
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

    public function index()
    {
        // potongan deskripsi awal
        function limit_text($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }
        // mengambil data informasi pendaftar
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        // mengambil data informasi terbaru
        $informasi_terbaru = $this->MInformasiTerbaru->ambil_informasi(4)->getResultArray();
        foreach ($informasi_terbaru as $informasi_terbaru) {
            $informasi_terbaru['deskripsi_singkat'] = limit_text($informasi_terbaru['deskripsi_informasi_terbaru'], 10);
            $jam = date_create($informasi_terbaru['updated_at']);
            $date =
                $informasi_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
            $informasi[] = $informasi_terbaru;
        }
        //tanggal pendaftaran
        $tanggal_pendaftaran = $this->MTanggalPenting->find(1);

        // dd($informasi);
        $data = [
            'title'     => 'Beasiswa Batang | Beranda',
            'identitas' => $identitas,
            'informasi' => $informasi,
            'tanggal_pendaftaran'   => $tanggal_pendaftaran
        ];
        return view('/pendaftar/index', $data);
    }
    public function informasi()
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $informasi_pendaftaran = $this->MInformasiPendaftaran->findAll();
        $informasi_pengumuman_pendaftaran = $this->MInformasiTerbaru->find(2);
        foreach ($informasi_pendaftaran as $informasi_pendaftaran) {
            if ($informasi_pendaftaran['persyaratan'] != null) {
                $persyaratan[] = $informasi_pendaftaran['persyaratan'];
            }
            if ($informasi_pendaftaran['jadwal_kegiatan'] != null) {
                $jadwal[] = [
                    'jadwal_kegiatan'   => $informasi_pendaftaran['jadwal_kegiatan'],
                    'jadwal_pelaksanaan' => $informasi_pendaftaran['jadwal_pelaksanaan']
                ];
            }
            if ($informasi_pendaftaran['proses_seleksi'] != null) {
                $proses_seleksi[] = $informasi_pendaftaran['proses_seleksi'];
            }
        }
        $data = [
            'title'     => 'Beasiswa Batang | Informasi',
            'identitas' => $identitas,
            'persyaratan'   => $persyaratan,
            'jadwal'   => $jadwal,
            'proses_seleksi'   => $proses_seleksi,
            'informasi_pengumuman_pendaftaran' => $informasi_pengumuman_pendaftaran
        ];
        return view('/pendaftar/informasi', $data);
    }
    public function pendaftaran()
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $tanggal_pendaftaran = $this->MTanggalPenting->find(1);

        $data = [
            'title'     => 'Beasiswa Batang | Daftar Beasiswa',
            'identitas' => $identitas,
            'tanggal_pendaftaran'   => $tanggal_pendaftaran
        ];
        return view('/pendaftar/pendaftaran_beasiswa', $data);
    }
    // encode untuk image dompdf
    public function encode_img_base64($img_path = false, $img_type = 'png')
    {
        if ($img_path) {
            //convert image into Binary data
            $img_data = fopen($img_path, 'rb');
            $img_size = filesize($img_path);
            $binary_image = fread($img_data, $img_size);
            fclose($img_data);

            //Build the src string to place inside your img tag
            $img_src = "data:image/" . $img_type . ";base64," . str_replace("\n", "", base64_encode($binary_image));

            return $img_src;
        }

        return false;
    }
    public function download_detail_pendaftar()
    {
        // data pendaftar kategori pendaftar
        $no_induk = user()->no_induk;
        $pendaftar = $this->MIdentitas->find($no_induk);
        $detail_pendaftar = $this->MIdentitas->detail_pendaftar($no_induk, $pendaftar['id_status_peserta'], $pendaftar['id_status_pendaftaran'])->getFirstRow('array');
        $prestasi = $this->MPrestasi->detail_prestasi($no_induk)->getResultArray();
        $status_pendaftaran = $this->MStatusPendaftaran->findAll();
        $tanggal_sekarang = $this->tgl_indo(date("d-m-Y"));
        // dd($detail_pendaftar);
        $img = "assets/scan/" . $detail_pendaftar['no_induk'] . "/file/" . $detail_pendaftar['pas_foto'];
        $image = $this->encode_img_base64($img);
        // dd($image);
        $data = [
            'title'     => 'Beasiswa Batang | Download Admin',
            'detail_pendaftar'     => $detail_pendaftar,
            'prestasi'    => $prestasi,
            'status_pendaftaran' => $status_pendaftaran,
            'tanggal_sekarang' => $tanggal_sekarang,
            'image' => $image
        ];
        // reference the Dompdf namespace
        $dompdf = new Dompdf();
        // $file = view('/admin/download/download_detail_pendaftaran', $data);
        // $html = file_get_contents($file);
        // return  view('/admin/download/download_detail_pendaftaran', $data);
        $html =  view('/admin/download/download_detail_pendaftaran', $data);



        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream('formulir-pendaftaran');
        // instantiate and use the dompdf class
        // (Optional) Setup the paper size and orientation
        // Render the HTML as PDF
        // Output the generated PDF to Browser
    }
    public function pengumuman()
    {
        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');
        $status_pendaftaran = $this->MStatusPendaftaran->find($identitas['id_status_pendaftaran']);

        // mengambil data bank 
        $builder = $this->db->table('identitas')
            ->select('no_rek, nama_pemilik_rekening, file.rek_bpd')
            ->join('file', 'identitas.no_induk = file.no_induk')
            ->where('identitas.no_induk', user()->no_induk);
        $data_bank = $builder->get()->getFirstRow('array');
        // dd($data_bank);
        if ($identitas['id_status_final'] == null) {
            $status_final = null;
        } else {
            $status_final = $this->MStatusFinal->find($identitas['id_status_final']);
        }
        // tanggal pengumuman
        $tanggal_pengumuman = $this->MTanggalPenting->find(2);
        // dd($tanggal_pengumuman['tanggal_pengumuman']);
        // mengambil data file pendaftar
        $file = $this->MFile->find_file_noinduk(user()->no_induk)->getFirstRow('array');
        $data = [
            'title'     => 'Beasiswa Batang | Pengumuman Beasiswa',
            'identitas' => $identitas,
            'status_pendaftaran'    => $status_pendaftaran,
            'status_final'    => $status_final,
            'file'      => $file,
            'tanggal_pengumuman'    => $tanggal_pengumuman['tanggal_penting']
        ];
        return view('/pendaftar/pengumuman', $data);
    }
    public function kumpulan_informasi_terbaru()
    {
        // potongan deskripsi awal
        function limit_text_informasi($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }


        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');

        $informasi_terbaru = $this->MInformasiTerbaru->findAll();
        foreach ($informasi_terbaru as $informasi_terbaru) {
            $informasi_terbaru['deskripsi_singkat'] = limit_text_informasi($informasi_terbaru['deskripsi_informasi_terbaru'], 10);
            $jam = date_create($informasi_terbaru['updated_at']);
            $informasi_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
            $kumpulan_informasi[] = $informasi_terbaru;
        }
        $informasi_3_terbaru = $this->MInformasiTerbaru->ambil_informasi(3)->getResultArray();
        foreach ($informasi_3_terbaru as $informasi_3_terbaru) {
            $informasi_3_terbaru['deskripsi_singkat'] = limit_text_informasi($informasi_3_terbaru['deskripsi_informasi_terbaru'], 10);
            $jam = date_create($informasi_3_terbaru['updated_at']);
            $informasi_3_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_3_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
            $kumpulan_3_informasi[] = $informasi_3_terbaru;
        }
        // dd($kumpulan_informasi);
        $data = [
            'title'     => 'Beasiswa Batang | Beranda',
            'kumpulan_informasi' => $kumpulan_informasi,
            'kumpulan_3_informasi' => $kumpulan_3_informasi,
            'identitas' => $identitas,

        ];
        return view('/pendaftar/kumpulan_informasi', $data);
    }
    public function detail_informasi($id_informasi)
    {
        // potongan deskripsi awal
        function limit_text_detail_informasi($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }

        $identitas = $this->MIdentitas->find_identitas_user(user_id())->getFirstRow('array');

        $informasi_terbaru = $this->MInformasiTerbaru->find($id_informasi);
        $jam = date_create($informasi_terbaru['updated_at']);
        $informasi_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
        $informasi[] = $informasi_terbaru;

        $informasi_3_terbaru = $this->MInformasiTerbaru->ambil_informasi(3, $id_informasi)->getResultArray();
        foreach ($informasi_3_terbaru as $informasi_3_terbaru) {
            $informasi_3_terbaru['deskripsi_singkat'] = limit_text_detail_informasi($informasi_3_terbaru['deskripsi_informasi_terbaru'], 10);
            $jam = date_create($informasi_3_terbaru['updated_at']);
            $informasi_3_terbaru['tanggal_indo_informasi'] = $this->tgl_indo(date_format(date_create($informasi_3_terbaru['updated_at']), "d-m-Y")) . ', ' . date_format($jam, "H:i");
            $kumpulan_3_informasi[] = $informasi_3_terbaru;
        }
        $data = [
            'title'     => 'Beasiswa Batang | Beranda',
            'informasi' => $informasi_terbaru,
            'identitas' => $identitas,
            'kumpulan_3_informasi' => $kumpulan_3_informasi,
        ];
        return view('/pendaftar/detail_informasi', $data);
    }
}