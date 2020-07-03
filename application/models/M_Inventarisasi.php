<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Inventarisasi extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(inventarisasi.id_inventarisasi,4) as kode', FALSE);
		  $this->db->order_by('id_inventarisasi','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('inventarisasi');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "INV$ym".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tambah_detail($detail)
	{
		$this->db->insert('det_inventarisasi',$detail);
		return TRUE;
			
	}
	
	public function tampil_inventarisasi()
	{

	$this->db->select('*')
    		->from('inventarisasi')
    		->join('users','inventarisasi.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
	$data['total_data']=$this->db->count_all_results();
    $data['result']=$this->db->query($query)->result();
    //print_r($data);die();
    
		return $data;


	}

	public function tambah_inventarisasi($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('inventarisasi');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function update_asset($id_asset,$jumlah)
	{
		$query = "UPDATE asset SET jumlah=jumlah + $jumlah WHERE id_asset='$id_asset'";
		$this->db->query($query);
	}

	public function update_status_pengadaan($id_pengadaan)
	{
		$query="UPDATE pengadaan SET is_inventarisasi='Sudah' WHERE id_pengadaan='$id_pengadaan'";
		$this->db->query($query);
	}

	public function hapus_asset($id_inventarisasi_hapus,$alasan_dihapus,$harga_realisasi_hapus)
	{
		$data = [
			'id_inventarisasi' => $id_inventarisasi_hapus,
			'harga_asset' => $harga_realisasi_hapus,
			'alasan_dihapus' => $alasan_dihapus,
			'tgl_hapus' => date('Y-m-d H:i:s')
		];
		return $this->db->insert('penghapusan',$data);
	}

	public function get_asset_from_id_inventarisasi($id_inventarisasi)
	{
		
			$this->db->select('asset.*')
    		->from('inventarisasi')
    		->join('asset','inventarisasi.id_asset=asset.id_asset');
    		return $this->db->get()->row();

	}
	public function update_jumlah_asset($id_asset)
	{
		
		$query = "UPDATE asset SET jumlah=jumlah - 1 WHERE id_asset='$id_asset'";
		$this->db->query($query);
	}
	
	public function update_inventarisasi_tidak_ada($id_inventarisasi)
	{
		$query = "UPDATE inventarisasi SET status_ada='Dihapus' WHERE id_inventarisasi='$id_inventarisasi'";
		$this->db->query($query);
	}

}

/* End of file M_Inventarisasi.php */
/* Location: ./application/models/M_Inventarisasi.php */