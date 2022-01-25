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
	.button {
	  background-color: #4CAF50; /* Green */
	  border: none;
	  color: white;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 10px;
	}
</style>

<?php if ($tender['ptm_status'] == 1140) { ?>
<?php //if ($tender['ptm_status'] == 1141) { ?>
<br>
<form method="POST" action="<?php echo base_url(); ?>index.php/procurement/pdf_bakp_print">
<input type="hidden" name="id" value="<?php echo $ptm_id; ;?>">
<?php $tgl_penetapan_pemenang = date('Y-m-d'); ?>

<table style="width: 100%;">
<tr>
	<td width="1%"><img width="50" src="<?php echo base_url('assets/img/favicon.png') ?>"></td>
	<td ><b>PT. Wijaya Karya (Persero)Tbk</b><br><?php echo $tender['ptm_dept_name']; ?></td>
	
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

<p>Pada hari ini <?php echo strtolower($this->terbilang->hari_indo(date('D'))); ?> tanggal <font style="font-weight:bold;"><?php echo strtolower($this->terbilang->eja(date('d')))." bulan ".date('F')." tahun ". strtolower($this->terbilang->eja(date('Y'))); ?><?php echo date('(d-m-Y)', strtotime($tgl_penetapan_pemenang)); ?></font> di <input type="text" name="kota" placeholder="Lokasi Pengadaan" value="<?php echo $data_uskep['bakp_city'];?>" > telah dilaksanakan rapat penentuan/pengusulan pemutusan pemenang subkon / pemasok , untuk :</p>

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
					<td align="center"><textarea name="catatan_penawran[]">'.$catatan_.'</textarea></td>
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

<table style="width:100%; margin-left: 10px;">

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
		<td colspan="2" valign="middle">Dengan Alasan pengusulan sebagai berikut : <img style="cursor: pointer;" width="15" height="15" src="<?php echo base_url('assets/img/add.png') ?>" onclick="add_catatan()"/></td>
	</tr>
	<tr class="cat">
		<td width="1%;" ></td>
		<td width="1%;" >1</td>
		<td ><input type="text" placeholder="Catatan" name="catatan[]" value="<?php echo explode(";", $data_uskep['bakp_catatan'])[0];?>" /></td>
	</tr>

	<?php 

	$par = 0;
	$array_catatan = explode(";", $data_uskep['bakp_catatan']);
	foreach ($array_catatan as $value) {
		if ($par > 0) {
			$total = $par;
			$id_tr = 'tr_catatan_' . $total;
			echo '<tr id="'.$id_tr.'" class="cat"><td width="1%;" ></td><td width="1%;" class="number-catatan">'.$total.'</td><td ><input type="text" name="catatan[]" placeholder="Catatan" value="'.$value.'"/><img style="cursor: pointer;" width="15" height="15" src="'.base_url('assets/img/remove.png').'" onclick="remove_catatan('.$id_tr.')"/></td></tr>';
		}
		$par += 1;
	}


	?>



</table>


<p style="font-weight:bold;">Demikian Berita Acara Ini dibuat, untuk dilaksanakan dan diproses lebih lanjut</p>

<center><p style="font-weight:bold;">Komisi  Pengadaan Divisi</p></center>

<table style="width:100%;" class="is-content" id="tabel-ttd">

	<tr>
		<th align="center">No</th>
		<th align="center">Nama</th>
		<!-- <th align="center">Kategori</th> -->
		<th align="center">Sebagai</th>
		<th align="center">Tanda Tangan</th>
		<th align="center">Keterangan</th>
		<!-- <th align="center"></th> -->
	</tr>


	<?php

		$option_name = '<select name="panitia_name[]">';

		//print_r($nama_user_approval);
		$namapanitia = $nama_user_approval;

		foreach ($namapanitia as $value) {
			$option_name .= "<option>".$value."</option>";
		}

		$option_name .= "</select>";

	?>


	<?php 

	$par = 0;
	$id_par = 0;

	$bakp_kpd_name = explode(";", $data_uskep['bakp_kpd_name']);
	$bakp_kpd_cat = explode(";", $data_uskep['bakp_kpd_cat']);
	$bakp_kpd_as = explode(";", $data_uskep['bakp_kpd_as']);
	if ($data_uskep) {
		foreach ($bakp_kpd_name as $value) {
			$total = $par;
			$id_tr = 'tr_ttd_' . $total;
			echo '<tr id="'.$id_tr.'" class="cat"><td width="1%;" class="number-catatan">'.($total+1).'</td><td ><select name="panitia_name[]"><option>'.$value.'</option></select></td><td ><select name="panitia_ketua[]"><option>'.$bakp_kpd_as[$par].'</option></select></td><td >......................</td><td></td></tr>';

			$par += 1;
		}
	}else {
		if(count($ttd_list) > 0) {
			foreach ($ttd_list as $key => $value) {
				# code...
				$total = $par;
				$id_tr = 'tr_ttd_' . $total;
				$option_name = '<select name="panitia_name[]">';
				
				foreach ($value['lists_name'] as $key => $value) {
					# code...
					$option_name .= "<option>".$value['fullname'].' - '.$value['job_title']."</option>";

				}

				$option_name .= "</select>";
				echo '<tr id="'.$id_tr.'" class="cat"><td width="1%;" class="number-catatan">'.($total+1).'</td><td >'.$option_name.'</td><td ><select name="panitia_ketua[]"><option>Ketua</option><option>Anggota</option></select></td><td >......................</td><td></td></tr>';

				$id_par++;
			}


	
		}
		
	}


	?>


</table>
<!-- <img style="cursor: pointer; float: right; margin: 4px;" width="20" height="20"  src="<?php echo base_url('assets/img/add.png') ?>" onclick="add_ttd()"/> -->


<button type="submit" id="submit" class="button" style="margin: 5px;cursor: pointer;">BAKP PRINT PDF</button>

</form>


	<div id="form_other" style="display:<?php echo ($data_uskep) ? '' : 'none'; ?>;" >
	<a  href="<?php echo base_url()."index.php/procurement/pdf_penawaran_harga/".$ptm_id; ?>" class="button" style="margin: 5px;">DEPKN FORM</a>

	<a  href="<?php echo base_url()."index.php/procurement/pdf_penilaian/".$ptm_id; ?>" class="button" style="margin: 5px;">PENILAIAN FORM</a>

	</div>

<?php } ?>


<?php if ($tender['ptm_status'] >= 1141) { ?>

	<table style="width: 100%;">
	<tr>
		<td width="1%"><img width="50" src="<?php echo base_url('assets/img/favicon.png') ?>"></td>
		<td ><b>PT. Wijaya Karya (Persero)Tbk</b><br><?php echo $tender['ptm_dept_name']; ?></td>
		
	</tr>
	</table>
	<br>
	<br>

	<center><h1>USKEP ONLINE</h1></center>
	<hr>
	<center>
	<a  href="<?php echo base_url()."index.php/procurement/pdf_bakp_print/".$ptm_id; ?>" class="button" style="margin: 5px;">BAKP PDF</a>

	<a  href="<?php echo base_url()."index.php/procurement/pdf_penawaran_harga_print/".$ptm_id; ?>" class="button" style="margin: 5px;">DEPKN PDF</a>

	<a href="<?php echo base_url()."index.php/procurement/pdf_penilaian_print/".$ptm_id; ?>" class="button" style="margin: 5px;">PENILAIAN PDF</a>
		
		<!-- <a target="_blank" href="<?php echo base_url()."index.php/procurement/pdf_merge_print/".$ptm_id; ?>" class="button" style="margin: 5px;">MERGE PDF</a> -->
	</center>

<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	$( "#submit" ).click(function() {
	  $('#form_other').css('display', '');
	});

	function add_catatan() {
		var total = ($("#tabel-catatan .cat").length+1);
		var id_tr = 'tr_catatan_' + total;
		$("#tabel-catatan").append('<tr id="'+id_tr+'" class="cat"><td width="1%;" ></td><td width="1%;" class="number-catatan">'+total+'</td><td ><input type="text" name="catatan[]" placeholder="Catatan" /><img style="cursor: pointer;" width="15" height="15" src="<?php echo base_url('assets/img/remove.png') ?>" onclick="remove_catatan('+id_tr+')"/></td></tr>');

	}

	function add_ttd() {
		var total = ($("#tabel-ttd .cat").length+1);
		var id_tr = 'tr_ttd_' + total;
		$("#tabel-ttd").append('<tr id="'+id_tr+'" class="cat"><td width="1%;" class="number-catatan">'+total+'</td><td ><?php echo $option_name; ?></td><td ><select name="panitia_category[]"><option>--Tidak Ada--</option><option>Menyetujui</option><option>Mengetahui</option><option>Diusulkan</option></select></td><td ><select name="panitia_ketua[]"><option>Ketua</option><option>Anggota</option></select></td><td >......................</td><td></td><td><img style="cursor: pointer;" width="15" height="15" src="<?php echo base_url('assets/img/remove.png') ?>" onclick="remove_ttd('+id_tr+')"/></td></tr>');

	}

	function remove_ttd(tr_id) {
		$(tr_id).remove();
		var index  = 1; 
		$('#tabel-ttd tr').each(function () {
    		if ($(this).attr('class') == 'cat') {
    			$(this).find('.number-catatan').text(index);
    			index += 1;
    		}

    		
		});
	}

	function remove_catatan(tr_id) {
		$(tr_id).remove();
		var index  = 1; 
		$('#tabel-catatan tr').each(function () {
    		if ($(this).attr('class') == 'cat') {
    			$(this).find('.number-catatan').text(index);
    			index += 1;
    		}

    		
		});
	}

</script>