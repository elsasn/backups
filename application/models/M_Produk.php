<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Produk extends CI_Model {

	public $table='ms_item';

	public function __construct()
	{
		parent::__construct();
		
	}

	function buat_kode()
	{
		$this->db->select('RIGHT(ms_item.id,4) as kode', FALSE);
		  $this->db->order_by('id','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('ms_item');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "ITM-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_produk()
	{
		$this->db->select('*')
			->from('ms_item');
			//->join('kategori_produk','produk.id_kategori_produk=kategori_produk.id_kategori_produk')
			//->join('jenis_produk','produk.id_jenis_produk=jenis_produk.id_jenis_produk');
		
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	public function tampil_produk_pilihan()
	{
		$this->db->select(["id", "name","price"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_produk($id_produk)
	{
		$this->db->select()
			->from($this->table)
			->where("id", $id_produk);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_produk($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('produk');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_produk($data)
	{
		$this->db->where("id_produk", $this->input->post('id_produk'));
		$query=$this->db->set($data)->get_compiled_update('produk');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_produk', $id);
    $this->db->delete('produk');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	
}

/* End of file m_produk.php */
/* Location: ./application/models/m_produk.php */