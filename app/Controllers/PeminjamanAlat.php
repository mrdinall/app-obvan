<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;

class PeminjamanAlat extends BaseController
{
    protected $pinjamAlat;
    protected $parentMerk;
   

    public function __construct()
    {
        $this->pinjamAlat = new PeminjamanAlatModel();
        $this->parentMerk = new ParentMerkModel();
    }
    public function index()
    {
        $peminjaman = $this->pinjamAlat->findAll();
        $parentMerk = $this->parentMerk->findAll();
        $data = [
            'peminjaman' => $peminjaman,
            'parentMerk' => $parentMerk
        ];


        return view('peminjaman_alat', $data);
    }
    public function delete($id)
    {
        $this->pinjamAlat->delete($id);
        return redirect()->to('/peminjaman_alat');
    }
    public function create()
    {
     
        return view('create');
    }
}
