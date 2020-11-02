<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class order extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM vorder ORDER BY status ASC ";

        $result = $db->query($sql);
        $row = $result->getResult('array');

        $data = [
            'judul' => 'Data Order',
            'order' => $row

        ];


        echo view('order/select', $data);
    }
}
