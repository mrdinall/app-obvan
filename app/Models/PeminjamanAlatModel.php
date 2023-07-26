<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanAlatModel extends Model
{
    protected $table = 'peminjaman_alat';
    protected $primaryKey = 'id_pinjam';
    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_pinjam', 'tanggal', 'acara', 'tempat', 'durasi_pinjam', 'nama_peminjam', 'nama_pemberi'];


    public function autoNumberId()
    {
        $builder = $this->table('peminjaman_alat');
        $builder->selectMax('id_pinjam', 'idMax');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {

            foreach ($query->getResult() as $key) {
                $code = '';
                $getData = substr($key->idMax, -4);
                $increment = intval($getData) + 1;
                $code = sprintf('%04s', $increment);
            }
        } else {
            $code = '0001';
        }
        return 'PJM-' . $code;
    }
    public function getPeminjamanAlat($id = false)
    {

        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_pinjam' => $id])->first();
    }
    public function getJoins()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('peminjaman_alat');
        // $builder = $this->table('peminjaman_alat');
        $builder->select('*');
        $builder->join('peminjaman_alat', 'peminjaman_alat.id_pinjam = parent_merk.id_pinjaman_alat');
        $query = $builder->get();
        dd($query);
    }
}
