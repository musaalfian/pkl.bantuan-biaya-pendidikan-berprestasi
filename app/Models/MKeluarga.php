<?php

namespace App\Models;

use CodeIgniter\Model;

class MKeluarga extends Model
{
        protected $table = 'keluarga';

        protected $primaryKey = 'id_keluarga';
        protected $allowedFields = ['id_keluarga', 'no_induk', 'nama_ayah', 'usia_ayah', 'pekerjaan_ayah', 'pendidikan_ayah', 'penghasilan_ayah', 'alamat_ayah', 'nama_ibu', 'usia_ibu', 'pekerjaan_ibu', 'pendidikan_ibu', 'penghasilan_ibu', 'alamat_ibu', 'bsm_kip', 'pkh_kks_kbs', 'rtsm_rtm'];

        public function __construct()
        {
                $this->db = \Config\Database::connect();
                $this->builder = $this->db->table('keluarga');
        }
        // mencari keluarga berdasarkan user id
        public function find_keluarga_noinduk($no_induk)
        {
                $this->builder->select('keluarga.id_keluarga, nama_ayah,usia_ayah,pekerjaan_ayah,pendidikan_ayah, penghasilan_ayah, alamat_ayah, nama_ibu,usia_ibu, pekerjaan_ibu, pendidikan_ibu,penghasilan_ibu, alamat_ibu, identitas.no_induk, rtsm_rtm, pkh_kks_kbs,bsm_kip');
                $this->builder->join('identitas', 'identitas.no_induk = keluarga.no_induk');
                $this->builder->where('identitas.no_induk', $no_induk);
                $query = $this->builder->get();
                return $query;
        }
}
