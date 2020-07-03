<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		$this->load->library('Pdf');
		$this->load->model('M_Laporan');		
	}
	
	public function perencanaan()
	{
		$this->load->view('laporan/view_laporan_perencanaan');
	}
	
	public function lap_perencanaan()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = '
		<h3>Report Perencanaan Asset</h3>
		';
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="50px">ID Perencanaan</th>						
						<th style="border:1px solid #000;" width="90px">Tgl Rencana Pengadaan</th>
						<th style="border:1px solid #000;" width="60px">Tanggal Transaksi</th>
						<th style="border:1px solid #000;" width="60px">Nama Staff Penginput</th>
						<th style="border:1px solid #000;" width="50px">Tujuan</th>
						<th style="border:1px solid #000;" width="50px">Total Perencanaan</th>
						<th style="border:1px solid #000;" width="60px">Status Perencanaan</th>
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_perencanaan($startdate,$enddate)->result();
		$result = $this->M_Laporan->total($startdate,$enddate)->result();
		foreach($data as $row){
		$table .= '<tr align="center">
						<td style="border:1px solid #000;" width="30px">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_perencanaan.'</td>						
						<td style="border:1px solid #000;">'.$row->tgl_rencana_pengadaan.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_transaksi.'</td>
						<td style="border:1px solid #000;">'.$row->id_user.'</td>
						<td style="border:1px solid #000;">'.$row->tujuan.'</td>
						<td style="border:1px solid #000;">'.$row->total_perencanaan.'</td>
						<td style="border:1px solid #000;">'.$row->status_data.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 30, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 125, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40">';		
		$table .= '<tr align="center">
						<td>( Pimpinan )</td>
						<td>( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 30, '',$table, 0, 1, 0, true, 'C', true);
		$pdf->lastPage();
		// ob_clean();
		$pdf->Output('Laporan_Perencanaan'.$date_create.'.pdf', 'I');
	}
	
	public function pengadaan()
	{
		$this->load->view('laporan/view_laporan_pengadaan');
	}
	
	public function lap_pengadaan()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Pengadaan Asset</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Pengadaan</th>						
						<th style="border:1px solid #000;" width="90px">Tanggal Pengadaan</th>
						<th style="border:1px solid #000;" width="80px">Tanggal Perencanaan</th>
						<th style="border:1px solid #000;">Total Harga Diajukan</th>
						<th style="border:1px solid #000;">Total Harga Realisasi</th>
						<th style="border:1px solid #000;">Status Inventarisasi</th>
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_pengadaan($startdate,$enddate)->result();
		$result = $this->M_Laporan->total_pengadaan($startdate,$enddate)->result();
		foreach($data as $row){
		//$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_pengadaan.'</td>						
						<td style="border:1px solid #000;">'.$row->tgl_pengadaan.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_perencanaan.'</td>
						<td style="border:1px solid #000;">'.$row->total_harga_diajukan.'</td>
						<td style="border:1px solid #000;">'.$row->total_harga.'</td>
						<td style="border:1px solid #000;">'.$row->is_inventarisasi.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_Pengadaan'.$date_create.'.pdf', 'I');
	}

	public function inventarisasi()
	{
		$this->load->view('laporan/view_laporan_inventarisasi');
	}
	
	public function lap_inventarisasi()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Inventarisasi Asset</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Inventarisasi</th>						
						<th style="border:1px solid #000;" width="90px">ID Pengadaan</th>
						<th style="border:1px solid #000;" width="80px">ID Asset</th>
						<th style="border:1px solid #000;">Tanggal Inventarisasi</th>
						<th style="border:1px solid #000;">Harga Inventarisasi</th>
						<th style="border:1px solid #000;">Status Inventarisasi</th>
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_inventarisasi($startdate,$enddate)->result();
		$result = $this->M_Laporan->total_inventarisasi($startdate,$enddate)->result();
		foreach($data as $row){
		//$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_inventarisasi.'</td>						
						<td style="border:1px solid #000;">'.$row->id_pengadaan.'</td>
						<td style="border:1px solid #000;">'.$row->id_asset.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_input.'</td>
						<td style="border:1px solid #000;">'.$row->harga_realisasi.'</td>
						<td style="border:1px solid #000;">'.$row->status_ada.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_Pengadaan'.$date_create.'.pdf', 'I');
	}

	public function pengelolaan()
	{
		$this->load->view('laporan/view_laporan_pengelolaan');
	}
	
	public function lap_pengelolaan()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Pengelolaan Asset</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Sewa</th>						
						<th style="border:1px solid #000;" width="90px">ID Karyawan</th>
						<th style="border:1px solid #000;" width="80px">Tanggal Transaksi</th>
						<th style="border:1px solid #000;">ID Customer</th>
						<th style="border:1px solid #000;">DP</th>
						<th style="border:1px solid #000;">Subtotal</th>
						
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_pengelolaan($startdate,$enddate)->result();
		$result = $this->M_Laporan->total_pengelolaan($startdate,$enddate)->result();
		foreach($data as $row){
		//$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_sewa.'</td>						
						<td style="border:1px solid #000;">'.$row->id_karyawan.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_transaksi.'</td>
						<td style="border:1px solid #000;">'.$row->id_customer.'</td>
						<td style="border:1px solid #000;">'.$row->dp.'</td>
						<td style="border:1px solid #000;">'.$row->subtotal.'</td>
					
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_Pengadaan'.$date_create.'.pdf', 'I');
	}



	public function penghapusan()
	{
		$this->load->view('laporan/view_laporan_penghapusan');
	}
	
	public function lap_penghapusan()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Penghapusan Asset</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="30px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Penghapusan</th>						
						<th style="border:1px solid #000;" width="90px">ID Inventarisasi</th>
						<th style="border:1px solid #000;" width="80px">Alasan Dihapus</th>
						<th style="border:1px solid #000;"> Harga Asset</th>
						<th style="border:1px solid #000;">Tanggal Dihapus</th>
						
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_penghapusan($startdate,$enddate)->result();
		$result = $this->M_Laporan->total_penghapusan($startdate,$enddate)->result();
		foreach($data as $row){
		//$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_penghapusan.'</td>						
						<td style="border:1px solid #000;">'.$row->id_inventarisasi.'</td>
						<td style="border:1px solid #000;">'.$row->alasan_dihapus.'</td>
						<td style="border:1px solid #000;">'.$row->harga_asset.'</td>
						<td style="border:1px solid #000;">'.$row->tgl_hapus.'</td>
						
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_Pengadaan'.$date_create.'.pdf', 'I');
	}

	public function penyusutan()
	{
		$this->load->view('laporan/view_laporan_penyusutan');
	}
	
	public function lap_penyusutan()
	{
		$date_create = date('Ymd h:i:s');		
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetAuthor($this->session->userdata('nama_user'));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);		
		$title = <<<EOD
		<h3>Report Nilai Penyusutan Asset</h3>
EOD;
		$pdf->WriteHTMLCell(0, 0, '', '',$title, 0, 1, 0, true, 'C', true);
		$table = '<table style="border:1px solid #000; padding:6px;">';
		$table .= '<tr align="center" bgcolor="#ccc">
						<th style="border:1px solid #000;" width="50px">No</th>
						<th style="border:1px solid #000;" width="90px">ID Penyusutan</th>						
						<th style="border:1px solid #000;" width="90px">ID Asset</th>
						<th style="border:1px solid #000;" width="80px">Harga Beli Asset</th>
						<th style="border:1px solid #000;" width="80px">Umur Ekonomis</th>
						<th style="border:1px solid #000;" width="80px">Nilai Residu</th>
						<th style="border:1px solid #000;" width="60px">Total Penyusutan</th>
						
					</tr>';		
		$no = 1;
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$data = $this->M_Laporan->report_penyusutan($startdate,$enddate)->result();
		$result = $this->M_Laporan->total_penyusutans($startdate,$enddate)->result();
		foreach($data as $row){
		//$tgl_bayar = date('Y-m-d',strtotime($row->tgl_bayar));
		$table .= '<tr align="center">
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$row->id_penyusutan.'</td>						
						<td style="border:1px solid #000;">'.$row->id_asset.'</td>
						<td style="border:1px solid #000;">'.$row->harga_beli.'</td>
						<td style="border:1px solid #000;">'.$row->tahun.'</td>
						<td style="border:1px solid #000;">'.$row->nilai_residu.'</td>
						<td style="border:1px solid #000;">'.$row->total_penyusutan.'</td>
					</tr>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 14, '',$table, 0, 1, 0, true, 'C', true);
		foreach($result as $row){
		$table = '<table style="padding:5px;">';		
		$table .= '<tr>
						<th style="background-color:#ccc" align="center">Subtotal</th>
						<td>'.$row->subtotal.'</td>
					</tr>';
		$table .= '</table>';
		}
		$pdf->WriteHTMLCell(51, 0, 142, '',$table, 'LRTB', 1, 0, true, 'R', true);
		$now = date('d-m-Y');
		$table = '<table>';		
		$table .= '<tr align="center">
						<td>Yogyakarta, '.$now.'</td>
					</tr>';
		$table .= '</table>';
		$pdf->writeHTMLCell(51, 0, 142, '', $table, 0, 1, 0, true, 'R', true);
		$table = '<table cellspacing="40" align="left">';		
		$table .= '<tr align="center">	
						<td>( Pimpinan )</td>
						<td width="370px">( Operator )</td>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 0, '',$table, '', 1, 0, true, 'L', true);
		$pdf->lastPage();
		ob_clean();
		$pdf->Output('Laporan_Pengadaan'.$date_create.'.pdf', 'I');
	}
	
}