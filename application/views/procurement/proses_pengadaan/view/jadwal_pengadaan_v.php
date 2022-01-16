<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <h4 class="card-title">Jadwal Pengadaan</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div class="row form-group">
            <label class="col-sm-2 control-label">Tanggal Pembukaan Pendaftaran</label>
            <div class="col-sm-4">
              <?php $curval = (strtotime($prep['ptp_reg_opening_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_reg_opening_date'])) : ""; ?>
              <div class="input-group date">
                <p class="form-control-static"><?php echo $curval ?></p>
              </div>
            </div>

            <?php $curval = (strtotime($prep['ptp_quot_opening_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_quot_opening_date'])) : "" ; ?>
            <label class="col-sm-2 control-label">Tanggal Mulai Kirim Penawaran</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $curval ?></p>
            </div>

            </div>

            <div class="row form-group">

            <?php $curval = (strtotime($prep['ptp_reg_closing_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_reg_closing_date'])) : "" ; ?>
            <label class="col-sm-2 control-label">Tanggal Penutupan Pendaftaran</label>
            <div class="col-sm-4">

              <p class="form-control-static"><?php echo $curval ?></p>

            </div>

            <?php $curval = (strtotime($prep['ptp_quot_closing_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_quot_closing_date'])) : "" ; ?>
            <label class="col-sm-2 control-label">Tanggal Akhir Kirim Penawaran</label>
            <div class="col-sm-4">

            <p class="form-control-static"><?php echo $curval ?></p>

            </div>

            </div>

            <div class="row form-group">

            <?php $curval = (strtotime($prep['ptp_prebid_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_prebid_date'])) : "" ; ?>
            <label class="col-sm-2 control-label">Tanggal Aanwijzing</label>
            <div class="col-sm-4">
            <p class="form-control-static"><?php echo $curval ?></p>
            </div>


            <?php $curval = (strtotime($prep['ptp_doc_open_date']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_doc_open_date'])) : "" ; ?>
            <label class="col-sm-2 control-label">Tanggal Pembukaan Dokumen Penawaran</label>
            <div class="col-sm-4">

            <p class="form-control-static"><?php echo $curval ?></p>

            </div>

            </div>

            <div class="row form-group">
            <?php $curval = $prep['ptp_prebid_location']; ?>
            <label class="col-sm-2 control-label">Lokasi Aanwijzing</label>
            <div class="col-sm-4">
            <p class="form-control-static"><?php echo $curval ?></p>
            </div>
            <?php $curval = $prep['ptp_aanwijzing_online']; ?>
            <label class="col-sm-2 control-label">Aanwijzing Online</label>
            <div class="col-sm-4">
            <p class="form-control-static"><?php echo ($curval) ? "Ya" : "Tidak" ?></p>
            </div>

            </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php if($prep['ptp_submission_method'] == 2){ ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Jadwal Pengadaan Tahap 2</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
              <div class="row form-group">
              <?php $curval = (strtotime($prep['ptp_tgl_aanwijzing2']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_tgl_aanwijzing2'])) : ""; ?>
              <label class="col-sm-2 control-label">Tgl Aanwijzing Tahap 2</label>
              <div class="col-sm-4">
              <p class="form-control-static"><?php echo $curval ?></p>
              </div>

              <?php $curval = (strtotime($prep['ptp_tgl_aanwijzing2']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_tgl_aanwijzing2'])) : ""; ?>
              <label class="col-sm-2 control-label">Tanggal Mulai Kirim Penawaran Tahap 2</label>
              <div class="col-sm-4">
              <p class="form-control-static"><?php echo $curval ?></p>
              </div>
              </div>

              <div class="row form-group">

              <?php $curval = (empty($prep['ptp_lokasi_aanwijzing2'])) ? "" : $prep['ptp_lokasi_aanwijzing2'] ; ?>
              <label class="col-sm-2 control-label">Lokasi Aanwijzing Tahap 2</label>
              <div class="col-sm-4">
              <p class="form-control-static"><?php echo $curval ?></p>
              </div>
              <?php $curval = (strtotime($prep['ptp_bid_opening2']) > 0) ? date("d/m/Y H:i",strtotime($prep['ptp_bid_closing2'])) : ""; ?>
              <label class="col-sm-2 control-label">Tanggal Akhir Kirim Penawaran Tahap 2</label>
              <div class="col-sm-4">
              <p class="form-control-static"><?php echo $curval ?></p>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>

<?php } ?>