<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Daftar Pekerjaan Penilaian VPI</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>

        <div class="ibox-content">
            <form method="get" class="form-horizontal">
            <div class="form-group">
             <label class="col-sm-1 control-label">Vendor</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <span class="input-group-btn">
                     <button type="button" id="klir" name="klir" class="btn btn-danger">Semua</button>
                     <button type="button" id="btn_vnd" data-id="kode_vnd" data-url="<?php echo site_url('vendor/picker_seluruh_vendor') ?>" class="btn btn-primary picker">Pilih Vendor</button> 
                   </span>
                   <input type="text" class="form-control" id="kode_vnd" name="kode_vnd" value="" readonly>
                 </div>

               </div>
                
            </div>
          </form>

          <div class="table-responsive">
            <table id="table_pekerjaan" class="table table-bordered table-striped"></table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
  


});

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

    var mydata = $.getCustomJSON("<?php echo site_url() ?>/"+url);

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
     var link = "<?php echo site_url('vendor/vpi/daftar_pekerjaan/penilaian_header') ?>";
    return [
    '<a class="btn btn-primary btn-xs action" href="'+link+'/'+value+'">',
    'Proses',
    '</a>  ',
    ].join('');
  }

  function lihatRFQ(value, row, index) {
     var link = "<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat/') ?>";
    return [
    '<a href="'+link+'/'+value+'" target="_blank">',
    value,
    '</a>  ',
    ].join('');
  }

  function totalTextFormatter(data) {
    return 'Total';
  }
  function totalNameFormatter(data) {
    return data.length;
  }
  function totalPriceFormatter(data) {
    var total = 0;
    $.each(data, function (i, row) {
      total += +(row.price.substring(1));
    });
    return '$' + total;
  }

</script>

<script type="text/javascript">

  var $table_pekerjaan = $('#table_pekerjaan'),
  selections = [];

</script>


<script type="text/javascript">

  var url = "<?php echo site_url('contract/data_monitor_kontrak/activeandfinish?') ?>"

  $(function () {

    $table_pekerjaan.bootstrapTable({

      url: url,
      cookieIdTable:"daftar_pekerjaan",
      idField:"urlid",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [
       {
          field: "contract_id",
          title: '#',
          align: 'center',
          width:'20%',
          valign: 'middle',
          formatter: operateFormatter,
        },
        {
          field: 'vw_ctr_monitor.ptm_number',
          title: 'Nomor Pengadaan',
          sortable:true,
          order:true,
          searchable:true,
          align: 'center',
          valign: 'middle',
          width:'15%',
          formatter: lihatRFQ,
        },
        {
          field: 'contract_number',
          title: 'Nomor Kontrak',
          sortable:true,
          order:true,
          searchable:true,
          align: 'center',
          valign: 'middle',
          width:'15%',
        },
        {
          field: 'subject_work',
          title: 'Deskripsi Pekerjaan',
          sortable:true,
          order:true,
          searchable:true,
          align: 'center',
          valign: 'middle',
          width:'30%',
        },
        {
          field: 'vendor_name',
          title: 'Vendor',
          sortable:true,
          order:true,
          searchable:true,
          align: 'left',
          valign: 'middle',

        },
        {
          field: 'contract_type',
          title: 'Tipe',
          sortable:true,
          order:true,
          searchable:true,
          align: 'left',
          valign: 'middle',

        },
        {
          field: 'status_name',
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
      $table_pekerjaan.bootstrapTable('resetView');
    }, 200);

    $table_pekerjaan.on('expand-row.bs.table', function (e, index, row, $detail) {
      $detail.html(detailFormatter(index,row,"alias"));
    });

    $('#kode_vnd').change(function(event) {
      $table_pekerjaan.bootstrapTable('refresh',{url: url+'&vnd_id='+$(this).val()})
    });

    $('#klir').click(function(event) {
     $('#kode_vnd').val("")
     $table_pekerjaan.bootstrapTable('refresh',{url: url})
    });

  });

</script>