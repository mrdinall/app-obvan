<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;
use PhpParser\Node\Stmt\Break_;

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
        
        // $allData = $this->parentMerkModel->getParentViews($id_pinjam);
        
        
        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id_pinjam),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id_pinjam),
            

        ];
        // var_dump($allDataParentMerk);
        // $data['allPeminjaman']=$this->pinjamAlatModel->getJoins($id_pinjam);

        // foreach (array_slice($allDataParentMerk,1) as $index => $user) {
        //     // print the array index
        //     echo "<br>";
            

        //     foreach ($user as $key) {
        //         echo $key;
        //         // array_slice($user,1);
        //         echo "<br>";
                
        //     }
            
        // }
        //  var_dump($allData);
        // foreach ($allData as $option){
        //   $hitung=  count($allData)-1;
         
        //     echo "<br>";
        //     foreach($option as $key => $value){
        //     echo $value;
          
        //     echo "<br>";
        //     }
        //     $test =!array_key_first($option);
        //     echo $test;
        // }
      
        // echo $hitung;
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
        

       //update data lama parent merk
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
       
         // insert data baru parent merk
        } else if(isset($namaBarangUpdate) )  {     
            $jumlahDataUpdate = count($namaBarangUpdate);
            for ($j = 0; $j < $jumlahDataUpdate; $j++) {
                $this->parentMerkModel->save([
    
                    
                    'id_pinjaman_alat' => $id_pinjam,
                    'nama_barang' => $namaBarangUpdate[$j],
                    'merk' => $merkUpdate[$j],
                    'serial_number' => $serialNumberUpdate[$j],
                    'jumlah' => $jumlahUpdate[$j]
    
                ]);
            }
            //fungsi untuk update data yang sudah ada
            if(isset($namaBarang)){
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

        }else if(!isset($namaBarang) && !isset($namaBarangUpdate)){
            die('dubug: datakosong');
        }

        return redirect()->to('/peminjaman_alat');
    }
    // public function formedit()
    // {
    //     dd('heleo');
    //     if ($this->request->isAJAX()) {

    //         $idInAjax = $this->request->getVar('id_pinjam');
    //         $row = $this->pinjamAlatModel->find($idInAjax);
    //         $data = [
    //             'id_pinjam' => $row['id_pinjam'],
    //             'tanggal' => $row['tanggal'],
    //             'acara' => $row['acara'],
    //             'tempat' => $row['tempat'],
    //             'durasi_pinjam' => $row['durasi_pinjam'],
    //             'nama_peminjam' => $row['nama_peminjam'],
    //             'nama_pemberi' => $row['nama_pemberi'],
    //             'tanggal_pengembalian' => $row['tanggal_pengembalian'],
    //             'nama_penerima' => $row['nama_penerima'],
    //             'catatan' => $row['catatan'],
    //         ];
    //         $msg = [
    //             'sukses' => view('peminjaman_alat/modaledit', $data)
    //         ];
    //         echo json_encode($msg);
    //     }
    // }
    public function hapus($id)
    {
        return $this->parentMerkModel->delete($id);
        // return redirect()->to('/peminjaman_alat');
    }
}
