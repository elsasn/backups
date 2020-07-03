<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jadwal extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function tampil_jadwal()
	{
	$this->db->select('det_sewa.id_sewa, det_sewa.id_produk, det_sewa.jam_pinjam, det_sewa.jam_harus_kembali, det_sewa.harga,det_sewa.jumlah,det_sewa.biaya,det_sewa.status');
    $this->db->from('det_sewa');
    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}

}

/* End of file m_jadwal.php */
/* Location: ./application/models/m_jadwal.php */