<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
		parent::__construct();
        $this->load->model('Hak_Akses_Model', 'model_akses');
		$this->load->model('Barang_Model');
		$this->load->model('Penjualan_Model');
        }

	public function index()
	{
		$data['barang'] = $this->Barang_Model->get_total_barang();
		$data['penjualan'] = $this->Penjualan_Model->get_laba_rugi();
		$data['laba'] = $this->Barang_Model->get_laba_rugi();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('template/topbar.php');
		$this->load->view('akses/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function halaman_akses()
	{
		$data['title'] = 'Halaman Akses';
		$data['akses'] = $this->model_akses->get_all_hak_akses();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('template/topbar.php');
		$this->load->view('akses/hal_akses.php', $data);
		$this->load->view('template/footer.php');
	}

	public function halaman_tambah()
	{
		$data['title'] = 'Halaman tambah';

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('template/topbar.php');
		$this->load->view('akses/hal_tambah.php', $data);
		$this->load->view('template/footer.php');
	}

	public function tambah()
	{
		$NamaAkses =  $this->input->post('NamaAkses');
		$Keterangan = $this->input->post('Keterangan');
		$query = $this->db->query("SELECT  max(IdAkses) as id FROM hak_akses")->row_array();
		$id_selanjutnya = $query['id'] + 1;
		$array = [
			'IdAkses' => $id_selanjutnya,
			'NamaAkses' => $NamaAkses,
			'Keterangan' => $Keterangan
		];

		$this->model_akses->insert_hak_akses($array);
		redirect('akses/halaman_akses');
	}

	public function hapus($IdAkses)
	{
		//var_dump($IdAkses); die;
		$this->model_akses->delete_hak_akses($IdAkses);
		redirect('akses/halaman_akses');
	}

	public function ubah($IdAkses)
	{
		$NamaAkses =  $this->input->post('NamaAkses');
		$Keterangan = $this->input->post('Keterangan');
		$array = [
			'NamaAkses' => $NamaAkses,
			'Keterangan' => $Keterangan
		];
		//var_dump($array, $IdAkses); die;
		$this->model_akses->update_hak_akses($array, $IdAkses);
		redirect('akses/halaman_akses');
	}
}
