<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	public function index()
	{
		// $this->load->view('welcome_message');
		$this->Data();
	}
	public function Data()
	{
		$query = $this->db->get('BUKU')->result_array();
		$data['allBuku'] = $query;
		$this->load->view('LengkapiData/allBuk', $data, FALSE);

		// var_dump($data);die;
	}
	public function Pinjam()
	{
		var_dump($_GET);
		$v = array('ID_BUKU' => $_GET['buku']);
		$val = $this->db->get_where('BUKU', $v)->result();
		$val = $val[0];
		$dos = array(
			'OutSide' => ($val->OutSide) + 1,
		);
		$this->db->where($v);
		$this->db->update('BUKU', $dos);

		$das = array(
			'ID_BUKU' => $val->ID_BUKU,
			'ID_Peminjam' => $_SESSION['id'],
			'Barcode_Buku' => 'sampe;',
			'tgl_keluar' => 2020 - 12 - 01,
			'deatline' => 2020 - 12 - 01
		);
		$this->db->insert('Peminjaman', $das);
		redirect('/');
	}
	public function Kembali()
	{
		$v = array('ID_Peminjam=' => $_SESSION['id']);
		$val = $this->db->get_where('Peminjaman', $v)->result_array();
		$data['nu']=$val;
		$this->load->view('LengkapiData/allpin', $data, FALSE);

		// var_dump($data);die;
	}
	public function Input_Buku()
	{
		redirect('Siswa/form');
	}
}
