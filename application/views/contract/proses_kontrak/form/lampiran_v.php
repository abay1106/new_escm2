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
              <a class="btn btn-info action_person">Simpan</a>
              <a class="btn btn-danger empty_person" title="Hapus"><i class="ft-trash"></i></a>            
              <input type="hidden" id="current_person" value=""/>   
            </div>
        </div>

        <div class="card-content">
          <div class="card-body">

            <div id="showAddPerson" style="display: none">            

              <div class="row mb-2">
                <!-- left-side -->
                <div class="col-sm">
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Jabatan</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="jabatan_inp" id="jabatan_inp">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Divisi</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="divisi_inp" id="divisi_inp">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Perusahaan</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="perusahaan_inp" id="perusahaan_inp">
                    </div>
                  </div>
                </div>

                <!-- right-side -->
                <div class="col-sm">             
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">No. Telpon</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="telp_inp" id="telp_inp">
                    </div>
                  </div>  
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Email</label>
                    <div class="col-sm-8">
                      <input class="form-control" name="email_inp" id="email_inp">
                    </div>
                  </div>   
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Keterangan</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="person_keterangan_inp" id="person_keterangan_inp"></textarea>
                    </div>
                  </div>               
                </div>
                
              </div> 

            </div>

              <table class="table table-bordered" id="person_table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jabatan</th>                   
                    <th>Divisi</th>                   
                    <th>Perusahaan</th>                   
                    <th>No. Telpon</th>                   
                    <th>Email</th>                   
                    <th>Keterangan</th>                   
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

        $(".action_person").click(function(){ 

          var current_person = $("#current_person").val();
          var no = current_person;
          var jabatan = $("#jabatan_inp").val();          
          var divisi = $("#divisi_inp").val();          
          var perusahaan = $("#perusahaan_inp").val();          
          var telp = $("#telp_inp").val();          
          var email = $("#email_inp").val();          
          var person_keterangan = $("#person_keterangan_inp").val();          

          if(current_person == ""){
            if (getMaxDataNo(".edit_person") == null) {
              no = 1;
            }else{
              no = getMaxDataNo(".edit_person")+1;
            }

          } else{ }

          if (jabatan == ""){

            alert("Data tidak boleh kosong.");

          } else {

            var html = "<tr>";
                html += "<td>"+no+"</td>";
                html += "<td class='text-left'><input type='hidden' class='jabatan' data-no='"+no+"' name='jabatan["+no+"]' value='"+jabatan+"'/>"+jabatan+"</td>";
                html += "<td class='text-left'><input type='hidden' class='divisi' data-no='"+no+"' name='divisi["+no+"]' value='"+divisi+"'/>"+divisi+"</td>";
                html += "<td class='text-left'><input type='hidden' class='perusahaan' data-no='"+no+"' name='perusahaan["+no+"]' value='"+perusahaan+"'/>"+perusahaan+"</td>";
                html += "<td class='text-left'><input type='hidden' class='telp' data-no='"+no+"' name='telp["+no+"]' value='"+telp+"'/>"+telp+"</td>";
                html += "<td class='text-left'><input type='hidden' class='email' data-no='"+no+"' name='email["+no+"]' value='"+email+"'/>"+email+"</td>";
                html += "<td class='text-left'><input type='hidden' class='person_keterangan' data-no='"+no+"' name='person_keterangan["+no+"]' value='"+person_keterangan+"'/>"+person_keterangan+"</td>";
                html += "<td><button type='button' class='btn btn-warning btn-sm edit_person' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>"; 
                html += "</tr>";

            $("#person_table").append(html);
            $("#jabatan_inp").val("");
            $("#divisi_inp").val("");
            $("#perusahaan_inp").val("");
            $("#telp_inp").val("");
            $("#email_inp").val("");
            $("#person_keterangan").val("");
            $("#person_keterangan_inp").val("");
          }

        });

        $(document.body).on("click",".empty_person",function(){
          $("#current_person").val("");     
          $("#jabatan_inp").val("");
          $("#divisi_inp").val("");
          $("#perusahaan_inp").val("");
          $("#telp_inp").val("");
          $("#email_inp").val("");
          $("#person_keterangan_inp").val("");
        });

        $(document.body).on("click",".edit_person",function(){
          var no = $(this).attr('data-no');
          var jabatan = $(".jabatan[data-no='"+no+"']").val();
          var divisi = $(".divisi[data-no='"+no+"']").val();
          var perusahaan = $(".perusahaan[data-no='"+no+"']").val();
          var telp = $(".telp[data-no='"+no+"']").val();
          var email = $(".email[data-no='"+no+"']").val();
          var person_keterangan = $(".person_keterangan[data-no='"+no+"']").val();
          
          $("#current_person").val(no);
          $("#jabatan_inp").val(jabatan);
          $("#divisi_inp").val(divisi);
          $("#perusahaan_inp").val(perusahaan);
          $("#telp_inp").val(telp);
          $("#email_inp").val(email);
          $("#person_keterangan_inp").val(person_keterangan);
          
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