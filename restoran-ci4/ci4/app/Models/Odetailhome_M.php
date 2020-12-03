<?php

namespace App\Models;

use CodeIgniter\Model;

class Odetailhome_M extends Model
{
    protected $table = 'tblorderdetail';

    protected $allowedFields = ['idorder', 'idmenu', 'jumlah', 'hargajual',];
}
