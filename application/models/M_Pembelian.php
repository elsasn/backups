<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pembelian extends CI_Model {

	public $table='pembelian';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(pembelian.id_pembelian,4) as kode', FALSE);
		  $this->db->order_by('id_pembelian','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pembelian');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "INV-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_pembelian()
	{
		$this->db->select('*')
			->from('pembelian')
			->join('ms_item','ms_item.id=pembelian.id_produk');
			
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_pembelian_pilihan()
	{
		$this->db->select(["id_pembelian", "id_produk"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_pembelian($id_pembelian)
	{
		$this->db->select()
			->from($this->table)
			->where("id_pembelian", $id_pembelian);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_pembelian($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('pembelian');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_pembelian($data)
	{
		$this->db->where("id_pembelian", $this->input->post('id_pembelian'));
		$query=$this->db->set($data)->get_compiled_update('pembelian');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_pembelian', $id);
    $this->db->delete('pembelian');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file M_pembelian.php */
/* Location: ./application/models/M_pembelian.php */