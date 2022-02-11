<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <h4 class="card-title">Evaluasi Administrasi</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table id="vendor_verifikasi_view" class="table table-bordered table-striped"></table>
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

    var mydata = $.getCustomJSON("<?php echo site_url('Procurement') ?>/"+url);

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

  function operateFormatterV2(value, row, index) {
    return [
    '<a class="btn btn-info btn-md dialog" data-url="<?php echo site_url(PROCUREMENT_VERIFIKASI_VENDOR_PATH) ?>/view/'+value+'" href="#">',
    'Lihat',
    '</a>  ',
  ].join('');
}

</script>

<script type="text/javascript">

var $vendor_verifikasi_view = $('#vendor_verifikasi_view'),
  selections = [];

</script>

<script type="text/javascript">

  $(function () {

    $vendor_verifikasi_view.bootstrapTable({

      url: "<?php echo site_url('Procurement/data_vendor_tender_view') ?>",

      selectItemName:"vendor_attend_tender[]",

      cookieIdTable:"vendor_tender",

      idField:"pvs_vendor_code",

      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>

      pageSize:100,

      columns: [
      {
        field: 'pvs_vendor_code',
        title: '<?php echo DEFAULT_BOOTSTRAP_TABLE_FIRST_COLUMN_NAME ?>',
        align: 'center',
        width:'10%',
        formatter: operateFormatterV2,
      },
      {
        field: 'vendor_name',
        title: 'Nama Vendor',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle'
      },
            {
        field: 'pvs_status',
        title: 'Status Evaluasi',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },
       {
        field: 'pvs_technical_status',
        title: 'Status Administrasi',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },     
      {
        field: 'pvs_technical_remark',
        title: 'Catatan',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },
      ]

    });
setTimeout(function () {
  $vendor_verifikasi_view.bootstrapTable('resetView');
}, 200);

});

</script>