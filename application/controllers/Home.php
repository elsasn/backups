<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home');
		
	}

	public function index()
	{
		$data['post_product'] = $this->M_Home->get_product();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('home', $data);
	}

	public function wedding()
	{
		$data['product_wedding'] = $this->M_Home->get_product_wedding();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('wedding', $data);
	}

	public function paket()
	{
		$data['product_paket'] = $this->M_Home->get_product_paket();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('paket', $data);
	}

	public function venue()
	{
		$data['product_venue'] = $this->M_Home->get_product_venue();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('venue', $data);
	}

	public function sound_system()
	{
		$data['product_sound_system'] = $this->M_Home->get_product_sound_system();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('sound_system', $data);
	}
	
	public function wedding_cake()
	{
		$data['product_wedding_cake'] = $this->M_Home->get_product_wedding_cake();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('wedding_cake', $data);
	}

	public function undangan()
	{
		$data['product_undangan'] = $this->M_Home->get_product_undangan();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('undangan', $data);
	}

	public function make_up()
	{
		$data['product_make_up'] = $this->M_Home->get_product_make_up();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('make_up', $data);
	}

	public function souvenir()
	{
		$data['product_souvernir'] = $this->M_Home->get_product_souvernir();
		//print('<pre>'); print_r($data); exit();
		$this->load->view('souvernir', $data);
	}
}



/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */