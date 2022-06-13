<?php 

namespace App\Models;

use CodeIgniter\Model;

class MStatusPeserta extends Model
{
        protected $table = 'status_peserta';
        
        protected $primaryKey = 'id_status_peserta ';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_status_peserta ','nama_peserta'];
  
}