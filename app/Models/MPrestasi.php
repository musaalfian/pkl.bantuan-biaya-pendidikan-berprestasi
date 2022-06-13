<?php

namespace App\Models;

use CodeIgniter\Model;

class MPrestasi extends Model
{
        protected $table = 'prestasi';

        protected $primaryKey = 'id_prestasi';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_prestasi', 'kategori', 'tingkat', 'juara', 'nilai', 'no_induk', 'file_prestasi', 'nama_prestasi', 'tahun_prestasi'];

        // mencari prestasi berdasarkan nomer induk
        public function find_prestasi_noinduk($no_induk)
        {
                $builder = $this->db->table('prestasi');
                $builder->select('prestasi.id_prestasi, tingkat, juara, nilai, prestasi.no_induk,  file_prestasi, kategori, nama_prestasi, tahun_prestasi');
                $builder->join('identitas', 'identitas.no_induk = prestasi.no_induk');
                $builder->where('identitas.no_induk', $no_induk);
                $query = $builder->get();
                return $query;
        }
        public function find_max_prestasi_noinduk($no_induk)
        {
                $builder = $this->db->table('prestasi');
                $builder->select('nama_prestasi');
                $builder->selectMax('nilai');
                $builder->join('identitas', 'identitas.no_induk = prestasi.no_induk');
                $builder->where('identitas.no_induk', $no_induk);
                $query = $builder->get();
                return $query;
        }
        public function detail_prestasi($no_induk)
        {
                $builder = $this->db->table('prestasi');
                $builder->select('identitas.no_induk, identitas.nama_lengkap, prestasi.*');
                $builder->join('identitas', 'identitas.no_induk = prestasi.no_induk');
                $builder->where('identitas.no_induk', $no_induk);
                $query = $builder->get();
                return $query;
        }
}