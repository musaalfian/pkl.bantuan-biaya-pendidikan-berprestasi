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

class Admin_detail_pendaftaran extends BaseController
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
    public function detail_pendaftar($no_induk)
    {
        // data pendaftar kategori pendaftar
        $pendaftar = $this->MIdentitas->find($no_induk);
        $detail_pendaftar = $this->MIdentitas->detail_pendaftar($no_induk, $pendaftar['id_status_peserta'], $pendaftar['id_status_pendaftaran'])->getFirstRow('array');
        $prestasi = $this->MPrestasi->detail_prestasi($no_induk)->getResultArray();
        $status_pendaftaran = $this->MStatusPendaftaran->findAll();
        // $status_pembayaran = $this->MStatusPembayaran->findAll();
        $status_final = $this->MStatusFinal->findAll();
        // dd($detail_pendaftar);
        foreach ($prestasi as $prestasi_penilaian) {
            /* hafidz lgsung diterima dengan nilai 200*/
            if ($prestasi_penilaian['kategori'] == 'hafidz') {
                $penilaian[] = 200;
            } elseif ($prestasi_penilaian['kategori'] == 'perlombaan') {
                // tingkat internasional dan mendapat juara lgsung diterima dengan nilai 200
                if ($prestasi_penilaian["tingkat"] == "internasional") {
                    if ($prestasi_penilaian['juara'] == "juara 1" || $prestasi_penilaian['juara'] == "juara 2" || $prestasi_penilaian['juara'] == "juara 3") {
                        $penilaian[] = 200;
                    } elseif ($prestasi_penilaian['juara'] == "peserta") {
                        $penilaian[] = 100;
                    } else {
                        $penilaian[] = 0;
                    }
                    /*tingkat nasional juara*/
                } elseif ($prestasi_penilaian['tingkat'] == "nasional") {
                    // juara 1
                    if ($prestasi_penilaian['juara'] == "juara 1") {
                        $penilaian[] = 100;
                        // juara 2
                    } elseif ($prestasi_penilaian['juara'] == "juara 2") {
                        $penilaian[] = 90;
                        // juara 3
                    } elseif ($prestasi_penilaian['juara'] == "juara 3") {
                        $penilaian[] = 80;
                    } // paskibra 
                    elseif ($prestasi_penilaian['juara'] == "paskibra") {
                        $penilaian[] = 90;
                    } //peserta 
                    elseif ($prestasi_penilaian['juara'] == "peserta") {
                        $penilaian[] = 70;
                    } else {
                        $penilaian[] = 0;
                    }
                    /*tingkat provinsi juara*/
                } elseif ($prestasi_penilaian['tingkat'] == "provinsi") {
                    // juara 1
                    if ($prestasi_penilaian['juara'] == "juara 1") {
                        $penilaian[] = 90;
                        // juara 2
                    } elseif ($prestasi_penilaian['juara'] == "juara 2") {
                        $penilaian[] = 80;
                        // juara 3
                    } elseif ($prestasi_penilaian['juara'] == "juara 3") {
                        $penilaian[] = 70;
                    } // paskibra
                    elseif ($prestasi_penilaian['juara'] == "paskibra") {
                        $penilaian[] = 80;
                    }
                    // peserta
                    elseif ($prestasi_penilaian['juara'] == "peserta") {
                        $penilaian[] = 65;
                    } else {
                        $penilaian[] = 0;
                    }
                    /*sebagai peserta individu maupun kelompok*/
                } elseif ($prestasi_penilaian['tingkat'] == "karesidenan") {
                    // juara 1
                    if ($prestasi_penilaian['juara'] == "juara 1") {
                        $penilaian[] = 75;
                        // juara 2
                    } else if ($prestasi_penilaian['juara'] == "juara 2") {
                        $penilaian[] = 70;
                        // juara 3
                    } else if ($prestasi_penilaian['juara'] == "juara 3") {
                        $penilaian[] = 65;
                    } else {
                        $penilaian[] = 0;
                    }
                    /*Tingkat kabupaten*/
                } elseif ($prestasi_penilaian['tingkat'] == "kabupaten") {
                    // juara 1
                    if ($prestasi_penilaian['juara'] == "juara 1") {
                        $penilaian[] = 70;
                        // juara 2
                    } elseif ($prestasi_penilaian['juara'] == "juara 2") {
                        $penilaian[] = 65;
                        // juara 3
                    } elseif ($prestasi_penilaian['juara'] == "juara 3") {
                        $penilaian[] = 60;
                    } //paskibra 
                    elseif ($prestasi_penilaian['juara'] == "paskibra") {
                        $penilaian[] = 75;
                    } else {
                        $penilaian[] = 0;
                    }
                    // jika ada prestasi namun tidak masuk kategori apapun
                } else {
                    $penilaian[] = 0;
                }
            } elseif ($prestasi_penilaian['kategori'] == 'KHS') {
                $penilaian[] = 0;
            } else {
                $penilaian[] = 0;
            }
        }
        $j = 0;
        // mnegupdate nilai prestasi
        foreach ($prestasi as $prestasi_update) {
            // dd($penilaian);
            if ($prestasi_update['nilai'] == 0) {
                $update_nilai = [
                    'nilai' => $penilaian[$j]
                ];
                $this->MPrestasi->update($prestasi_update['id_prestasi'], $update_nilai);
            }
            $j++;
            // mengambil penilaian yang telah dimasukkan ke db
            $penilaian_prestasi_db[] = $prestasi_update['nilai'];
        }
        // mengambil nilai maksimum dari database
        $penilaian_tertinggi = max($penilaian_prestasi_db);
        // dd($penilaian_prestasi_db);
        $data = [
            'title'     => 'Beasiswa Batang | Data Pendaftar Admin',
            'detail_pendaftar'     => $detail_pendaftar,
            'prestasi'    => $prestasi,
            'status_pendaftaran' => $status_pendaftaran,
            'status_final' => $status_final,
            'penilaian_tertinggi'   => $penilaian_tertinggi
        ];
        // kondisional view berdasarkan status peserta
        if ($detail_pendaftar['id_status_peserta'] == 1) {
            return view('/admin/detail_pendaftaran/detail_pendaftaran_siswa', $data);
        } elseif ($detail_pendaftar['id_status_peserta'] == 2) {
            return view('/admin/detail_pendaftaran/detail_pendaftaran_calon_mhs', $data);
        } elseif ($detail_pendaftar['id_status_peserta'] == 3) {
            return view('/admin/detail_pendaftaran/detail_pendaftaran_mahasiswa', $data);
        }
    }
    public function simpan_penilaian($no_induk)
    {
        $prestasi = $this->MPrestasi->detail_prestasi($no_induk)->getResultArray();
        $j = 1;
        // dd($this->request->getVar('nilai_prestasi_' . $j));
        foreach ($prestasi as $prestasi_update) {
            $update_nilai = [
                'nilai' => $this->request->getVar('nilai_prestasi_' . $j)
            ];
            $this->MPrestasi->update($prestasi_update['id_prestasi'], $update_nilai);
            $j++;
        }
        session()->setFlashdata('pesan-edit-nilai-pendaftar', 'Data nilai prestasi berhasil diubah.');
        return redirect()->to('Admin_Detail_Pendaftaran/detail_pendaftar/' . $no_induk);
    }
    public function simpan_verifikasi($no_induk)
    {
        // jika tidak ada pesan yang dimasukkan
        $id_status_pendaftaran = $this->request->getVar('id_status_pendaftaran');
        $id_status_final = $this->request->getVar('id_status_final');
        $id_status_pembayaran = null;
        //jika status pendaftaran = memenuhi syarat
        if ($id_status_pendaftaran == 1) {
            if ($id_status_final != null) {
                $status_final = $id_status_final;
                if ($id_status_final == 1) {
                    $id_status_pembayaran = 1;
                }
            } else {
                $status_final = null;
            }
            $status_pendaftaran = 1;
        } //jika status pendaftaran selain memenuhi syarat
        else {
            $status_final = null;
            $status_pendaftaran = $id_status_pendaftaran;
        }
        if ($this->request->getVar('pesan') == '') {
            // inisiasi
            $pesan = null;
        } //jika terdapat pesan 
        else {
            $pesan = $this->request->getVar('pesan');
        }
        $update_identitas = [
            'id_status_pendaftaran' => $status_pendaftaran,
            'id_status_final' => $status_final,
            'pesan' => $pesan,
            'id_status_pembayaran' => $id_status_pembayaran
        ];
        // dd($update_identitas);
        $this->MIdentitas->update($no_induk, $update_identitas);
        session()->setFlashdata('pesan-edit-verifikasi-pendaftar', 'Data pendaftar berhasil diubah.');
        return redirect()->to('Admin_Detail_Pendaftaran/detail_pendaftar/' . $no_induk);
    }
}