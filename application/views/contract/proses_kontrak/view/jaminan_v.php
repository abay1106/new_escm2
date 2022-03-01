
<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Jaminan</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Jaminan</th>
                  <th>Tipe Jaminan</th>
                  <th>Nama Perusahaan</th>
                  <th>Nomor Jaminan</th>
                  <th>Alamat</th>
                  <th>Nilai Jaminan</th>
                  <th>Masa Berlaku</th>
                  <th>Lampiran</th>
                </tr>
              </thead>
              <tbody>      
                  <?php 
                    $no = 1;
                    if(isset($jaminan) && !empty($jaminan)){
                      foreach ($jaminan as $key => $value) { 
                      $myid = $key+1;
                  ?>

                  <tr>   
                    <td><?php echo $no++; ?></td>                      
                    <td>
                      <?php echo $value['cj_jenis_jaminan'] ?>
                    </td>
                    <td>
                      <?php echo $value['cj_tipe_jaminan'] ?>
                    </td>
                    <td>
                      <?php echo $value['cj_nama_perusahaan'] ?>
                    </td>
                    <td>
                      <?php echo $value['cj_nomor_jaminan'] ?>
                    </td>
                    <td>
                      <?php echo $value['cj_alamat'] ?>
                    </td>
                    <td class="money text-right">
                      <?php echo inttomoney($value['cj_nilai']) ?>
                    </td>                  
                    <td class="text-right">
                      <?php echo $value['cj_date_start'] . ' / ' . $value['cj_date_end'] ?>                      
                    </td>                  
                    <td>
                      <a href='<?php echo site_url("log/download_attachment/contract/jaminan/".$value['cj_lampiran']) ?>' target="_blank"><?php echo $value['cj_lampiran'] ?></a>                      
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
