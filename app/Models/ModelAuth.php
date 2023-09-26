<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function getData($username)
    {
        return $this->db->table('admin')
            ->where('username', $username)
            ->get()->getRowArray();
    }
}
