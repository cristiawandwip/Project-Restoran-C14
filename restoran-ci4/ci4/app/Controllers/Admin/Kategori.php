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

		$model = new Kategori_M();
		$kategori = $model->findALL();



		$data = [
			'judul' => 'SELECT DATA DARI CONTROLLER',
			'kategori' => $kategori
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
		$model->insert($_POST);

		return redirect()->to(base_url()."/admin/kategori");
	}

	public function find($id = null)
	{
		echo "<h1>Update data</h1>";
	}

	public function update($id = null)
	{
		echo "proses update data $id";
	}

	public function delete($id = null)
	{
		echo "proses delete data";
	}


	//--------------------------------------------------------------------

}
