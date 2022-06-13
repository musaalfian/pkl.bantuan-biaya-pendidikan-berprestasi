<?php 

namespace App\Models;

use CodeIgniter\Model;

class MStatusFinal extends Model
{
        protected $table = 'status_final';
        
        protected $primaryKey = 'id_status_final';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_status_final ','nama_status_final'];
  
}