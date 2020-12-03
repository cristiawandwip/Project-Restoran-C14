<?php

namespace App\Controllers;

use App\Models\Pelanggan_M;
use App\Models\Kategori_M;

class Login extends BaseController
{
	public function index()
	{
		$model = new Kategori_M();
		$data = ['kategori' => $model->findAll(),];
		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$model = new Pelanggan_M();
			$pelanggan = $model->where(['email' => $email, 'aktif' => 1])->first();

			if (empty($pelanggan)) {
				$data['info'] = "Email Anda Salah!!";
			} else {
				if (password_verify($password, $pelanggan['password'])) {
					$this->setSession($pelanggan);
					return redirect()->to(base_url('/Front/HomePage/read/1/'));
				} else {
					$data['info'] = "Password Anda Salah!!";
				}
			}
		} else {
			# code...
		}
		return view('login/login', $data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'pelanggan' => $pelanggan['pelanggan'],
			'email' => $pelanggan['email'],
			'idpelanggan' => $pelanggan['idpelanggan'],
			'logIn' => true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url('/Front/HomePage/read/1/'));
	}
}
