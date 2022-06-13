<?php

namespace App\Models;

use CodeIgniter\Model;

class MInformasiPendaftaran extends Model
{
        protected $table = 'informasi_pendaftaran';

        protected $primaryKey = 'id_informasi_pendaftaran';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_informasi_pendaftaran', 'persyaratan', 'jadwal_kegiatan', 'jadwal_pelaksanaan', 'proses_seleksi'];
}