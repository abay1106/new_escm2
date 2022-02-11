<div class="container pt-3">
  <h4 class="card-title"><b>Paket Pengadaan Proyek</b></h4>
  <div class="row" style="line-height:0px;">
    <div class="col-md">
        <div class="card-content">
          <?php $curval = $permintaan['ptm_number']; ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Nomor Tender</label>
            <div class="col-sm-8">
              <p class="form-control-static"><?= $curval ?></p>
            </div>
          </div>
          <?php $curval = $permintaan['ptm_requester_name']; ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">User</label>
            <div class="col-sm-8">
              <p class="form-control-static"><?= $curval ?></p>
            </div>
          </div>

          <?php $curval = $permintaan['ptm_requester_pos_name']; ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Divisi/Departemen</label>
            <div class="col-sm-8">
              <p class="form-control-static"><?= $curval ?></p>
            </div>
          </div>

          <?php $curval = date(DEFAULT_FORMAT_DATETIME,strtotime($permintaan['ptm_created_date'])); ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Tanggal Pembuatan</label>
            <div class="col-sm-8">
              <p class="form-control-static"><?= $curval ?></p>
            </div>
          </div>

          <?php $curval = $permintaan["ptm_subject_of_work"]; ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Nama Pekerjaan</label>
            <div class="col-sm-8">
              <p class="form-control-static" id="nama_pekerjaan"><?php echo $curval ?></p>
            </div>
          </div>

          <?php $curval = $permintaan["ptm_scope_of_work"]; ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Deskripsi Pekerjaan</label>
            <div class="col-sm-8">
              <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>
            </div>
          </div>

      </div>
    </div>

    <div class="col-md">
        <div class="card-content">
        <!-- haqim -->
        <?php $curval = $permintaan['ptm_project_name'];
        if (isset($permintaan['ptm_project_name'])) { ?>
          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Nama Proyek</label>
            <div class="col-sm-8">
              <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>

            </div>
          </div>
        <?php  }
        ?>
        <?php if(isset($beritaAcaraAanwijzing) && !empty($beritaAcaraAanwijzing)){ ?>
        <div class="row form-group">
          <label class="col-sm-4 control-label text-left" style="line-height: 20px;">Download Berita Acara Aanwijzing</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $beritaAcaraAanwijzing ?></p>
          </div>
        </div>
        <?php } ?>
        <!-- end -->

        <?php if ($permintaan['isjoin'] != 1) { ?>

          <?php
          $code = (isset($permintaan['ptm_mata_anggaran']) && !empty($permintaan['ptm_mata_anggaran'])) ? $permintaan['ptm_mata_anggaran'] : null;
          $label = (isset($permintaan['ptm_nama_mata_anggaran']) && !empty($permintaan['ptm_nama_mata_anggaran'])) ? $permintaan['ptm_nama_mata_anggaran'] : null;
          $curval = (!empty($code) && !empty($label)) ? $code." ".$label : null;
          ?>

          <?php if(!empty($curval)){ ?>

          <div class="row form-group">
            <label class="col-sm-4 control-label text-left">Mata Anggaran</label>
            <div class="col-sm-8">
              <p class="form-control-static" id="mata_anggaran"><?php echo $curval ?></p>
            </div>
          </div>

        <?php } ?>

        <?php

        $curval = null;
        if (isset($permintaan["ptm_sub_mata_anggaran"]) and substr_count($permintaan["ptm_sub_mata_anggaran"], " , ") >= 1 ) {
        $code = explode(" , ", $permintaan["ptm_sub_mata_anggaran"]);
        $name = explode(" , ", $permintaan["ptm_nama_sub_mata_anggaran"]);
        $curval = $permintaan["ptm_sub_mata_anggaran"]." - ".$permintaan["ptm_nama_sub_mata_anggaran"];
      }

      if(!empty($curval)){ ?>

        <div class="row form-group">
          <label class="col-sm-4 control-label text-left">Sub Mata Anggaran</label>
          <div class="col-sm-8">
            <p class="form-control-static" id="sub_mata_anggaran"><?php
            if (isset($code)) {
              foreach (array_combine($code, $name) as $code => $name ) {
                echo $code.' - '.$name."<br/>";
              }
            }else if ($permintaan["ptm_sub_mata_anggaran"] == 0) {
            foreach ($project_cost as $keypc => $valuepc) {
              echo $valuepc['coa_code'].' - '.$valuepc['coa_name']."<br/>";
            }
          }
          else{
            echo $curval;
          }

          ?></p>
        </div>
      </div>

      <?php } ?>

      <?php $curval = $permintaan['ptm_currency']; ?>
      <div class="row form-group">
        <label class="col-sm-4 control-label text-left">Mata Uang</label>
        <div class="col-sm-8">
        <p class="form-control-static"><?php echo $curval ?></p>
      </div>
      </div>

      <?php $curval = inttomoney($permintaan["ptm_pagu_anggaran"]); ?>
      <div class="row form-group">
        <label class="col-sm-4 control-label text-left">Nilai Anggaran</label>
        <div class="col-sm-8">
          <p class="form-control-static" id="pagu_anggaran"><?php echo $curval ?></p>
        </div>
      </div>

      <?php $curval = inttomoney($permintaan["ptm_sisa_anggaran"]); ?>
      <div class="row form-group">
        <label class="col-sm-4 control-label text-left">Sisa Anggaran</label>
        <div class="col-sm-8">
          <p class="form-control-static" id="sisa_anggaran"><?php echo $curval ?></p>
        </div>
      </div>

      <?php } ?>

          <!-- haqim -->

          <?php if ($permintaan['isjoin'] != 1) { ?>
            <?php $curval = $permintaan['ptm_packet']?>

            <?php if(!empty($curval)){ ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-left">Nama Paket</label>
                  <div class="col-sm-8">
                    <p class="form-control-static" id="nama_paket"><?php echo $curval ?></p>
                  </div>
                </div>
            <?php } ?>

          <?php } ?>
          <!-- end -->

          <?php
          if($activity_id > 1030){
            $curval = $permintaan["ptm_contract_type"]; ?>
            <div class="row form-group">
              <label class="col-sm-4 control-label text-left">Jenis Kontrak</label>
              <div class="col-sm-8">
                <p class="form-control-static" id="jenis_kontrak"><?php echo $curval ?></p>
              </div>
            </div>
          <?php } ?>

          <?php if ($activity_id >= 1141) { ?>
            <div class="row form-group">
              <label class="col-sm-4 control-label text-left">Tipe Pemenang</label>
              <div class="col-sm-8">
                <div class="checkbox">
                  <?php
                  $curval = $permintaan["ptm_winner"];
                  ?>
                  <?php if($curval == "1"){
                    $mustCheckWinner = "checked";
                    $mustCheckWinner2 = "";
                  } else if ($curval == "2") {
                    $mustCheckWinner = "";
                    $mustCheckWinner2 = "checked";
                  } else {
                    $mustCheckWinner = "checked";
                    $mustCheckWinner2 = "";
                  }?>
                  <div class="i-checks col-lg-3">
                    <label class="">
                      <div class="iradio_square-green mustCheckWinner <?php echo $mustCheckWinner?>" style="position: relative;">
                        <input type="radio" value="1" name="tipe_inp" id="tipe" style="position: absolute; opacity: 0;" checked="">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                      </div> <i style="line-height: 20px;">&nbsp;&nbsp; Single Winner</i>
                    </label>
                  </div>

                  <div class="i-checks col-lg-3">
                    <label class="">
                      <div class="iradio_square-green mustCheckWinner2 <?php echo $mustCheckWinner2 ?> " style="position: relative;">
                        <input type="radio" value="2" name="tipe_inp" id="tipe" style="position: absolute; opacity: 0;">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                      </div> <i style="line-height: 20px;">&nbsp;&nbsp; Multiple Winner</i>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>

  </div>
</div>

<script type="text/javascript">
function printToPdf(){
    var css = '@page {size: auto; margin: 2 auto;}',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
      style.styleSheet.cssText = css;
    } else {
      style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    window.print();
  }
</script>
