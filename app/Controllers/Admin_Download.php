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
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Admin_download extends BaseController
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

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function view_download_file()
    {
        $status_pendaftaran = $this->MStatusPendaftaran->findAll();
        $status_final = $this->MStatusFinal->findAll();
        $status_peserta = $this->MStatusPeserta->findAll();
        $data = [
            'title'     => 'Beasiswa Batang | Download Admin',
            'status_pendaftaran' => $status_pendaftaran,
            'status_final' => $status_final,
            'status_peserta' => $status_peserta,
        ];
        return view('/admin/download_file', $data);
    }
    public function print_download_pendaftaran()
    {
        $id_status_peserta = $this->request->getVar('id_status_peserta');
        $file_download = $this->request->getVar('file_download');
        $tahap_pendaftaran = $this->request->getVar('tahap_pendaftaran');
        $kegunaan = $this->request->getVar('kegunaan');
        $status_peserta = $this->MStatusPeserta->find($id_status_peserta);

        // menginisialisasi php spreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        if ($tahap_pendaftaran == 'pendaftar') {
            $id_status_pendaftaran = $this->request->getVar('id_status_pendaftaran');
            //mengambil data status pendaftaran
            if ($id_status_pendaftaran != 5) {
                $status_pendaftaran = $this->MStatusPendaftaran->find($id_status_pendaftaran);
            } else {
                $status_pendaftaran = ['nama_status' => 'Semua status pendaftaran'];
            }
            if ($id_status_peserta == 1) {
                if ($id_status_pendaftaran != 5) {
                    $daftar_pendaftar = $this->MIdentitas->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah')->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')->where('id_status_peserta', $id_status_peserta)->where('id_status_pendaftaran', $id_status_pendaftaran)->findAll();
                } else {
                    $daftar_pendaftar = $this->MIdentitas->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah')->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')->where('id_status_peserta', $id_status_peserta)->findAll();
                }
            } else {
                if ($id_status_pendaftaran != 5) {
                    $daftar_pendaftar = $this->MIdentitas->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')->where('id_status_peserta', $id_status_peserta)->where('id_status_pendaftaran', $id_status_pendaftaran)->findAll();
                } else {
                    $daftar_pendaftar = $this->MIdentitas->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')->where('id_status_peserta', $id_status_peserta)->findAll();
                }
            }
            $i = 0;
            foreach ($daftar_pendaftar as $data) {
                $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_pendaftar[$i]['skor_tertinggi'] = $prestasi['nilai'];
                $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                $daftar_pendaftar[$i]['nama_prestasi_tertinggi'] = $prestasi['nama_prestasi'];
                $i++;
            }
            // dd($daftar_pendaftar);
            $data = [
                'title'     => 'Beasiswa Batang | Download Admin',
                'status_pendaftaran'    => $status_pendaftaran,
                'daftar_pendaftar'      => $daftar_pendaftar,
                'id_status_peserta'        => $id_status_peserta
            ];
            //mencetak ke pdf
            if ($file_download == 'pdf') {
                if ($kegunaan == 'publik') {
                    return view('/admin/download/download_daftar_pendaftaran_publik', $data);
                } else {
                    return view('/admin/download/download_daftar_pendaftaran', $data);
                }
            } else { // mencetak ke excel
                // mengambil nama peseta dimasukkan ke variabel status peserta

                // row 1
                $sheet->setCellValue('A1', 'PENDAFTAR PROGRAM BANTUAN BIAYA PENDIDIKAN ' . strtoupper($status_peserta['nama_peserta']) . ' YANG BERPRESTASI BAGI KELUARGA MISKIN KABUPATEN BATANG TAHUN 2022');
                //row 2
                $sheet->setCellValue('A2', 'Status :');
                $sheet->setCellValue('B2', $status_pendaftaran['nama_status']);
                if ($kegunaan == 'publik') {
                    //row 3 Header tabel
                    $sheet->setCellValue('A3', 'No');
                    $sheet->setCellValue('B3', 'Nama');
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('C3', 'Asal Sekolah');;
                    } else {
                        $sheet->setCellValue('C3', 'Asal Perguruan Tinggi');;
                    }
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('D3', 'Kelas');;
                    } else {
                        $sheet->setCellValue('D3', 'Semester');;
                    }
                    // isi tabel pendaftar
                    $i = 4;
                    $j = 1;
                    foreach ($daftar_pendaftar as $daftar_pendaftar_excel_publik) {
                        $sheet->setCellValue('A' . $i, $j);
                        $sheet->setCellValue('B' . $i, $daftar_pendaftar_excel_publik['nama_lengkap']);
                        $sheet->setCellValue('C' . $i, ($id_status_peserta == 1) ? $daftar_pendaftar_excel_publik['nama_sekolah'] : $daftar_pendaftar_excel_publik['nama_pt']);
                        $sheet->setCellValue('D' . $i++, ($id_status_peserta == 1) ? $daftar_pendaftar_excel_publik['kelas'] : $daftar_pendaftar_excel_publik['semester_ke']);
                    }
                    // dd($daftar_pendaftar);
                } else {
                    //row 3 Header tabel
                    $sheet->setCellValue('A3', 'No');
                    $sheet->setCellValue('B3', 'Nama');
                    $sheet->setCellValue('C3', 'Alamat');
                    $sheet->setCellValue('D3', 'Kecamatan');
                    $sheet->setCellValue('E3', 'No Telepon');
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('F3', 'Asal Sekolah');;
                    } else {
                        $sheet->setCellValue('F3', 'Asal Perguruan Tinggi');;
                    }
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('G3', 'Kelas');;
                    } else {
                        $sheet->setCellValue('G3', 'Semester');;
                    }
                    $sheet->setCellValue('H3', 'Prestasi');
                    // isi tabel pendaftar
                    $i = 4;
                    $j = 1;
                    // dd($daftar_pendaftar);
                    foreach ($daftar_pendaftar as $daftar_pendaftar_excel_non) {
                        $sheet->setCellValue('A' . $i, $j);
                        $sheet->setCellValue('B' . $i, $daftar_pendaftar_excel_non['nama_lengkap']);
                        $sheet->setCellValue('C' . $i, $daftar_pendaftar_excel_non['alamat_rumah']);
                        $sheet->setCellValue('D' . $i, $daftar_pendaftar_excel_non['nama_kecamatan']);
                        $sheet->setCellValue('E' . $i, $daftar_pendaftar_excel_non['no_telepon']);
                        $sheet->setCellValue('F' . $i, ($id_status_peserta == 1) ? $daftar_pendaftar_excel_non['nama_sekolah'] : $daftar_pendaftar_excel_non['nama_pt']);
                        $sheet->setCellValue('G' . $i, ($id_status_peserta == 1) ? $daftar_pendaftar_excel_non['kelas'] : $daftar_pendaftar_excel_non['semester_ke']);
                        $sheet->setCellValue('H' . $i++, $daftar_pendaftar_excel_non['nama_prestasi_tertinggi']);
                    }
                }
                if (is_file('assets/informasi/file/pendaftar_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_pendaftaran['nama_status'] . '.xlsx')) {
                    unlink('assets/informasi/file/pendaftar_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_pendaftaran['nama_status'] . '.xlsx');
                }
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $writer->save('assets/informasi/file/pendaftar_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_pendaftaran['nama_status'] . '.xlsx');
                return $this->response->download('assets/informasi/file/pendaftar_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_pendaftaran['nama_status'] . '.xlsx', null);
            }
        } elseif ($tahap_pendaftaran == 'penerima') {
            $id_status_final = $this->request->getVar('id_status_final');
            $status_final = $this->MStatusFinal->find($id_status_final);
            if ($id_status_peserta == 1) {
                $daftar_pendaftar = $this->MIdentitas
                    ->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah')
                    ->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')
                    // ->join('prestasi', 'prestasi.no_induk = identitas.no_induk')
                    ->where('id_status_peserta', $id_status_peserta)
                    ->where('id_status_final', $id_status_final)
                    ->findAll();
                $i = 0;
                foreach ($daftar_pendaftar as $data) {
                    $nilai = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                    $daftar_pendaftar[$i]['skor_tertinggi'] = $nilai['nilai'];
                    $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                    $daftar_pendaftar[$i]['nama_prestasi_tertinggi'] = $prestasi['nama_prestasi'];
                    $i++;
                }
            } else {
                $daftar_pendaftar = $this->MIdentitas->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan')->where('id_status_peserta', $id_status_peserta)->where('id_status_final', $id_status_final)->findAll();
                $i = 0;
                foreach ($daftar_pendaftar as $data) {
                    $nilai = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                    $daftar_pendaftar[$i]['skor_tertinggi'] = $nilai['nilai'];
                    $prestasi = $this->MPrestasi->find_max_prestasi_noinduk($data['no_induk'])->getFirstRow('array');
                    $daftar_pendaftar[$i]['nama_prestasi_tertinggi'] = $prestasi['nama_prestasi'];
                    $i++;
                }
            }
            // dd($daftar_pendaftar);
            $data = [
                'title'     => 'Beasiswa Batang | Download Admin',
                'status_final'    => $status_final,
                'daftar_pendaftar'      => $daftar_pendaftar,
                'id_status_peserta'        => $id_status_peserta
            ];
            if ($file_download == 'pdf') {
                if ($kegunaan == 'publik') {
                    return view('/admin/download/download_daftar_penerima_publik', $data);
                } else {
                    return view('/admin/download/download_daftar_penerima', $data);
                }
            } else { // mencetak excel
                // row 1
                $sheet->setCellValue('A1', 'DAFTAR PENERIMA BEASISWA ' . strtoupper($status_peserta['nama_peserta']) . ' KABUPATEN BATANG TAHUN ANGGARAN 2022');
                //row 2
                $sheet->setCellValue('A2', 'Status :');
                $sheet->setCellValue('B2', $status_final['nama_status_final']);
                if ($kegunaan == 'publik') {
                    //row 3 Header tabel
                    $sheet->setCellValue('A3', 'No');
                    $sheet->setCellValue('B3', 'Nama');
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('C3', 'Asal Sekolah');;
                    } else {
                        $sheet->setCellValue('C3', 'Asal Perguruan Tinggi');;
                    }
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('D3', 'Kelas');;
                    } else {
                        $sheet->setCellValue('D3', 'Semester');;
                    }
                    $sheet->setCellValue('E3', 'Nominal');
                    $sheet->setCellValue('F3', 'Keterangan');
                    // isi tabel pendaftar
                    $i = 4;
                    $j = 1;
                    foreach ($daftar_pendaftar as $daftar_penerima_excel_publik) {
                        $sheet->setCellValue('A' . $i, $j);
                        $sheet->setCellValue('B' . $i, $daftar_penerima_excel_publik['nama_lengkap']);
                        $sheet->setCellValue('C' . $i, ($id_status_peserta == 1) ? $daftar_penerima_excel_publik['nama_sekolah'] : $daftar_penerima_excel_publik['nama_pt']);
                        $sheet->setCellValue('D' . $i, ($id_status_peserta == 1) ? $daftar_penerima_excel_publik['kelas'] : $daftar_penerima_excel_publik['semester_ke']);
                        $sheet->setCellValue('E' . $i, $daftar_penerima_excel_publik['nominal']);
                        $sheet->setCellValue('F' . $i++, ($daftar_penerima_excel_publik['skor_tertinggi'] == 200) ? 'Diterima langsung' : $daftar_penerima_excel_publik['skor_tertinggi']);
                    }
                    // dd($daftar_pendaftar);
                } else {
                    //row 3 Header tabel
                    $sheet->setCellValue('A3', 'No');
                    $sheet->setCellValue('B3', 'Nama');
                    $sheet->setCellValue('C3', 'Alamat');
                    $sheet->setCellValue('D3', 'Kecamatan');
                    $sheet->setCellValue('E3', 'No Telepon');
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('F3', 'Asal Sekolah');;
                    } else {
                        $sheet->setCellValue('F3', 'Asal Perguruan Tinggi');;
                    }
                    if ($id_status_peserta == 1) {
                        $sheet->setCellValue('G3', 'Kelas');;
                    } else {
                        $sheet->setCellValue('G3', 'Semester');;
                    }
                    $sheet->setCellValue('H3', 'Nominal');
                    $sheet->setCellValue('I3', 'Nomer Rekening');
                    $sheet->setCellValue('J3', 'Nama Pemilik Rekening');
                    $sheet->setCellValue('K3', 'Prestasi');
                    $sheet->setCellValue('L3', 'Keterangan');
                    // isi tabel pendaftar
                    $i = 4;
                    $j = 1;
                    // dd($daftar_pendaftar);
                    foreach ($daftar_pendaftar as $daftar_penerima_excel_non) {
                        $sheet->setCellValue('A' . $i, $j);
                        $sheet->setCellValue('B' . $i, $daftar_penerima_excel_non['nama_lengkap']);
                        $sheet->setCellValue('C' . $i, $daftar_penerima_excel_non['alamat_rumah']);
                        $sheet->setCellValue('D' . $i, $daftar_penerima_excel_non['nama_kecamatan']);
                        $sheet->setCellValue('E' . $i, $daftar_penerima_excel_non['no_telepon']);
                        $sheet->setCellValue('F' . $i, ($id_status_peserta == 1) ? $daftar_penerima_excel_non['nama_sekolah'] : $daftar_penerima_excel_non['nama_pt']);
                        $sheet->setCellValue('G' . $i, ($id_status_peserta == 1) ? $daftar_penerima_excel_non['kelas'] : $daftar_penerima_excel_non['semester_ke']);
                        $sheet->setCellValue('H' . $i, $daftar_penerima_excel_non['nominal']);
                        $sheet->setCellValue('I' . $i, $daftar_penerima_excel_non['no_rek']);
                        $sheet->setCellValue('J' . $i, $daftar_penerima_excel_non['nama_pemilik_rekening']);
                        $sheet->setCellValue('K' . $i, $daftar_penerima_excel_non['nama_prestasi_tertinggi']);
                        $sheet->setCellValue('L' . $i++, ($daftar_penerima_excel_non['skor_tertinggi'] == 200) ? 'Diterima langsung' : $daftar_penerima_excel_non['skor_tertinggi']);
                    }
                }
                if (is_file('assets/informasi/file/penerima_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_final['nama_status_final'] . '.xlsx')) {
                    unlink('assets/informasi/file/penerima_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_final['nama_status_final'] . '.xlsx');
                }
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $writer->save('assets/informasi/file/penerima_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_final['nama_status_final'] . '.xlsx');
                return $this->response->download('assets/informasi/file/penerima_' . $status_peserta['nama_peserta'] . '_' . $kegunaan . '_' . $status_final['nama_status_final'] . '.xlsx', null);
            }
        }
    }
}