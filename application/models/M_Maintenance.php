<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_maintenance extends CI_Model {

	public $table = 'maintenance';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(maintenance.id_maintenance,4) as kode', FALSE);
		  $this->db->order_by('id_maintenance','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('maintenance');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "TRM$ym".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tambah_detail($detail)
	{	
		//print_r($detail);die()	;
		$this->db->insert('det_maintenance',$detail);
		return TRUE;
		//print('<pre>'); print_r($query); exit();

		//$this->db->query($query);	
	}

	public function tampil_maintenance()
	{

	$this->db->select('maintenance.id_maintenance, maintenance.tgl_transaksi, asset.nama_asset, maintenance.jumlah, maintenance.tgl_maintenance_mulai, maintenance.tgl_maintenance_selesai, users.nama_user, maintenance.status_maintenance')
    		->from('maintenance')
    		->join('asset','asset.id_asset=maintenance.id_asset')
    		->join('users','maintenance.id_user=users.id_user');

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	
	
	public function tampil_maintenance_pilihan()
	{
		$where = "status_data = 'Disetujui'";
		$this->db->select(['id_maintenance','total_maintenance'])
			->from('maintenance')
			->where($where);

		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function ambil_data_maintenance($id_maintenance)
	{
		# code...
		$this->db->select('*')
    		->from('maintenance')
    		->join('users','maintenance.id_user=users.id_user')
    		->where("maintenance.id_maintenance", $id_maintenance);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data['result']=$this->db->query($query)->result();
	
		return $data;
	}

	public function ambil_detail_maintenance($id_maintenance)
	{
		# code...
		$this->db->select('*')
    		->from('det_maintenance')
    		->where("det_maintenance.id_maintenance", $id_maintenance);

    $query=$this->db->get_compiled_select();
    //print_r($query);die();
    $data=$this->db->query($query)->result();
	
		return $data;
	}

	public function tambah_maintenance($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('maintenance');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_maintenance($data)
	{
		$this->db->where("id_maintenance", $this->input->post('id_maintenance'));
		$query=$this->db->set($data)->get_compiled_update('maintenance');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function pembatalan($id)
	{
		# code...
		$this->db->set(['status_data'=> 'Dibatalkan']);
		$this->db->where('id_maintenance', $id);
		return $this->db->update('maintenance');
	}

	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_maintenance', $id);
    $this->db->delete('maintenance');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}

}

/* End of file M_maintenance.php */
/* Location: ./application/models/M_maintenance.php */