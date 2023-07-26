<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;


class PeminjamanAlat extends BaseController
{
    protected $pinjamAlatModel;
    protected $parentMerkModel;


    public function __construct()
    {
        $this->pinjamAlatModel = new PeminjamanAlatModel();
        $this->parentMerkModel = new ParentMerkModel();
    }
    public function index()
    {

        $data = [
            'peminjaman' => $this->pinjamAlatModel->getPeminjamanAlat(),
            'parentMerk' => $this->parentMerkModel->getParentMerk()
        ];
        return view('peminjaman_alat', $data);
    }
    public function delete($id)
    {
        $this->pinjamAlatModel->delete($id);
        return redirect()->to('/peminjaman_alat');
    }

    public function create()
    {

        return view('create');
    }
    public function save()
    {

        $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $this->pinjamAlatModel->save([
            'id_pinjam' => $idAutoPeminjamanAlat,
            'tanggal' => $this->request->getVar('tanggal'),
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi')
        ]);


        $namaBarang = $this->request->getVar('naBar');
        $merk = $this->request->getVar('merk');
        $serialNumber = $this->request->getVar('sN');
        $jumlah = $this->request->getVar('jumlah');
        $jumlahData = count($namaBarang);

        for ($i = 0; $i < $jumlahData; $i++) {
            $this->parentMerkModel->save([

                'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                'nama_barang' => $namaBarang[$i],
                'merk' => $merk[$i],
                'serial_number' => $serialNumber[$i],
                'jumlah' => $jumlah[$i]

            ]);
        }

        return redirect()->to('/peminjaman_alat');
    }

    public function edit($id)
    {
        // $allDataParentMerk = $this->parentMerkModel->getParentViews($id);


        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id)

        ];




        return view('edit', $data);
    }
    public function update($id_pinjam)
    {
        // $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $this->pinjamAlatModel->save([
            'id_pinjam' => $id_pinjam,
            'tanggal' => $this->request->getVar('tanggal'),
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi')
        ]);


        $namaBarang = $this->request->getVar('naBarEdit');
        $merk = $this->request->getVar('merkEdit');
        $serialNumber = $this->request->getVar('sNEdit');
        $jumlah = $this->request->getVar('jumlahEdit');
        $jumlahData = count($namaBarang);
    }
}
