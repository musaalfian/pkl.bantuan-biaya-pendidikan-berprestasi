<?php

namespace App\Models;

use CodeIgniter\Model;

class MIdentitas extends Model
{
        protected $table = 'identitas';

        protected $primaryKey = 'no_induk';
        protected $allowedFields = ['no_induk', 'no_induk_pelajar', 'nama_lengkap', 'jenis_kelamin', 'ttl', 'id_agama', 'anak_ke', 'no_telepon', 'alamat_rumah', 'id_kecamatan', 'jarak_sekolah', 'no_rek', 'nama_pemilik_rekening', 'id_transportasi', 'id_sekolah', 'kelas', 'nama_pt', 'akreditasi_pt', 'tahun_masuk_pt', 'semester_ke', 'alamat_pt', 'id_status_peserta', 'id_status_pendaftaran', 'status_edit_pendaftaran', 'id_status_pembayaran', 'id_status_final', 'id_keluarga',  'id_file', 'pesan', 'pernah_menerima_bantuan', 'menerima_bantuan_dari', 'nominal', 'nama_pemilik_rekening'];


        // mencari identitas berdasarkan user id
        public function find_identitas_user($user_id)
        {
                $builder = $this->db->table('identitas');
                $builder->select('identitas.no_induk,no_induk_pelajar, nama_lengkap,jenis_kelamin,ttl, id_agama, anak_ke, no_telepon, alamat_rumah, id_kecamatan,jarak_sekolah, id_transportasi,id_sekolah, kelas,nama_pt,akreditasi_pt,tahun_masuk_pt,semester_ke, alamat_pt, id_status_peserta,id_status_pendaftaran, id_status_pembayaran, id_status_final,status_edit_pendaftaran, pesan, pernah_menerima_bantuan, menerima_bantuan_dari, no_rek, nominal');
                $builder->join('users', 'users.no_induk = identitas.no_induk');
                $builder->where('id', $user_id);
                $query = $builder->get();
                return $query;
        }

        // mengambil jumlah pendaftar berdasarkan status pendaftaran
        public function jumlah_pendaftar_status_pendaftaran($id_pendaftaran)
        {
                $builder = $this->db->table('identitas');
                $builder->select();
                $builder->where('id_status_pendaftaran', $id_pendaftaran);
                return $builder->countAllResults();
        }
        // mengambil data pendaftar berdasarkan status peserta
        public function data_seluruh_pendaftar($id_peserta, $limit = null)
        {
                $builder = $this->db->table('identitas');
                $builder->select();
                if ($id_peserta == 1) {
                        $builder->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah');
                }
                $builder->join('status_pendaftaran', 'status_pendaftaran.id_status_pendaftaran = identitas.id_status_pendaftaran');
                $builder->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta');
                $builder->where('identitas.id_status_peserta', $id_peserta);
                if ($limit != null) {
                        $builder->limit($limit);
                }
                $query = $builder->get();
                return $query;
        }
        public function data_seluruh_penerima($id_peserta)
        {
                $builder = $this->db->table('identitas');
                $builder->select();
                if ($id_peserta == 1) {
                        $builder->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah');
                }
                $builder->join('status_pendaftaran', 'status_pendaftaran.id_status_pendaftaran = identitas.id_status_pendaftaran');
                $builder->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta');
                $builder->join('status_final', 'status_final.id_status_final = identitas.id_status_final');
                $builder->where('identitas.id_status_peserta', $id_peserta);
                $builder->where('identitas.id_status_final', 1);
                $query = $builder->get();
                return $query;
        }

        /***** SISWA *****/
        public function detail_pendaftar($no_induk, $id_peserta, $id_status_pendaftaran)
        {
                $builder = $this->db->table('identitas');
                $builder->select();
                $builder->select('identitas.akreditasi_pt as nilai_akreditasi_pt');
                if ($id_peserta == 1) {
                        $builder->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah');
                        $builder->join('transportasi', 'transportasi.id_transportasi = identitas.id_transportasi');
                }
                $builder->join('agama', 'agama.id_agama = identitas.id_agama');
                $builder->join('kecamatan', 'kecamatan.id_kecamatan = identitas.id_kecamatan');
                if ($id_status_pendaftaran != null) {
                        $builder->join('status_pendaftaran', 'status_pendaftaran.id_status_pendaftaran = identitas.id_status_pendaftaran');
                }
                $builder->join('keluarga', 'keluarga.no_induk = identitas.no_induk');
                $builder->join('file', 'file.no_induk = identitas.no_induk');
                $builder->where('identitas.no_induk', $no_induk);
                $query = $builder->get();
                return $query;
        }

        /***** SISWA *****/

        public function daftar_penerima($id_peserta)
        {
                $db = \Config\Database::connect();
                $builder = $db->table('identitas');
                //  where join ke status peserta
                // join ke status no 1
                // nama asal sekolah status aksi
                // $builder->select('nama_lengkap,identitas.no_induk, alamat_rumah,no_rek, no_telepon, sekolah.nama_sekolah, status_final.nama_status_final,file.rek_bpd, file.laporan, status_pembayaran.nama_status_pembayaran');
                $builder->select();
                if ($id_peserta == 1) {
                        $builder->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah');
                        $builder->join('transportasi', 'transportasi.id_transportasi = identitas.id_transportasi');
                }
                $builder->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta');
                $builder->join('file', 'file.no_induk = identitas.no_induk');
                $builder->join('status_final', 'status_final.id_status_final = identitas.id_status_final');
                $builder->join('status_pembayaran', 'status_pembayaran.id_status_pembayaran = identitas.id_status_pembayaran');
                $builder->where('status_final.id_status_final = 1');
                $builder->where('status_peserta.id_status_peserta', $id_peserta);

                $query = $builder->get();
                return $query;
        }
        public function ubah_status_pembayaran_keseluruhan($id_status_pembayaran, $id_status_peserta)
        {
                $builder = $this->db->table('identitas');
                $builder->set('id_status_pembayaran', $id_status_pembayaran);
                $builder->where('id_status_peserta', $id_status_peserta);
                $builder->update();
        }
}
