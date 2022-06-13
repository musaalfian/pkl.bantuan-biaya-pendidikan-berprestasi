<?php 

namespace App\Models;

use CodeIgniter\Model;

class MStatusPembayaran extends Model
{
        protected $table = 'status_pembayaran';
        
        protected $primaryKey = 'id_status_pembayaran';  
        protected $useAutoIncrement = true;  
        protected $allowedFields = ['id_status_pembayaran','nama_status_pembayaran'];
  
}