<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Nama_Asset extends CI_Model {

	public $table='nama_asset';

	public function __construct()
	{
		parent::__construct();
		
	}

	function buat_kode()
	{
		$this->db->select('RIGHT(nama_asset.id_nama_asset,4) as kode', FALSE);
		  $this->db->order_by('id_nama_asset','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('nama_asset');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "NMAST-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_nama_asset()
	{
		$this->db->select('*')
			->from('nama_asset');
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	public function detail_nama_asset($id_nama_asset)
	{
		$this->db->select()
			->from($this->table)
			->where("id_nama_asset", $id_nama_asset);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_nama_asset($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('nama_asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_nama_asset($data)
	{
		$this->db->where("id_nama_asset", $this->input->post('id_nama_asset'));
		$query=$this->db->set($data)->get_compiled_update('nama_asset');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_nama_asset', $id);
    $this->db->delete('nama_asset');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	
}

/* End of file m_asset_baru.php */
/* Location: ./application/models/m_asset_baru.php */