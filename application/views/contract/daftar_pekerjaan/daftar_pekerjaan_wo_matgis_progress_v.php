<div class="ibox float-e-margins">

  <div class="ibox-title">

    <h5>Daftar Pekerjaan Progress WO Matgis</h5>

    <div class="ibox-tools">
      <a class="collapse-link">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

  </div>

  <div class="ibox-content">

    <div class="table-responsive">

      <table id="table_pekerjaan_progress_wo_matgis" class="table table-bordered table-striped"></table>

    </div>

  </div>

</div>

<script type="text/javascript">

  function wo_matgis_act_progress(value, row, index) {
    var link = "<?php echo site_url('contract') ?>";
    return [
    '<a class="btn btn-primary btn-xs action" href="'+link+'/proses_progress_wo_matgis/'+value+'">',
    'Proses',
    '</a>  ',
    ].join('');
  }

  var $table_pekerjaan_progress_wo_matgis = $('#table_pekerjaan_progress_wo_matgis');
  var selections = [];

  $(function () {

    $table_pekerjaan_progress_wo_matgis.bootstrapTable({

      url: "<?php echo site_url('contract/data_pekerjaan_progress_wo_matgis') ?>",
      cookieIdTable:"daftar_pekerjaan_progress_wo_matgis",
      idField:"progress_id",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [
      {
        field: "progress_id",
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        width:'8%',
        valign: 'middle',
        formatter: wo_matgis_act_progress,
      },
      {
        field: 'wo_number',
        title: 'Nomor WO',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle',
        width:'14%',
      },

      {
        field: 'progress_description',
        title: 'Deskripsi Pekerjaan',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle',
        width:'30%',
      },
      {
        field: 'creator_name',
        title: 'Vendor',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',

      },
      {
        field: 'progress_percentage',
        title: 'Persentase Progress',
        sortable:true,
        order:true,
        searchable:true,
        align: 'right',
        valign: 'middle',

      },
      {
        field: 'activity',
        title: 'Status',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle',
        width:'20%',
      },
      ]

    });
    setTimeout(function () {
      $table_pekerjaan_progress_wo_matgis.bootstrapTable('resetView');
    }, 200);

    $table_pekerjaan_progress_wo_matgis.on('expand-row.bs.table', function (e, index, row, $detail) {
      $detail.html(detailFormatter(index,row,"alias_progress"));
    });

  });

</script>
