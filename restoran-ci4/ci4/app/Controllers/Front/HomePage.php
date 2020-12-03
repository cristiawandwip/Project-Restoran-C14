<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\OrderDetail_M;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\Pelanggan_M;

class HomePage extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new Kategori_M();
		$modelM = new Menu_M();

		$data = [
			'judul' => 'Menu',
			'kategori' => $model->findAll(),
			'menu' => $modelM->paginate(3, 'page'),
			'pager' => $modelM->pager,
			'cart'	=> $this->cart(),
		];

		return view('login/isi', $data);
	}

	public function cart()
	{
		$modelM = new Menu_M();
		$cart = 0;
		foreach (session()->get() as $key => $value) {
			if ($key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan' && $key <> 'email' && $key <> 'idpelanggan' && $key <> 'login') {
				$id = substr($key, 1);
				$jumlah = $modelM->where('idmenu', $id)->findAll();
				foreach ($jumlah as $r) {
					$cart++;
				}
			}
		}
		return $cart;
	}

	public function read($id = null)
	{
		$pager = \Config\Services::pager();
		if (isset($id)) {

			$modelM = new Menu_M();
			$model = new Kategori_M();
			$jumlah = $modelM->where('idkategori', $id)->findAll();
			$count = count($jumlah);

			$tampil = 3;
			$mulai = 0;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			$menu = $modelM->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'judul' => 'Kumpulan Menu ',
				'menu' => $menu,
				'kategori' => $model->findAll(),
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count,
				'cart'	=> $this->cart(),
				'id'	=> $id,
			];

			return view("login/isi", $data);
		}
	}

	public function create()
	{
		$model = new Kategori_M();
		$data = [
			'judul' => 'Registrasi Pelanggan ',
			'kategori' => $model->findAll(),
		];
		return view("login/registrasi", $data);
	}

	public function daftar()
	{
		$request = \Config\Services::request();

		$data = [
			'pelanggan' => $request->getPost('nama'),
			'alamat' => $request->getPost('alamat'),
			'telepon' => $request->getPost('telepon'),
			'email' => $request->getPost('email'),
			'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
			'konfirmasi' => password_hash($request->getPost('konfirmasi'), PASSWORD_DEFAULT),
			'aktif' => 1
		];

		$model = new Pelanggan_M();
		if ($request->getPost('password') == $request->getPost('konfirmasi')) {
			if ($model->insert($data) === false) {
				$error = $model->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(base_url("/Front/HomePage/create"));
			} else {
				return redirect()->to(base_url("/login"));
			}
		} else {
			$error = [
				'Password' => 'Password dan konfirmasi harus benar ',
				'telepon' => 'No Telepon harus lebih 3 angka'
			];
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/Front/HomePage/create"));
		}
	}

	public function histori()
	{
		$model = new Kategori_M();
		$db = \Config\Database::connect();
		$hasil = $db->table('vorder');
		$email = session()->get('email');
		$query = $hasil->getWhere(['email' => $email]);
		$pager = \Config\Services::pager();
		$detail = $query->getResult('array');
		$count = count($detail);

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$query = $hasil->getWhere(['email' => $email], $tampil, $mulai);
		$vorder = $query->getResult('array');

		$data = [
			'judul' => 'Histori Pembelian :',
			'kategori' => $model->findAll(),
			'vorder' => $vorder,
			'pager' => $pager,
			'cart'	=> $this->cart(),
			'tampil' => $tampil,
			'total' => $count,
			'mulai' => $mulai,
		];
		return view("login/histori", $data);
	}

	public function detail($id)
	{
		$pager = \Config\Services::pager();
		$modelOD = new OrderDetail_M();
		$model = new Kategori_M();
		$jumlah = $modelOD->where('idorder', $id)->findAll();
		$count = count($jumlah);

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$Detail = $modelOD->where('idorder', $id)->findAll($tampil, $mulai);

		$data = [
			'judul' => 'Detail Belanja :',
			'detail' => $Detail,
			'kategori' => $model->findAll(),
			'pager' => $pager,
			'tampil' => $tampil,
			'total' => $count,
			'cart'	=> $this->cart(),
			'mulai' => $mulai,
		];
		return view("login/odetail", $data);
	}

	public function cari()
	{
		$model = new Kategori_M();
		$db = \Config\Database::connect();
		$hasil = $db->table('vorder');
		$email = session()->get('email');
		$query = $hasil->getWhere(['email' => $email]);
		$pager = \Config\Services::pager();
		$detail = $query->getResult('array');
		$count = count($detail);

		if (isset($_POST['awal'])) {
			$awal = $_POST['awal'];
			$sampai = $_POST['sampai'];
		}

		$tampil = 3;
		$mulai = 0;

		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			$mulai = ($tampil * $page) - $tampil;
		}

		$query = $hasil->getWhere(['email' => $email], $tampil, $mulai);
		$vorder = $query->getResult('array');


		$data = [
			'judul' => 'Histori Pembelian :',
			'kategori' => $model->findAll(),
			'vorder' => $vorder,
			'pager' => $pager,
			'cart'	=> $this->cart(),
			'tampil' => $tampil,
			'total' => $count,
			'mulai' => $mulai,
		];



		return view("login/histori", $data);
	}
}
