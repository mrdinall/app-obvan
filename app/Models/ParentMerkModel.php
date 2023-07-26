<?php

namespace App\Models;

use CodeIgniter\Model;

class ParentMerkModel extends Model
{
    protected $table = 'parent_merk';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'id_pinjaman_alat', 'nama_barang', 'merk', 'serial_number', 'jumlah'];

    public function getParentMerk($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getParentViews($id)
    {
        return $this->where(['id_pinjaman_alat' => $id])->findAll();

    }
}
