<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Pembayaran', 'mod');
		$this->load->model('M_Pembelian');
	}


	public function index()
	{
		$data['title']='Tabel pembayaran';
		
		//$data['kodeunik'] = $this->m_pembayaran->buat_kode();
		$data['result']=$this->mod->tampil_pembayaran()['result'];
		$data['total_data']=$this->mod->tampil_pembayaran()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('pembayaran/pembayaran_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah pembayaran';
		$data['result_pembelian_pilihan'] = $this->M_Pembelian->tampil_pembelian_pilihan()['result'];
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('pembayaran/pembayaran_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_pembayaran"	=> $this->input->post('id_pembayaran'),
			"tgl_pembayaran"	=> $this->input->post('tgl_pembayaran'),
			"id_pembelian" => $this->input->post('id_pembelian'),
			"total_pembayaran" => $this->input->post('total_pembayaran'),
			"status_pembayaran" => $this->input->post('status_pembayaran'),
			//"total_pembayaran" => $total_pembayaran,
			
		];

		$this->mod->tambah_pembayaran($data);
		redirect(site_url('pembayaran'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah pembayaran';
		$data['result_produk_pilihan'] = $this->M_Produk->tampil_produk_pilihan()['result'];
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result']=$this->mod->detail_pembayaran($id);
		$this->parser->parse('pembayaran/pembayaran_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_pembayaran"	=> $this->input->post('id_pembayaran'),
			"tgl_pembayaran"	=> $this->input->post('tgl_pembayaran'),
			"nama_client" => $this->input->post('nama_client'),
			"id_produk" => $this->input->post('id_produk'),
			"status_pembayaran" => $this->input->post('status_pembayaran')
		];

		$this->mod->ubah_pembayaran($data);
		redirect(site_url('pembayaran'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('pembayaran'));
	}
}

/* End of file pembayaran.php */
/* Location: ./application/controllers/pembayaran.php */