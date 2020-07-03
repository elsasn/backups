<?php
class M_Laporan extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function report_perencanaan($startdate,$enddate)
  {
    $query = "SELECT
                    id_perencanaan,
                    tgl_transaksi,
                    tgl_rencana_pengadaan,
                    id_user,
                    tujuan,
                    total_perencanaan,
                    status_data
              FROM perencanaan
          WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
          ORDER BY id_perencanaan ASC";
		return $this->db->query($query);
	}
	
	function total($startdate,$enddate)
	{
		$query = "SELECT
						sum(total_perencanaan) as subtotal
				  FROM perencanaan
			  WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
			  ORDER BY id_perencanaan ASC";
			return $this->db->query($query);
	}

	function report_pengadaan($startdate,$enddate)
	{
		$query = "SELECT
					id_pengadaan,
                    tgl_pengadaan,
					tgl_perencanaan,
					total_harga_diajukan,
					total_harga,
					is_inventarisasi
              FROM pengadaan
          WHERE tgl_pengadaan >= '$startdate' AND tgl_pengadaan <= '$enddate'
          ORDER BY id_pengadaan ASC";
		return $this->db->query($query);
	}
	
	function total_pengadaan($startdate,$enddate)
	{
		$query = "SELECT
						sum(total_harga) as subtotal
				  FROM pengadaan
			  WHERE tgl_pengadaan >= '$startdate' AND tgl_pengadaan <= '$enddate'
			  ORDER BY id_pengadaan ASC";
			return $this->db->query($query);
	}

	function report_inventarisasi($startdate,$enddate)
	{
		$query = "SELECT
					id_inventarisasi,
                    id_pengadaan,
					id_asset,
					tgl_input,
					harga_realisasi,
					status_ada
              FROM inventarisasi
          WHERE tgl_input >= '$startdate' AND tgl_input <= '$enddate'
          ORDER BY id_pengadaan ASC";
		return $this->db->query($query);
	}
	
	function total_inventarisasi($startdate,$enddate)
	{
		$query = "SELECT
						sum(harga_realisasi) as subtotal
				  FROM inventarisasi
			  WHERE tgl_input >= '$startdate' AND tgl_input <= '$enddate'
			  ORDER BY id_inventarisasi ASC";
			return $this->db->query($query);
	}

	function report_pengelolaan($startdate,$enddate)
	{
		$query = "SELECT
					id_sewa,
                    id_karyawan,
					tgl_transaksi,
					id_customer,
					dp,
					subtotal

              FROM sewa
          WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
          ORDER BY id_sewa ASC";
		return $this->db->query($query);
	}
	
	function total_pengelolaan($startdate,$enddate)
	{
		$query = "SELECT
						sum(subtotal) as subtotal
				  FROM sewa
			  WHERE tgl_transaksi >= '$startdate' AND tgl_transaksi <= '$enddate'
			  ORDER BY id_sewa ASC";
			return $this->db->query($query);
	}

	function report_penghapusan($startdate,$enddate)
	{
		$query = "SELECT
					id_penghapusan,
                    id_inventarisasi,
					alasan_dihapus,
					harga_asset,
					tgl_hapus
              FROM penghapusan
          WHERE tgl_hapus >= '$startdate' AND tgl_hapus <= '$enddate'
          ORDER BY id_penghapusan ASC";
		return $this->db->query($query);
	}
	
	function total_penghapusan($startdate,$enddate)
	{
		$query = "SELECT
						sum(harga_asset) as subtotal
				  FROM penghapusan
			  WHERE tgl_hapus >= '$startdate' AND tgl_hapus <= '$enddate'
			  ORDER BY id_penghapusan ASC";
			return $this->db->query($query);
	}

	function report_penyusutan($startdate,$enddate)
	{
		$query = "SELECT * FROM penyusutan";
		return $this->db->query($query);
	}
	
	function total_penyusutans($startdate,$enddate)
	{
		$query = "SELECT
						sum(total_penyusutan) as subtotal
				  FROM penyusutan";
			return $this->db->query($query);
	}
}
