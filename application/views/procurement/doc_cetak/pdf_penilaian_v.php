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

<form method="POST" action="<?php echo base_url(); ?>index.php/procurement/pdf_penilaian_print">
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
	<h5 style="margin:0px;">DOKUMEN SISTEM PENILAIAN</h5>
</center>
<br>
<br>

<table style="width:100%;">
	<tr>
		<td width="12%;">Paket Pengadaan</td>
		<td style="width:1%;">:</td>
		<td><?php echo $tender['ptm_project_name']; ?></td>
	</tr>
	<tr>
		<td width="12%;">Proyek</td>
		<td style="width:1%;">:</td>
		<td><?php echo $tender['ptm_district_name']; ?></td>
	</tr>
	<tr>
		<td width="12%;">No RFQ</td>
		<td style="width:1%;">:</td>
		<td><?php echo $ptm_id; ?></td>
	</tr>
</table>

<p style="font-weight:bold;">Sistem Penilaian</p>

<table style="width:100%;" class="is-content">
	<tr>
		<th align="center" rowspan="2">No</th>
		<th align="center" rowspan="2">Uraian</th>
		<th align="center" rowspan="2">Bobot</th>
		<th align="center" colspan="<?php echo count($vendor_verifikasi); ?>">Penyedia Jasa / Pemasok</th>
	</tr>

	<tr>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<th>".$value['vendor_name']."</th>";
		}
		?>
	</tr>

	<tr>
		<td align="center">I</td>
		<td align="left"><b>ADMINISTRASI</b></td>
		<td align="center"><b>Wajib</b></td>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<td></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Putusan</td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'><b>".$value['adm']."</b></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"><b>A</b></td>
		<td align="left"><b>Surat Penawaran yang ditanda tangani direksi</b></td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center">1</td>
		<td align="left">Kelengkapan</td>
		<td align="center">(ada/tidak)</td>
		<?php
		$par = 0;
		foreach ($evaluation as $key => $value) {
			if ($data_uskep['penilaian_kelengkapan'] == '') {
				echo "<td align='center'><select name='kelengkapan[]'><option>Ada</option><option >Tidak</option></select></td>";
			} else {
				if (explode(";", $data_uskep['penilaian_kelengkapan'])[$par] == "Ada") {
					echo "<td align='center'><select name='kelengkapan[]'><option selected>Ada</option><option>Tidak</option></select></td>";
				} else {
					echo "<td align='center'><select name='kelengkapan[]'><option>Ada</option><option selected>Tidak</option></select></td>";
				}
			}
			$par += 1;
		}
		?>
	</tr>

	<tr>
		<td align="center">1</td>
		<td align="left">Kesesuaian</td>
		<td align="center">(sesuai/tidak sesuai)</td>
		<?php
		$par = 0;
		foreach ($evaluation as $key => $value) {
			if ($data_uskep['penilaian_kesesuaian'] == '') {
				echo "<td align='center'><select name='kesesuaian[]'><option>Sesuai</option><option>Tidak Sesuai</option></select></td>";
			} else {
				if (explode(";", $data_uskep['penilaian_kesesuaian'])[$par] == "Sesuai") {
					echo "<td align='center'><select name='kesesuaian[]'><option selected>Sesuai</option><option>Tidak Sesuai</option></select></td>";
				} else {
					echo "<td align='center'><select name='kesesuaian[]'><option>Sesuai</option><option selected>Tidak Sesuai</option></select></td>";
				}
			}
			
			$par += 1;
			
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left"></td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center">II</td>
		<td align="left"><b>ASPEK HARGA</b></td>
		<td align="center"></td>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<td></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Nilai(%)</td>
		<td align="center"><?php echo $evaluation_method['evt_price_weight']; ?></td>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<td></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Bobot</td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'>".number_format($value['pte_price_weight'], 2, '.', '')."</td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Nilai x Bobot</td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'><b>".number_format($value['pte_price_value'], 2, '.', '')."</b></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left"></td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center">III</td>
		<td align="left"><b>ASPEK MUTU DAN TEKNIS</b></td>
		<td align="center"></td>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<td></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Nilai(%)</td>
		<td align="center"><?php echo $evaluation_method['evt_tech_weight']; ?></td>
		<?php
		foreach ($vendor_verifikasi as $key => $value) {
			echo "<td></td>";
		}
		?>
	</tr>



	<tr>
		<td align="center"></td>
		<td align="left">Bobot</td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'>".number_format($value['pte_technical_weight'], 2, '.', '')."</td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left">Nilai x Bobot</td>
		<td align="center"></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'><b>".number_format($value['pte_technical_value'], 2, '.', '')."</b></td>";
		}
		?>
	</tr>




	<?php

	$par = 1;
	foreach ($evaluation_method_details as $key => $value) {


		$content_a = '';
		foreach ($evaluation as $key => $value2) {

			$dataQuo = $this->Procrfq_m->getPQMID($value2['ptv_vendor_code'], $ptm_id)->row_array();
			$dataEval = $this->Procrfq_m->getQuoTech($dataQuo['pqm_id'], $value['etd_item'])->row_array();

			if ($value['etd_weight'] == 0) {
				if ($dataEval['pqt_check_vendor'] == 1) {
					$dataEval['pqt_value'] = 100;	
				}
			}

			$content_a .= "<td align='center'><b>".number_format($dataEval['pqt_value'], 2, '.', '')."</b></td>";
		}

		echo '

		<tr>
			<td align="center">'.$par.'</td>
			<td align="left"><b>'.$value['etd_item'].' ('.$value['etd_weight'].')</b></td>
			<td align="center"></td>
			'.$content_a.'
		</tr>

		';

	$par += 1;
	}


	?>


	<tr>
		<td align="center"></td>
		<td align="left" colspan="2"><b>NILAI EVALUASI TOTAL (NET)</b></td>
		<?php
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'><b>".number_format($value['total'], 2, '.', '')."</b></td>";
		}
		?>
	</tr>

	<tr>
		<td align="center"></td>
		<td align="left" colspan="2"><b>PERINGKAT</b></td>
		<?php
		$par = 1;
		foreach ($evaluation as $key => $value) {
			echo "<td align='center'><b>".$par."</b></td>";
			$par += 1;
		}
		?>
	</tr>
	

	<tr>
		
		<td colspan="<?php echo (count($evaluation) + 3 - 2); ?>" style="border: 0px"></td>
		<td colspan="2" align=" center" style="border: 0px">
			
			<br>
			<br>
			<?php echo $data_uskep['bakp_city'].' '.date('d M Y'); ?> 
			<br>
			<br>
			<br>
			<br>
			<br>
			<select name="penilaian_ttd">
				<?php
					foreach ($nama_user_approval as $value) {
						if ($data_uskep['penilaian_ttd'] ==  $value) {
							echo '<option selected>'.$value.'</option>';
						} else {
							echo '<option>'.$value.'</option>';
						}
						
					}
				?>
			</select>



		</td>

	</tr>
	

</table>

<button type="submit" class="button" style="margin: 5px;cursor: pointer;">Penilaian PDF</button>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	function add_catatan() {
		var total = ($("#tabel-catatan .cat").length+1);
		var id_tr = 'tr_catatan_' + total;
		$("#tabel-catatan").append('<tr id="'+id_tr+'" class="cat"><td width="1%;" ></td><td width="1%;" class="number-catatan">'+total+'</td><td ><input type="text" name="catatan[]" placeholder="Catatan"/><img style="cursor: pointer;" width="15" height="15" src="<?php echo base_url('assets/img/remove.png') ?>" onclick="remove_catatan('+id_tr+')"/></td></tr>');

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