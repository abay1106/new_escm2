<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Data Deskripsi Matgis</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>

          </div>
        </div>        

        <div class="ibox-content">

          <div class="table-responsive">
          <a class="btn btn-primary" href="<?php echo site_url('administration/master_data/deskripsi_matgis/tambah') ?>" role="button">Tambah</a>               

            <table id="deskripsi_matgis" class="table table-bordered table-striped"></table>

          </div>

        </div>
      </div>


    </div>
  </div>
</div>

<script type="text/javascript">

  function operateFormatter(value, row, index) {
    var link = "<?php echo site_url('administration/master_data/deskripsi_matgis') ?>";
    return [
    '<a class="btn btn-primary btn-xs action" href="'+link+'/ubah/'+value+'">',
    'Ubah',
    '</a>  '
    ].join('');
  }

</script>

<script type="text/javascript">

  var $deskripsi_matgis = $('#deskripsi_matgis'),
  selections = [];

</script>

<script type="text/javascript">

  $(function () {

    $deskripsi_matgis.bootstrapTable({

      url: "<?php echo site_url('administration/data_deskripsi_matgis') ?>",
      cookieIdTable:"adm_lane",
      idField:"lane_id",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [
      {
        field: 'id',
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        width:'10%',
        formatter: operateFormatter
      },
      {
        field: 'label',
        title: 'Label',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle',
      },
      {
        field: 'desc',
        title: 'Deskripsi',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle',
      },
      {
        field: 'status',
        title: 'Status',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },	 
     
      ]

    });
setTimeout(function () {
  $deskripsi_matgis.bootstrapTable('resetView');
}, 200);


});

</script>