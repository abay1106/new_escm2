<div class="wrapper wrapper-content animated fadeInRight">
  <form method="post" id="form_aspek_penilaian_pelayanan" action="<?php echo site_url($controller_name."/vpi/aspek_penilaian_mutu/submit_add");?>"  class="form-horizontal">


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

            <input type="hidden" name="contract_id_inp" value="<?php echo isset($contract_data['contract_id']) ? $contract_data['contract_id'] : "" ?>">

            <?php $dept_id = isset($contract_data['ptm_dept_id']) ? $contract_data['ptm_dept_id'] : "" ?>
            <?php $dept_name = isset($contract_data['ptm_dept_name']) ? $contract_data['ptm_dept_name'] : "" ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Departemen</label>
              <div class="col-sm-10">
                <input type="hidden" name="dept_id_inp" class="form-control" value="<?php echo $dept_id ?>">
               <p class="form-control-static">
                <?php echo $dept_name ?>
               </p>
               </div>
            </div>

            <?php $vendor_id = isset($contract_data['vendor_id']) ? $contract_data['vendor_id'] : "" ?>
            <?php $vendor_name = isset($contract_data['vendor_name']) ? $contract_data['vendor_name'] : "" ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Penyedia Barang/Jasa</label>
              <div class="col-sm-10">
                <input type="hidden" name="vendor_id_inp" class="form-control" value="<?php echo $vendor_id ?>">
               <p class="form-control-static">
                 <?php echo $vendor_name ?>
               </p>
               </div>
             </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Deskripsi Pengadaan</label>
                <div class="col-sm-10">
                 <p class="form-control-static">
                  <?php echo $contract_data['subject_work'] ?>
                 </p>
               </div>
             </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Bulan *</label>
                <div class="col-sm-3">
                  <select name='date_inp' class="form-control select2" id="date_inp" required> 
                    <option value="">Pilih</option>
                    <?php if (isset($date_range)) { 
                      foreach ($date_range['text'] as $key => $value) { ?>

                      <option value="<?php echo $date_range['val'][$key] ?>"><?php echo $value ?></option>
                        
                    <?php }
                      
                     } ?>
                  </select>
               </div>
            </div>

            <!-- <div class="form-group">
                <label class="col-sm-2 control-label">No Dokumen</label>
                <div class="col-sm-10">
                  <input type="text" readonly name="no_doc_inp" id="no_doc_inp" class="form-control" required> -->
                 <!-- <p class="form-control-static">

                 </p> -->
               <!-- </div>
             </div> -->

            <!-- <div class="form-group">
                <label class="col-sm-2 control-label">Judul *</label>
                <div class="col-sm-10">
                <input type="text" name="title_inp" readonly id="title_inp" required class="form-control" value=""> -->
                 <!-- <p class="form-control-static">
                 </p> -->
               <!-- </div>
            </div> -->

       </div>
     </div>
    </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Penilaian *</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nilai Akhir *</label>
              <div class="col-sm-2">
                <input type="text" readonly name="nilai_akhir_inp" id="nilai_akhir_inp" class="form-control money" required>
               </div>
             </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Lampiran Time Schedule & Curve-S Pelaksanaan Pekerjaan *</label>
                 <div class="col-sm-5">
                    <div id="nilai_attach" class="form-control" readonly></div>
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
        <h5>Catatan</h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
      <div class="form-group">
          <label class="col-sm-1 control-label">Aksi *</label>
          <div class="col-sm-5">
            <select required name="response_inp" readonly id="response_inp" class="form-control" style="width:100%;">
              <option value="">Pilih</option>
              <option value="0">Simpan Sementara</option>
              <option value="1">Simpan</option>
            </select>
         </div>


      <label class="col-sm-1 control-label">Lampiran</label>
          <div class="col-sm-5">
            <div id="note_attach" class="form-control" readonly></div>
          </div>

        </div>

      <div class="form-group">
        <label class="col-sm-1 control-label">Catatan *</label>
        <div class="col-sm-11">
          <textarea name="note_inp" readonly id="note_inp" required class="form-control" maxlength="1000" style="height: 80px"></textarea>
        </div>
      </div>

      </div>
      </div>
    </div>
</div>

<?php echo buttonback('vendor/vpi/aspek_penilaian_mutu',lang('back'),lang('save')) ?>
  </form>

</div>

<script type="text/javascript"> 
  $(document).ready(function() {
    numeric_format();
    $("#date_inp").change(function(event) {
    if ($(this).val() == "") {

      $('#title_inp').val("");
      $('#no_doc_inp').val("");
      $('#response_inp').prop('disabled', 'true');
      $('#response_inp').val("");
      $('#nilai_akhir').val("")
      $("#nilai_attach").val("")
      $('#response_inp option[value=""]').attr("selected","selected");
      $('#note_attach').html("")
      $('#note_inp').text("");

    }else{
        $.ajax({
          url: "<?php echo site_url('vendor/vpi/aspek_penilaian_ketepatan_progress/data_detail') ?>"+'/'+<?php echo $contract_data['contract_id'] ?>+'?date='+$(this).val(),
          dataType: 'json',
        }).done(function(data) {
          var no = 1;
          var html = ""

            
            $('#response_inp').prop('readonly', 'true');
            $('#response_inp').val(data.data_note[0].vpkp_response);
            $('#response_inp option[value="'+data.data_note[0].vpkp_response+'"]').attr("selected","selected");          
            $('#title_inp').val(data.data_note[0].vpkp_title);
            $('#no_doc_inp').val(data.data_note[0].vpkp_no_doc);
         
            var file_attachment = data.data_note[0].vpkp_attach;
            var url_file_attach = "<?php echo site_url('log/download_attachment/vendor/') ?>"
            if (file_attachment != '') {
              $('#note_attach').html("<a href="+url_file_attach+"/"+file_attachment+" target='_blank' >"+file_attachment+"</a>")
            }else{
              $('#note_attach').html("<a>No file</a>")
            }

            $('#nilai_akhir_inp').val(data.data_note[0].vpkp_value.replace(/\,/g, '').replace(".", ","));
            if (data.data_note[0].vpkp_value_attach != '') {
              var file_nilai_attach = data.data_note[0].vpkp_value_attach;
              $('#nilai_attach').html("<a href="+url_file_attach+"/"+file_nilai_attach+" target='_blank' >"+file_nilai_attach+"</a>")
            }else{
            $('#nilai_attach').html("<a>No file</a>")
          }

          if (data.data_note[0].vpkp_note != ''){
            $('#note_inp').text(data.data_note[0].vpkp_note);
          }


          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });;
    }

  });


      function numeric_format(){
          $("input.money").autoNumeric({
              aSep: '.',
              aDec: ',', 
              aSign: '',
              vMax:'100'
            });
      }
  });
</script>