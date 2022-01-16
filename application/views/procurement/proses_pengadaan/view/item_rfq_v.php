<section>		
  <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Item</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
              <table class="table table-bordered" id="item_table"> <!-- with class default before -->
              <thead>
                <tr>
                  <th>#</th>
                  <?php if($permintaan['isjoin'] == 1) { ?>
                  <th>No. PR</th> <?php } ?>
                  <th>Kode</th>
                  <th>Tipe</th>
                  <th>Item</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Harga Satuan<br/><!-- (Sebelum Pajak) --></th>
                  <!-- <th>Pajak</th> -->
                  <th>Subtotal<br/><!-- (Sebelum Pajak) --></th>
                  <th>Tujuan<br/><!-- (Sebelum Pajak) --></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $subtotal = 0;
                $subtotal_ppn = 0;
                $subtotal_pph = 0;
                foreach ($item as $key => $value) { 
                  ?>
                  <tr>
                    <td><?php echo $key+1 ?></td><?php if($permintaan['isjoin'] == 1) { ?>
                    <td>
                      <?php 
                      echo "<a href='".site_url()."/procurement/detail_join/".$value['pr_number']. "' target='_blank'>";
                      echo $value['pr_number'] 
                      ?></a>
                    </td>
                    <?php } ?>
                    <td><?php echo $value['tit_code'] ?></td>
                    <input style="display: none" type="text" name="tit_code_inp[]" id="tit_code_inp" value="<?php echo $value['tit_id'] ?>">
                    <td><?php echo $value['tit_type'] ?></td>
                    <td><?php echo $value['tit_description'] ?></td>
                    <td class="text-right"><?php echo inttomoney($value['tit_quantity']) ?></td>
                    <td><?php echo $value['tit_unit'] ?></td>
                    <td class="text-right"><?php echo inttomoney($value['tit_price']) ?></td>
                    <td class="text-right">
                    <?php echo inttomoney($value['tit_price']*$value['tit_quantity']) ?>
                    </td>
                    <td><?php echo $value['tit_tujuan'] ?></td>
                  </tr>
                  <?php 
                  $subtotal += $value['tit_price']*$value['tit_quantity'];
                  if(!empty($value['tit_ppn'])){
                    $subtotal_ppn += $value['tit_price']*$value['tit_quantity']*($value['tit_ppn']/100);
                  }
                  if(!empty($value['tit_pph'])){
                  $subtotal_pph += $value['tit_price']*$value['tit_quantity']*($value['tit_pph']/100);
                }
                } ?>
            </tbody>
          </table>

          <hr>

          <div class="row form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Nilai HPS</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_alokasi"> <?php echo inttomoney($subtotal) ?></p>
              <input type="hidden" name="total_alokasi_inp" id="total_alokasi_inp" value="<?php echo $subtotal ?>">
            </div>
          </div>

          <?php if($permintaan['isjoin'] != 1) { ?>
          <div class="row form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Total Nilai Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_pagu"><?php echo inttomoney($permintaan['ptm_pagu_anggaran']) ?></p>
              <input type="hidden" name="total_pagu_inp" id="total_pagu_inp" value="<?php echo $permintaan['ptm_pagu_anggaran'] ?>">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Sisa Nilai Anggaran</label>
            <div class="col-sm-3">
            <p class="form-control-static text-right" id="sisa_pagu"><?php echo inttomoney($permintaan['ptm_pagu_anggaran']-($subtotal+$subtotal_ppn+$subtotal_pph)) ?></p>
            <input type="hidden" name="sisa_pagu_inp" id="sisa_pagu_inp" value="<?php echo $permintaan['ptm_pagu_anggaran']-($subtotal+$subtotal_ppn+$subtotal_pph) ?>">
            </div>
          </div>
          <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    <?php if (isset($permintaan['ptm_project_name'])) { ?>
      $('.int_item').css('display','');
    <?php } else{ ?>
      $('.int_item').css('display','none');
    <?php } ?>
    $('[data-toggle="popover"]').popover();
  });
</script>