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

    public function edit($id_pinjam)
    {
        // $allDataParentMerk = $this->parentMerkModel->getParentViews($id);


        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id_pinjam),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id_pinjam)

        ];
        // $data['allPeminjaman']=$this->pinjamAlatModel->getJoins($id_pinjam);



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

        $idParent = $this->request->getVar('idParentMerk');
        $namaBarang = $this->request->getVar('naBarEdit');
        $merk = $this->request->getVar('merkEdit');
        $serialNumber = $this->request->getVar('sNEdit');
        $jumlah = $this->request->getVar('jumlahEdit');
        
        //updateAdd
        $namaBarangUpdate = $this->request->getVar('naBarEditUpdate');
        $merkUpdate = $this->request->getVar('merkEditUpdate');
        $serialNumberUpdate = $this->request->getVar('sNEditUpdate');
        $jumlahUpdate = $this->request->getVar('jumlahEditUpdate');
        
        if (!isset($namaBarangUpdate)) {
            $jumlahData = count($namaBarang);
            for ($i = 0; $i < $jumlahData; $i++) {
                $this->parentMerkModel->save([
                    'id' => $idParent[$i],
                    // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                    'nama_barang' => $namaBarang[$i],
                    'merk' => $merk[$i],
                    'serial_number' => $serialNumber[$i],
                    'jumlah' => $jumlah[$i]
 
                ]);
            }
        } else if(isset($namaBarangUpdate) )  {
        
            // $idParent = $this->request->getVar('idParentMerk');
       
            $jumlahDataUpdate = count($namaBarangUpdate);
            // dd($jumlahDataUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {
                $this->parentMerkModel->save([
    
                    
                    'id_pinjaman_alat' => $id_pinjam,
                    'nama_barang' => $namaBarangUpdate[$j],
                    'merk' => $merkUpdate[$j],
                    'serial_number' => $serialNumberUpdate[$j],
                    'jumlah' => $jumlahUpdate[$j]
    
                ]);
            }


            $jumlahData = count($namaBarang);
            for ($i = 0; $i < $jumlahData; $i++) {
                $this->parentMerkModel->save([
                    'id' => $idParent[$i],
                    // 'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                    'nama_barang' => $namaBarang[$i],
                    'merk' => $merk[$i],
                    'serial_number' => $serialNumber[$i],
                    'jumlah' => $jumlah[$i]
 
                ]);
            }

        }

        return redirect()->to('/peminjaman_alat');
    }
    public function formedit()
    {
        dd('heleo');
        if ($this->request->isAJAX()) {

            $idInAjax = $this->request->getVar('id_pinjam');
            $row = $this->pinjamAlatModel->find($idInAjax);
            $data = [
                'id_pinjam' => $row['id_pinjam'],
                'tanggal' => $row['tanggal'],
                'acara' => $row['acara'],
                'tempat' => $row['tempat'],
                'durasi_pinjam' => $row['durasi_pinjam'],
                'nama_peminjam' => $row['nama_peminjam'],
                'nama_pemberi' => $row['nama_pemberi'],
                'tanggal_pengembalian' => $row['tanggal_pengembalian'],
                'nama_penerima' => $row['nama_penerima'],
                'catatan' => $row['catatan'],
            ];
            $msg = [
                'sukses' => view('peminjaman_alat/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('idTEXT');
            $this->parentMerkModel->delete($id);
        }
    }
}
