<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>ITEM EAUCTION</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">

        <table class="table table-bordered default" id="item_table">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Tipe</th>
              <th>Item</th>
              <th>Jumlah</th>
              <th>Satuan</th>
              <th>Harga Satuan<!-- <br/>(Sebelum Pajak) --></th>
              <th class="type_b">Harga Penurunan</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $total = 0;
            foreach ($item as $key => $value) { 
              $subtotal = $value['tit_price']*$value['tit_quantity']; 
              $total += $subtotal;
              $val = (isset($eauction_detail[$value['tit_id']])) ? $eauction_detail[$value['tit_id']] : 0
              ?>
              <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value['tit_code'] ?></td>
                <td><?php echo $value['tit_type'] ?></td>
                <td><?php echo $value['tit_description'] ?></td>
                <td class="text-right"><?php echo inttomoney($value['tit_quantity']) ?></td>
                <td><?php echo $value['tit_unit'] ?></td>
                <td class="text-right"><?php echo inttomoney($value['tit_price']) ?></td>
                <td class="text-right type_b">
                <input type="text" class="form-control money" name="harga_penurunan[<?php echo $value['tit_id'] ?>]" value="<?php echo $val ?>">
                </td>
                <td class="text-right"><?php echo inttomoney($subtotal) ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

          <?php /*

          <hr>

          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Total PR</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_alokasi"> <?php echo inttomoney($total) ?></p>
              <input type="hidden" name="total_alokasi_inp" id="total_alokasi_inp" value="<?php echo $total ?>">
            </div>
          </div>

          <!-- <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">PPN</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="ppn"><?php echo inttomoney($total*0.1) ?></p>
              <input type="hidden" name="ppn_inp" id="ppn_inp" value="<?php echo $total*0.1 ?>">
            </div>
          </div> -->

          <!-- <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Total PR Setelah PPN</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right text-red" id="total_alokasi_ppn"><?php echo inttomoney($total+($total*0.1)) ?></p>
              <input type="hidden" name="total_alokasi_ppn_inp" id="total_alokasi_ppn_inp" value="<?php echo $total+($total*0.1) ?>">
            </div>
          </div> -->

          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Total Pagu Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="total_pagu"><?php echo inttomoney($permintaan['ptm_pagu_anggaran']) ?></p>
              <input type="hidden" name="total_pagu_inp" id="total_pagu_inp" value="<?php echo $permintaan['ptm_pagu_anggaran'] ?>">
            </div>
          </div>

<!--           <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Sisa Pagu Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="sisa_pagu"><?php echo inttomoney($permintaan['ptm_pagu_anggaran']-($total+($total*0.1))) ?></p>
              <input type="hidden" name="sisa_pagu_inp" id="sisa_pagu_inp" value="<?php echo $permintaan['ptm_pagu_anggaran']-($total+($total*0.1)) ?>">
            </div>
          </div> -->
          <div class="form-group">
            <div class="col-sm-5">
            </div>
            <label class="col-sm-4 control-label">Sisa Pagu Anggaran</label>
            <div class="col-sm-3">
              <p class="form-control-static text-right" id="sisa_pagu"><?php echo inttomoney($permintaan['ptm_pagu_anggaran']-($total)) ?></p>
              <input type="hidden" name="sisa_pagu_inp" id="sisa_pagu_inp" value="<?php echo $permintaan['ptm_pagu_anggaran']-($total) ?>">
            </div>
          </div>
  

        */ ?>

        </div>


      </div>
    </div>
  </div>