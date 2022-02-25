<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <span class="card-title mr-2 text-bold-600">Dokumen</span>
        <span><a class="btn btn-info btn-sm tambah_dok"><i class="ft-plus"></i> Tambah</a></span>
      </div>

      <div class="card-content">
        <div class="card-body">
        
          <div id="lampiran_container">

            <?php 
              $sisa = 5;
              if(isset($document) && !empty($document)){
                foreach ($document as $k => $v) {
                  $show = ($k == 0 || !empty($v['filename'])) ? "" : "display:none;";
            ?>

            <div class="row lampiran" style="<?php echo $show ?>" data-no="<?php echo $k ?>">              
              <div class="col-12">
                <div class="card">

                  <div class="card-header border-bottom pb-2">
                    <span class="card-title mr-2 text-bold-700">DOKUMEN #<?php echo $k ?></span>
                    <span><a class="tutup" data-no="<?php echo $k ?>">
                      <i class="fa fa-times"></i>
                    </a></span>
                  </div>

                  <div class="card-content">
                    <div class="card-body">

                      <div class="row form-group">                        
                        <?php $curval = (isset($v['publish'])) ? $v['publish'] :  set_value("doc_vendor_inp[$k]"); ?>                        
                        <?php $checked = $curval == "on" ? "checked" : "";  ?>
                        <label class="col-sm-2 control-label text-right">Kirim ke Vendor</label>
                        <div class="col-sm-10">
                          <div class="custom-switch custom-switch-info">
                              <input type="checkbox" name="doc_vendor_inp[<?php echo $k ?>]" class="custom-control-input" id="color-switch-3<?php echo $k ?>" <?php echo $checked; ?>>
                              <label class="custom-control-label" for="color-switch-3<?php echo $k ?>"></label>
                          </div>  
                        </div>                       
                      </div>
                      
                      <div class="row form-group">                    
                        <?php $curval = (isset($v['req_e_sign'])) ? $v['req_e_sign'] :  set_value("doc_req_e_sign_inp[$k]"); ?>                        
                        <?php $checked = $curval == "on" ? "checked" : "";  ?>
                        <label class="col-sm-2 control-label text-right">Request E-Sign</label>
                        <div class="col-sm-10">
                          <div class="custom-switch custom-switch-info">
                              <input type="checkbox" name="doc_req_e_sign_inp[<?php echo $k ?>]" class="custom-control-input" id="color-switch-4<?php echo $k ?>" <?php echo $checked; ?>>
                              <label class="custom-control-label" for="color-switch-4<?php echo $k ?>"></label>
                          </div>  
                        </div>

                      </div>

                      <div class="row form-group">
                        <?php $curval = (isset($v['name_input'])) ? $v['name_input'] :  set_value("doc_name_input[$k]"); ?>
                        <label class="col-sm-2 control-label text-right">Nama Dokumen</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="doc_name_input[<?php echo $k ?>]" value="<?php echo $curval ?>"/>                        
                        </div>
                      </div>

                      <?php $curval = (isset($v['description'])) ? $v['description'] :  set_value("doc_desc_inp[$k]"); ?>

                      <div class="row form-group">
                      <label class="col-sm-2 control-label text-right">Keterangan</label>
                      <div class="col-sm-10">
                      <textarea class="form-control" maxlength="1000" name="doc_desc_inp[<?php echo $k ?>]"><?php echo $curval ?></textarea>
                      </div>
                      </div>

                      <?php $curval = (isset($v['filename'])) ? $v['filename'] :  set_value("doc_attachment_inp[$k]"); ?>

                      <div class="row form-group">
                      <label class="col-sm-2 control-label text-right"><?php echo lang('attachment') ?></label>
                      <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-info upload">
                            <i class="fa fa-cloud-upload"></i>
                          </button> 
                          <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file_<?php echo $k ?>">
                            <i class="fa fa-share"></i>
                          </button>                           
                        </span> 
                        <input readonly type="text" class="form-control" id="doc_attachment_inp_<?php echo $k ?>" name="doc_attachment_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                        <span class="input-group-btn">
                          <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-danger removefile">
                            <i class="fa fa-remove"></i>
                          </button> 
                        </span> 
                      </div>
                      <div class="col-sm-0" style="font-size: 11px">
                        <i>Max file 5 MB 
                        <br>
                          Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
                        </i>
                      </div>
                      </div>
                      </div>

                      <?php $curval = (isset($v['doc_id'])) ? $v['doc_id'] :  ""; ?>
                      <input type="hidden" name="doc_id_inp[<?php echo $k ?>]" value="<?php echo $curval ?>"/>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <?php $sisa--;} } ?>

            <?php for ($k = 5-$sisa; $k <= 5; $k++) { 
              $show = ($k == 0) ? "" : "display:none;";
            ?>

            <div class="row lampiran" style="<?php echo $show ?>" data-no="<?php echo $k ?>">            
              <div class="col-12">
                <div class="card">

                  <div class="card-header border-bottom pb-2">
                    <span class="card-title mr-2 text-bold-700">DOKUMEN #<?php echo $k ?></span>
                    <?php if($k > 0){ ?>
                      <span><a class="tutup" data-no="<?php echo $k ?>">
                        <i class="fa fa-times"></i>
                      </a></span>
                    <?php } ?>
                  </div>

                  <div class="card-content">
                    <div class="card-body">
                        
                        <div class="row form-group">                    
                          <?php $curval = set_value("doc_vendor_inp[$k]"); ?>
                          <?php $checked = $curval == "on" ? "checked" : "";  ?>
                          <label class="col-sm-2 control-label text-right">Kirim ke Vendor</label>
                          <div class="col-sm-10">
                            <div class="custom-switch custom-switch-info">
                                <input type="checkbox" name="doc_vendor_inp[<?php echo $k ?>]" class="custom-control-input" id="color-switch-5<?php echo $k ?>" <?php echo $checked; ?>>
                                <label class="custom-control-label" for="color-switch-5<?php echo $k ?>"></label>
                            </div>  
                          </div>
                        </div>

                        <div class="row form-group">                    
                          <?php $curval = set_value("doc_req_e_sign_inp[$k]"); ?>
                          <?php $checked = $curval == "on" ? "checked" : "";  ?>
                          <label class="col-sm-2 control-label text-right">Request E-Sign</label>
                          <div class="col-sm-10">
                            <div class="custom-switch custom-switch-info">
                                <input type="checkbox" name="doc_req_e_sign_inp[<?php echo $k ?>]" class="custom-control-input" id="color-switch-6<?php echo $k ?>" <?php echo $checked; ?>>
                                <label class="custom-control-label" for="color-switch-6<?php echo $k ?>"></label>
                            </div>  
                          </div>
                        </div>

                        <div class="row form-group">
                          <?php $curval = set_value("doc_name_input[$k]"); ?>
                          <label class="col-sm-2 control-label text-right">Nama Dokumen</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="doc_name_input[<?php echo $k ?>]" value="<?php echo $curval ?>"/>                        
                          </div>                          
                        </div>

                        <?php $curval = set_value("doc_desc_inp[$k]"); ?>
                        <div class="row form-group">
                          <label class="col-sm-2 control-label text-right">Keterangan</label>
                          <div class="col-sm-10">
                          <textarea class="form-control" maxlength="1000" name="doc_desc_inp[<?php echo $k ?>]"><?php echo $curval ?></textarea>
                        </div>
                      </div>

                      <?php $curval = set_value("doc_attachment_inp[$k]"); ?>
                      <div class="row form-group">
                        <label class="col-sm-2 control-label text-right"><?php echo lang('attachment') ?></label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-btn">
                              <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-info upload">
                                <i class="fa fa-cloud-upload"></i> Upload
                              </button> 
                              <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file_<?php echo $k ?>">
                                <i class="fa fa-share"></i> Preview
                              </button>
                              </span> 
                            <input readonly type="text" class="form-control" id="doc_attachment_inp_<?php echo $k ?>" name="doc_attachment_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                            <span class="input-group-btn">
                              <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-danger removefile">
                                    <i class="fa fa-trash"></i> Delete
                                  </button> 
                            </span> 
                          </div>
                          <div class="col-sm-0" style="font-size: 11px">
                            <i>Max file 5 MB 
                            <br>
                              Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
                            </i>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>

            <?php } ?>
        
          </div>

        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <h4 class="card-title">List Dokumen</h4>
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
                          <input type="checkbox" class="custom-control-input" disabled id="color-switch-10" <?php echo ($v['req_e_sign'] == "on") ? "checked" : "" ?>>
                          <label class="custom-control-label" for="color-switch-10"></label>
                      </div>  
                  </td>
                  <td><?php echo $v['signor'] ?></td>
                  <td><?php echo $v['upload_date'] ?></td>
                  <td><?php echo $v['description'] ?></td>
                  <td><?php echo ($v['publish'] == "on") ? "Ya" : "Tidak" ?></td>
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
          <div class="btn-group-sm float-left">
              <span class="card-title text-bold-600 mr-2">Person In Charge</span> <span><a onclick="isShowAddPerson()" class="btn btn-info btn-sm"><i class="ft-plus"></i> Tambah</a></span>            
            </div>
            <div class="btn-group-sm float-right" id="showButtonPerson" style="display: none">
              <a class="btn btn-info action_milestone">Simpan</a>
              <a class="btn btn-danger empty_milestone" title="Hapus"><i class="ft-trash"></i></a>            
              <input type="hidden" id="current_milestone" value=""/>   
            </div>
        </div>

        <div class="card-content">
          <div class="card-body">

            <div id="showAddPerson" style="display: none">            

              <div class="row mb-2">
                <!-- left-side -->
                <div class="col-sm">
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Deskripsi Milestone</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="deskripsi_milestone_inp"></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Progress (%)</label>
                    <div class="col-sm-4">
                      <input class="form-control money" id="bobot_milestone_inp" maxlength="4" placeholder="Maksimal 100%">
                    </div>
                    <div class="col-sm-4">
                      <input class="form-control money" id="nilai_milestone_inp" maxlength="4" placeholder="nilai">
                    </div>
                  </div>
                </div>

                <!-- right-side -->
                <div class="col-sm">             
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Target Tanggal</label>
                    <div class="col-sm-6">
                      <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" id="tanggal_milestone_inp" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                  <?php $curval = set_value("milestone_file_inp"); ?>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Upload Dokumen</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" data-id="milestone_file_inp" data-folder="<?php echo "contract/milestone" ?>" data-preview="preview_file" class="btn btn-info upload">...</button> 
                        </span> 
                        <input readonly type="text" class="form-control" id="milestone_file_inp" name="milestone_file_inp" value="<?php echo $curval ?>">
                        <span class="input-group-btn">
                        <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/milestone/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file"><i class="fa fa-share"></i></button> 
                        </span> 
                      </div>
                    </div>
                  </div>   
                </div>
                
              </div> 

            </div>

              <table class="table table-bordered" id="milestone_table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Progress (%)</th>
                    <th>Tanggal Target</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>                  
                </tbody>
              </table>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">

    $(document).ready(function(){

      $(".action_milestone").click(function(){

        var current_milestone = $("#current_milestone").val();
        var no = current_milestone;

        if(current_milestone == ""){
          no = ($("#milestone_table tr").length) ? parseInt($("#milestone_table tr").length) : 1;
        }

        var mybobot = 0;

        $("#milestone_table tbody tr").each(function(i,val){
          
          var v = $(this).find(".milestone_percent").val();
          mybobot += moneytoint(v);

        });

        var deskripsi = $("#deskripsi_milestone_inp").val();
        var tanggal = $("#tanggal_milestone_inp").val();
        var bobot = moneytoint($("#bobot_milestone_inp").val());

        if(deskripsi == ""){

          alert("Isi deskripsi milestone");

        } else if(tanggal == ""){

          alert("Isi tanggal milestone");

        } else if(bobot == ""){

          alert("Isi bobot milestone");

        } else if(parseFloat(mybobot+bobot) > 100){

          alert("Bobot harus dibawah 100");

        } else {

          bobot = inttomoney(bobot);

          var html = "<tr>";
          html += "<td>"+no+"</td>";
          html += "<td><input type='hidden' class='milestone_desc' data-no='"+no+"' name='milestone_desc["+no+"]' value='"+deskripsi+"'/>"+deskripsi+"</td>";
          html += "<td class='money'><input type='hidden' class='milestone_percent' data-no='"+no+"' name='milestone_percent["+no+"]' value='"+bobot+"'/>"+bobot+"</td>";
          html += "<td><input type='hidden' class='milestone_date' data-no='"+no+"' name='milestone_date["+no+"]' value='"+tanggal+"'/>"+tanggal+"</td>";
          html += "<td><button type='button' class='btn btn-primary btn-xs edit_milestone' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>";
          html += "</tr>";

          $("#milestone_table").append(html);
          $("#deskripsi_milestone_inp").val("");
          $("#tanggal_milestone_inp").val("");
          $("#bobot_milestone_inp").val("");
          $("#current_milestone").val("");
          
        }

      });

      $(document.body).on("click",".empty_milestone",function(){

        $("#deskripsi_milestone_inp").val("");
        $("#tanggal_milestone_inp").val("");
        $("#bobot_milestone_inp").val("");
        $("#current_milestone").val("");

      });

      $(document.body).on("click",".edit_milestone",function(){

        var no = $(this).attr('data-no');
        var deskripsi = $(".milestone_desc[data-no='"+no+"']").val();
        var tanggal = $(".milestone_date[data-no='"+no+"']").val();
        var bobot = $(".milestone_percent[data-no='"+no+"']").val();

        $("#current_milestone").val(no);
        $("#deskripsi_milestone_inp").val(deskripsi);
        $("#tanggal_milestone_inp").val(tanggal);
        $("#bobot_milestone_inp").val(bobot);

        $(this).parent().parent().remove();

        return false;

      });

    })

    function isShowAddPerson() {
      var div_add = document.getElementById("showAddPerson");
      var div_btn = document.getElementById("showButtonPerson");
      if (div_add.style.display !== "none") {
        div_add.style.display = "none";
      } else {
        div_add.style.display = "block";
      }

      if (div_btn.style.display !== "none") {
        div_btn.style.display = "none";
      } else {
        div_btn.style.display = "block";
      }
    }

  </script>

<script type="text/javascript">

  $(document).ready(function(){

    $(".tambah_dok").click(function(){

      var total = parseInt($("div.lampiran:visible").length);
      var find = parseInt($("div.lampiran:hidden").attr("data-no"));

      if(total == 4){
        $(".tambah_dok").hide();
      }
      $("div.lampiran[data-no='"+find+"']").show();
      return false;

    });

    $(".tutup").click(function(){

      $(".tambah_dok").show();
      var no = parseInt($(this).attr("data-no"));
      $("div.lampiran[data-no='"+no+"']").hide();

      return false;

    });

  });
</script>