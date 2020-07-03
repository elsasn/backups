<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Home extends CI_Model {

	public $table='produk';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_product(){
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_wedding(){
		$where = "category_name='Wedding'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_paket(){
		$where = "category_name='Paket'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_sound_system(){
		$where = "category_name='Sound System'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_wedding_cake(){
		$where = "category_name='Wedding Cake' OR category_name='wedding cake'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_undangan(){
		$where = "category_name='Undangan'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_venue(){
		$where = "category_name='Venue'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_make_up(){
		$where = "category_name='Make Up' AND category_name='make up'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	public function get_product_souvernir(){
		$where = "category_name='Souvernir'";
		$this->db->select(["ms_item.id","ms_item.name","ms_item.category_id","ms_item.price","kategori.category_name as category_name","ms_item.image"]);
		$this->db->from('ms_item');
		$this->db->join('kategori','ms_item.category_id=kategori.category_id');
		$this->db->order_by('id', 'DESC');
		$this->db->where($where);
		//$this->db->limit(1);
		$query = $this->db->get();
		return $query;
	}

	
	
}

/* End of file m_produk.php */
/* Location: ./application/models/m_produk.php */