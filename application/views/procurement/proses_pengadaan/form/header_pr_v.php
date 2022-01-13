<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <h4 class="card-title">Headline</h4>
      </div>

      <div class="card-content">
        <div class="card-body">
            <?php $curval = (isset($permintaan['pr_number'])) ? $permintaan['pr_number'] : "AUTO"; ?>

          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">No. Permintaan</label>
          <div class="col-sm-10">
            <p class="form-control-static"><?php echo $curval ?></p>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_requester_name'])) ? $permintaan['pr_requester_name'] : $userdata['complete_name']; ?>

          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">User</label>
          <div class="col-sm-10">
            <p class="form-control-static"><?php echo $curval ?></p>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_requester_pos_name'])) ? $permintaan['pr_requester_pos_name'] : $pos['dept_name']; ?>

          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Divisi/Departemen</label>
          <div class="col-sm-10">
          <p class="form-control-static"><?php echo $curval ?></p>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_subject_of_work'])) ?  $permintaan["pr_subject_of_work"] : set_value("nama_pekerjaan"); ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Nama Rencana Pengadaan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" required="true" name="nama_pekerjaan" id="nama_pekerjaan" value="<?php echo $curval ?>" readonly>
          </div>
          <div class="col-sm-2">
          <?php $curval = (isset($permintaan['ppm_id'])) ?  $permintaan["ppm_id"] : set_value("perencanaan_pengadaan_inp"); ?>
          <button type="button" data-id="perencanaan_pengadaan_inp" data-url="<?php echo site_url(PROCUREMENT_PERENCANAAN_PENGADAAN_PATH.'/picker') ?>" class="btn btn-info picker"><i class="fa fa-search"></i></button> 
          <input type="hidden" name="perencanaan_pengadaan_inp" required="true" value="<?php echo $curval ?>" id="perencanaan_pengadaan_inp"/>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_scope_of_work'])) ? $permintaan["pr_scope_of_work"] : set_value("deskripsi_pekerjaan"); ?>
          <div class="row form-group" hidden="hidden">
          <label class="col-sm-2 control-label text-right">Deskripsi Pekerjaan</label>
          <div class="col-sm-10">

          <textarea type="text" class="form-control" id="deskripsi_pekerjaan" required="true" name="deskripsi_pekerjaan" readonly><?php echo $curval ?></textarea>
          </div>
          </div>

          <!-- haqim -->
          <?php $curval = (isset($permintaan['pr_spk_code'])) ? $permintaan["pr_spk_code"] : set_value("nama_proyek"); ?>
          <div class="row form-group" id="kode_spk_div">
          <label class="col-sm-2 control-label text-right">Kode SPK</label>
          <div class="col-sm-8">
          <input type="text" class="form-control" name="spk_code" required="true" id="kode_spk" value="<?php echo $curval ?>" disabled>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_project_name'])) ? $permintaan["pr_scope_of_work"] : set_value("nama_proyek"); ?>
          <div class="row form-group" id="nama_proyek_div">
          <label class="col-sm-2 control-label text-right">Nama Proyek</label>
          <div class="col-sm-8">
          <input type="text" class="form-control" name="nama_pekerjaan" id="nama_proyek" required="true" value="<?php echo $curval ?>" disabled>
          </div>
          </div>
          <!-- end -->

          <?php 
          $code = (isset($permintaan['pr_mata_anggaran']) && !empty($permintaan['pr_mata_anggaran'])) ? $permintaan['pr_mata_anggaran'] : null;
          $label = (isset($permintaan['pr_nama_mata_anggaran']) && !empty($permintaan['pr_nama_mata_anggaran'])) ? $permintaan['pr_nama_mata_anggaran'] : null;
          $curval = (!empty($code) && !empty($label)) ? $code." ".$label : null; 
          ?>

          <?php if(!empty($curval)){ ?>

          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Mata Anggaran</label>
          <div class="col-sm-10">
          <p class="form-control-static" id="mata_anggaran"><?php echo $curval ?></p>
          </div>
          </div>

          <?php } ?>

          <?php

          $curval = null;
          if (isset($permintaan["pr_sub_mata_anggaran"]) and substr_count($permintaan["pr_sub_mata_anggaran"], " , ") >= 1 ) {
          $code = explode(" , ", $permintaan["pr_sub_mata_anggaran"]);
          $name = explode(" , ", $permintaan["pr_nama_sub_mata_anggaran"]);
          $curval = $permintaan["pr_sub_mata_anggaran"]." - ".$permintaan["pr_nama_sub_mata_anggaran"];
          }
          ?>

          <?php if(!empty($curval)){ ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Sub Mata Anggaran *</label>
          <div class="col-sm-10">
            <p class="form-control-static" id="sub_mata_anggaran">
              <?php
                if (isset($code)) {
                  foreach (array_combine($code, $name) as $code => $name ) {
                    echo $code.' - '.$name."<br/>";
                  }
                  }else{
                    echo $curval;
                  } 

                ?>
            </p>
          </div>
          </div>
          <?php } ?>

          <?php $curval = (isset($permintaan['pr_pagu_anggaran'])) ? $permintaan["pr_pagu_anggaran"] : 0; ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Nilai Anggaran</label>
          <div class="col-sm-4">
          <p class="form-control-static" id="pagu_anggaran" maxlength="22"><?php echo inttomoney($curval) ?></p>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_sisa_anggaran'])) ? $permintaan["pr_sisa_anggaran"] : 0 ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Sisa Anggaran</label>
          <div class="col-sm-4">
          <p class="form-control-static" id="sisa_anggaran"><?php echo inttomoney($curval) ?></p>
          </div>
          </div>

          <?php $curval = (isset($permintaan['pr_packet'])) ?  $permintaan["pr_packet"] : set_value("nama_paket"); ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Nama Paket Pengadaan*</label>
          <div class="col-sm-8" id="nama_paket_div">
            <input type="text" class="form-control" name="nama_paket" id="nama_paket" required="true" value="<?php echo $curval ?>">
          </div>
          </div>

          <!-- //y tambah jenis pr -->        
          <?php $curval = (isset($permintaan['pr_type'])) ?  $permintaan["pr_type"] : set_value("tipe_pr"); ?>
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Jenis Paket Pengadaan*</label>
          <div class="col-sm-5">
          <select class="form-control" name="tipe_pr" required="true" value="<?php echo $curval ?>">
          <option value=""><?php echo lang('choose') ?></option>
          <?php foreach($pr_type as $key => $val){
            $selected = ($key == $curval) ? "selected" : ""; 
            ?>
            <option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $val ?></option>
            <?php } ?>
          </select>
          </div>
          </div>

          <!-- HLMIFZI -->
          <div class="row form-group">
          <label class="col-sm-2 control-label text-right">Pembelian Langsung/Swakelola
          </label>
          <div class="col-sm-4">
          <div class="">
            <?php $curval = set_value("swakelola_inp"); ?>
            <input type="checkbox" onclick="swakelola_confirm()" class="" name="swakelola_inp" id="swakelola_inp" value="1">
          </div>
          </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){

  <?php if (isset($permintaan['pr_project_name'])) { ?>
    $("#nama_proyek_div").show();
    $("#kode_spk_div").show();
  <?php  } else { ?> 
    $("#nama_proyek_div").hide(); 
    $("#kode_spk_div").hide(); 
  <?php } ?>
  var item_int_btn_url = "<?php echo site_url('procurement/get_picker_sumberdaya') ?>";
    if ($('#kode_spk').val() != '') {
        $('#item_int_btn').attr('data-url',item_int_btn_url+"?spk_code="+$("#kode_spk").val())
    }
    function check_plan_tender(){
      var id = $("#perencanaan_pengadaan_inp").val();
      var url = "<?php echo site_url('Procurement/data_perencanaan_pengadaan') ?>";
      var spk_code = "";
      $.ajax({
        url : url+"?id="+id,
        dataType:"json",
        success:function(data){
          var mydata = data.rows[0];
          $('#item_int_btn').attr('data-url',item_int_btn_url)
          $("#nama_pekerjaan").val(mydata.ppm_subject_of_work);
          $("#deskripsi_pekerjaan").val(mydata.ppm_scope_of_work);
          $("#mata_anggaran").text(mydata.ppm_mata_anggaran+" - "+mydata.ppm_nama_mata_anggaran);
          // if (mydata.ppm_sub_mata_anggaran.match(/( , )+/g) != null && mydata.ppm_sub_mata_anggaran.match(/( , )+/g).length >= 1) {
          //    var sub_mata_anggaran_arrays = mydata.ppm_sub_mata_anggaran.split(" , ");
          //    var nama_sub_mata_anggaran_arrays = mydata.ppm_nama_sub_mata_anggaran.split(" , ");
          //    var sub_mata_anggaran = '';
          //    for(var i = 0; i < sub_mata_anggaran_arrays.length; i++){
          //       sub_mata_anggaran += sub_mata_anggaran_arrays[i]+" - "+nama_sub_mata_anggaran_arrays[i]+"<br/>";
          //     }
          //     $("#sub_mata_anggaran").html(sub_mata_anggaran);
          // }else 
          if (mydata.ppm_sub_mata_anggaran == 0 ) {
              getProjectCost(id);
          }
          else{
            var sub_mata_anggaran = mydata.ppm_sub_mata_anggaran+" - "+mydata.ppm_nama_sub_mata_anggaran;
            $("#sub_mata_anggaran").html(sub_mata_anggaran);
          }
          // $("#sub_mata_anggaran").text(mydata.ppm_sub_mata_anggaran+" - "+mydata.ppm_nama_sub_mata_anggaran);
          $("#pagu_anggaran,#total_pagu").text(mydata.ppm_pagu_anggaran);
          $("#sisa_anggaran,#sisa_pagu").text(mydata.ppm_sisa_anggaran);
          $("#total_pagu_inp").val(moneytoint(mydata.ppm_pagu_anggaran));
          $("#total_sisa_inp,#sisa_pagu_awal_inp").val(moneytoint(mydata.ppm_sisa_anggaran));
          if (mydata.ppm_project_name != null) {
            $("#nama_proyek_div").show();
            $("#nama_proyek").val(mydata.ppm_project_name);
            $("#kode_spk_div").show();
            $("#kode_spk").val(mydata.ppm_project_id);
            $('#item_int_btn').attr('data-url',item_int_btn_url+"?spk_code="+$("#kode_spk").val())
          } else{
            $("#nama_proyek_div").hide();
            $("#kode_spk_div").hide();


          }

          if (mydata.ppm_is_integrated == 1) {
            $('.not_integrated').hide();
            $('.integrated').show();
          }else{
            $('.integrated').hide();
            $('.not_integrated').show();
          }

          if (mydata.ppm_kode_rencana != null) {
              $.ajax({
                 url : "<?php echo site_url('Procurement/daftar_paket_pengadaan') ?>"+"?program_code="+mydata.ppm_kode_rencana,
                 dataType:"json",
                 success:function(data){
                  var drpdownhtml = "";
                  $.each(data.rows, function(i,val) {
                    
                    drpdownhtml += "<option value='"+val.pps_paket_pengadaan_name+"'>"+val.pps_paket_pengadaan_name+"</option>";

                  });
                  var selecthtml = "<select class='form-control' name='nama_paket' id='nama_paket' required='true'>"+drpdownhtml+"</select>";
                  $('#nama_paket_div').html(selecthtml);
                  $('#nama_paket_div').removeClass("col-sm-8");
                  $('#nama_paket_div').addClass("col-sm-5");
                 }
              })
              
              
          }else{
             var htmlnamapr = "<input type='text' class='form-control' name='nama_paket' id='nama_paket' required='true' value='<?php echo $curval ?>'>";
            $('#nama_paket_div').html(htmlnamapr);
            $('#nama_paket_div').removeClass("col-sm-5");
            $('#nama_paket_div').addClass("col-sm-8");

          }
          
        }
      });
    }

    function getProjectCost(id){

      
      $.ajax({
              url : "<?php echo site_url('Procurement/perencanaan_pengadaan/get_project_cost') ?>"+"?ppm_id="+id,
                 dataType:"json",
                 success:function(data){
                  var mata_anggaran = "";
                  $.each(data.rows, function(i,val) {
                    
                    mata_anggaran += val.coa_code+" "+val.coa_name+"<br/>";

                  });
                  
                  $("#sub_mata_anggaran").html(mata_anggaran);
                 }
              })


    }

    $('.integrated').hide();

    $(document.body).on("change","#perencanaan_pengadaan_inp",function(){

      check_plan_tender();

    });

});

  function swakelola_confirm(){
     
     if ($('[name=swakelola_inp]')[0].checked == true) {

        if (confirm('Anda yakin untuk melakukan pembelian langsung bukan melalui pelelangan/RFQ?')) {
          $('[name=swakelola_inp]').prop('checked', true);
        } else {
          $('[name=swakelola_inp]').prop('checked', false);

        }

     }
      
     }

function joinpr_confirm(){
     
   if ($('[name=joinpr]')[0].checked == true) {

      if (confirm('Anda yakin akan join paket pengadaan?')) {
        $('[name=joinpr]').prop('checked', true);
      } else {
        $('[name=joinpr]').prop('checked', false);

      }

   }
    
}

</script>

