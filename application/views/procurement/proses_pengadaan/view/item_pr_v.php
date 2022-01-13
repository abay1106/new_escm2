<?php if($permintaan['pr_type'] == "MATERIAL STRATEGIS"){ 
include(VIEWPATH."procurement/proses_pengadaan/view/item_pr_matgis_v.php"); 
 } else { ?>

<div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Item Perencanaan Non Material Strategis</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
              <table class="table table-bordered" id="item_table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Tipe</th>
                  <th>Item</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga Satuan<br/><!-- (Sebelum Pajak) --></th>
                  <th style="display: none;">Pajak</th>
                  <th>Subtotal<br/><!-- (Sebelum Pajak) --></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $subtotal = 0;
                $subtotal_ppn = 0;
                $subtotal_pph = 0;
                if(isset($item) && !empty($item)){
                  foreach ($item as $key => $value) { ?>

                  <tr>
                    <td>
                    <?php echo $key+1 ?>
                    </td>
                    <td>
                      <?php echo $value['ppi_code'] ?>
                    </td>
                    <td>
                      <?php echo $value['ppi_type'] ?>
                    </td>
                    <td>
                      <?php echo $value['ppi_description'] ?>
                    </td>
                    <td class="text-right">
                      <?php echo inttomoney($value['ppi_quantity']) ?>
                    </td>
                    <td>
                      <?php echo $value['ppi_unit'] ?>
                    </td>
                    <td class="text-right">
                      <?php echo inttomoney($value['ppi_price']) ?>
                    </td>
                    <td class="text-right" style="display: none;">
                      <?php echo (!empty($value['ppi_ppn'])) ? " PPN (".$value['ppi_ppn']."%) " : "" ?> 
                      <?php echo (!empty($value['ppi_pph'])) ? " PPH (".$value['ppi_pph']."%)" : "" ?> 
                    </td>
                    <td class="text-right">
                      <?php echo inttomoney($value['ppi_price']*$value['ppi_quantity']) ?>
                    </td>
                  </tr>

                  <?php 
                  $subtotal += $value['ppi_price']*$value['ppi_quantity'];
                  if(!empty($value['ppi_ppn'])){
                    $subtotal_ppn += $value['ppi_price']*$value['ppi_quantity']*($value['ppi_ppn']/100);
                  }
                  if(!empty($value['ppi_pph'])){
                  $subtotal_pph += $value['ppi_price']*$value['ppi_quantity']*($value['ppi_pph']/100);
                }
              } } ?>

            </tbody>
          </table>

          <hr>

          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label text-right">Nilai HPS</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_alokasi"> <?php echo inttomoney($subtotal) ?></p>
              <input type="hidden" name="total_alokasi_inp" id="total_alokasi_inp" value="<?php echo $subtotal ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label text-right">Total Nilai Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_pagu"><?php echo inttomoney($permintaan['pr_pagu_anggaran']) ?></p>
              <input type="hidden" name="total_pagu_inp" id="total_pagu_inp" value="<?php echo $permintaan['pr_pagu_anggaran'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label text-right">Sisa Nilai Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="sisa_pagu">
                <?php echo inttomoney($permintaan['pr_sisa_anggaran']-($subtotal+$subtotal_ppn+$subtotal_pph)) ?></p>
                <input type="hidden" name="sisa_pagu_inp" id="sisa_pagu_inp" 
                value="<?php echo $permintaan['pr_sisa_anggaran']-($subtotal+$subtotal_ppn+$subtotal_pph) ?>">
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      <?php if (!$perencanaan['ppm_is_integrated']) {?>
        $('.int_item').css('display','none');
      <?php } else { ?>
        $('.int_item').css('display','');
      <?php } ?>
      $('[data-toggle="popover"]').popover();

    })

  </script>
<?php } ?>