<div class="ibox float-e-margins">
  <div class="ibox-title">
    <h5>Verifikasi Vendor</h5>
    <div class="ibox-tools">
      <a class="collapse-link">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
  </div>        
  <div class="ibox-content">
    <div class="table-responsive">             
      <table id="verifikasi_vendor" class="table table-bordered table-striped"></table>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(function () {

    $daftar_pekerjaan_verifikasi.bootstrapTable({

      url: "<?php echo site_url('Vendor/data_verifikasi_vendor/') ?>",
     
      cookieIdTable:"vw_daftar_pekerjaan_verifikasi",
      
      idField:"vendor_id",
      
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      
      columns: [
      {
        field: 'vendor_id',
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        width:'15%',
        events: operateEvents,
        formatter: operateFormatterVerifikasi,
      },
      {
        field: 'vendor_name',
        title: 'Nama Vendor',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },
      {
        field: 'reg_status_name_2',
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
  $daftar_pekerjaan_verifikasi.bootstrapTable('resetView');
}, 200);

$daftar_pekerjaan_verifikasi.on('expand-row.bs.table', function (e, index, row, $detail) {
  $detail.html(detailFormatter(index,row,"alias_daftar_pekerjaan_verifikasi"));
});

});

</script>