<?php $jadwal_tahap_2 = ($prep['ptp_submission_method'] == 2 && $activity_id >= 1112); ?>

<section>		
  <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Jadwal Pengadaan</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
              <div class="row form-group">
                <label class="col-sm-2 control-label">Tanggal Pembukaan Pendaftaran *</label>
                <div class="col-sm-4">
                  <?php $curval = $prep['ptp_reg_opening_date']; ?>
                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_pembukaan_pendaftaran_inp" class="form-control tgl_pembukaan_pendaftaran_inp" required id="tgl_pembukaan_pendaftaran_inp" value="<?php echo $curval ?>">
                  </div>
                    <div style="color: red; display: none;" id="alert_buka">Tanggal pembukaan pendaftaran harus diisi</div>
                </div>

                <?php $curval = $prep['ptp_quot_opening_date']; ?>
                <label class="col-sm-2 control-label">Tanggal Mulai Kirim Penawaran *</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_mulai_penawaran_inp" id="tgl_mulai_penawaran_inp" class="form-control  tgl_mulai_penawaran_inp" required value="<?php echo $curval ?>" >
                  </div>
                <div style="color: red; display: none;" id="alert_mulai">Tanggal mulai kirim pendaftaran harus diisi</div>
                </div>
                </div>

                <div class="row form-group">

                <?php $curval = $prep['ptp_reg_closing_date']; ?>
                <label class="col-sm-2 control-label">Tanggal Penutupan Pendaftaran *</label>
                <div class="col-sm-4">

                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_penutupan_pendaftaran_inp" id="tgl_penutupan_pendaftaran_inp" required class="form-control  tgl_penutupan_pendaftaran_inp" value="<?php echo $curval ?>"  >
                  </div>
                    <div style="color: red; display: none;" id="alert_tutup">Tanggal penuntupan pendaftaran harus diisi</div>
                </div>

                <?php $curval = $prep['ptp_quot_closing_date']; ?>
                <label class="col-sm-2 control-label">Tanggal Akhir Kirim Penawaran *</label>
                <div class="col-sm-4">

                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_akhir_penawaran_inp" id="tgl_akhir_penawaran_inp" required class="form-control tgl_akhir_penawaran_inp" value="<?php echo $curval ?>" >
                  </div>
                    <div style="color: red; display: none;" id="alert_akhir">Tanggal kirim penawaran harus diisi</div>
                </div>

                </div>

                <div class="row form-group">

                <?php $curval = $prep['ptp_prebid_date']; ?>
                <label class="col-sm-2 control-label">Tanggal Aanwijzing *</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_aanwijzing_inp" id="tgl_aanwijzing_inp" class="form-control tgl_aanwijzing_inp" required value="<?php echo $curval ?>"  >
                  </div>
                    <div style="color: red; display: none;" id="alert_anwz">Tanggal aanwijzing harus diisi</div>
                </div>


                <?php $curval = $prep['ptp_doc_open_date']; ?>
                <label class="col-sm-2 control-label">Tanggal Pembukaan Dokumen Penawaran *</label>
                <div class="col-sm-4">

                  <div class="input-group date">
                    <?php if(!$jadwal_tahap_2){ ?>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <?php } ?>
                    <input <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> type="text" name="tgl_pembukaan_dok_penawaran_inp" required class="form-control tgl_pembukaan_dok_penawaran_inp" id="tgl_pembukaan_dok_penawaran_inp" value="<?php echo $curval ?>" >
                  </div>
                    <div style="color: red; display: none;" id="alert_doc">Tanggal pembukaan dokumen penawaran harus diisi</div>
                </div>

                </div>

                <div class="row form-group">
                <?php $curval = $prep['ptp_prebid_location']; ?>
                <label class="col-sm-2 control-label">Lokasi Aanwijzing</label>
                <div class="col-sm-4">
                  <textarea <?php echo ($jadwal_tahap_2) ? "disabled" : "" ?> class="form-control" id="lokasi_aanwijzing_inp" name="lokasi_aanwijzing_inp"><?php echo $curval ?></textarea>
                </div>

                <?php $curval = (!empty($prep['ptp_aanwijzing_online'])) ? "checked" : ""; ?>
                <label class="col-sm-2 control-label">Aanwijzing Online</label>
                <div class="col-sm-4">
                  <input type="checkbox" name="aanwijzing_online_inp" <?php echo $curval ?> value="1">
                </div>

                </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php if($jadwal_tahap_2){ ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          
          <div class="card-header border-bottom pb-2">
              <h4 class="card-title">Jadwal Pengadaan Tahap 2</h4>
          </div>

          <div class="card-content">
              <div class="card-body">
                  <div class="row form-group">
                  <?php $curval = $prep['ptp_tgl_aanwijzing2']; ?>
                  <label class="col-sm-2 control-label">Tanggal Aanwijzing Tahap 2 *</label>
                  <div class="col-sm-4">
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input  type="text" name="tgl_aanwijzing_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
                    </div>
                  </div>
                  <?php $curval = $prep['ptp_bid_opening2']; ?>
                  <label class="col-sm-2 control-label">Tanggal Mulai Kirim Penawaran Tahap 2 *</label>
                  <div class="col-sm-4">

                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input  type="text" name="tgl_mulai_penawaran_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
                    </div>

                  </div>
                  </div>

                  <div class="row form-group">
                  
                  <?php $curval = $prep['ptp_lokasi_aanwijzing2']; ?>
                  <label class="col-sm-2 control-label">Lokasi Aanwijzing Tahap 2</label>
                  <div class="col-sm-4">
                    <textarea required class="form-control" id="lokasi_aanwijzing_2_inp" name="lokasi_aanwijzing_2_inp"><?php echo $curval ?></textarea>
                  </div>
                  <?php $curval = $prep['ptp_bid_closing2']; ?>
                  <label class="col-sm-2 control-label">Tanggal Akhir Kirim Penawaran Tahap 2 *</label>
                  <div class="col-sm-4">

                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input  type="text" name="tgl_akhir_penawaran_2_inp" required class="form-control datetimepicker" value="<?php echo $curval ?>">
                    </div>

                  </div>
                  </div>
                  </div>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  <?php } ?>
</section>

<script type="text/javascript">

  $(document).ready(function(){

      $('.tgl_pembukaan_pendaftaran_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})
      $('.tgl_penutupan_pendaftaran_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})
      $('.tgl_aanwijzing_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})
      $('.tgl_mulai_penawaran_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})
      $('.tgl_akhir_penawaran_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})
      $('.tgl_pembukaan_dok_penawaran_inp').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})

      function prevDate($name){
        return $("[name="+$name+"]").val()
      }

  })

</script>