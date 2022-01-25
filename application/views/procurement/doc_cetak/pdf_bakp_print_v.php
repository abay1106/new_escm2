<style type="text/css">
	html{
		font-family:sans-serif;
	}
	table {
		font-size: 10px;
	}
	
	td {
		padding: 5px;
	}

	th {
		padding: 5px;
		font-weight: bold;
		/*background-color: #b0ffc2;*/
		background-color: #00aeef;
	}

	p{
		font-size:10px;
	}

	#table-content {
		font-size: 40%;
	}

	.is-content {
		border-collapse: collapse;
	}

	.is-content td {
		border: 1px solid black;
	}

	.is-content th {
		border: 1px solid black;
	}
</style>

<?php $tgl_penetapan_pemenang = date('Y-m-d'); ?>

<table style="width: 100%;">
<tr>
	<td width="1%"><img width="50" src="./assets/img/favicon.png"></td>
	<td ><b>PT. Wijaya Karya (Persero)Tbk</b><br><?php echo "Divisi Supply Chain Management"; ?></td>
	
</tr>
</table>
<br>
<br>
<center>
	<h5 style="margin:0px;">BERITA ACARA KEPUTUSAN PEMENANG
		<h6 style="margin:0px;"><?php echo "NOMOR : TP.01.09/A.DSCM.00368/2020";//. $contract_number; ?></h6>
		<h6 style="margin:0px;"><?php echo "TANGGAL : ". date('d F Y', strtotime($tgl_penetapan_pemenang)); ?></h6>
	</h5>
</center>

<p>Pada hari ini <?php echo strtolower($this->terbilang->hari_indo(date('D'))); ?> tanggal <font style="font-weight:bold;"><?php echo strtolower($this->terbilang->eja(date('d')))." bulan ".date('F')." tahun ". strtolower($this->terbilang->eja(date('Y'))); ?><?php echo date('(d-m-Y)', strtotime($tgl_penetapan_pemenang)); ?></font> di <?php echo $kota; ?> telah dilaksanakan rapat penentuan/pengusulan pemutusan pemenang subkon / pemasok , untuk :</p>

<table style="width:100%;">
	<tr>
		<td width="1%;">1.</td>
		<td width="12%;">Paket Pengadaan</td>
		<td style="width:1%;">:</td>
		<td><?php echo $tender['ptm_project_name']; ?></td>
	</tr>
	<tr>
		<td width="1%;">2.</td>
		<td width="12%;">Proyek</td>
		<td style="width:1%;">:</td>
		<td><?php echo $tender['ptm_district_name']; ?></td>
	</tr>
	<tr>
		<td width="1%;">3.</td>
		<td width="12%;">Departemen/ Divisi</td>
		<td style="width:1%;">:</td>
		<td><?php echo $tender['ptm_dept_name']; ?></td>
	</tr>
	<tr>
		<td width="1%;">4.</td>
		<td width="12%;">Nilai RAB/HPS</td>
		<td style="width:1%;">:</td>
		<td><?php echo "Rp. ".inttomoney($nilai_hps); ?></td>
	</tr>
</table>

<p style="font-weight:bold;">Dengan Hasil Sebagai Berikut</p>

<p >1. Hasil Permintaan Penawaran</p>

<table style="width:100%;" class="is-content">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Penyedia yang Diundang</th>
		<th align="center">Daftar (Ya/Tidak)</th>
		<th align="center">Memasukan Penawaran (Ya/Tidak)</th>
		<th align="center">Catatan</th>
	</tr>

	<?php 
		$par = 1; 
		$catatan_penawaran = array();

		foreach ($vendor_verifikasi as $key => $value) {

			$dataPenwaran = $this->Procrfq_m->isKirimPenawaran($value['pvs_vendor_code'], $ptm_id)->row_array();


			$hadir = ($value['is_attend'] == "Yes") ? "Ya" : "Tidak";
			$penawaran = ($dataPenwaran) ? "Ya" : "Tidak";

			$catatan_ = "";
			if ($data_uskep['bakp_catatan_penawran'] != '') {
				$catatan_ = explode(";", $data_uskep['bakp_catatan_penawran'])[$par - 1];
			}

			echo '<tr>
					<td align="center">'.$par.'</td>
					<td align="left">'.$value['vendor_name'].'</td>
					<td align="center">'.$hadir.'</td>
					<td align="center">'.$penawaran.'</td>
					<td align="center">'.$catatan_.'</td>
				</tr>';

				array_push($catatan_penawaran, $value['pvs_technical_remark']);
		
		$par += 1;
		}
	?>

</table>

<p >2. Hasil Evaluasi Penilaian</p>

<p style="margin-left: 10px;">2.1 Administrasi</p>

<table style="width:100%;margin-left: 10px;" class="is-content">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Rekanan</th>
		<th align="center">Lulus</th>
		<th align="center">Tidak Lulus</th>
		<th align="center">Catatan</th>
	</tr>

	<?php 
		$par = 1; 
		foreach ($evaluation as $key => $value) {

			$lulus = "";
			$tidak_lulus = "";
			if ($value['adm'] == "Lulus") {
				$lulus = "Lulus";
				$tidak_lulus = "";
			} else {
				$lulus = "";
				$tidak_lulus = "Tidak Lulus";
			}
			echo '<tr>
					<td align="center">'.$par.'</td>
					<td align="left">'.$value['vendor_name'].'</td>
					<td align="center">'.$lulus.'</td>
					<td align="center">'.$tidak_lulus.'</td>
					<td align="center">'.$catatan_penawaran[$par-1].'</td>
				</tr>';
				
		
			$par += 1;
		}
	?>
</table>

<p style="margin-left: 10px;">2.2 Teknis</p>

<table style="width:100%;margin-left: 10px;" class="is-content">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Rekanan</th>
		<th align="center">Nilai</th>
		<th align="center">Nilai x Bobot</th>
		<th align="center">Catatan</th>
	</tr>

	<?php 
		$par = 1; 
		foreach ($evaluation as $key => $value) {

			
			echo '<tr>
					<td align="center">'.$par.'</td>
					<td align="left">'.$value['vendor_name'].'</td>
					<td align="center">'.number_format($value['pte_technical_value'], 2, '.', '').'</td>
					<td align="center">'.number_format($value['pte_technical_weight'], 2, '.', '').'</td>
					<td align="center">'.$value['pte_technical_remark'].'</td>
				</tr>';
				
		
			$par += 1;
		}
	?>

</table>

<p style="margin-left: 10px;">2.3 Harga</p>

<table style="width:100%;margin-left: 10px;" class="is-content">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Rekanan</th>
		<th align="center">Harga Negosiasi</th>
		<th align="center">Efisiensi</th>
		<th align="center">Nilai</th>
		<th align="center">Nilai x Bobot</th>
	</tr>

	<?php 
		$par = 1; 
		foreach ($evaluation as $key => $value) {

			echo '<tr>
					<td align="center">'.$par.'</td>
					<td align="left">'.$value['vendor_name'].'</td>
					<td align="right">Rp. '.inttomoney($value['amount']).'</td>
					<td align="right">Rp. '.inttomoney(($nilai_hps - $value['amount'])).'</td>
					<td align="center">'.number_format($value['pte_price_value'], 2, '.', '').'</td>
					<td align="center">'.number_format($value['pte_price_weight'], 2, '.', '').'</td>
				</tr>';
				
		
			$par += 1;
		}
	?>

</table>

<p style="margin-left: 10px;">2.4 Total</p>

<table style="width:100%;margin-left: 10px;" class="is-content">
	<tr>
		<th align="center">No</th>
		<th align="center">Nama Rekanan</th>
		<th align="center">Total Nilai</th>
		<th align="center">Peringkat</th>
		<th align="center">Keterangan</th>
	</tr>

	<?php 
		$par = 1; 
		foreach ($evaluation as $key => $value) {
			
			echo '<tr>
					<td align="center">'.$par.'</td>
					<td align="left">'.$value['vendor_name'].'</td>
					<td align="center">'.number_format($value['total'], 2, '.', '').'</td>
					<td align="center">'.$par.'</td>
					<td align="center"></td>
				</tr>';
				
		
			$par += 1;
		}
	?>

</table>


<p >3. Komisi Pengadaan sepakat memutuskan pemenang untuk paket pekerjaan di atas adalah:</p>

<table style="width:100%; margin-left: 10px;"  class="is-content">

	<?php 
		$par = 1; 
		foreach ($evaluation as $key => $value) {

			if ($par == 1) { ?>

				<tr>
					<td width="12%;">Nama Penyedia</td>
					<td style="width:1%;">:</td>
					<td><?php echo $value['vendor_name']; ?></td>
				</tr>
				<tr>
					<td width="12%;">Omset Kontrak </td>
					<td style="width:1%;">:</td>
					<td><?php echo 'Rp. '.inttomoney($value['amount']); ?></td>
				</tr>


			<?php }
				
			$par += 1;
		}
	?>

	
</table>

<p >4. Catatan - catatan :</p>


<table style="width:100%;margin-left: 10px;" id="tabel-catatan">
	<tr>
		<td width="2%;">-</td>
		<td colspan="2">Semua Peserta Rapat menyepakati keputusan</td>
	</tr>
	<tr>
		<td width="2%;">-</td>
		<td colspan="2" valign="middle">Dengan Alasan pengusulan sebagai berikut : </td>
	</tr>
	<?php $par = 1; foreach ($catatan as  $valuec) { ?>
		<tr class="cat">
			<td width="1%;" ></td>
			<td width="1%;" ><?php echo $par; ?></td>
			<td ><?php echo $valuec; ?></td>
		</tr>
	<?php $par += 1; }  ?>
	
</table>


<p style="font-weight:bold;">Demikian Berita Acara Ini dibuat, untuk dilaksanakan dan diproses lebih lanjut</p>

<center><p style="font-weight:bold;">Komisi  Pengadaan Divisi</p></center>

<table style="width:100%;" class="is-content" id="tabel-ttd">

	<tr>
		<th align="center">No</th>
		<th align="center">Nama</th>
		<!-- <th align="center"></th> -->
		<th align="center">Tanda Tangan</th>
		<th align="center">Keterangan</th>
	</tr>

	<?php

		$par = 1;
		$par1 = 0;
		foreach ($panitia_name as $value) {

			$nama_array = explode(" - ", $value);
			$nama = $nama_array[0];
			$pos = "";
			if (count($nama_array) > 1) {
				$pos = $nama_array[1];
			}

			echo "<tr>
				<td align='center' style='height:60px;'>$par</td>
				<td>".$nama."</td>
				<td align='center'>".$panitia_ketua[$par1]."</td>
				<td align='center'>........................</td>
				<td align='center'>".$pos."</td>
			</tr>";
			$par += 1;
			$par1 += 1;
		}

	?>

</table>

<script type="text/php">
if ( isset($pdf) ) { 
    $pdf->page_script('
        if ($PAGE_COUNT > 1) {
        	//$canvas = $dompdf->get_canvas();
        	//$h = $canvas->get_height() - 15;

            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $size = 9;
            $pageText = "(Dokumen ini dicetak otomatis di sistem eSCM WIKA)";
            $pageText2 = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
            $y = 15;
            $x = 520;
            $pdf->text(10, $y, $pageText, $font, $size);
            $pdf->text($x, $y, $pageText2, $font, $size);
        } 
    ');
}
</script>