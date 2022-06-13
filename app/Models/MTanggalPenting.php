<?php

namespace App\Models;

use CodeIgniter\Model;

class MTanggalPenting extends Model
{
        protected $table = 'tanggal_penting';

        protected $primaryKey = 'id_tanggal_penting';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_tanggal_penting', 'nama_tanggal_penting', 'tanggal_penting'];
}