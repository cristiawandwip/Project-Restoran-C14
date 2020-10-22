<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;


class User extends BaseController
{
    protected $session = null;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        echo "User";
    }

    public function create()
    {
        $tbluser = [
            'user' => 'Cristiawan',
            'email' => 'cristiawan@gmail.com',
            'level' => 'admin'
        ];

        $this->session->set($tbluser);
    }

    public function read()
    {
        echo $this->session->get('user') . "<br> ";
        echo $this->session->get('email') . "<br> ";
        echo $this->session->get('level');
    }

    public function delete()
    {
        $this->session->remove('email');
    }

    public function destroy()
    {
        $this->session->destroy();
    }




    //--------------------------------------------------------------------

}
