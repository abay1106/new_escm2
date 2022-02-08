<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="mb-1 info font-medium-3">278</h3>
                            <span>Assessed</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-file-text info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100" style="width:80%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="mb-1 warning font-medium-3">156</h3>
                            <span>Not Assessed</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-file-minus warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="35" aria-valuemin="35" aria-valuemax="100" style="width:35%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="mb-1 success font-medium-3">64</h3>
                            <span>VPI Score < 800</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-check-circle success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h3 class="mb-1 danger font-medium-3">423</h3>
                            <span>PTKP</span>
                        </div>
                        <div class="media-right align-self-center">
                            <i class="ft-archive danger font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:40%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">

        <div class="ibox-content">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive pt-4">
                <form method="get" class="form-horizontal">
                  <div class="row" style="display:none;">
                    <div class="form-group col-md-3">
                        <label>Nama Vendor</label>
                        <input type="text" id="s_vnd_name" class="form-control" placeholder="Nama Vendor">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tanggal Mulai</label>
                        <input type="date" id="s_start_date" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" id="s_end_date" class="form-control">
                    </div>
                    <div class="col-md-2 mt-3">
                        <div class='btn-group' role='group'>
                            <button type="button" class="btn bg-light-warning" id="dt_cari_act" title="Search" name="button"><i class="ft-search"></i></button>
                            <button type="button" class="btn bg-light-info" id="db_reset_act" title="Reset" name="button"><i class="ft-refresh-ccw"></i></button>
                        </div>
                    </div>
                  </div>
                  <div class="form-group" style="display:none;">
                   <label class="col-sm-1 control-label">Vendor</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                          <span class="input-group-btn">
                           <button type="button" id="klir" name="klir" class="btn btn-danger">Semua</button>
                           <button type="button" id="btn_vnd" data-id="kode_vnd" data-url="<?= site_url('vendor/picker_seluruh_vendor') ?>" class="btn btn-primary picker">Pilih Vendor</button>
                         </span>
                         <input type="text" class="form-control" id="kode_vnd" name="kode_vnd" value="">
                       </div>
                     </div>
                  </div>
                </form>
                <table id="table_pekerjaan" class="table table-bordered table-striped"></table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function() {});

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
    '<i class="ft-settings mr-1"></i>Proses',
    '</a>  ',
    ].join('');
  }

  function lihatRFQ(value, row, index) {
     var link = "<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat') ?>";
    return [
    '<a href="'+link+'/'+value+'" target="_blank">',
    value,
    '</a>  ',
    ].join('');
  }

  function lihatVendor(value, row, index) {
     var link = "<?php echo site_url('vendor/daftar_vendor/lihat_detail_vendor') ?>";
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
          field: 'vendor_id',
          title: 'Vendor ID',
          sortable:true,
          order:true,
          searchable:true,
          align: 'left',
          valign: 'middle',
          formatter: lihatVendor
        },
        {
          field: 'vendor_name',
          title: 'Vendor',
          sortable:true,
          order:true,
          searchable:true,
          align: 'left',
          valign: 'middle'
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
