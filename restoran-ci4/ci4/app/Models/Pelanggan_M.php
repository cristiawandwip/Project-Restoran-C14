<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_M extends Model
{
    protected $table = 'tblpelanggan';
    protected $primaryKey = 'idpelanggan';
    protected $allowedFields = ['aktif', 'pelanggan', 'alamat', 'telp', 'email', 'password'];

    protected $validationRules = [
        'email' => 'valid_email|is_unique[tblpelanggan.email]',
    ];

    protected $validationMessages = [
        'email'        => [
            'valid_email' => 'Email Salah !',
            'is_unique' => 'Ada email yang sama'
        ],

    ];
}
