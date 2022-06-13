<?php 

namespace App\Models;

use CodeIgniter\Model;

class MKecamatan extends Model
{
        protected $table = 'kecamatan';
        
        protected $primaryKey = 'id_kecanatan';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_kecamatan','nama_kecamatan'];
  
}