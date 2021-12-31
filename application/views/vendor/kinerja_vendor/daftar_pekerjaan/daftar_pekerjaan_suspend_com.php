 <div class="ibox float-e-margins">
  <div class="ibox-title">
    <h5>Suspend Commodity Vendor</h5>
    <div class="ibox-tools">
      <a class="collapse-link">
        <i class="fa fa-chevron-up"></i>
      </a>

    </div>
  </div>        

  <div class="ibox-content">

    <div class="table-responsive">             

      <table id="suspend_commodity_vendor" class="table table-bordered table-striped"></table>

    </div>

  </div>
</div>


<script type="text/javascript">

  $(function () {

    $suspend_commodity_vendor.bootstrapTable({

      url: "<?php echo site_url('Vendor/data_daftar_pekerjaan_commodity_vendor') ?>",
     
      cookieIdTable:"vnd_suspend_commodity_vendor",
      
      idField:"vendor_id",
      
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      
      columns: [
      {
        field: 'id_suspend_commodity_vendor',
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        events: operateEvents,
        formatter: operateFormatterSuspendCommodity,
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
        field: 'group_type',
        title: 'Type',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },
      {
        field: 'group_name',
        title: 'Commodity',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },
      {
        field: 'vc_activity',
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
  $suspend_commodity_vendor.bootstrapTable('resetView');
}, 200);

$suspend_commodity_vendor.on('expand-row.bs.table', function (e, index, row, $detail) {
  $detail.html(detailFormatter(index,row,"alias_daftar_pekerjaan_vendor"));
});

});

</script>

