<?php

namespace App\Controllers;

use App\Models\ModelLayanan;
use App\Models\ModelProfil;
use App\Models\ModelSetting;
use App\Models\ModelPerusahaan;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelPerusahaan = new ModelPerusahaan;
        $this->ModelProfil = new ModelProfil;
        $this->ModelLayanan = new ModelLayanan;
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',
            'page' => 'admin/v_admin',
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData()
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function Layanan()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Daftar Layanan',
            'menu' => 'Setting',
            'submenu' => 'Layanan',
            'page' => 'admin/v_layanan',
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData()
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function TambahLayanan()
    {
        session();
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Tambah Layanan',
            'menu' => 'Setting',
            'submenu' => 'Tambah Layanan',
            'page' => 'admin/v_tambahLayanan',
            'validation' => \Config\Services::validation(),
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData()
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function SaveLayanan()
    {
        // validasi input
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ],
            'deskripsi_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi layanan harus terisi'
                ]
            ]
        ])) {
            \session();
            $validation = \Config\Services::validation();
            return redirect()->to('admin/tambahLayanan')->withInput()->with('validation', $validation);
        }
        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
        ];
        $this->ModelLayanan->SaveLayanan($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('admin/layanan');
    }
    public function EditLayanan($layanan_id)
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Edit Layanan',
            'menu' => 'Setting',
            'submenu' => 'Layanan',
            'page' => 'admin/v_editLayanan',
            'validation' => \Config\Services::validation(),
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData(),
            'getlayanan' => $this->ModelLayanan->DaftarLayanan($layanan_id)
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function UpdateLayanan($layanan_id)
    {
        // validasi input
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ],
            'deskripsi_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama layanan harus terisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('admin/editLayanan')->withInput();
        }
        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
        ];
        $this->ModelLayanan->UpdateData($data, $layanan_id);
        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('admin/layanan');
    }
    public function DeleteLayanan($layanan_id)
    {
        $data = [
            'layanan_id' => $layanan_id,
        ];
        $this->ModelLayanan->DeleteData($data);
        session()->setFlashdata('delete', 'Data berhasil dihapus');
        return redirect()->to('admin/layanan');
    }
    public function DaftarLayanan($slug_nama)
    {
        $layanan = $this->ModelLayanan->DaftarLayanan($slug_nama);
        $data = [
            'judul' => 'Layanan',
            'subjudul' => $layanan['nama_layanan'],
            'menu' => 'Layanan',
            'submenu' => '',
            'page' => 'admin/v_daftarLayanan',
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData(),
            'getlayanan' => $layanan,
            'getPaket' => $this->ModelLayanan->getPaket($slug_nama)
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function TambahPaket($slug_nama)
    {
        $layanan = $this->ModelLayanan->DaftarLayanan($slug_nama);
        $data = [
            'judul' => 'Layanan',
            'subjudul' => $layanan['nama_layanan'],
            'menu' => 'Layanan',
            'submenu' => '',
            'validation' => \Config\Services::validation(),
            'page' => 'admin/v_tambahPaket',
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData(),
            'getlayanan' => $layanan,
            'getPaket' => $this->ModelLayanan->getPaket($slug_nama)
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function SavePaket($slug_nama)
    {
        // validasi input
        if (!$this->validate([
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama paket harus terisi'
                ]
            ],
            'harga_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga paket harus terisi'
                ]
            ],
            'detail_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Detail paket harus terisi'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('admin/tambahPaket/' . $slug_nama)->withInput();
        }
        $hargaPaket = $this->request->getVar('harga_paket');
        $potonganPaket = $this->request->getVar('harga_paket');
        if ($potonganPaket == null) {
            $diskon = 0;
        } else {
            $diskon = $hargaPaket - $potonganPaket;
        }
        $data = [
            'layanan_id' => $this->request->getVar('nama_layanan'),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $hargaPaket,
            'potongan_paket' => $diskon,
            'detail_paket' => $this->request->getVar('detail_paket'),
        ];
        $this->ModelLayanan->SavePaket($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('admin/daftarLayanan/' . $slug_nama);
    }
}
