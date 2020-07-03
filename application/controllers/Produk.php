<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('M_produk', 'mod');
		$this->load->model('M_Kategori');
		$this->load->model('M_Jenis');
	}


	public function index()
	{
		$data['title']='Tabel produk';
		$data['result']=$this->mod->tampil_produk()['result'];
		$data['total_data']=$this->mod->tampil_produk()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('produk/produk_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah produk';
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$this->parser->parse('produk/produk_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_produk"	=> $this->input->post('id_produk'),
			"nama_produk"	=> $this->input->post('nama_produk'),
			"id_jenis_produk"	=> $this->input->post('id_jenis_produk'),
			"id_kategori_produk"	=> $this->input->post('id_kategori_produk'),
			"jumlah"	=> $this->input->post('jumlah'),
			// "stok"	=> $this->input->post('stok'),
			"status"	=> $this->input->post('status'),
		];
		//print_r($_POST);
		$this->mod->tambah_produk($data);
		redirect(site_url('produk'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah produk';
		$data['result_jenis_pilihan'] = $this->M_Jenis->tampil_jenis_pilihan()['result'];
		$data['result_kategori_pilihan'] = $this->M_Kategori->tampil_kategori_pilihan()['result'];
		$data['result']=$this->mod->detail_produk($id);
		$this->parser->parse('produk/produk_ubah', $data);	}

	public function ubah_proses()
	{
		$data=[
			"id_produk"	=> $this->input->post('id_produk'),
			"nama_produk"	=> $this->input->post('nama_produk'),
			"id_jenis_produk"	=> $this->input->post('id_jenis_produk'),
			"id_kategori_produk"	=> $this->input->post('id_kategori_produk'),
			"jumlah"	=> $this->input->post('jumlah'),
			// "stok"	=> $this->input->post('stok'),
			"status"	=> $this->input->post('status'),

		];

		$this->mod->ubah_produk($data);
		redirect(site_url('produk'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('produk'));
	}
	
}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */