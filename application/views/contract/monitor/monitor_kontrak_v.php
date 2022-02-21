<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Multiple Filtering</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div class="col-md-3 col-12">
                <fieldset class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Type</label>
                        </div>
                        <select class="form-control" id="siup_type">
                            <option value="#">Choose...</option>
                            <?php foreach ($siup_type as $v) { ?>
                              <option value="<?php echo $v['siup_type'];?>"><?php echo $v['siup_type'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-3 col-12">
                <fieldset class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Date</label>
                        </div>
                        <input type="date" id="date_start" class="form-control">
                    </div>
                </fieldset>
            </div>

            <div class="col-md-3 col-12">
                <fieldset class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Divisi</label>
                        </div>
                        <select class="form-control" id="divisi">
                            <option selected>Choose...</option>
                            <?php foreach ($ptm_dept_name as $v) { ?>
                              <option value="<?php echo $v['ptm_dept_name'];?>"><?php echo $v['ptm_dept_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </fieldset>
            </div>

            <div class="col-md-2 col-12">
                <button type="button" id="dt_cari_act" name="button" class="btn btn-info btn-block"><i class="ft-search"></i> Search</button>
            </div>

        </div>
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <h4 class="card-title">Daftar Kontrak</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
              <table id="table_monitor_kontrak" class="table table-bordered table-striped"></table>
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

  function logoUmkmPadi(value, row, index) {
    var link_img = "<?php echo base_url('assets/img/padi-umkm-logo.png') ?>";
    
    <?php if(empty($contract['siup_type'])){ ?>
    
      return [
      '<img src="'+link_img+'" alt="UMKM" width="60" height="30">',
      ].join('');
    
    <?php } else { ?>
        
        return [
        '-',
        ].join('');

    <?php }  ?>
  }

  function operateFormatter(value, row, index) {
    var link = "<?php echo site_url('contract/monitor/monitor_kontrak') ?>";
    return [
    '<a class="btn btn-info action" href="'+link+'/lihat/'+value+'">',
    'Lihat',
    '</a>  ',
    ].join('');
  }
  window.operateEvents = {
    'click .approval': function (e, value, row, index) {    
  },
};
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

  var $table_monitor_kontrak = $('#table_monitor_kontrak'),
  selections = [];

</script>

<script type="text/javascript">

  $(function () {

    $table_monitor_kontrak.bootstrapTable({

      url: "<?php echo site_url('contract/data_monitor_kontrak/'.$act) ?>",

      cookieIdTable:"monitor_kontrak",
      
      idField:"contract_id",

      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>

      columns: [
      <?php if(!empty($act)){ ?>
       {
        field: 'radio',
        radio:true,
        align: 'center',
        valign: 'middle'
      },
      <?php } else { ?>
        {
          field: "contract_id",
          title: '#',
          align: 'center',
          width:'8%',
          valign: 'middle',
          formatter: operateFormatter,
        },
        <?php } ?>        
        {
          field: 'vw_ctr_monitor.ptm_number',
          title: 'Nomor Pengadaan',
          sortable:true,
          order:true,
          searchable:true,
          align: 'center',
          valign: 'middle',
          width:'15%',
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
        {
          field: "contract_id",
          title: 'UMKM?',
          align: 'center',
          width:'8%',
          valign: 'middle',
          formatter: logoUmkmPadi,
        },
        ]

      });

    setTimeout(function () {
      $table_monitor_kontrak.bootstrapTable('resetView');
    }, 200);

    $table_monitor_kontrak.on('expand-row.bs.table', function (e, index, row, $detail) {
      $detail.html(detailFormatter(index,row,"alias_permintaan_kontrak"));
    });

    $table_monitor_kontrak.on('check.bs.table  check-all.bs.table', function () {

      selections = getIdSelections();
      var param = "";
      $.each(selections,function(i,val){
        param += val+"=1&";
      });
      $.ajax({
        url:"<?php echo site_url('contract/picker') ?>",
        data:param,
        type:"get"
      });

    });

    $table_monitor_kontrak.on('uncheck.bs.table uncheck-all.bs.table', function () {

      selections = getIdSelections();

      var param = "";
      $.each(selections,function(i,val){
        param += val+"=0&";
      });
      $.ajax({
        url:"<?php echo site_url('contract/picker') ?>",
        data:param,
        type:"get"
      });
    });
    $table_monitor_kontrak.on('expand-row.bs.table', function (e, index, row, $detail) {
      $detail.html(detailFormatter(index,row));

    });
    $table_monitor_kontrak.on('all.bs.table', function (e, name, args) {
  
  });

    function getIdSelections() {
      return $.map($table_monitor_kontrak.bootstrapTable('getSelections'), function (row) {
        return row.contract_id;
      });
    }
    function responseHandler(res) {
      $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.contract_id, selections) !== -1;
      });
      return res;
    }

  });

</script>