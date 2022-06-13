<?php

namespace App\Models;

use CodeIgniter\Model;

class MFile extends Model
{
        protected $table = 'file';

        protected $primaryKey = 'id_file';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_file', 'no_induk', 'ktp', 'kk', 'kartu_pelajar', 'rek_bpd', 'raport_smt', 'raport_legalisasi', 'pas_foto', 'prestasi', 'sktm', 'diterima_pt', 'proposal', 'akreditasi_pt', 'laporan', 'formulir_pendaftaran'];

        public function __construct()
        {
                $this->db = \Config\Database::connect();
                $this->builder = $this->db->table('file');
        }
        // mencari file berdasarkan nomer induk
        public function find_file_noinduk($no_induk)
        {
                $this->builder->select('file.id_file, ktp,kk,kartu_pelajar, rek_bpd,raport_smt, raport_legalisasi,pas_foto, sktm, diterima_pt,proposal,file.akreditasi_pt, laporan,formulir_pendaftaran');
                $this->builder->join('identitas', 'identitas.no_induk = file.no_induk');
                $this->builder->where('identitas.no_induk', $no_induk);
                $query = $this->builder->get();
                return $query;
        }
        // public function ambil_scan_rek($no_induk){
        //         $db = \Config\Database::connect();
        //         $builder = $db->table('file');
        //         //  where join ke status peserta
        //         // join ke status no 1
        //         // nama asal sekolah status aksi
        //         $builder->select('id_file,no_induk, rek_bpd');                
        //         $builder->join('identitas', 'identitas.no_induk = file.no_induk');
        //         $builder->where('identitas.no_induk', $no_induk);
        //         $query = $builder->get();
        //         return $query;
        // }
}