<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>ITEM MULTI WINNER</h5>
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
              <!-- <th style="display: none;">Pajak</th> -->
              <th>Subtotal<!-- <br/>(Sebelum Pajak) --></th>
              <th>Penunjukan Pemenang</th>
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
                <td><?php echo $key+1 ?></td>
                <td name="tit_code"><?php echo $value['tit_code'] ?></td>
                <td><?php echo $value['tit_type'] ?></td>
                <td><?php echo $value['tit_description'] ?></td>
                <td class="text-right"><?php echo inttomoney($value['tit_quantity']) ?></td>
                <td><?php echo $value['tit_unit'] ?></td>
                <td class="text-right"><?php echo inttomoney($value['tit_price']) ?></td>
                <!-- <td class="text-right" style="display: none;">
                  <?php echo (!empty($value['tit_ppn'])) ? " PPN (".$value['tit_ppn']."%) " : "" ?> 
                  <?php echo (!empty($value['tit_pph'])) ? " PPH (".$value['tit_pph']."%)" : "" ?> 
                </td> -->
                <td class="text-right">
                  <?php echo inttomoney($value['tit_price']*$value['tit_quantity']) ?>
                  <?php 
                  $subtotal += $value['tit_price']*$value['tit_quantity'];
                  if(!empty($value['tit_ppn'])){
                    $subtotal_ppn += $value['tit_price']*$value['tit_quantity']*($value['tit_ppn']/100);
                  }
                  if(!empty($value['tit_pph'])){
                   $subtotal_pph += $value['tit_price']*$value['tit_quantity']*($value['tit_pph']/100);
                 }
                 ?>
               </td>
               <td>
                <select class="form-control" name="winner_inp[<?php echo $value['tit_id'] ?>]" id="winner_inp" required>
                  <option value="">--Pilih--</option>
                  <?php foreach ($evaluation as $key => $value) {
                    if($value['adm'] == "Lulus" && $value['pass'] == "Lulus"){
                     ?>
                     <option value="<?php echo $value['ptv_vendor_code'] ?>"><?php echo $value['vendor_name'] ?> (<?php echo inttomoney($value['total']) ?>)</option>
                   <?php } } ?>
                 </select>
               </td>
             <?php } ?>
           </tr>
           
         </tbody>
       </table>

    
  </div>
</div>
