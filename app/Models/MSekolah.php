<?php 

namespace App\Models;

use CodeIgniter\Model;

class MSekolah extends Model
{
        protected $table = 'sekolah';
        
        protected $primaryKey = 'id_sekolah';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_sekolah','nama_sekolah','alamat_sekolah'];
  
}