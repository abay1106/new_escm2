<?php /*if($prep['ptp_prequalify'] == 2){ 
  include(VIEWPATH."procurement/proses_pengadaan/view/header_rfq_v.php");
} else { */ ?>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>HEADLINE</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">

          <?php $curval = (isset($permintaan['ptm_number'])) ? $permintaan['ptm_number'] : "AUTO"; ?>

          <div class="form-group">
            <label class="col-sm-2 control-label">No. Tender</label>
            <div class="col-sm-10">
             <p class="form-control-static"><?php echo $curval ?></p>
           </div>
         </div>

         <?php $curval = (isset($permintaan['ptm_requester_name'])) ? $permintaan['ptm_requester_name'] : $userdata['complete_name']; ?>

         <div class="form-group">
          <label class="col-sm-2 control-label">User</label>
          <div class="col-sm-10">
           <p class="form-control-static"><?php echo $curval ?></p>
         </div>
       </div>

       <?php $curval = (isset($permintaan['ptm_requester_pos_name'])) ? $permintaan['ptm_requester_pos_name'] : $pos['dept_name']; ?>

       <div class="form-group">
        <label class="col-sm-2 control-label">Divisi/Departemen</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $curval ?></p>
        </div>
      </div>


      <?php $curval = $permintaan["ptm_subject_of_work"]; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama Pekerjaan</label>
        <div class="col-sm-8">
          <p class="form-control-static" id="nama_pekerjaan"><?php echo $curval ?></p>

        </div>

      </div>

      <?php $curval = (isset($permintaan['ptm_scope_of_work'])) ? $permintaan["ptm_scope_of_work"] : set_value("deskripsi_pekerjaan"); ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi Pekerjaan</label>
        <div class="col-sm-10">
          <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>

        </div>
      </div>

      <!-- haqim -->
      <?php $curval = (isset($permintaan['ptm_project_name'])) ? $permintaan["ptm_project_name"] : set_value("nama_proyek"); 
      if (isset($permintaan['ptm_project_name'])) { ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama Proyek</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>

          </div>
        </div>
      <?php  }
      ?>

      <!-- end -->


      <?php if ($permintaan['isjoin'] != 1) { ?>

        <?php 
        $code = (isset($permintaan['ptm_mata_anggaran']) && !empty($permintaan['ptm_mata_anggaran'])) ? $permintaan['ptm_mata_anggaran'] : null;
        $label = (isset($permintaan['ptm_nama_mata_anggaran']) && !empty($permintaan['ptm_nama_mata_anggaran'])) ? $permintaan['ptm_nama_mata_anggaran'] : null;
        $curval = (!empty($code) && !empty($label)) ? $code." ".$label : null; 
        ?>

        <?php if(!empty($curval)){ ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Mata Anggaran</label>
            <div class="col-sm-10">
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
       ?>
       <?php if(!empty($curval)){ ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Sub Mata Anggaran</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="sub_mata_anggaran"><?php 

            if (isset($code)) {
              foreach (array_combine($code, $name) as $code => $name ) {
                echo $code.' - '.$name."<br/>";
              }
            }else if ($permintaan["ptm_sub_mata_anggaran"] == 0) {
             foreach ($project_cost as $keypc => $valuepc) {
               echo $valuepc['coa_code'].' - '.$valuepc['coa_name']."<br/>";
             }
           }else{
            echo $curval;
          } 

          ?></p>
        </div>
      </div>
    <?php } ?>

    <?php $curval = (isset($permintaan['ptm_pagu_anggaran'])) ? inttomoney($permintaan["ptm_pagu_anggaran"]) : set_value("pagu_anggaran"); ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nilai Anggaran</label>
      <div class="col-sm-4">
        <p class="form-control-static" id="pagu_anggaran"><?php echo $curval ?></p>
      </div>
    </div>

    <?php $curval = (isset($permintaan['ptm_sisa_anggaran'])) ? inttomoney($permintaan["ptm_sisa_anggaran"]) : set_value("sisa_anggaran") ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Sisa Anggaran</label>
      <div class="col-sm-4">
        <p class="form-control-static" id="sisa_anggaran"><?php echo $curval ?></p>
      </div>
    </div>

  <?php } ?>
<?php /*
    <?php $curval = (isset($permintaan['ptm_district_id'])) ? $permintaan["ptm_district_id"] : set_value("lokasi_kebutuhan_inp"); ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Lokasi Kebutuhan *</label>
      <div class="col-sm-5">
       <select class="form-control" required name="lokasi_kebutuhan_inp" value="<?php echo $curval ?>">
         <option value=""><?php echo lang('choose') ?></option>
         <?php foreach($district_list as $key => $val){
          $selected = ($val['district_id'] == $curval) ? "selected" : ""; 
          ?>
          <option <?php echo $selected ?> value="<?php echo $val['district_id'] ?>"><?php echo $val['district_code'] ?> - <?php echo $val['district_name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    */ ?>

      <?php /*
      <?php $curval = $permintaan["ptm_delivery_point"]; ?>
        <div class="form-group">
          <label class="col-sm-2 control-label">Lokasi Pengiriman</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="lokasi_pengiriman"><?php echo $curval ?></p>
          </div>
        </div>
      */ ?>


      <!-- haqim -->
      <div class="form-group">
        <label class="col-sm-2 control-label">Message</label>
        <div class="col-sm-10">
          <button type="button" id="chatBtn" class="btn btn-primary" data-toggle="modal" data-target="#chatModal">Message</button>
        </div>
      </div>

      <?php if ($permintaan['isjoin'] != 1) { ?>

        <?php $curval = $permintaan['ptm_packet']?>

        <?php if(!empty($curval)){ ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Paket</label>
            <div class="col-sm-10">
              <p class="form-control-static" id="nama_paket"><?php echo $curval ?></p>
            </div>
          </div>
        <?php } ?>

        <?php $curval = (isset($permintaan['pr_type'])) ? $permintaan["pr_type"] : set_value("pr_type"); ?>
        
        <?php if(!empty($curval)){ ?>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis PR</label>
            <div class="col-sm-10">
              <p class="form-control-static" id="deskripsi_pekerjaan"><?php echo $curval ?></p>
            </div>
          </div>
        <?php } ?>

      <?php } ?>
      <!-- end -->

      <?php $curval = (isset($permintaan['ptm_contract_type'])) ?  $permintaan["ptm_contract_type"] : set_value("jenis_kontrak_inp"); 
      $isdisable = ($permintaan['ptm_status'] == 1141) ? "disabled" : ""; 
      ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Kontrak *</label>
        <div class="col-sm-5">
         <select <?php echo $isdisable ?> class="form-control" required name="jenis_kontrak_inp" value="<?php echo $curval ?>">
          <option  value=""><?php echo lang('choose') ?></option>
          <?php foreach($contract_type as $key => $val){
            $selected = ($key == $curval) ? "selected" : ""; 
            ?>
            <option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $val ?></option>
          <?php } ?>
        </select>
      </div>
    </div>



    <?php if($permintaan['ptm_status'] >= 1141) { 
      $curval = (isset($permintaan['ptm_winner'])) ? $permintaan["ptm_winner"] : set_value("winner_type_inp");
      ?>
      <div class="form-group sentralisasi" style="display: inline">
        <label class="col-sm-2 control-label">Tipe pemenang</label>
        <div class="col-sm-10">
          <div class="checkbox">
            <?php $curval = set_value("multiwin"); ?>
            <div class="i-checks col-lg-3">
              <label class=""> 
                <div class="<?php echo $winner['clascheck'] ?>" style="position: relative;">
                  <input type="checkbox" <?php echo $winner['disable'] ?> value="1" name="winner_type_inp" id="tipe" data-tipe="sw" style="position: absolute; opacity: 0;" <?php echo $winner['check']; ?>>
                  <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                  </ins>
                </div>
                <i></i>&nbsp;&nbsp; Single Winner 
              </label>
            </div>
            <div class="i-checks col-lg-3">
              <label class=""> 
                <div class="<?php echo $winner['clascheck2'] ?>" style="position: relative;">
                  <input type="checkbox" value="2" <?php echo $winner['disable'] ?> name="winner_type_inp" id="tipe" data-tipe="mw" style="position: absolute; opacity: 0;" <?php echo $winner['check2']; ?>>
                  <ins class="iCheck-helper" checked style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                  </ins>
                </div> 
                <i></i>&nbsp;&nbsp; Multiple Winner 
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

  $(document).ready(function(){

    function check_plan_tender(){
      var id = $("#perencanaan_pengadaan_inp").val();
      var url = "<?php echo site_url('Procurement/data_perencanaan_pengadaan') ?>";
      $.ajax({
        url : url+"?id="+id,
        dataType:"json",
        success:function(data){
          var mydata = data.rows[0];
          $("#nama_pekerjaan").text(mydata.ppm_subject_of_work);
          $("#deskripsi_pekerjaan").text(mydata.ppm_scope_of_work);
          $("#mata_anggaran").text(mydata.ppm_mata_anggaran+" - "+mydata.ppm_nama_mata_anggaran);
          $("#sub_mata_anggaran").text(mydata.ppm_sub_mata_anggaran+" - "+mydata.ppm_nama_sub_mata_anggaran);
          $("#pagu_anggaran").text(mydata.ppm_pagu_anggaran);
          $("#sisa_anggaran").text(mydata.ppm_sisa_anggaran);
        }
      });
    }

    $(document.body).on("change","#perencanaan_pengadaan_inp",function(){

      check_plan_tender();

    });

  });
///////////////////////////////////////////////////////
$('input[type=checkbox][data-tipe=sw]').change(function() {
  if ($(this).is(':checked')) {
    $('.mustCheckWinner').addClass('checked');
    $('.mustCheckWinner2').removeClass('checked');
    $('input[type=checkbox][data-tipe=mw]').attr("checked",false);
  } else {
   $('.mustCheckWinner').removeClass('checked');
 }
});

$('input[type=checkbox][data-tipe=mw]').change(function() {
  if ($(this).is(':checked')) {
    $('.mustCheckWinner2').addClass('checked');
    $('.mustCheckWinner').removeClass('checked');
    $('input[type=checkbox][data-tipe=sw]').attr("checked",false);
  } else {
   $('.mustCheckWinner2').removeClass('checked');
 }
});

<?php if($permintaan["ptm_status"] == 1141){ ?>
  $("#formtender").submit(function(e){
    var win;
    win = $("input[name='winner_type_inp']:checked").val();
    console.log(win);
    if(win == null ){
      alert("Tipe pemenang harus dipilih")
      e.preventDefault()
      $('html, body').animate({
        scrollTop: $("#chatBtn").offset().top
      }, 1000)
    }
  });
<?php } ?>

</script>

<?php //} ?>