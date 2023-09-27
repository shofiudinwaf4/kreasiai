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
            'layanan' => $this->ModelLayanan->AllData(),
            'paket' => $this->ModelLayanan->getPaket('slug_nama')
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
    public function Perusahaan()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Perusahaan',
            'menu' => 'Setting',
            'submenu' => 'Perusahaan',
            'page' => 'admin/v_perusahaan',
            'validation' => \Config\Services::validation(),
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData(),
        ];
        return view('admin/v_templateAdmin', $data);
    }
    public function UpdatePerusahaan()
    {
        if ($this->validate([
            'nama_perusahaan' => [
                'label' => 'Nama Perusahaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'alamat_perusahaan' => [
                'label' => 'Alamat Perusahaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'tentang_Kami' => [
                'label' => 'Tentang Kami',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong',
                ]
            ],
            'logo_header' => [
                'label' => 'File',
                'rules' => 'max_size[logo_header,2048]|ext_in[logo_header,png]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus png',
                ]
            ],
            'logo' => [
                'label' => 'File',
                'rules' => 'max_size[logo,2048]|ext_in[logo,png]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Maksimal 2084 KB',
                    'ext_in' => 'Jenis {field} harus png',
                ]
            ],

        ])) {
            $perusahaan = $this->ModelPerusahaan->DetailData();
            // $foto_kepsek = $this->request->getFile('logo_dinas');
            // $logo_sekolah = $this->request->getFile('logo_sekolah');
            $logo_header = $this->request->getFile('logo_header');
            $logo = $this->request->getFile('logo');

            if ($logo_header->getError() == 4) {
                $nama_logo_header = $perusahaan['logo_header'];
            } else {
                # code...
                $nama_logo_header = $logo_header->getRandomName();
                $logo_header->move('gambar', $nama_logo_header);
            }
            if ($logo->getError() == 4) {
                $nama_logo = $perusahaan['logo'];
            } else {
                # code...
                $nama_logo = $logo->getRandomName();
                $logo->move('gambar', $nama_logo);
            }
            $data = [
                'perusahaan_id' => 1,
                'logo' => $nama_logo,
                'logo_header' => $nama_logo_header,
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'alamat_perusahaan' => $this->request->getPost('alamat_perusahaan'),
                'tentang_Kami' => $this->request->getPost('tentang_Kami'),
            ];

            $this->ModelPerusahaan->UpdateData($data);
            session()->setFlashdata('update', 'Data berhasil diubah');
            return redirect()->to('admin/perusahaan');
            // jika valid
        } else {
            return redirect()->to('admin/perusahaan')->withInput();
        }
    }
}
