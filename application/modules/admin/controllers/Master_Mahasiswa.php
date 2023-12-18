<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Master_Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->library('form_validation');
		$this->load->model('M_Master_Mahasiswa');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_mahasiswa()
	{
		$data['title']				= 'Mahasiswa';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['mahasiswa']			=  $this->db->select('*')
													->from('tbl_mahasiswa')
													->join('tbl_prodi','tbl_prodi.id_prodi=tbl_mahasiswa.prodi_id')
													// ->join('tbl_tahun_aktif','tbl_mahasiswa.tahun_id = tbl_tahun_aktif.id_thn')
													// ->where('status_aktif', 'Aktif')
													->get()->result_array();
		$data['prodi']			=  $this->db->select('*')
													->from('tbl_prodi')
													->get()->result_array();
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->where('status_aktif', 'Aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_mahasiswa/v_mahasiswa',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function halaman_c_mahasiswa()
	{
		$data['title']				= 'Tambah Mahasiswa';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['prodi']			=  $this->db->select('*')
												->from('tbl_prodi')
												->get()->result_array();
		$data['tahun_aktif'] = $this->db->select('*')
												->from('tbl_tahun_aktif')
												->where('status_aktif', 'Aktif')
												->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_mahasiswa/c_mahasiswa',$data);		
		$this->load->view('layouts/template/footer');
	}

	public function halaman_u_mahasiswa($id)
	{
		$data['title']				= 'Ubah Mahasiswa';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['prodi']			=  $this->db->select('*')
										->from('tbl_prodi')
										->get()->result_array();
		$data['mahasiswa']			=  $this->db->select('*')
										->from('tbl_mahasiswa')
										->join('tbl_prodi','tbl_prodi.id_prodi=tbl_mahasiswa.prodi_id')
										->where('tbl_mahasiswa.id_mhs',$id)
										->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_mahasiswa/u_mahasiswa',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_data_mahasiswa()
	{
		$data['title']				= 'Tahun Data Mahasiswa';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('dashboard_data/data_mahasiswa/v_data_mahasiswa',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_mahasiswa($id)
	{
		$data['title']				= 'Data Mahasiswa';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['mahasiswa']			=  $this->db->select('*')
													->from('tbl_mahasiswa')
													->join('tbl_prodi','tbl_prodi.id_prodi=tbl_mahasiswa.prodi_id')
													->where('tbl_mahasiswa.tahun_id',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('dashboard_data/data_mahasiswa/tabel_mahasiswa/v_tabel_mahasiswa',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function add_mhs()
	{
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tm = date('d-m-Y', strtotime($tanggal_lahir));
		$this->form_validation->set_rules('nim', 'NIM', 'required|max_length[15]|numeric|is_unique[tbl_mahasiswa.nim]', array(
			'required' => 'Kolom %s harus diisi.',
			'max_length' => 'Panjang %s maksimal 15 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.',
			'is_unique' => '%s sudah digunakan oleh mahasiswa lain.'
		));
		
		$this->form_validation->set_rules('nama', 'Nama', 'required', array(
			'required' => 'Kolom %s harus diisi.'
		));
		
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array(
			'required' => 'Kolom %s harus diisi.'
		));
	
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tambah-mahasiswa');
		} else {
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()
				->row();
		
			$data = [
				'nim' => htmlentities($this->input->post('nim')),
				'nama' => htmlentities($this->input->post('nama')),
				'tanggal_lahir' => htmlentities($tm),
				'tahun_id' => $tahun->id_thn,
				'prodi_id' => htmlentities($this->input->post('prodi_id')),
			];
		
			$this->M_Master_Mahasiswa->create($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/master-mahasiswa');
		}
	}


	public function update_mhs()
	{
		$id = $this->input->post('id_mhs');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tm = date('d-m-Y', strtotime($tanggal_lahir));
		$this->form_validation->set_rules('nim', 'NIM', 'required|max_length[15]|numeric', array(
			'required' => 'Kolom %s harus diisi.',
			// 'min_length' => 'Panjang %s minimal 10 karakter.',
			'max_length' => 'Panjang %s maksimal 15 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.'
		));
		
		$this->form_validation->set_rules('nama', 'Nama', 'required', array(
			'required' => 'Kolom %s harus diisi.'
		));
		
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', array(
			'required' => 'Kolom %s harus diisi.'
		));
		
		$this->form_validation->set_rules('prodi_id', 'Prodi ID', 'required', array(
			'required' => 'Kolom %s harus diisi.'
		));
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/edit-mahasiswa/'.$id);
		} else {
			$data = [
				'nim' => htmlentities($this->input->post('nim')),
				'nama' => htmlentities($this->input->post('nama')),
				'tanggal_lahir' => htmlentities($tm),
				'prodi_id' => htmlentities($this->input->post('prodi_id')),
			];
		
			$this->M_Master_Mahasiswa->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/master-mahasiswa');
		}
	}

	public function delete_mhs($id)
	{
		$this->M_Master_Mahasiswa->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-mahasiswa');
	}

	public function excel()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Kelas');
		$sheet->setCellValue('D1', 'Jenis Kelamin');
		$sheet->setCellValue('E1', 'Alamat');
		
		$siswa = $this->db->select('*')
		->from('tbl_data2')
		->get()->result();
		$no = 1;
		$x = 2;
		foreach($siswa as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama);
			$sheet->setCellValue('C'.$x, $row->jurusan);
			$sheet->setCellValue('D'.$x, $row->angkatan);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-siswa';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

// 	public function import_excel() {
// 		// Set up upload configuration
// 		$config['upload_path'] = './user/User/download_file/pdf_proyek/';
// 		$config['allowed_types'] = 'xlsx';
// 		$config['max_size'] = 5000;
  
// 		$this->load->library('upload', $config);
  
// 		// Upload file
// 		if ($this->upload->do_upload('file_excel')) {
// 		   $file = $this->upload->data('full_path');
  
// 		   // Load spreadsheet
// 		   $spreadsheet = IOFactory::load($file);
// 		   $worksheet = $spreadsheet->getActiveSheet();
  
// 		   // Loop through rows and insert into database
// 		   $data = [];
// 		   $highestRow = $worksheet->getHighestRow();
// 		   for ($row = 2; $row <= $highestRow; $row++) {
// 			  $nim = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
// 			  $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
// 			  $tanggal_lahir = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
// 			  $prodi_id = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
// 			  $data[] = [
// 				'nim' 	=> $nim,
// 				'nama' 	=> $nama,
// 				'tanggal_lahir' 	=> $tanggal_lahir,
// 				'prodi_id' 	=> $prodi_id,
	
// 			];	
// 		   }
// 		   $this->db->insert_batch('tbl_mahasiswa', $data);
//   var_dump($data);
// 		   echo 'Data berhasil diimpor.';
// 		} else {
// 		   echo 'Terjadi kesalahan saat mengupload file.';
// 		}
// 	 }

	 public function import_excel() {
		$file = $_FILES['file_excel']['tmp_name'];
		$ext = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);
		
		if ($ext !== 'xlsx') {
			$this->session->set_flashdata('error', 'File tidak didukung. Hanya file dengan ekstensi .xlsx yang diperbolehkan.');
			redirect('admin/master-mahasiswa');
		}
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
		$worksheet = $spreadsheet->getActiveSheet();
		$data = array();
		$highestRow = $worksheet->getHighestDataRow();
		$highestColumn = $worksheet->getHighestDataColumn();
		for ($row = 2; $row <= $highestRow; $row++) {
			$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
			$tanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rowData[0][2])->format('d-m-Y');
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()->row();
			$prodi = $rowData[0][3];
			if ($prodi == "Teknologi Informasi") {
				$prodiku = 1;
			} elseif ($prodi == "Teknologi Rekayasa Komputer Jaringan") {
				$prodiku = 2;
			} elseif ($prodi == "Teknologi Rekayasa Kontruksi Jalan dan Jembatan") {
				$prodiku = 4;
			} elseif ($prodi == "Teknologi Otomotif") {
				$prodiku = 5;
			} elseif ($prodi == "Agroindustri") {
				$prodiku = 6;
			} elseif ($prodi == "Teknologi Pakan Ternak") {
				$prodiku = 7;
			} elseif ($prodi == "Akuntansi") {
				$prodiku = 3;
			}
			$data[] = array(
				'nim' => htmlentities($rowData[0][0]),
				'nama' => htmlentities($rowData[0][1]),
				'tanggal_lahir' => htmlentities($tanggal),
				'prodi_id' => htmlentities($prodiku),
				'tahun_id' => $tahun->id_thn,
			);
		}
		
		$insertData = array();
		$existingNim = $this->db->select('nim')->from('tbl_mahasiswa')->where_in('nim', array_column($data, 'nim'))->get()->result_array();
		
		if (!empty($existingNim)) {
			$existingNim = array_column($existingNim, 'nim');
			$invalidNim = array();
		
			foreach ($data as $row) {
				if (!in_array($row['nim'], $existingNim)) {
					$insertData[] = $row;
				} else {
					$invalidNim[] = $row['nim'];
				}
			}
		
			if (!empty($invalidNim)) {
				$invalidNimList = implode(', ', $invalidNim);
				$this->session->set_flashdata('error', 'Data dengan NIM berikut tidak dapat ditambahkan: ' . $invalidNimList);
			}
		
			if (!empty($insertData)) {
				$validNimList = implode(', ', array_column($insertData, 'nim'));
				$this->session->set_flashdata('success', 'Data dengan NIM berikut berhasil ditambah: ' . $validNimList);
			}
		} else {
			$insertData = $data;
		
			if (!empty($insertData)) {
				$validNimList = implode(', ', array_column($insertData, 'nim'));
				$this->session->set_flashdata('success', 'Data dengan NIM berikut berhasil ditambah: ' . $validNimList);
			}
		}
		
		if (!empty($insertData)) {
			$this->db->insert_batch('tbl_mahasiswa', $insertData);
		} else {
			if (empty($invalidNim)) {
				$this->session->set_flashdata('error', 'Semua data sudah ada di dalam database. Tidak ada data yang ditambahkan.');
			}
		}
		
		redirect('admin/master-mahasiswa');
	}

}
