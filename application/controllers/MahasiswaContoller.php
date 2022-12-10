<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MahasiswaContoller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_M');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['mahasiswa'] = $this->Mahasiswa_M->getDataMahasiswa()->result();

		$this->load->view('partials/header', $data);
		$this->load->view('index');
		$this->load->view('partials/footer');
	}

	public function tambah_data()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama_kampus', 'Nama Kampus', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, harap diisi');

		$this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Data Mahasiswa";

			$this->load->view('partials/header', $data);
			$this->load->view('tambah-data');
			$this->load->view('partials/footer');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->Mahasiswa_M->add($post);

			if ($this->db->affected_rows() > 0) {
				echo ("<script> window.alert('Data Berhasil Ditambahkan!'); window.location.href='beranda'; </script>");
			} else {
				echo ("<script> window.alert('Data Gagal Ditambahkan!'); window.location.href=''; </script>");
			}
		}
	}

	public function edit_data_mahasiswa($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');

        if ($this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required');
        }

        if ($this->input->post('nim')) {
            $this->form_validation->set_rules('nim', 'NIM', 'required');
        }

        if ($this->input->post('nama_kampus')) {
            $this->form_validation->set_rules('nama_kampus', 'Nama Kampus', 'required');
        }

        if ($this->input->post('jurusan')) {
            $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        }

        $this->form_validation->set_message('required', '%s masih kosong, harap diisi');

        $this->form_validation->set_error_delimiters('<span class="help-block text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Edit Data Mahasiswa";
            $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
            
            $this->load->view('partials/header', $data);
			$this->load->view('update-data');
			$this->load->view('partials/footer');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Mahasiswa_M->edit($post);

            if ($this->db->affected_rows() > 0) {
                echo ("<script> window.alert('Data Berhasil Diupdate!'); window.location.href='../beranda'; </script>");
            } else {
                echo ("<script> window.alert('Tidak Ada Perubahan Data!'); window.location.href='../beranda'; </script>");
            }
        }
    }

	public function delete_data_mahasiswa($id)
    {
        $where = array('id' => $id);
        $this->Mahasiswa_M->delete($where, 'mahasiswa');
        if ($this->db->affected_rows() > 0) {
            echo ("<script> window.alert('Data Berhasil Dihapus!'); window.location.href='../beranda'; </script>");
        } else {
            echo ("<script> window.alert('Data Gagal Dihapus!'); window.location.href='../beranda'; </script>");
        }
    }

    public function export_pdf_mahasiswa()
    {
        $this->load->library('pdfgenerator');
        
        $data['title'] = 'Laporan Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_M->getDataMahasiswa()->result();
        
        $file_pdf = 'data_mahasiswa';
        $paper = 'A4';
        $orientation = "landscape";
        
        $html = $this->load->view('export-pdf', $data, true);       
        
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function chart()
	{
		$data['title'] = "Chart";
		$data['jumlah_mahasiswa'] = $this->db->from("mahasiswa")->get()->num_rows();

		$this->load->view('partials/header', $data);
		$this->load->view('chart');
		$this->load->view('partials/footer');
	}

	public function view_import_data_mahasiswa()
    {
        $data['title'] = "Import Data Mahasiswa";

        $this->load->view('partials/header', $data);
		$this->load->view('import-excel');
		$this->load->view('partials/footer');
    }

    public function download_format_import_mahasiswa()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="format_import_mahasiswa.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nama Mahasiswa');
        $sheet->setCellValue('B1', 'Email Mahasiswa');
        $sheet->setCellValue('C1', 'NIM');
        $sheet->setCellValue('D1', 'Nama Kampus');
        $sheet->setCellValue('E1', 'Jurusan');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function import_data_mahasiswa()
    {
        $upload_file = $_FILES['upload_file']['name'];
        $extension = pathinfo($upload_file, PATHINFO_EXTENSION);

        if (empty($_FILES['upload_file']['name'])) {
            echo ("<script> window.alert('Data Import Kosong!'); window.location.href='../import'; </script>");
        } else if($extension != 'csv' && $extension != 'xls' && $extension != 'xlsx' && $extension != 'CSV' && $extension != 'XLS' && $extension != 'XLSX') {
            echo ("<script> window.alert('Format Tidak Didukung!'); window.location.href='../import'; </script>");
        } else {
            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else if($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();

            $sheetcount = count($sheetdata);
            if ($sheetcount > 0) {
                for ($i=1; $i < $sheetcount; $i++) { 
                    $nama = $sheetdata[$i][0];
                    $email = $sheetdata[$i][1];
                    $nim = $sheetdata[$i][2];
                    $nama_kampus = $sheetdata[$i][3];
                    $jurusan = $sheetdata[$i][4];

                    $data[] = array(
                        'nama' => $nama,
                        'email' => $email,
                        'nim' => $nim,
                        'nama_kampus' => $nama_kampus,
                        'jurusan' => $jurusan,
                    );
                }
                $this->Mahasiswa_M->import_data_mahasiswa($data);

                if ($this->db->affected_rows() > 0) {
                    echo ("<script> window.alert('Data Berhasil Diimport!'); window.location.href='../beranda'; </script>");
                } else {
                    echo ("<script> window.alert('Data Gagal Diimport!'); window.location.href='../import'; </script>");
                }
            }
        }
    }

    public function export_data_mahasiswa()
    {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data_mahasiswa.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Nama Mahasiswa');
        $sheet->setCellValue('C1', 'Email Mahasiswa');
        $sheet->setCellValue('D1', 'NIM');
        $sheet->setCellValue('E1', 'Nama Kampus');
        $sheet->setCellValue('F1', 'Jurusan');

        $listmahasiswa = $this->Mahasiswa_M->getDataMahasiswa()->result();
        $list = 2;
        $no = 1;
        foreach ($listmahasiswa as $mahasiswa) {
            $sheet->setCellValue('A'.$list,$no++);
            $sheet->setCellValue('B'.$list,$mahasiswa->nama);
            $sheet->setCellValue('C'.$list,$mahasiswa->email);
            $sheet->setCellValue('D'.$list,$mahasiswa->nim);
            $sheet->setCellValue('E'.$list,$mahasiswa->nama_kampus);
            $sheet->setCellValue('F'.$list,$mahasiswa->jurusan);
            $list++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function berita()
    {
		$data['title'] = "Berita";
		$url = "https://newsapi.org/v2/top-headlines?country=id&category=business&apiKey=c0367db02eeb478bb35e1de7c1f8e4fe";
		$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
		$context = stream_context_create($opts);
		$html = file_get_contents($url, false,$context);
		$html = json_decode($html);
		$data['berita'] = $html;

        $this->load->view('partials/header', $data);
		$this->load->view('berita');
		$this->load->view('partials/footer');
    }

}
