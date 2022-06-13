<?php 

namespace App\Models;

use CodeIgniter\Model;

class MTransportasi extends Model
{
        protected $table = 'transportasi';
        
        protected $primaryKey = 'id_transportasi';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_transportasi','nama_transportasi'];
  
}