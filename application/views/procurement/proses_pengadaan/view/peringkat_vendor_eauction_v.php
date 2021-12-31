<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Peringkat Vendor E-Auction</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>

        </div>
      </div>
      <div class="ibox-content">

        <div class="row">

          <?php foreach ($eauction_item as $key => $value) { 
            $jdl = explode("-", $key);

            ?>

            <div class="col-lg-12">

              <div class="text-center" style="margin: 12px 0">
                <h2><?php echo $jdl[1] ?></h2>
              </div>

                <?php foreach ($value as $k => $v) { 
                  $x = $eauction_hist[$k];
                 ?>
                 <div class="col-lg-4 col-md-6" style="color:<?php echo !empty($x['selected']) ? "green" : "" ?>;border:1px solid #0054a6;padding:10px 12px;">
 
                 <span style="font-weight: bold"><?php echo inttomoney($x['jumlah_bid']) ?></span>
                 <span style="float: right;font-weight: bold"><?php echo date('d/m/Y H:i',strtotime($x['tgl_bid'])) ?></span>

                 <?php foreach ($v as $k2 => $v2) { ?>
                  <ul style="margin-top: 12px">
                    <li>
                      E-Auction : <?php echo $v2['judul'] ?>
                    </li>
                    <li>
                      Kode : <?php echo $v2['tit_code'] ?>
                      </li>
                      <li>
                      Barang : <?php echo $v2['tit_description'] ?>
                    </li>
                    <li>
                      Jumlah : <?php echo inttomoney($v2['tit_quantity']) ?> <?php echo ($v2['tit_quantity'] != $v2['qty_bid']) ? " -> ".inttomoney($v2['qty_bid']) : "" ?>
                    </li>
                    <li>
                      Harga : <?php echo inttomoney($v2['tit_price']) ?> <?php echo ($v2['tit_price'] != $v2['jumlah_bid']) ? " -> ".inttomoney($v2['jumlah_bid']) : "" ?>
                    </li>
                  </ul>
                  <?php } ?>
                  </div>
                <?php } ?>

              

            </div>

          <?php } ?>

        </div>

        <div class="table-responsive">

          <table id="peringkat_vendor_eauction" class="table table-bordered table-striped"></table>

        </div>

      </div>

    </div>

  </div>

</div>


<script type="text/javascript">

  var $peringkat_vendor_eauction = $('#peringkat_vendor_eauction'),
  selections = [];

  $(function () {

    $peringkat_vendor_eauction.bootstrapTable({

      url: "<?php echo site_url('Procurement/data_peringkat_vendor_eauction') ?>?metode="+$( "#tipe_eauction_inp option:selected" ).val(),
      idField:"vendor_id",
      <?php echo DEFAULT_BOOTSTRAP_TABLE_CONFIG ?>
      columns: [

      {
        field: 'rank',
        title: 'Peringkat',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
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
        field: 'jumlah_bid',
        title: 'Total',
        sortable:true,
        order:true,
        searchable:true,
        align: 'center',
        valign: 'middle'
      },

      ]

    });
    setTimeout(function () {
      $peringkat_vendor_eauction.bootstrapTable('resetView');
    }, 200);

    $peringkat_vendor_eauction.bootstrapTable('refresh');

    $("button.eauction_vendor").click(function(){
      $(this).find('input:radio').prop('checked',true);
    });

  });

</script>
