<?php

namespace App\Controllers;
use App\Models\PeminjamanAlatModel;

class PeminjamanAlat extends BaseController
{
    protected $pinjamAlat;
    public function __construct()
    {
        $this->pinjamAlat= new PeminjamanAlatModel();
        
    }
    public function index()
    {
        $peminjaman= $this->pinjamAlat->findAll();
        $data =[
            'peminjaman'=> $peminjaman
        ];
        return view('peminjaman_alat',$data);
    }
    public function delete($id)
    {
        $this->pinjamAlat->delete($id);
        return redirect()->to('/peminjaman_alat');
    }

}