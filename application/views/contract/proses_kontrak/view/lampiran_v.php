<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Dokumen</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dokumen</th>
                <th>Lampiran</th>
                <th>Request E-Sign</th>
                <th>Signor</th>
                <th>Tanggal Upload</th>
                <th>Keterangan</th>
                <th>Kirim ke Vendor?</th>
              </tr>
            </thead>

            <tbody>
            <?php 
            $sisa = 5;
            if(isset($document) && !empty($document)){
              foreach ($document as $k => $v) {
                if(!empty($v['filename'])){
                  ?>
                <tr>
                  <td><?php echo $k+1 ?></td>
                  <td><?php echo $v['name_input'] ?></td>
                  <td><a href="<?php echo site_url("log/download_attachment/contract/document/".$v['filename']) ?>" target="_blank"><?php echo $v['filename'] ?></a></td>
                  <td class="text-center">
                      <div class="custom-switch custom-switch-info">
                          <input type="checkbox" class="custom-control-input" disabled id="color-switch-1" <?php echo ($v['req_e_sign'] == "on") ? "checked" : "" ?>>
                          <label class="custom-control-label" for="color-switch-1"></label>
                      </div>  
                  </td>
                  <td><?php echo $v['signor'] ?></td>
                  <td><?php echo $v['upload_date'] ?></td>
                  <td><?php echo $v['description'] ?></td>
                  <td class="text-center">
                      <div class="custom-switch custom-switch-info">
                          <input type="checkbox" class="custom-control-input" disabled id="color-switch-2" <?php echo ($v['publish'] == "on") ? "checked" : "" ?>>
                          <label class="custom-control-label" for="color-switch-2"></label>
                      </div>  
                  </td>
                </tr>

                <?php } } } ?>
              </tbody>
            </table>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">Person In Charge</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>                   
                  <th>Jabatan</th>                   
                  <th>Divisi</th>                   
                  <th>Perusahaan</th>                   
                  <th>No. Telpon</th>                   
                  <th>Email</th>                   
                  <th>Keterangan</th>     
                </tr>
              </thead>
              <tbody>     
                <?php 
                  $no = 1;
                  if(isset($person) && !empty($person)){
                    foreach ($person as $key => $value) { 
                    $myid = $key+1;
                ?>

                <tr>   
                  <td><?php echo $no++; ?></td>                      
                  <td>
                    <?php echo $value['cp_nama_lengkap'] ?>
                  </td>
                  <td>
                    <?php echo $value['cp_jabatan'] ?>
                  </td>
                  <td>
                    <?php echo $value['cp_divisi'] ?>
                  </td>
                  <td>
                    <?php echo $value['cp_nama_perusahaan'] ?>
                  </td>
                  <td class="text-right">
                    <?php echo $value['cp_no_telp'] ?>
                  </td>                 
                  <td>
                    <?php echo $value['cp_email'] ?>
                  </td>                 
                  <td>
                    <?php echo $value['cp_note'] ?>
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

