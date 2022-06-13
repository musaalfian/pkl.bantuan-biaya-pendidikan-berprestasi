<?php

namespace App\Controllers;


use App\Models\MInformasiTerbaru;
use App\Models\MInformasiPendaftaran;
use App\Models\MTanggalPenting;

class Admin_informasi extends BaseController
{
    protected $MInformasiTerbaru;
    protected $MInformasiPendaftaran;
    protected $MTanggalPenting;

    public function __construct()
    {
        $this->MInformasiTerbaru = new MInformasiTerbaru();
        $this->MInformasiPendaftaran = new MInformasiPendaftaran();
        $this->MTanggalPenting = new MTanggalPenting();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }

    public function daftar_informasi()
    {
        function limit_text($text, $limit)
        {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }
        // mengambil seluruh data informasi terbaru
        $data_informasi = $this->MInformasiTerbaru->orderBy('id_informasi_terbaru', 'DESC')->whereNotIn('id_informasi_terbaru', [1, 2, 3, 4])->findAll();
        foreach ($data_informasi as $data_informasi) {
            $data_informasi['deskripsi_singkat'] = limit_text($data_informasi['deskripsi_informasi_terbaru'], 10);
            $daftar_informasi[] = $data_informasi;
        }
        $data_informasi_pendaftaran = $this->MInformasiTerbaru->orderBy('id_informasi_terbaru', 'DESC')->whereIn('id_informasi_terbaru', [1, 2, 3, 4])->findAll();
        foreach ($data_informasi_pendaftaran as $data_informasi_pendaftaran) {
            $data_informasi_pendaftaran['deskripsi_singkat'] = limit_text($data_informasi_pendaftaran['deskripsi_informasi_terbaru'], 10);
            $daftar_informasi_pendaftaran[] = $data_informasi_pendaftaran;
        }
        // tanggal pengumuman
        $tanggal_penting = $this->MTanggalPenting->findAll();
        $tanggal_penting[0]['nama'] = 'tanggal_pendaftaran';
        $tanggal_penting[1]['nama'] = 'tanggal_pengumuman';

        // dd($tanggal_penting);
        $data = [
            'title'     => 'Beasiswa Batang | Informasi Terbaru Admin',
            'daftar_informasi'  => $daftar_informasi,
            'daftar_informasi_pendaftaran'  => $daftar_informasi_pendaftaran,
            'tanggal_penting'    => $tanggal_penting
        ];
        return view('/admin/informasi/daftar_informasi', $data);
    }
    public function simpan_tanggal_penting()
    {
        $tanggal_penting = [
            [
                'id_tanggal_penting' => 1,
                'tanggal_penting'    => $this->request->getVar('tanggal_pendaftaran')
            ],
            [
                'id_tanggal_penting' => 2,
                'tanggal_penting'    => $this->request->getVar('tanggal_pengumuman')
            ]
        ];

        // dd($tanggal_penting);
        $this->MTanggalPenting->updateBatch($tanggal_penting, 'id_tanggal_penting');;
        return redirect()->to('admin_informasi/daftar_informasi')->withInput();
    }
    public function tambah_informasi_terbaru()
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title'     => 'Beasiswa Batang | Informasi Terbaru Admin',
            'validation'    => $validation
        ];
        return view('/admin/informasi/form_tambah_informasi_terbaru', $data);
    }
    public function simpan_tambah_informasi_terbaru()
    {
        if (!$this->validate([
            'judul_informasi_terbaru'    => 'required',
            'deskripsi_informasi_terbaru'      => 'required',
        ])) {
            return redirect()->to('admin_informasi/tambah_informasi_terbaru')->withInput();
        }
        // file informasi terbaru
        $file_informasi_terbaru = $this->request->getFile('file_informasi_terbaru');
        if ($file_informasi_terbaru != null && $file_informasi_terbaru->getError() != 4) {
            // mengambil nama file informasi terbaru
            $nama_file_informasi_terbaru = $file_informasi_terbaru->getName();
            // memindahkan file informasi terbaru
            $file_informasi_terbaru->move('assets/informasi/file');
        } else {
            $nama_file_informasi_terbaru = null;
        }
        // gambar informasi terbaru
        $gambar_informasi_terbaru = $this->request->getFile('gambar_informasi_terbaru');
        if ($gambar_informasi_terbaru != null && $gambar_informasi_terbaru->getError() != 4) {
            // mengambil nama file informasi terbaru
            $nama_gambar_informasi_terbaru = $gambar_informasi_terbaru->getName();
            // memindahkan file informasi terbaru
            $gambar_informasi_terbaru->move('assets/informasi/img');
        } else {
            $nama_gambar_informasi_terbaru = null;
        }
        $this->MInformasiTerbaru->insert([
            'judul_informasi_terbaru' => $this->request->getVar('judul_informasi_terbaru'),
            'deskripsi_informasi_terbaru' => $this->request->getVar('deskripsi_informasi_terbaru'),
            'file_informasi_terbaru' => $nama_file_informasi_terbaru,
            'gambar_informasi_terbaru' => $nama_gambar_informasi_terbaru,
        ]);
        session()->setFlashdata('pesan-tambah-informasi-terbaru', 'Data informasi terbaru berhasil ditambahkan.');
        return redirect()->to('admin_informasi/daftar_informasi')->withInput();
    }
    public function edit_informasi_terbaru($id_informasi_terbaru)
    {
        session();
        $validation = \Config\Services::validation();
        $data_informasi_terbaru = $this->MInformasiTerbaru->find($id_informasi_terbaru);
        $data = [
            'title'     => 'Beasiswa Batang | Informasi Terbaru Admin',
            'validation'    => $validation,
            'data_informasi_terbaru'    => $data_informasi_terbaru
        ];
        return view('/admin/informasi/form_edit_informasi_terbaru', $data);
    }
    public function simpan_edit_informasi_terbaru($id_informasi_terbaru)
    {
        $data_informasi_terbaru = $this->MInformasiTerbaru->find($id_informasi_terbaru);
        if (!$this->validate([
            'judul_informasi_terbaru'    => 'required',
            'deskripsi_informasi_terbaru'      => 'required',
        ])) {
            return redirect()->to('admin_informasi/tambah_informasi_terbaru')->withInput();
        }
        // file informasi terbaru
        $file_informasi_terbaru = $this->request->getFile('file_informasi_terbaru');
        if ($file_informasi_terbaru->getError() != 4) {
            // mengambil nama file informasi terbaru
            $nama_file_informasi_terbaru = $file_informasi_terbaru->getName();
            // memindahkan file informasi terbaru
            $file_informasi_terbaru->move('assets/informasi/file');
            if ($data_informasi_terbaru['file_informasi_terbaru'] != null) {
                //hapus file lama
                unlink('assets/informasi/file/' . $data_informasi_terbaru['file_informasi_terbaru']);
            }
        } else {
            if ($data_informasi_terbaru['file_informasi_terbaru'] != null) {
                //mengambil nama file lama
                $nama_file_informasi_terbaru = $data_informasi_terbaru['file_informasi_terbaru'];
            } else {
                $nama_file_informasi_terbaru = null;
            }
        }
        // gambar informasi terbaru
        $gambar_informasi_terbaru = $this->request->getFile('gambar_informasi_terbaru');
        if ($gambar_informasi_terbaru != null && $gambar_informasi_terbaru->getError() != 4) {
            // mengambil nama gambar informasi terbaru
            $nama_gambar_informasi_terbaru = $gambar_informasi_terbaru->getName();
            // memindahkan gambar informasi terbaru
            $gambar_informasi_terbaru->move('assets/informasi/img');
            if ($data_informasi_terbaru['gambar_informasi_terbaru'] != null) {
                //hapus gambar lama
                unlink('assets/informasi/img/' . $data_informasi_terbaru['gambar_informasi_terbaru']);
            }
        } else {
            if ($data_informasi_terbaru['file_informasi_terbaru'] != null) {
                //mengambil nama gambar lama
                $nama_gambar_informasi_terbaru = $data_informasi_terbaru['gambar_informasi_terbaru'];
            } else {
                $nama_gambar_informasi_terbaru = null;
            }
        }
        $this->MInformasiTerbaru->update($id_informasi_terbaru, [
            'judul_informasi_terbaru' => $this->request->getVar('judul_informasi_terbaru'),
            'deskripsi_informasi_terbaru' => $this->request->getVar('deskripsi_informasi_terbaru'),
            'file_informasi_terbaru' => $nama_file_informasi_terbaru,
            'gambar_informasi_terbaru' => $nama_gambar_informasi_terbaru,
        ]);
        session()->setFlashdata('pesan-ubah-informasi-terbaru', 'Data informasi terbaru berhasil diubah.');
        return redirect()->to('admin_informasi/daftar_informasi')->withInput();
    }
    public function hapus_informasi_terbaru($id_informasi_terbaru)
    {
        $this->MInformasiTerbaru->delete($id_informasi_terbaru);
        session()->setFlashdata('pesan-hapus-informasi-terbaru', 'Data informasi terbaru berhasil dihapus.');
        return redirect()->to('admin_informasi/daftar_informasi')->withInput();
    }
    public function informasi_pendaftaran()
    {
        $informasi_pendaftaran = $this->MInformasiPendaftaran->findAll();
        foreach ($informasi_pendaftaran as $informasi_pendaftaran) {
            $persyaratan[] = $informasi_pendaftaran['persyaratan'];
            $jadwal[] = [
                'jadwal_kegiatan'   => $informasi_pendaftaran['jadwal_kegiatan'],
                'jadwal_pelaksanaan' => $informasi_pendaftaran['jadwal_pelaksanaan']
            ];
            $proses_seleksi[] = $informasi_pendaftaran['proses_seleksi'];
        }
        // dd($proses_seleksi);
        $data = [
            'title'     => 'Beasiswa Batang | Informasi Pendaftaran Admin',
            'persyaratan'   => $persyaratan,
            'jadwal'   => $jadwal,
            'proses_seleksi'   => $proses_seleksi
        ];
        // session()->setFlashdata('pesan-hapus-informasi-terbaru', 'Data informasi terbaru berhasil dihapus.');
        return view('/admin/informasi/informasi_pendaftaran', $data);
    }
    public function edit_informasi_pendaftaran()
    {
        session();
        $validation = \Config\Services::validation();
        $informasi_pendaftaran = $this->MInformasiPendaftaran->findAll();
        $i = 1;
        // menambahkan ; dan line break agar terlihat jelas
        foreach ($informasi_pendaftaran as $data_pendaftaran) {
            if ($data_pendaftaran['persyaratan'] != null) {
                $persyaratan[] = $data_pendaftaran['persyaratan'] . "; \n";
            }
            if ($data_pendaftaran['jadwal_kegiatan']) {
                $jadwal_kegiatan[] = $i . ". " . $data_pendaftaran['jadwal_kegiatan'] . "; \n";
            }
            if ($data_pendaftaran['jadwal_pelaksanaan']) {
                $jadwal_pelaksanaan[] = $i . ". " . $data_pendaftaran['jadwal_pelaksanaan'] . "; \n";
            }
            if ($data_pendaftaran['proses_seleksi']) {
                $proses_seleksi[] = $data_pendaftaran['proses_seleksi'] . "; \n";
            }
            $i++;
        }
        // dd($proses_seleksi);
        $data = [
            'title'     => 'Beasiswa Batang | Informasi Pendaftaran Admin',
            'validation'    => $validation,
            'persyaratan'   => implode(" ", $persyaratan),
            'jadwal_kegiatan'   => implode(" ", $jadwal_kegiatan),
            'jadwal_pelaksanaan'   => implode(" ", $jadwal_pelaksanaan),
            'proses_seleksi'   => implode(" ", $proses_seleksi),
        ];
        return view('/admin/informasi/form_edit_informasi_pendaftaran', $data);
    }
    public function simpan_edit_informasi_pendaftaran()
    {
        // mengambil jumlah data informasi pendaftaran sebelumnya
        $jumlah_informasi_pendaftaran_sebelum = $this->MInformasiPendaftaran->countAllResults();

        // melakukan validasi masukan edit informasi pendaftaran
        // jika ada yang tidak diisi akan mengembalikkan pesan ke form
        if (!$this->validate([
            'persyaratan'    => 'required',
            'jadwal_kegiatan'      => 'required',
            'jadwal_pelaksanaan'      => 'required',
            'proses_seleksi'      => 'required',
        ])) {
            return redirect()->to('admin_informasi/tambah_informasi_pendaftaran')->withInput();
        }
        // mengambil inputan dan memasukkan ke variabel masing masing
        $input_persyaratan = $this->request->getVar("persyaratan");
        $input_jadwal_kegiatan = $this->request->getVar("jadwal_kegiatan");
        $input_jadwal_pelaksanaan = $this->request->getVar("jadwal_pelaksanaan");
        $input_proses_seleksi = $this->request->getVar("proses_seleksi");

        // melakukan pemisahan string ke array
        $input_persyaratan = (explode(";", $input_persyaratan));
        $input_jadwal_kegiatan = (explode(";", $input_jadwal_kegiatan));
        $input_jadwal_pelaksanaan = (explode(";", $input_jadwal_pelaksanaan));
        $input_proses_seleksi = (explode(";", $input_proses_seleksi));

        // mencari nilai array maksimal dari data yang sudah diinputkan
        $count_data = max(
            count($input_persyaratan),
            count($input_jadwal_kegiatan),
            count($input_jadwal_pelaksanaan),
            count($input_proses_seleksi),
        );
        // melakukan trim pada seluruh data dan menghilangkan list angka pada jadwal 
        // dd($input_jadwal_kegiatan);
        for ($i = 1; $i <= $count_data; $i++) {
            // dd($input_jadwal_kegiatan[$i - 1]);
            // jika input persyaratan tidak null
            if (count($input_persyaratan) >= $i && $input_persyaratan[$i - 1] != null) {
                $persyaratan[] = trim($input_persyaratan[$i - 1]);
                if (strlen($persyaratan[$i - 1]) == 0) {
                    $persyaratan[$i - 1] = null;
                }
            } else {
                $persyaratan[$i - 1] = null;
            }
            // jika input jadwal kegiatan tidak null
            if (count($input_jadwal_kegiatan) >= $i && $input_jadwal_kegiatan[$i - 1] != null) {
                $jadwal_kegiatan[] = trim(str_replace($i . ".", "", $input_jadwal_kegiatan[$i - 1]));
                if (strlen($jadwal_kegiatan[$i - 1]) == 0) {
                    $jadwal_kegiatan[$i - 1] = null;
                }
            } else {
                $jadwal_kegiatan[$i - 1] = null;
            }
            // jika input jadwal pelaksanaan tidak null
            if (count($input_jadwal_pelaksanaan) >= $i && $input_jadwal_pelaksanaan[$i - 1] != null) {
                $jadwal_pelaksanaan[] = trim(str_replace($i . ".", "", $input_jadwal_pelaksanaan[$i - 1]));
                if (strlen($jadwal_pelaksanaan[$i - 1]) == 0) {
                    $jadwal_pelaksanaan[$i - 1] = null;
                }
            } else {
                $jadwal_pelaksanaan[$i - 1] = null;
            }
            // jika input proses seleksi tidak null
            if (count($input_proses_seleksi) >= $i && $input_proses_seleksi[$i - 1] != null) {
                $proses_seleksi[] = trim($input_proses_seleksi[$i - 1]);
                if (strlen($proses_seleksi[$i - 1]) == 0) {
                    $proses_seleksi[$i - 1] = null;
                }
            } else {
                $proses_seleksi[$i - 1] = null;
            }
        }
        // dd($persyaratan);

        for ($i = 0; $i < max($count_data, $jumlah_informasi_pendaftaran_sebelum); $i++) {
            // jika i kurang dari sama dengan jumlah data informasi pendaftaran sebelum - 1, maka hanya akan mengupdate data yang ada
            if ($i <= $jumlah_informasi_pendaftaran_sebelum - 1) {
                if (count($persyaratan) - 1 >= $i) {
                    if ($persyaratan[$i] != null) {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'persyaratan'    => $persyaratan[$i],
                        ]);
                    } else {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'persyaratan'    => null,
                        ]);
                    }
                } else {
                    $this->MInformasiPendaftaran->update($i + 1, [
                        'persyaratan'    => null,
                    ]);
                }
                // jika input jadwal kegiatan tidak null
                if (count($jadwal_kegiatan) - 1 >= $i) {
                    if ($jadwal_kegiatan[$i] != null) {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'jadwal_kegiatan'    => $jadwal_kegiatan[$i],
                        ]);
                    } else {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'jadwal_kegiatan'    => null,
                        ]);
                    }
                } else {
                    $this->MInformasiPendaftaran->update($i + 1, [
                        'jadwal_kegiatan'    => null,
                    ]);
                }
                // jika input jadwal pelaksanaan tidak null
                if (count($jadwal_pelaksanaan) - 1 >= $i) {
                    if ($jadwal_pelaksanaan[$i] != null) {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'jadwal_pelaksanaan'    => $jadwal_pelaksanaan[$i],
                        ]);
                    } else {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'jadwal_pelaksanaan'    => null,
                        ]);
                    }
                } else {
                    $this->MInformasiPendaftaran->update($i + 1, [
                        'jadwal_pelaksanaan'    => null,
                    ]);
                }
                // jika input proses seleksi tidak null
                if (count($proses_seleksi) - 1 >= $i) {
                    if ($proses_seleksi[$i] != null) {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'proses_seleksi'    => $proses_seleksi[$i],
                        ]);
                    } else {
                        $this->MInformasiPendaftaran->update($i + 1, [
                            'proses_seleksi'    => null,
                        ]);
                    }
                } else {
                    $this->MInformasiPendaftaran->update($i + 1, [
                        'proses_seleksi'    => null,
                    ]);
                }
            } // jika count data - 1 lebih dari jumlah data informasi pendaftaran sebelum, maka harus menambahkan row baru ke database
            else {
                for ($i = $jumlah_informasi_pendaftaran_sebelum; $i < $count_data; $i++) {
                    $this->MInformasiPendaftaran->insert([
                        'persyaratan'    => $persyaratan[$i],
                        'jadwal_kegiatan'      => $jadwal_kegiatan[$i],
                        'jadwal_pelaksanaan'      => $jadwal_pelaksanaan[$i],
                        'proses_seleksi'      => $proses_seleksi[$i],
                    ]);
                }
            }
        }
        // dd($persyaratan);

        session()->setFlashdata('pesan-ubah-informasi-pendaftaran', 'Data informasi pendaftaran berhasil diubah.');
        return redirect()->to('admin_informasi/informasi_pendaftaran')->withInput();
    }
}