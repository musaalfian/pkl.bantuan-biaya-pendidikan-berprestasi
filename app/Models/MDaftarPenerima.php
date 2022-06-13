<?php 

namespace App\Models;

use CodeIgniter\Model;

class MDaftarPenerima extends Model
{
        protected $table = 'identitas';
        
        protected $primaryKey = 'no_induk';  
        // protected $useAutoIncrement = true;  
        protected $allowedFields = ['no_induk', 'nama_lengkap', 'jenis_kelamin', 'ttl', 'id_agama', 'anak_ke', 'no_telepon', 'alamat_rumah', 'id_kecamatan', 'jarak_sekolah', 'id_transportasi', 'id_sekolah', 'kelas', 'nama_pt', 'akreditasi_pt', 'tahun_masuk_pt', 'semester_ke', 'alamat_pt', 'id_status_peserta', 'id_status_pendaftaran', 'id_status_pembayaran', 'id_status_final', 'id_keluarga',  'id_file'];
  
        public function __construct()
        {
                $this->db = \Config\Database::connect();
                $this->builder = $this->db->table('identitas');
        }

        public function admin_daftar_penerima_sma(){
            $db = \Config\Database::connect();

            $builder = $db->table('identitas');
            $builder->select('nama_lengkap, status_peserta.nama_peserta, sekolah.asal_sekolah' ); 

            $builder->join('sekolah', 'sekolah.id_sekolah = identitas.id_sekolah');
            $builder->join('status_peserta', 'status_peserta.id_status_peserta = identitas.id_status_peserta');
            
            $query = $builder->get();
            
            return $query;
    }
}