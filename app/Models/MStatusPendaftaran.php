<?php 

namespace App\Models;

use CodeIgniter\Model;

class MStatusPendaftaran extends Model
{
        protected $table = 'status_pendaftaran';
        
        protected $primaryKey = 'id_status_pendaftaran';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_status_pendaftaran','nama_status'];
  
}