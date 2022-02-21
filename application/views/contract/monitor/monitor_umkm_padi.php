<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-header border-bottom pb-2">
				<h4 class="card-title">Data UMKM PADI</h4>
			</div>

			<div class="card-content">
				<div class="card-body">
					<div class="table-responsive">
						<table id="table_umkm_padi" class="table table-bordered table-striped"></table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">

	jQuery.extend({
		getCustomJSON: function(url) {
			var result = null;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json',
				async: false,
				success: function(data) {
					result = data;
				}
			});
			return result;
		}
	});

  	function detailFormatter(index, row, url) {

		var mydata = $.getCustomJSON("<?php echo site_url('contract') ?>/"+url);

		var html = [];
		$.each(row, function (key, value) {
			var data = $.grep(mydata, function(e){ 
				return e.field == key; 
			});

			if(typeof data[0] !== 'undefined'){

			html.push('<p><b>' + data[0].alias + ':</b> ' + value + '</p>');
			}
		});

		return html.join('');

	}

	function operateFormatter(value, row, index) {
		var link = "#";
		return [
		'<a class="btn btn-danger btn-sm">',
		'<i class="ft-trash"></i> Hapus',
		'</a>  ',
		].join('');
	}

</script>

<script type="text/javascript">

  var $table_umkm_padi = $('#table_umkm_padi'),
  selections = [];  

</script>

<script type="text/javascript">

	$(function () {

		$table_umkm_padi.bootstrapTable({

			url: "<?php echo site_url('contract/data_umkm_padi/') ?>",		

			cookieIdTable:"umkm_padi",
			
			idField:"uid",

			<?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>

			columns: [  
				{
					field: "timestamp",
					title: '#',
					align: 'center',
					width:'8%',
					valign: 'middle',
					formatter: operateFormatter,
				}, 
				{
					field: 'uid',
					title: 'ID',
					align: 'center',
					valign: 'middle',
					width:'20%',
				},     
				{
					field: 'nama_umkm',
					title: 'Nama UMKM',
					align: 'center',
					valign: 'middle',
					width:'20%',
				},
				{
					field: 'provinsi',
					title: 'Provinsi',
					align: 'center',
					valign: 'middle',
					width:'20%',
				},
				{
					field: 'kota',
					title: 'Kota',
					align: 'center',
					valign: 'middle',
					width:'20%',
				},
				{
					field: 'timestamp',
					title: 'Waktu/Tanggal',
					align: 'center',
					valign: 'middle',
					width:'20%',
				},
			]

		});

		setTimeout(function () {
			$table_umkm_padi.bootstrapTable('resetView');
		}, 200);

	});

	console.log($table_umkm_padi);

</script>