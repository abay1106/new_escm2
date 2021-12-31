<div class="wrapper wrapper-content animated fadeInRight">
  <form method="post" action="<?php echo site_url($controller_name."/submit_verifikasi_doc_pq");?>"  class="form-horizontal">

    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Header</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div> 
          <div class="ibox-content">

           <?php $curval = $header['vendor_name']; ?>
           <div class="form-group">
            <label class="col-sm-3 control-label">Nama Vendor</label>
            <div class="col-sm-8">
              <p class="form-control-static" id="vendor_name_inp"><a href="<?php echo site_url('vendor/daftar_vendor/lihat_detail_vendor/'.$header['vendor_id']) ?>" target="_blank"><?php echo $curval ?></a></p>
            </div>
            <input type="hidden" name="id" value="<?=$header['vdp_id']?>">
          </div>

          <?php $curval = $header['address_street']; ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <p class="form-control-static">
              <?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = $header['vtm_name'] ." - ". $header['vtm_description']?>
            <div class="form-group">
               <label class="col-sm-3 control-label">Tipe Vendor <br> (Dokumen PQ/Tambahan)</label>
              <div class="col-sm-8">
                  <p class="form-control-static">
                    <?php echo $curval ?></p>
                </div>
            </div>

          <?php $curval = $header['avd_name']?>
            <div class="form-group">
               <label class="col-sm-3 control-label">Template</label>
              <div class="col-sm-8">
                  <p class="form-control-static">
                    <?php echo $curval ?></p>
                </div>
            </div>

          <?php $curval = $header['status_vendor']; ?>
          <div class="form-group">
            <label class="col-sm-3 control-label">Status Vendor</label>
            <div class="col-sm-8">
              <p class="form-control-static">
              <?php echo $curval ?></p>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Nilai SHE</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" name="vendor_id[]"  value="<?php echo $header['vdp_id']?>">
              <input type="number" class="form-control" name="SHE" placeholder="Masukkan SHE 0 - 100" maxlength="100" value="">
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-8" style="margin-top:20px">
              <div class="col-md-6 col-sm-6 alert alert-dismissible alert-info">
              <strong>Keterangan</strong><br/>
              0 - 60&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Risiko Rendah<br/>
              61 - 80&nbsp;&nbsp;&nbsp;&nbsp;: Risiko Menengah<br/>
              81 - 100&nbsp;&nbsp;: Risiko Tinggi<br/>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Dokumen PQ</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div> 
          <div class="ibox-content">

            <table class="table comment">
              <thead>
                <tr>
                  <th>Nama Dokumen</th>
                  <th>File</th>
                  <!-- <th>SHE</th> -->
                </tr>
              </thead>
              <tbody>

              <?php if(isset($files) && !empty($files)){ 

                foreach ($files as $key => $value) {
                ?>

              <tr>
                <td><?php echo $value['vdd_name'] ?></td>
                <td>
                  <a href="<?php echo site_url('log/download_attachment_extranet/Dokumen PQ/'.$header['vendor_id'].'/'.$value['doc_file']) ?>"><?=$value['doc_file'] ?></a>    
                </td>
              </tr>
              <?php } } ?>
                
              </tbody>
              
            </table>
        </div>
      </div>
    </div>


  </div>

  <?php $i=0; include(VIEWPATH."/comment_workflow_v.php") ?>

  <div class="row">
    <div class="col-md-12">
      <div style="margin-bottom: 60px;">
        <?php echo buttonsubmit('vendor/daftar_pekerjaan',lang('back'),lang('save')) ?>
      </div>
    </div>
  </div>

</form>
</div>