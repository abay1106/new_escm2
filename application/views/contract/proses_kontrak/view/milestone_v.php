<?php $contract_type = (isset($kontrak['contract_type'])) ? $kontrak["contract_type"] : "";
//if($contract_type != "HARGA SATUAN"){ ?>

<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Milestone / Termin Pembayaran</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Nilai</th>
                    <th>Progress (%)</th>
                    <th>Tanggal Target</th>
                    <th>Lampiran</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>    

                  <?php 
                    $no = 1;
                    if(isset($milestone) && !empty($milestone)){
                      foreach ($milestone as $key => $value) { 
                      $myid = $key+1;
                  ?>

                  <tr>   
                    <td><?php echo $no++; ?></td>                      
                    <td>
                      <?php echo $value['description'] ?>
                    </td>
                    <td class="money text-right">
                      <?php echo inttomoney($value['nilai']) ?>
                    </td>
                    <td class="money text-right">
                      <?php echo inttomoney($value['percentage']) ?>
                    </td>
                    <td class="text-right">
                      <?php echo date("Y-m-d",strtotime($value['target_date'])) ?>
                    </td>
                    <td>
                      <a href='<?php echo site_url("log/download_attachment/contract/milestone/".$value['milestone_file']) ?>' target="_blank"><?php echo $value['milestone_file'] ?></a>                      
                    </td>
                    <td>
                      <?php echo $value['note'] ?>
                    </td>
                  </tr>

                  <?php } } ?>    

                </tbody>
              </table>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php // } ?>