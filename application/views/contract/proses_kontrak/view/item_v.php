 <?php $ctr_type = (isset($kontrak['contract_type'])) ? $kontrak["contract_type"] : ""; ?>
 <div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Daftar Sumberdaya</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Sumberdaya</th>                  
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                        <th>Incoterm</th>
                        <th>Lokasi Incoterm</th>
                        <th>RAB</th>
                        <th>Subtotal RAB</th>
                        <th>Keterangan</th>
                        <th style="display: none;">Pajak</th>
                      </tr>

                    </thead>

                    <tbody>

                      <?php 
                      $subtotal = 0;
                      $subtotal_ppn = 0;
                      $subtotal_pph = 0;
                      foreach ($item as $key => $value) { ?>

                      <tr>
                        <td class="align-middle"><?php echo $key+1 ?></td>
                        <td class="align-middle"><?php echo $value['item_code'] ?></td>
                        <td class="align-middle"><?php echo $value['short_description'] ?></td>
                        <td class="text-right align-middle"><?php echo inttomoney($value['qty']) ?></td>
                        <td class="align-middle"><?php echo $value['uom'] ?></td>
                        <td class="text-right align-middle"><?php echo inttomoney($value['price']) ?>
                          <input type="hidden" class="form-control price" value="<?php echo $value['price'] ?>">
                        </td>
                        <td class="text-right align-middle"><?php echo inttomoney($value['sub_total']) ?></td>                  
                        <td class="align-middle">-</td>
                        <td class="align-middle">-</td>
                        <td class="align-middle"><?php echo inttomoney($value['price']) ?></td>
                        <td class="align-middle"><?php echo inttomoney((int)$value['price_rab'] * (int)$value['qty']);?></td>
                        <td class="text-right align-middle" style="width:300px">
                          <input type="text" disabled name="note[<?php echo $value['contract_item_id'] ?>]" class="form-control" value="<?php echo $value['note'] ?>">
                        </td>  
                        <td style="display: none;">
                          <?php echo (!empty($value['ppn'])) ? " PPN (".$value['ppn']."%) " : "" ?> 
                          <?php echo (!empty($value['pph'])) ? " PPH (".$value['pph']."%)" : "" ?> 
                        </td>
                      </tr>
                      <?php 
                      $subtotal += $value['price']*$value['qty'];
                      if(!empty($value['ppn'])){
                        $subtotal_ppn += $value['price']*$value['qty']*($value['ppn']/100);
                      }
                      if(!empty($value['pph'])){
                      $subtotal_pph += $value['price']*$value['qty']*($value['pph']/100);
                    }
                  } ?>

                </tbody>

              </table>
            </div>

            <div class="row form-group mt-3">
            <div class="col-sm-5"></div>
            <label class="col-sm-5 control-label text-right text-bold-700">Nilai Kontrak</label>
            <div class="col-sm-2">
              <?php $nilai_kontrak = (isset($kontrak['contract_amount'])) ? inttomoney($kontrak['contract_amount']) : 0; ?>
              <p class="form-control-static text-right text-bold-700"> <?php echo $nilai_kontrak ?></p>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-sm-5"></div>
            <label class="col-sm-5 control-label text-right text-bold-700">Total RAB</label>
            <div class="col-sm-2">
              <?php $totalrab = (isset($subtotal_rab['subtotal_rab'])) ? inttomoney($subtotal_rab['subtotal_rab']) : 0; ?>
              <p class="form-control-static text-right text-bold-700"> <?php echo $totalrab ?></p>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-sm-5"></div>
            <label class="col-sm-5 control-label text-right text-bold-700">Efisiensi/Inefisiensi</label>
            <div class="col-sm-2">
              <p class="form-control-static text-right text-bold-700"> <?php echo inttomoney($subtotal_rab['subtotal_rab'] - $kontrak['contract_amount']); ?></p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
