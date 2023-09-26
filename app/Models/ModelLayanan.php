<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLayanan extends Model
{
    protected $table = 'layanan';
    public function AllData()
    {
        return $this->db->table('layanan')
            ->get()->getResultArray();
    }
    // public function AllDataLimit()
    // {
    //     return $this->db->table('tbl_berita')
    //         ->limit(10)->orderBy('id_berita', 'DESC')
    //         ->get()->getResultArray();
    // }
    public function SaveLayanan($data)
    {
        $this->db->table('layanan')->insert($data);
    }
    public function DaftarLayanan($slug_nama)
    {
        return $this->db->table('layanan')
            ->where(['slug_nama' => $slug_nama])
            ->get()->getRowArray();
    }
    // public function ViewBerita($slug_berita)
    // {
    //     return $this->db->table('tbl_berita')
    //         ->join('tbl_user', 'tbl_user.id_user=tbl_berita.id_user', 'LEFT')
    //         ->where(['slug_berita' => $slug_berita])
    //         ->get()->getRowArray();
    // }
    public function UpdateData($data, $id)
    {
        return $this->db->table('layanan')->update($data, array('layanan_id' => $id));
    }
    public function DeleteData($data)
    {
        return $this->db->table('layanan')
            ->where(['layanan_id' => $data['layanan_id']])
            ->delete($data);
    }
    public function getPaket($slug_nama)
    {
        return $this->db->table('paketlayanan')
            ->join('layanan', 'layanan.layanan_id=paketlayanan.layanan_id')->where(['slug_nama' => $slug_nama])->get()
            ->getResultArray();

        // return $this->db->table('siswa')
        //     ->join('kelas', 'kelas.IDKelas=siswa.IDKelas')
        //     ->get()->getResultArray();
    }
    public function SavePaket($data)
    {
        $this->db->table('paketlayanan')->insert($data);
    }
}
