<div class="ibox float-e-margins">
  <div class="ibox-title">
    <h5>Blacklist Vendor</h5>
    <div class="ibox-tools">
      <a class="collapse-link">
        <i class="fa fa-chevron-up"></i>
      </a>

    </div>
  </div>        

  <div class="ibox-content">

    <div class="table-responsive">             

      <table id="blacklist_vendor" class="table table-bordered table-striped"></table>

    </div>

  </div>
</div>



<script type="text/javascript">

  $(function () {

    $blacklist_vendor.bootstrapTable({

      url: "<?php echo site_url('Vendor/data_daftar_pekerjaan_blacklist_vendor') ?>",

      cookieIdTable:"vw_daftar_pekerjaan_blacklist_vendor",

      idField:"vendor_id",

      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>

      columns: [
      {
        field: 'vendor_id',
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        events: operateEvents,
        formatter: operateFormatterBlacklist,
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
        field: 'activity',
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
  $blacklist_vendor.bootstrapTable('resetView');
}, 200);

$blacklist_vendor.on('expand-row.bs.table', function (e, index, row, $detail) {
  $detail.html(detailFormatter(index,row,"alias_blacklist_vendor"));
});

});

</script>