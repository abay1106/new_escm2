<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <h4 class="card-title">E-Auction Vendor</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table id="riwayat_eauction" class="table table-bordered table-striped"></table> -->

                <table id="table_peringkat_penawar" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" data-field='online'>Online</th>
                      <th class="text-center" data-field='peringkat'>Peringkat</th>
                      <th class="text-center" data-field='nama_vendor'>Nama Vendor</th>
                      <th class="text-center" data-field='penawaran_saat_ini'>Penawaran Saat Ini</th>
                      <th class="text-center" data-field='penawaran_sebelumnya'>Penawaran Sebelumnya</th>
                      <th class="text-center" data-field='riwayat'>Riwayat</th>
                    </tr>
                  </thead>
                </table>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script type="text/javascript">
function makeid(length) {
      var result           = '';
      var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      var charactersLength = characters.length;
      for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }


  $(function () {
    var table_peringkat_penawar = $('#table_peringkat_penawar')

    table_peringkat_penawar.bootstrapTable({
      search:true,
    });

    Pusher.logToConsole = true;

    var pusher = new Pusher('<?php $this->load->config("pusher"); echo $this->config->item('PUSHER_key');?>', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      table_peringkat_penawar.bootstrapTable('append', JSON.parse(data['message']))
    });

    setInterval(function () {
      //Secara random ngepush event ke pusher
      if(Math.floor(Math.random() * 11) < 5 ){

        data = {
          'online' : (Math.floor(Math.random() * 11) < 5) ? '<i class="bi bi-circle-fill text-info" ></i>' : '<i class="bi bi-circle-fill text-danger" ></i>',
          'peringkat' : Math.floor(Math.random() * 10),
          'nama_vendor' : `PT. ${makeid(10)}`,
          'penawaran_saat_ini' : Math.floor(Math.random() * 100)  * 100000000,
          'penawaran_sebelumnya' : Math.floor(Math.random() * 100)  * 100000000,
          'riwayat' : '<a class="btn btn-primary bg-info btn-xs action" href="#"><i class="bi bi-eye"></i> Zoom</a>',
        }
        //console.log(data);
        var formData = new FormData();

        formData.append('message',JSON.stringify(data))

        //console.log(formData);

        fetch("<?php echo site_url('pusher/sendMessage') ?>",
          {
              method: "POST",
              body: formData
          })
        }

    }, 2500);


});
</script>

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

</script>

<script type="text/javascript">

  var $riwayat_eauction = $('#riwayat_eauction'),
  selections = [];

</script>

<script type="text/javascript">

  $(function () {
    var urls = "<?php echo site_url('Procurement/data_vendor_eauction') ?>";
    
    $riwayat_eauction.bootstrapTable({
      url: urls,
      idField:"vendor_id",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [
      {
        
        field: 'rank',
        title: 'Peringkat',
        sortable:true,
        order:true,
        searchable:true,
        align: 'left',
        valign: 'middle'
      },
      {
        field: 'vendor_name',
        title: 'Nama Vendor',
        sortable:true,
        order:false,
        searchable:true,
        align: 'left',
        valign: 'middle'
      },
      {
        field: 'tgl_bid',
        title: 'Tanggal',
        sortable:true,
        order:false,
        searchable:false,
        align: 'center',
        valign: 'middle'
      },
      {
        field: 'jumlah_bid',
        title: 'Penawaran Saat Ini',
        sortable:true,
        order:false,
        searchable:false,
        align: 'center',
        valign: 'middle'
      },
      {
        field: 'bid_before',
        title: 'Penawaran Sebelumnya',
        sortable:false,
        order:false,
        searchable:false,
        align: 'center',
        valign: 'middle'
      },
      ]
    });

    
    setTimeout(function () {
      $riwayat_eauction.bootstrapTable('resetView');
    }, 200);

    setInterval(function(){
      /* $riwayat_eauction.bootstrapTable('refresh', {
        useCurrentPage: false,
        includeHiddenRows: true,
        unfiltered: true
      }); */
      //$riwayat_eauction.bootstrapTable('refreshOptions', {}).
      //console.log("data");

    },2000);
  
    $riwayat_eauction.on('expand-row.bs.table', function (e, index, row, $detail) {
      $detail.html(detailFormatter(index,row,"alias_vendor"));
    });

  });

  var pusher = new Pusher("<?php echo $this->config->item('PUSHER_key');?>", {
    cluster: "<?php echo $this->config->item('PUSHER_cluster');?>",
  });
  var channel = pusher.subscribe('my-channel');

  channel.bind('my-event', function(ress) {
    console.log(ress);
    $riwayat_eauction.bootstrapTable('append', JSON.parse(ress['message']))
  });
</script>