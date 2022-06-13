<?php 

namespace App\Models;

use CodeIgniter\Model;

class MAgama extends Model
{
        protected $table = 'agama';
        
        protected $primaryKey = 'id_agama';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_agama','nama_agama'  ];
  
}