<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Pembelian', 'mod');
		$this->load->model('M_Produk');
	}


	public function index()
	{
		$data['title']='Tabel pembelian';
		
		//$data['kodeunik'] = $this->m_pembelian->buat_kode();
		$data['result']=$this->mod->tampil_pembelian()['result'];
		$data['total_data']=$this->mod->tampil_pembelian()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('pembelian/pembelian_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah pembelian';
		$data['result_produk_pilihan'] = $this->M_Produk->tampil_produk_pilihan()['result'];
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('pembelian/pembelian_tambah2', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_pembelian"	=> $this->input->post('id_pembelian'),
			"tgl_pembelian"	=> $this->input->post('tgl_pembelian'),
			"nama_client" => $this->input->post('nama_client'),
			"id_produk" => $this->input->post('id_produk'),
			"status_pembayaran" => $this->input->post('status_pembayaran'),
			//"total_pembelian" => $total_pembelian,
			
		];

		$this->mod->tambah_pembelian($data);
		redirect(site_url('pembelian'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah pembelian';
		$data['result_produk_pilihan'] = $this->M_Produk->tampil_produk_pilihan()['result'];
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result']=$this->mod->detail_pembelian($id);
		$this->parser->parse('pembelian/pembelian_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_pembelian"	=> $this->input->post('id_pembelian'),
			"tgl_pembelian"	=> $this->input->post('tgl_pembelian'),
			"nama_client" => $this->input->post('nama_client'),
			"id_produk" => $this->input->post('id_produk'),
			"status_pembayaran" => $this->input->post('status_pembayaran')
		];

		$this->mod->ubah_pembelian($data);
		redirect(site_url('pembelian'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('pembelian'));
	}
}

/* End of file pembelian.php */
/* Location: ./application/controllers/pembelian.php */