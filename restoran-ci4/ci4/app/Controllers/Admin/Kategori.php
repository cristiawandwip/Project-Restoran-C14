<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		//return view('welcome_message');
		echo "<h1>belajar ci4</h1>";
	}

	public function read()
	{
		$pager = \Config\Services::pager();
		$model = new Kategori_M();


		$data = [
			'judul' => 'DATA KATEGORI',
			'kategori' => $model->paginate(2, 'group1'),
			'pager' => $model->pager
		];



		return view("kategori/select", $data);
	}



	public function create()
	{
		//echo view("template/header");
		return view("kategori/insert");
		//echo view("template/footer");
	}

	public function insert()
	{
		$model = new Kategori_M();

		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/create"));
		} else {
			return redirect()->to(base_url("/admin/kategori"));
		}
	}

	public function find($id = null)
	{
		$model = new Kategori_M();
		$kategori = $model->find($id);

		$data = [
			'judul' => 'UPDATE DATA',
			'kategori' => $kategori

		];
		return view("kategori/update", $data);
	}

	public function update()
	{
		$model = new Kategori_M();
		$model->save($_POST);

		return redirect()->to(base_url("/admin/kategori"));
	}

	public function delete($id = null)
	{


		$model = new Kategori_M();
		$model->delete($id);

		return redirect()->to(base_url("/admin/kategori"));
	}


	//--------------------------------------------------------------------

}
