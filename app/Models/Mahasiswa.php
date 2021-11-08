<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $table                = 'mahasiswa';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;

    protected $allowedFields        = ['npm', 'nama', 'gender', 'jurusan', 'asal', 'umur'];
}
