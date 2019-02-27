<?php
use GuzzleHttp\Client;

class Siswa_model extends CI_model {
	private $_client;

	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'http://localhost/rest-api/wpu-rest-server/api/',
			'auth' => ['admin', '1234']
		]);
	}

	public function getAllSiswa()
	{
		$response = $this->_client->request('GET', 'siswa', [
			'query' => [
				'wpu-key' => 'rahasia'
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'];
	}

	public function getSiswaById($id)
	{
		$response = $this->_client->request('GET', 'siswa', [
			'query' => [
				'wpu-key' => 'rahasia',
				'id' => $id
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['data'][0];
	}

	public function tambahDataSiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nis" => $this->input->post('nis', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true),
			'wpu-key' => 'rahasia'
		];

		$response = $this->_client->request('POST', 'siswa', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function hapusDataSiswa($id)
	{
		$response = $this->_client->request('DELETE', 'siswa', [
			'form_params' => [
				'wpu-key' => 'rahasia',
				'id' => $id
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function ubahDataSiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nis" => $this->input->post('nis', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true),
			"id" => $this->input->post('id', true),
			'wpu-key' => 'rahasia'
		];

		$response = $this->_client->request('PUT', 'siswa', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result;
	}

	public function cariDataSiswa()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama', $keyword);
		$this->db->or_like('jurusan', $keyword);
		$this->db->or_like('nis', $keyword);
		$this->db->or_like('email', $keyword);
		return $this->db->get('siswa')->result_array();
	}
}