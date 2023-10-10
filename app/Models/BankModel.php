<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table = 'codingtest';

    protected $allowedFields = ['nama', 'deskripsi', 'foto', 'harga_per_kilogram'];

    public function saveSampah($data)
    {
        return $this->insert($data);
    }

    public function getSampah($sampahId)
    {
        return $this->find($sampahId);
    }
}
