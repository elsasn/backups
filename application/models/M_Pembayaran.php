<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

	public $table='pembayaran';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(pembayaran.id_pembayaran,4) as kode', FALSE);
		  $this->db->order_by('id_pembayaran','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "PBYR-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_pembayaran()
	{
		$this->db->select('*')
			->from('pembayaran');
			//->join('ms_item','ms_item.id=pembayaran.id_produk');
			
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_pembayaran_pilihan()
	{
		$this->db->select(["id_pembayaran", "id_produk","pembayaran"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_pembayaran($id_pembayaran)
	{
		$this->db->select()
			->from($this->table)
			->where("id_pembayaran", $id_pembayaran);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_pembayaran($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('pembayaran');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_pembayaran($data)
	{
		$this->db->where("id_pembayaran", $this->input->post('id_pembayaran'));
		$query=$this->db->set($data)->get_compiled_update('pembayaran');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_pembayaran', $id);
    $this->db->delete('pembayaran');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file M_pembayaran.php */
/* Location: ./application/models/M_pembayaran.php */