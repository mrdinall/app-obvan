<?php

namespace App\Controllers;

use App\Models\PeminjamanAlatModel;
use App\Models\ParentMerkModel;

class PeminjamanAlat extends BaseController
{
    protected $helpers = ['form'];
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

        $data = [
            'title' => 'Form Tambah Data Peminjaman Alat',

        ];
        // $data['validation'] = \Config\Services::validation();
        return view('create', $data);
    }
    public function test()
    {

        $data = [
            'title' => 'Form Tambah Data Peminjaman Test',

        ];
        // $data['validation'] = \Config\Services::validation();
        return view('test', $data);
    }
    public function save()
    {

        $validate = $this->validate([
            'tanggal' => [
                'rules' => 'required|valid_date[d/m/Y]',
                'errors' => [
                    'required' => '{field} harus di isi !',
                    'valid_date'=> 'format {field} tidak benar!'
                ]
            ],
            'acara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'tempat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi !'
                ]
            ],
            'nama_peminjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama peminjam harus di isi !'
                ]
            ],
            'nama_pemberi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama pemberi harus di isi !'
                ]
            ]

        ]);
        if (!$validate) {
            // session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $idAutoPeminjamanAlat = $this->pinjamAlatModel->autoNumberId();
        $converttgl = $this->request->getVar('tanggal');
        $date = str_replace('/', '-', $converttgl);
        $tanggalconvert= date('Y-m-d', strtotime($date));
     
        $this->pinjamAlatModel->save([
            'id_pinjam' => $idAutoPeminjamanAlat,
            'tanggal' => $tanggalconvert,
            'acara' => $this->request->getVar('acara'),
            'tempat' => $this->request->getVar('tempat'),
            'durasi_pinjam' => $this->request->getVar('durasi_pinjam'),
            'nama_peminjam' => $this->request->getVar('nama_peminjam'),
            'nama_pemberi' => $this->request->getVar('nama_pemberi')
        ]);




        $namaBarangInput = $this->request->getVar('naBar');
        $merkInput = $this->request->getVar('merk');
        $serialNumberInput = $this->request->getVar('sN');
        $jumlahInput = $this->request->getVar('jumlah');
        $jumlahDataInput = count($namaBarangInput);
        for ($i = 0; $i < $jumlahDataInput; $i++) {
            $this->parentMerkModel->save([

                'id_pinjaman_alat' => $idAutoPeminjamanAlat,
                'nama_barang' => $namaBarangInput[$i],
                'merk' => $merkInput[$i],
                'serial_number' => $serialNumberInput[$i],
                'jumlah' => $jumlahInput[$i]

            ]);
        }
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/peminjaman_alat');
    }

    public function edit($id_pinjam)
    {
        $data = [
            'dataPinjam' => $this->pinjamAlatModel->getPeminjamanAlat($id_pinjam),
            'allDataParentMerk' => $this->parentMerkModel->getParentViews($id_pinjam)

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
        } else if (isset($namaBarangUpdate)) {
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
            if (isset($namaBarang)) {
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
        }

        return redirect()->to('/peminjaman_alat');
    }

    public function hapus($id)
    {
        return $this->parentMerkModel->delete($id);
        // return redirect()->to('/peminjaman_alat');
    }
}
