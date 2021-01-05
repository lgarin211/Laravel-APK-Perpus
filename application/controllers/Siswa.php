<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	private $filename = "import_data"; // Kita tentukan nama filenya

	public function __construct()
	{
		parent::__construct();

		$this->load->model('SiswaModel');
	}

	// public function index(){
	// 	$data['siswa'] = $this->SiswaModel->view();
	// 	$this->load->view('view', $data);
	// }

	public function form()
	{
		$data = array(); // Buat variabel $data sebagai array

		if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->SiswaModel->upload_file($this->filename);

			if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			} else { // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->view('LengkapiData/bulk', $data);
	}

	public function import()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 1;
		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if ($numrow > 1) {
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'Judul_Buku' => $row['A'], // Insert data nis dari kolom A di excel
					'Penerbit' => $row['B'], // Insert data nama dari kolom B di excel
					'Penulis' => $row['C'], // Insert data nama dari kolom B di excel
					'ISBN' => $row['D'], // Insert data jenis kelamin dari kolom C di excel
					'Gendre' => $row['E'], // Insert data alamat dari kolom D di excel
					'Tgl_proses' => $row['F'], // Insert data alamat dari kolom D di excel
					'Sumber' => $row['G'], // Insert data alamat dari kolom D di excel
					'No_induk' => $row['H'], // Insert data alamat dari kolom D di excel
					'Stok' => $row['I'], // Insert data alamat dari kolom D di excel
					'OutSide' => 0, // Insert data alamat dari kolom D di excel
					'Sinopsis' => $row['J'], // Insert data alamat dari kolom D di excel
					'Sampul_Depan' => 'sampel' // Insert data alamat dari kolom D di excel

				));
			}
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model

		$this->upload($data);
	}
	public function upload($data)
	{
		$this->SiswaModel->insert_multiple($data);
	
	}
}
