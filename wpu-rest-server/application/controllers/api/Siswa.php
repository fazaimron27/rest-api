<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Siswa extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');

		$this->methods['index_get']['limit'] = 100;
	}
	public function index_get()
	{
		$id = $this->get('id');
		if($id == null) {
			$siswa = $this->siswa->getSiswa();
		} else {
			$siswa = $this->siswa->getSiswa($id);
		}

		if ($siswa) {
			$this->response([
				'status' => true,
				'data' => $siswa
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('id');

		if($id == null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if($this->siswa->deleteSiswa($id) > 0) {
				// ok
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted.'
				], REST_Controller::HTTP_OK);
			} else {
				// id not found
				$this->response([
					'status' => false,
					'message' => 'id not found!'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_post()
	{
		$data = [
			'nama' => $this->post('nama'),
			'nis' => $this->post('nis'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan')
		];

		if($this->siswa->createSiswa($data) > 0) {
			$this->response([
				'status' => true,
				'message' => 'new siswa has been created.'
			], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to create new data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama' => $this->put('nama'),
			'nis' => $this->put('nis'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan')
		];

		if($this->siswa->updateSiswa($data, $id) > 0) {
			$this->response([
				'status' => true,
				'message' => 'data siswa has been updated.'
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => false,
				'message' => 'failed to update data!'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}