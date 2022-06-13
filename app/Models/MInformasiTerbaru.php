<?php

namespace App\Models;

use CodeIgniter\Model;

class MInformasiTerbaru extends Model
{
        protected $table = 'informasi_terbaru';

        protected $primaryKey = 'id_informasi_terbaru';
        protected $useAutoIncrement = true;
        protected $allowedFields = ['id_informasi_terbaru', 'judul_informasi_terbaru', 'deskripsi_informasi_terbaru', 'file_informasi_terbaru', 'gambar_informasi_terbaru', 'link_informasi_terbaru'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';

        public function ambil_informasi($jumlah, $id_informasi_terbaru = null)
        {
                $builder = $this->db->table($this->table);
                $builder->select();
                if ($id_informasi_terbaru != null) {
                        $builder->notLike('id_informasi_terbaru', $id_informasi_terbaru);
                }
                $builder->orderBy('updated_at', 'DESC');
                $builder->limit($jumlah);
                $query = $builder->get();
                return $query;
        }
        public function ambil_informasi_pendaftaran_awal($id_informasi_terbaru = null)
        {
                $builder = $this->db->table($this->table);
                $builder->select();
                $builder->whereIn('id_informasi_terbaru', [1, 2, 3, 4]);
                if ($id_informasi_terbaru != null) {
                        $builder->notLike('id_informasi_terbaru', $id_informasi_terbaru);
                }
                $builder->orderBy('updated_at', 'DESC');
                $query = $builder->get();
                return $query;
        }
}
