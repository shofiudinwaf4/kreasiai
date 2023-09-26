<?php

namespace App\Controllers;

use App\Models\ModelLayanan;
use App\Models\ModelProfil;
use App\Models\ModelSetting;
use App\Models\ModelPerusahaan;

class Home extends BaseController
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
            'page' => 'home/index',
            'profil' => $this->ModelProfil->DetailData(),
            'perusahaan' => $this->ModelPerusahaan->DetailData(),
            'layanan' => $this->ModelLayanan->AllData()
        ];
        return view('home/layout_home', $data);
    }
}
