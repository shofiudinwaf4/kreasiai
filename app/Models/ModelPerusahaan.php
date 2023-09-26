<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPerusahaan extends Model
{
    public function DetailData()
    {
        return $this->db->table('perusahaan')
            ->where('perusahaan_id', 1)
            ->get()->getRowArray();
    }
    public function UpdateData($data)
    {
        $this->db->table('perusahaan')
            ->where(['perusahaan_id' => $data['perusahaan_id']])
            ->update($data);
    }
}
