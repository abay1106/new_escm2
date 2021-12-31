<div class="wrapper wrapper-content">

   <div class="row">
    <div class="col-lg-12">

      <div class="row">

         <div class="col-lg-3" id="efisiensi_div">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Efisiensi</h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins"> <?php echo inttomoney($data_efisiensi_total['efisiensi_percent'] != 0 ? $data_efisiensi_total['efisiensi_percent'] : '-'.$data_efisiensi_total['inefisiensi_percent']) ?>% 
                  <button style="display: none" type="button" id="efisiensi_div_btn" class="btn btn-primary btn-rounded pull-right">Detail</button></h2>
                  <small></small>
               </div>
            </div>
         </div>

         <div class="col-lg-3" id="rfq_ongoing">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-send"></i>&nbsp;&nbsp;&nbsp;Jumlah RFQ Aktif</h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins"><?php echo str_replace(',', '.',  number_format($rfq_on_going)) ?>
                  <button style="display: none" type="button" id="rfq_ongoing_btn" class="btn btn-primary btn-rounded pull-right">Detail</button></h2>
                  </h2>
                  <small></small>
               </div>
            </div>
         </div>

         <div class="col-lg-3" id="jml_pengadaan">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Jumlah Pengadaan</h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins"><?php echo str_replace(',', '.',  number_format($rfq_on_going + $rfq_selesai)) ?>
                  <button style="display: none" type="button" id="jml_pengadaan_btn" class="btn btn-primary btn-rounded pull-right">Detail</button>
                  </h2>
                  <small></small>
               </div>
            </div>
         </div>
         
         <div class="col-lg-3" id="vend">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-truck"></i>&nbsp;&nbsp;&nbsp;Vendor Aktif </h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins"><?php echo str_replace(',', '.',  number_format($total_vendor)) ?>
                  <button style="display: none" type="button" id="vend_btn" class="btn btn-primary btn-rounded pull-right">Detail</button>
                  </h2>
                  <small></small>
               </div>
            </div>
         </div>

         </div>
         <div class="row">

         <div class="col-lg-6" id="rata">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Rata-rata Waktu Pengadaan </h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins"><?php echo $method_pemilihan_langsung ?> Kerja <button style="display: none" type="button" id="rata-btn" class="btn btn-primary btn-rounded pull-right">Detail</button></h2>
                  <small></small>
               </div>
            </div>
         </div>
         
         <div class="col-lg-6" id="contract">
            <div class="ibox float-e-margins">
               <div class="ibox-title">
                  <h5><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Nilai Kontrak</h5>
               </div>
               <div class="ibox-content">
                  <h2 class="no-margins">IDR <?php echo inttomoney($total_contract) ?></h2>
                  <small></small>
               </div>
            </div>
         </div>

      </div>

    </div>

   </div>
    

   <div class="row">

      <div class="col-lg-5">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
               <h5>Efisiensi</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                     <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">


                <div id="pie_efisiensi_container"></div>

            </div>
         </div>
      </div>

      <div class="col-lg-7">
         <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Efisiensi Tahun <?php echo date('Y') ?></h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                     <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">

              <div id="efisiensi_container"></div>
                  

            </div>
         </div>
      </div>
      
   </div>
  
   <div class="row">

    <div class="col-md-6">
      <div class="ibox float-e-margins">
       <div class="ibox-title">
        <h5>Dept</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
       </div>
       <div class="ibox-content">

       <div id="containerDept"></div>
          
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="ibox float-e-margins">
       <div class="ibox-title">
        <h5>SPK</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
       </div>
       <div class="ibox-content">

         <div id="containerSpk"></div>
          
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-md-6">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Status Kontrak Payung Besi Beton</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

      <div id="containerStatBeton"></div>
          
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Status Kontrak Sentralisasi Ready Mix</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

      <div id="containerStatSemen"></div>
          
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Vendor Performance</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

      <div id="containerVend"></div>
          
        </div>
      </div>
    </div>

</div>

   <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
       <div class="ibox-title">
        <h5>MAP</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
       </div>
       <div class="ibox-content">
       <div id="container"></div>
          
        </div>
      </div>
    </div>
  </div>

   <div class="row">
      <div class="col-md-12">

         <div class="ibox float-e-margins border-bottom">
            <div class="ibox-title">
               <h5>Top 5 Efisiensi</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                     <i class="fa fa-chevron-up"></i>
                  </a>

               </div>
            </div>
            <div class="ibox-content">

               <div class="table-responsive">

                  <table id="table_efisiensi" class="table table-bordered table-striped"></table>

               </div>

            </div>
         </div>

      </div>

   </div>

  </div>


    <div id="vendor_status_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Status Vendor</h4>
          </div>
          <div class="modal-body">
              <div id="status_vendor_container"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <div id="detail_efisiensi_modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Efisiensi</h4>
          </div>
          <div class="modal-body">
              <div>
                <table>
                  <tr>
                    <td><h4>Total hps</h4></td>
                    <td><h4>&nbsp;: Rp. <?php echo inttomoney($data_efisiensi_total['hps']) ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4>Total kontrak</h4></td>
                    <td><h4>&nbsp;: RP. <?php echo inttomoney($data_efisiensi_total['total_contract']) ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4>Total Efisiensi</h4></td>
                    <td><h4>&nbsp;: Rp. <?php echo inttomoney($data_efisiensi_total['efisiensi'] != 0 ? $data_efisiensi_total['efisiensi'] : '-'.$data_efisiensi_total['inefisiensi']) ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4>Efisiensi</h4></td>
                    <td><h4>&nbsp;:<span style="<?php
                     echo $data_efisiensi_total['efisiensi_percent'] < 2 ? "color: #d9534f" : "color: #5cb85c"; ?>">
                      <?php echo inttomoney($data_efisiensi_total['efisiensi_percent'] != 0 ? $data_efisiensi_total['efisiensi_percent'] : '-'.$data_efisiensi_total['inefisiensi_percent']) ?>% </span></h4></td>
                  </tr>
                  <tr>
                    <td><h4>Target efisiensi</h4></td>
                    <td><h4>&nbsp;: 2%</h4></td>
                  </tr>
                </table>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>


   
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/maps/modules/map.js"></script>
    <script src="https://code.highcharts.com/mapdata/custom/british-isles.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>
   
   <script type="text/javascript">
    $('#vend').hover(function(){
      $('#vend_btn').css('display', 'block');
    }, function(){
      $('#vend_btn').css('display', 'none');
    })

    $('#vend_btn').click(function(){
      $('#vendor_status_modal').modal('show')
    })

    $('#efisiensi_div').hover(function(){
      $('#efisiensi_div_btn').css('display', 'block');
    }, function(){
      $('#efisiensi_div_btn').css('display', 'none');
    })

    $('#efisiensi_div_btn').click(function(){
      $('#detail_efisiensi_modal').modal('show')
    })

    $('#rata').hover(function(){
      $('#rata-btn').css('display', 'block');
    }, function(){
      $('#rata-btn').css('display', 'none');
    })

    $('#rata-btn').click(function(event) {
     window.open('<?php echo site_url('laporan/rekap_analisa/report_durasi_proses') ?>','_blank');
    });

    $('#rfq_ongoing').hover(function(){
      $('#rfq_ongoing_btn').css('display', 'block');
    }, function(){
      $('#rfq_ongoing_btn').css('display', 'none');
    })

    $('#rfq_ongoing_btn').click(function(){
      window.open('<?php echo site_url('laporan/report_progres/lap_daftar_rfq?type=rfq_ongoing') ?>','_blank')
    })

    $('#jml_pengadaan').hover(function(){
      $('#jml_pengadaan_btn').css('display', 'block');
    }, function(){
      $('#jml_pengadaan_btn').css('display', 'none');
    })

     $('#jml_pengadaan_btn').click(function(){
      window.open('<?php echo site_url('laporan/report_progres/lap_daftar_rfq') ?>','_blank')
    })
    
   </script>
   <script type="text/javascript">
   var kinerja = [

   ]


   function addCommas(nStr) {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
         x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
   }

   Highcharts.setOptions({
      lang: {
         decimalPoint: ',',
         thousandsSep: '.',
         numericSymbols: null
      }
   });


   Highcharts.setOptions({
      colors: ["#8bccec", "#a9ffae", "#fffa8b", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   })

   Highcharts.setOptions({
      colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
         return {
            radialGradient: {
               cx: 0.5,
               cy: 0.3,
               r: 0.7
            },
            stops: [
               [0, color],
               [1, Highcharts.Color(color).brighten(-0.1).get('rgb')] // darken
            ]
         };
      })
   })

   Highcharts.setOptions({
      lang: {
         thousandsSep: ','
      }
   });

   Highcharts.chart('pie_efisiensi_container', {
         chart: {
            type: 'pie',
            height: (13 / 16 * 100) + '%',
            options3d: {
              enabled: true,
              alpha: 45,
              beta: 0
            }
         },
         title: {
            text: "Nilai HPS : " + Highcharts.numberFormat(<?php echo $data_efisiensi[0]['hps'] ?>, 2, ',', '.'),
            floating: false,
            align: 'right',
            x: -80,
            y: -60,
            verticalAlign: "bottom"
         },
         credits: {
            enabled: false
         },
         tooltip: {
            useHTML: true,
            formatter: function() {
               return "<b>" +
                this.point.title + "</b><div style='width: 250px; white-space:normal;'>" + 
                // this.point.label_name + ": <b>" + Highcharts.numberFormat(this.percentage, 2, ',', '.') +"%</b><br/>" +
                this.point.name + ": <b> " + Highcharts.numberFormat(this.y, 2, ',', '.') +
                  "<b/><b/></div>";
            }
            // pointFormat: '<br/>{point.label_name}: <b>{point.percentage:.1f}%<b/><br/> {point.name}:<b>{point.y}<b/><b/>'
         },
         plotOptions: {
            pie: {
               allowPointSelect: true,
               cursor: 'pointer',
               depth: 35,
               dataLabels: {
                  enabled: true,
                  crop: false,
                  overflow: 'justify',
                  distance: 20,
                  format: '<b style="color:{series.color}>{point.name}</b>',
                  style: {
                     color: (Highcharts.theme && Highcharts.theme.contrastTextColor)
                  }
               },
               showInLegend: true,
               size: 180
            }
         },
         series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [
               <?php foreach ($data_efisiensi as $key => $value) { ?> {
                  name: "Nilai Kontrak",
                  y: <?php echo $value['total_contract'] ?>,
                  label_name: 'Persentase',
                  title: "Total Nilai Kontrak"
                  // color: '#8bccec'
               },
               {
                  name: "Nilai Efisiensi",
                  y: <?php echo $value['efisiensi'];?>,
                  label_name: 'Persentase',
                  title: "Total efisiensi",
                  // color: '#a9ffae'
               },
               {
                  name: "Nilai In Efisiensi",
                  y: <?php echo $value['inefisiensi'];?>,
                  label_name: 'Persentase',
                  title: "Total In efisiensi"
                  //color: '#fffa8b'
               },
               // {
               //  name:"Nilai HPS",
               //  y: <?php echo $value['hps'];?>,
               //  label_name: 'Persentase',
               //  title: "Total HPS"
               //  //color: '#fffa8b'
               // },
               <?php } ?>
            ]
         }]
      }
      
   )

   Highcharts.chart('status_vendor_container', {
      chart: {
         type: 'pie',
         height: 60 + '%'
      },
      title: {
         text: null
      },
      credits: {
         enabled: false
      },
      tooltip: {
         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b></b><br/>Jumlah: <b>{point.y}<b/>'
      },
      legend: {
        align: 'right',
        enabled: false,
        layout: 'vertical',
        verticalAlign: 'center',
        // fontWeight: 'bold',
        // fontSize: '5px'
      },
      plotOptions: {
         pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
               enabled: true,
               distance: 15,
            //    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
               format: '<b>{point.name}</b>',
               style: {
                //   color: (Highcharts.theme && Highcharts.theme.contrastTextColor)
               }
            },
            showInLegend: true,
            size: 280
         }
      },
      series: [{
         name: 'Persentase',
         colorByPoint: true,
        point: {
                  events: {
                      click: function () {
                        // console.log(this.options.name)
                          window.open('<?php echo site_url('laporan/rekap_analisa/monitor_vendor?status=') ?>'+this.options.name,'_blank');
                      }
                  }
              },
         data: [
            <?php foreach ($kinerja_vendor as $key => $value) { ?> {
               name: "<?php echo $value['vendor_status'] ?>",
               y: <?php echo $value['jml'] ?>
            },
            <?php } ?>
         ]
      }]
   });

   $(function() {

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

      var mydata = $.getCustomJSON("<?php echo site_url('Procurement') ?>/" + url);

      var html = [];
      $.each(row, function(key, value) {
         var data = $.grep(mydata, function(e) {
            return e.field == key;
         });

         if (typeof data[0] !== 'undefined') {

            html.push('<p><b>' + data[0].alias + ':</b> ' + value + '</p>');
         }
      });

      return html.join('');

   }

   function operateFormatter(value, row, index) {
      var link = "<?php echo site_url('procurement/daftar_pekerjaan') ?>";
      return [
         '<a class="btn btn-primary btn-xs action" href="' + link + '/proses/' + value + '">',
         'Proses',
         '</a>  ',
      ].join('');
   }

   function efisiensi_formatter(value, row, index) {
      var link = "<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/') ?>";
      return [
         '<a href="' + link + '/lihat/' + value + '">',
         value,
         '</a>  ',
      ].join('');
   }


   function operateFormatter2(value, row, index) {
      var link = "<?php echo site_url('procurement/daftar_pekerjaan') ?>";
      return [
         '<a class="btn btn-primary btn-xs action" href="' + link + '/proses_tender/' + value + '">',
         'Proses',
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
      $.each(data, function(i, row) {
         total += +(row.price.substring(1));
      });
      return '$' + total;
   }
   </script>


   <script type="text/javascript">
   var $table_pekerjaan_pr = $('#table_pekerjaan_pr'),
      $table_pekerjaan_rfq = $('#table_pekerjaan_rfq'),
      $table_efisiensi = $('#table_efisiensi')
   selections = [];
   </script>

   <script type="text/javascript">
   $(function() {

      $table_efisiensi.bootstrapTable({

         url: "<?php echo site_url('Procurement/data_top_5_efisiensi/') ?>",
         striped: true,
         selectItemName: "list",
         sidePagination: "server",
         smartDisplay: true,
         cookie: true,
         cookieExpire: "1h",
         cookieIdTable: "data_efisiensi",
         showExport: false,
         exportTypes: ['json', 'xml', 'csv', 'txt', 'excel'],
         showFilter: false,
         flat: true,
         keyEvents: false,
         showMultiSort: false,

         reorderableColumns: false,
         resizable: false,
         pagination: false,
         cardView: false,
         detailView: false,
         search: false,
         showRefresh: true,
         showToggle: false,
         idField: "ptm_number",

         showColumns: false,
         columns: [{
               field: 'ptm_number',
               title: 'No. RFQ',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '15%',
               formatter: efisiensi_formatter,
            },

            {
               field: 'ptm_subject_of_work',
               title: 'Nama Pekerjaan',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '21%',
            },
            {
               field: 'ptm_dept_name',
               title: 'Dept',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '21%',
            }, {
               field: 'hps',
               title: 'Nilai HPS',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '15%',
            }, {
               field: 'contract_amount',
               title: 'Nilai Kontrak',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '15%',
            }, {
               field: 'efisiensi',
               title: 'Efisiensi',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '15%',
            }, {
               field: 'efisiensi_percent',
               title: '%',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '10%',
            },
            // {
            //   field: 'inefisiensi',
            //   title: 'Inefisiensi',
            //   sortable:true,
            //   order:true,
            //   searchable:true,
            //   align: 'center',
            //   valign: 'middle',
            //   width:'20%',
            // },{
            //   field: 'inefisiensi_percent',
            //   title: '%',
            //   sortable:true,
            //   order:true,
            //   searchable:true,
            //   align: 'center',
            //   valign: 'middle',
            //   width:'20%',
            // },
         ]

      });
      setTimeout(function() {
         $table_pekerjaan_pr.bootstrapTable('resetView');
      }, 200);

      $table_pekerjaan_pr.on('expand-row.bs.table', function(e, index, row, $detail) {
         $detail.html(detailFormatter(index, row, "alias_pr"));
      });

   });
   </script>

   <script type="text/javascript">
   $(function() {

      $table_pekerjaan_pr.bootstrapTable({

         url: "<?php echo site_url('Procurement/data_pekerjaan_pr') ?>",
         striped: true,
         selectItemName: "list",
         sidePagination: "server",
         smartDisplay: false,
         cookie: true,
         cookieExpire: "1h",
         cookieIdTable: "daftar_pekerjaan_pr",
         showExport: false,
         exportTypes: ['json', 'xml', 'csv', 'txt', 'excel'],
         showFilter: true,
         flat: true,
         keyEvents: false,
         showMultiSort: false,

         reorderableColumns: false,
         resizable: false,
         pagination: true,
         cardView: false,
         detailView: false,
         search: true,
         showRefresh: true,
         showToggle: true,
         idField: "ppc_id",

         showColumns: true,
         columns: [{
               field: 'ppc_id',
               title: '#',
               align: 'center',
               width: '8%',
               valign: 'middle',
               formatter: operateFormatter,
            },
            {
               field: 'pr_number',
               title: 'No. PR',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '20%',
            },

            {
               field: 'pr_subject_of_work',
               title: 'Nama Pekerjaan',
               sortable: true,
               order: true,
               searchable: true,
               align: 'left',
               valign: 'middle',
               width: '30%',
            },

            {
               field: 'activity',
               title: 'Aktifitas',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '20%',
            },
         ]

      });
      setTimeout(function() {
         $table_pekerjaan_pr.bootstrapTable('resetView');
      }, 200);

      $table_pekerjaan_pr.on('expand-row.bs.table', function(e, index, row, $detail) {
         $detail.html(detailFormatter(index, row, "alias_pr"));
      });

   });
   </script>

   <script type="text/javascript">
   $(function() {

      $table_pekerjaan_rfq.bootstrapTable({

         url: "<?php echo site_url('Procurement/data_pekerjaan_rfq') ?>",
         striped: true,
         selectItemName: "list",
         sidePagination: "server",
         smartDisplay: false,
         cookie: true,
         cookieExpire: "1h",
         cookieIdTable: "daftar_pekerjaan_rfq",
         showExport: false,
         exportTypes: ['json', 'xml', 'csv', 'txt', 'excel'],
         showFilter: true,
         flat: true,
         keyEvents: false,
         showMultiSort: false,

         reorderableColumns: false,
         resizable: true,
         pagination: true,
         cardView: false,
         detailView: false,
         search: true,
         showRefresh: true,
         showToggle: true,
         idField: "ptc_id",

         showColumns: true,
         columns: [{
               field: 'ptc_id',
               title: '#',
               align: 'center',
               width: '8%',
               valign: 'middle',
               formatter: operateFormatter2,
            },
            {
               field: 'ptm_number',
               title: 'No. Tender',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '20%',
            },
            {
               field: 'ptm_subject_of_work',
               title: 'Nama Pekerjaan',
               sortable: true,
               order: true,
               searchable: true,
               align: 'left',
               valign: 'middle',
               width: '30%',
            },

            {
               field: 'activity',
               title: 'Aktifitas',
               sortable: true,
               order: true,
               searchable: true,
               align: 'center',
               valign: 'middle',
               width: '20%',
            },
         ]

      });
      setTimeout(function() {
         $table_pekerjaan_rfq.bootstrapTable('resetView');
      }, 200);

      $table_pekerjaan_rfq.on('expand-row.bs.table', function(e, index, row, $detail) {
         $detail.html(detailFormatter(index, row, "alias_rfq"));
      });

   });

   <?=$this->session->flashdata('welcome')?>

   </script>
   <script type="text/javascript">
    function map(data){
        
        var dataName
        var openedInfo = false
       

        var mapChart
        var data = JSON.parse(data)

        var mapData = Highcharts.maps['countries/id/id-all'];

        
        mapChart = $('#container').highcharts('Map', {
        chart:{
            // plotBackgroundColor: '#A4D3F0',
        },
        mapNavigation: {
            enabled: true,
            buttonOptions: {
            verticalAlign: 'bottom'
            }
        },
        colorAxis: {
            // min: 0
            min: 1,
            max: 1000,

            // type: 'logarithmic',
            minColor: '#e6e696',
            maxColor: '#003700',
        },
        credits: {
         enabled: false
        },
        title:  {
            text: ''
        },
        credits: {
                enabled: false
        },
        legend: {
            enabled: false
        },
        tooltip: {
          formatter: function(data){
            return '<table>'+
                  '<tr>'+
                  '<td>Kota </td>'+
                  '<td>: '+this.point.alamatproyek+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td>Kode Proyek </td>'+
                  '<td>: '+this.point.kode_spk+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td>Nama Proyek </td>'+
                  '<td>: '+this.point.nama_proyek+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td>Departemen </td>'+
                  '<td>: '+this.point.dept_name+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td>Nilai Perencanaan Pengadaan </td>'+
                  '<td>: Rp. '+Highcharts.numberFormat(this.point.nilai_perencanaan_pengadaan, 2, ',', '.')+'</td>'+
                  '</tr>'+
                  '<tr>'+
                  '<td>Jumlah RFQ </td>'+
                  '<td>: '+this.point.jumlah_rfq+'</td>'+
                  '</tr>'+
               '</table>'
          },
          shared: false,
          useHTML: true
        },
        lang: {
         decimalPoint: ',',
         thousandsSep: '.'
        },
        plotOptions: {
            series: {
            colorByPoint: true,
            cursor: 'pointer',
            dataLabels: {
                    enabled: false,
                    allowOverlap: true,
            },
            point: {
            }
          }
        },
        series: [{
        mapData: Highcharts.maps['countries/id/id-all'],
        name: 'Basemap',
        colorByPoint: true,
        borderColor: '#A0A0A0',
        color: '#2f7ed8',
        nullColor: '#89D7ED',
        showInLegend: false
        }, {
        name: 'Separators',
        type: 'mapline',
        // colorByPoint: true,      
        data: Highcharts.geojson(Highcharts.maps['countries/id/id-all'], 'mapline'),
        showInLegend: false,
        enableMouseTracking: false
        }
        ,{
        type: 'mappoint',
        name: 'Kota',
        allowPointSelect: true,
        cursor: 'pointer',
        // color: '#F8AC59',
        data: data
        }
        ]
        }).highcharts();
    }


function dept(data, num_rows) {

Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   });

    // var data = JSON.parse(data)
    var drilled = false
    var drilldownId = ''
    // console.log(data)
// Create the chart
    $('#containerDept').highcharts({
        lang: {
          drillUpText: '◁ Back'
        },
        chart: {
            type: 'column',
            events: {
              drilldown: function(e) {
                var chart = this
                drilldownId = e.point.drilldown
                $.ajax({
                      url: "<?php echo site_url('Log/chart/dept') ?>"+'/'+drilldownId,       
                      type: "POST",
                      data: {offset: 0, limit: 5},
                      dataType: "json",
                      beforeSend: function(e){    
                          chart.showLoading();
                      },
                      success: function(ret){
                          drilled = true

                          $('.left').hide()
                          $('.right').hide()

                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[0]);
                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[1]);
                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[2]);
                          chart.applyDrilldown();

                          chart.hideLoading();
                      }
                })
              },
              drillup: function(e){
                drilled = false
                drilldownId = '' 
                $('left').show()
                $('.right').show()
              }  
          
          }
        },
        title: {
            text: 'Efisiensi per Departemen'
        },
        xAxis: {
            type: 'category'
        },
        credits: {
         enabled: false
        },
        plotOptions: {
            series: {
                stacking: 'normal',
                borderWidth: 0,
                dataLabels: {
                    enabled: false
                },
            point: {
                  events: {
                      click: function (e) {
                        if (drilled == true) {
                           window.open('<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat/') ?>' +'/'+e.point.name,'_blank');
                        }
                        
                          
                      }
                  }
              }

            }
        },
        tooltip: {
          formatter: function(data){
            return '<span style="font-size:10px">'+this.key+'</span><table><tr><td style="color:'+this.color+';padding:0">'+this.series.name+': </td><td style="padding:0"><b>'+Highcharts.numberFormat(this.y, 2, ',', '.')+'</b></td></tr><tr><td style="color:'+this.color+';padding:0">HPS: </td><td style="padding:0"><b>'+Highcharts.numberFormat(this.point.hps, 2, ',', '.')+'</b></td></tr></table>'
          },
          shared: false,
          useHTML: true
        },
        series: data,
        drilldown: {
          drillUpButton: {
            position: {
                x: -10,
                y: -40,
            }
          },
          series: [],

        }
    }, 
    // ######### chart pagination #########
    function(chart) { // on complete
    
        function noop(){};
        var offset = 0;
        var limit = 5;
  
        chart.renderer.button('<', chart.plotLeft - 60, chart.plotHeight + 60 + chart.plotTop - 20, noop).addClass('left').add()

        chart.renderer.button('>', chart.plotLeft + chart.plotWidth - 20, chart.plotHeight + 60 + chart.plotTop - 20, noop).addClass('right').add()
            
        if(offset == 0){
            $('.left').hide()
        }

        $('.left').click(function() {
        offset = offset - limit;
        $.ajax({
                url: "<?php echo site_url('Log/chart/dept') ?>"+'/'+drilldownId,        
                type: "POST",
                data: {offset: offset, limit: limit},
                dataType: "json",
                beforeSend: function(e){    
                    chart.showLoading();
                },
                success: function(ret){
                    // var ret = JSON.parse(ret)
                    chart.series[0].setData(ret.data[0].data,true);
                    chart.series[1].setData(ret.data[1].data,true);
                    chart.series[2].setData(ret.data[2].data,true);
                    // chart.redraw();

                    if(ret.num_rows >= limit){
                        $('.right').show()
                    }

                    if(offset == 0){
                        $('.left').hide()
                    }
                        
                    chart.hideLoading();

                }
            })
        })

        $('.right').click(function() {
        offset = offset + limit;
        $.ajax({
                url: "<?php echo site_url('Log/chart/dept') ?>"+'/'+drilldownId,        
                type: "POST",
                data: {offset: offset, limit: limit},
                dataType: "json",
                beforeSend: function(e){    
                    chart.showLoading();
                },
                success: function(ret){
                    // var ret = JSON.parse(ret)
                    // console.log(ret)
                    chart.series[0].setData(ret.data[0].data,true);
                    chart.series[1].setData(ret.data[1].data,true);
                    chart.series[2].setData(ret.data[2].data,true);
                    // chart.redraw();

                    if((ret.num_rows - limit) <= offset){
                        $('.right').hide()
                    }

                    if(offset == limit){
                        $('.left').show()
                    }
                    
                    chart.hideLoading();

                }
            })
        })
      
      
  }
  )
}

function spk(data, num_rows) {

Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   });

    // var data = JSON.parse(data)
    // Create the chart

    var drilled = false;
    $('#containerSpk').highcharts({
      lang: {
          drillUpText: '◁ Back'
        },
      chart: {
          type: 'column',
          events: {
          drilldown: function(e) {
            var chart = this
            $.ajax({
                  url: "<?php echo site_url('Log/chart/spk') ?>"+'/'+e.point.drilldown,
                  beforeSend: function(e){    
                          chart.showLoading();
                      },
                      success: function(ret){
                        var ret = JSON.parse(ret)
                          drilled = true;
                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[0]);
                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[1]);
                          chart.addSingleSeriesAsDrilldown(e.point, ret.data[2]);
                          chart.applyDrilldown();

                          chart.hideLoading();
                      }
            })
          },
          drillup: function(e){
              drilled = false
              drilldownId = '' 
            }  
        },
      },
      title: {
          text: '5 Proyek dengan Efisiensi Terbesar'
      },
      xAxis: {
          type: 'category'
      },
      credits: {
         enabled: false
      },
      tooltip: {
          formatter: function(data){
            return '<span style="font-size:10px">'
            +this.key+'</span>'+
            '<table>'+
            '<tr><td style="color:'+this.color
            +';padding:0">Nama Proyek: </td><td style="padding:0"><b>'
            +this.point.project_name
            +'</b></td></tr>'+
            '<tr>'+
              '<td style="color:'+this.color+';padding:0">'
              +this.series.name
              +': </td>'+
            '<td style="padding:0"><b>'
            +Highcharts.numberFormat(this.y, 2, ',', '.')
            +'</b></td></tr><tr><td style="color:'+this.color
            +';padding:0">HPS: </td><td style="padding:0"><b>'
            +Highcharts.numberFormat(this.point.hps, 2, ',', '.')
            +'</b></td></tr>'+
            '</table>'
          },
          shared: false,
          useHTML: true
        },
      plotOptions: {
          series: {
              stacking: 'normal',
              borderWidth: 0,
              dataLabels: {
                  enabled: false
              },
              point: {
                events: {
                    click: function (e) {

                      if (drilled == true) {
                         window.open('<?php echo site_url('procurement/procurement_tools/monitor_pengadaan/lihat/') ?>' +'/'+e.point.name,'_blank');
                      }
                        
                    }
                }
            }
          },
          
      },

      series: data,
      drilldown: {
          drillUpButton: {
            position: {
                x: -10,
                y: -40,
            }
          },
          series: [],

      }
    })
}

function statusKontrakSemen(data) {

Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ],
        lang: {
          decimalPoint: ',',
          thousandsSep: '.'
        }
   });

var data = JSON.parse(data)
// Create the chart
  $('#containerStatSemen').highcharts({
    chart: {
        type: 'bar',
        events: {
          drilldown: function(e) {
            var chart = this
            $.ajax({
                  url: "<?php echo site_url('Log/chart/statSemen') ?>"+'/'+e.point.drilldown,
                  success: function(ret){
                      var ret = JSON.parse(ret)
                      // console.log(ret)
                      chart.addSeriesAsDrilldown(e.point, ret[0]);
                  }
            })
          }
        },
    },
    title: {
        text: 'Status Kontrak Sentralisasi Ready Mix dan Penyerapan'
    },
    xAxis: {
        type: 'category'
    },
    credits: {
         enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal',
            borderWidth: 0,
            dataLabels: {
                enabled: false
            }
        }
    },

    series: data,
    drilldown: {}
  })
}

function statusKontrakBeton(data) {

Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   });

var data = JSON.parse(data)
// Create the chart
  $('#containerStatBeton').highcharts({
    chart: {
        type: 'bar',
        events: {
          drilldown: function(e) {
            var chart = this
            $.ajax({
                  url: "<?php echo site_url('Log/chart/statBeton') ?>"+'/'+e.point.drilldown,
                  success: function(ret){
                    if (ret != '') {

                      var ret = JSON.parse(ret)
                      // console.log(ret)
                      chart.addSeriesAsDrilldown(e.point, ret[0]);

                    }
                      
                  }
            })
          }
        },
    },
    title: {
        text: 'Status Kontrak Payung Besi Beton dan Penyerapan'
    },
    xAxis: {
        type: 'category'
    },
    credits: {
         enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal',
            borderWidth: 0,
            dataLabels: {
                enabled: false
            }
        }
    },

    series: data,
    drilldown: {}
  })
}

function vend(data) {

  Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   });

    var data = JSON.parse(data)
// console.log(data)
    $('#containerVend').highcharts({
        chart: {
            type: 'scatter',
            zoomType: 'xy'
        },
        title: {
            text: "Vendor Performance WIKA Periode <?php echo date('M Y') ?> "
        },
        xAxis: {
            title: {
                enabled: true,
                text: 'Approved Date'
            },
            startOnTick: true,
            endOnTick: true,
            showLastLabel: true,
            labels: {
              enabled: true,
              formatter: function(){
                return Highcharts.dateFormat('%d %b %Y', 
                  Date.UTC(
                  this.value.toString().substring(0,4),
                   '0'+(parseInt(this.value.toString().substring(4,6)-1).toString()),//month in utc
                   this.value.toString().substring(6,8)
                   ));
              }
            }
        },
        yAxis: {
            title: {
                text: 'Score VPI'
            }
        },
        legend: {
            enabled: false,
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 70,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
            borderWidth: 1
        },
        credits: {
         enabled: false
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 5,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.y:,.2f}'
                }
            },
            series:{
              allowPointSelect: false,
              cursor: 'pointer',
              point: {
                  events: {
                      click: function () {
                        // console.log(this.options)
                          window.open('<?php echo site_url('/vendor/vpi/monitor_pekerjaan/penilaian_vpi/') ?>' +
                                                        '/'+this.options.key,'_blank');
                      }
                  }
              }
            }
        },
        series: data,
        drilldown: {}
    })
}

function efisiensiLine(data, num_rows){

  Highcharts.setOptions({
      colors: ["#7cb5ec", "#434348", "#003c94", "#f7a35c", "#8085e9", "#f15c80", "#e4d354", "#2b908f", "#f45b5b",
         "#91e8e1"
      ]
   })

    var datas = []
    $.each(data, function(i, v){

        var rawDatas = []
        $.each(v.data, function(e, k){
            // console.log(k.year+'||'+ k.month)
            rawDatas.push([Date.UTC(k.year, k.month - 1), k.y])
        })
        datas.push({name: v.name, data: rawDatas})
        // console.log(rawDatas)
    })
    
    data = datas
    // console.log(JSON.stringify(data))
   Highcharts.chart('efisiensi_container', {
      chart: {
         type: 'line',
         height: (9 / 16 * 100) + '%',
         marginTop: 30
      },
      title: {
         text: null
      },
      credits: {
         enabled: false
      },
      xAxis: {
          
    type: 'datetime',
        dateTimeLabelFormats: { 
            month: '%b',
            year: '%b'
        },
      },
      yAxis: {
         min: 0,
         title: {
            text: 'IDR',
         }
      },
      tooltip: {
         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:,.f} </b></td></tr>',
         footerFormat: '</table>',
         shared: true,
         useHTML: true
      },
      plotOptions: {
         line: {
            pointPadding: 0.2,
            borderWidth: 0
         },
          series:{
              allowPointSelect: false,
              cursor: 'pointer',
              point: {
                  events: {
                      click: function () {
                          window.open('<?php echo site_url('laporan/rekap_analisa/lap_proc_value') ?>', '_blank');
                      }
                  }
              }
            }
      },
      lang: {
         decimalPoint: ',',
         thousandsSep: '.'
      },
        symbol: 'circle',
      series: data
   })
}

    $.ajax({
        url: "<?php echo site_url('Log/chart/map') ?>",
        success: function(ret){
            map(ret)
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/statSemen') ?>",
        success: function(ret){
            statusKontrakSemen(ret)
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/statBeton') ?>",
        success: function(ret){
            if(ret != ''){
              statusKontrakBeton(ret)
            }
            
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/dept') ?>",
        success: function(ret){
            ret = JSON.parse(ret)

            dept(ret.data, ret.num_rows)
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/spk') ?>",
        success: function(ret){
            ret = JSON.parse(ret)
            spk(ret.data, ret.num_rows)
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/efisiensiLine') ?>",
        success: function(ret){
          ret = JSON.parse(ret)
          efisiensiLine(ret.data, ret.num_rows)
        }
   })

   $.ajax({
        url: "<?php echo site_url('Log/chart/vend') ?>",
        success: function(ret){
          vend(ret)
        }
   })

</script>