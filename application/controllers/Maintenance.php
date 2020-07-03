<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('M_Maintenance', 'mod');
		$this->load->model('M_Asset');
	}

	public function index()
	{
		$data['title']='Tabel maintenance';
		//$data['kodeunik'] = $this->M_maintenance->buat_kode();
		$data['result']=$this->mod->tampil_maintenance()['result'];
		$data['total_data']=$this->mod->tampil_maintenance()['total_data'];

		//print('<pre>'); print_r($data); exit();
		$this->parser->parse('maintenance/maintenance_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah maintenance';
		$data['kodeunik'] = $this->mod->buat_kode();	
		$data['result_asset_pilihan'] = $this->M_Asset->tampil_asset_pilihan()['result'];
		$this->parser->parse('maintenance/maintenance_tambah', $data);
	}

	public function tambah_proses()
	{
		//print_r($this->input->post());die();
		$id_maintenance = $this->input->post('id_maintenance');
		$data=[
			"id_maintenance"	=> $this->input->post('id_maintenance'),
			"id_asset"	=> $this->input->post('id_asset'),
			"tgl_transaksi"	=> $this->input->post('tgl_transaksi'),
			"tgl_maintenance_mulai"	=> $this->input->post('tgl_maintenance_mulai'),
			"tgl_maintenance_selesai"	=> $this->input->post('tgl_maintenance_selesai'),
			"jumlah"	=> $this->input->post('jumlah'),
			"status_maintenance"	=> $this->input->post('status_maintenance'),
			"jenis_maintenance"	=> $this->input->post('jenis_maintenance'),
			"id_user"	=> $this->session->userdata('id_user'),
			
			
		];
	
		$this->mod->tambah_maintenance($data);
		redirect(site_url('maintenance'));
	}

	public function detail_maintenance($id_det_maintenance)
	{

		$data=$this->mod->tampil_detail_maintenance($id_det_maintenance);
		echo json_encode($data);
		
		//$this->parser->parse('perencanaan/perencanaan_tampil', $data);
	}

	public function print_data($id_det_maintenance)
	{
		# code...
	$data['hasil_detail'] = $this->mod->tampil_detail_maintenance($id_det_maintenance);
	//print_r($data);die();
	$this->load->view('maintenance/maintenance_cetak',$data);


	// $data['hasil_detail']=$this->mod->tampil_detail_maintenance($id_det_maintenance);
	// $data['data_utama']=$this->mod->tampil_maintenance()['result'];
 //    $this->load->view('maintenance/maintenance_cetak',$data);
 //    $html = $this->output->get_output();
 //    $this->load->library('dompdf_gen');
 //    $this->dompdf->load_html($html);
 //    $this->dompdf->render();
 //    $sekarang=date("d:F:Y:h:m:s");
 //    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
	}

}

/* End of file maintenance.php */
/* Location: ./application/controllers/maintenance.php */