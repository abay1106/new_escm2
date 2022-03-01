<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-header border-bottom pb-2">
        <div class="btn-group-sm float-left">
            <span class="card-title text-bold-600 mr-2">Dokumen</span> <span><a onclick="isShowAddDok()" class="btn btn-info btn-sm"><i class="ft-plus"></i> Tambah</a></span>            
          </div>
          <div class="btn-group-sm float-right" id="showButtonDok" style="display: none">
            <a class="btn btn-info action_dok">Simpan</a>
            <a class="btn btn-danger empty_dok" title="Hapus"><i class="ft-trash"></i></a>            
            <input type="hidden" id="current_dok" value=""/>   
          </div>
      </div>

      <div class="card-content">
        <div class="card-body">
            <div id="showAddDok" style="display: none">            
              <div class="row mb-2">
                <!-- left-side -->                
                <div class="col-sm">
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Kirim ke Vendor </label>
                    <div class="col-sm-8">
                        <div class="custom-switch custom-switch-info">
                            <input type="checkbox" name="doc_vendor_inp" class="custom-control-input" id="doc_vendor_inp">
                            <label class="custom-control-label" for="doc_vendor_inp"></label>
                        </div>  
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Request E-Sign</label>
                    <div class="col-sm-8">
                        <div class="custom-switch custom-switch-info">
                            <input type="checkbox" name="doc_req_e_sign_inp" class="custom-control-input" id="doc_req_e_sign_inp">
                            <label class="custom-control-label" for="doc_req_e_sign_inp"></label>
                        </div>  
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Nama Dokumen <span class="text-danger text-bold-700">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="doc_name_inp" id="doc_name_inp" placeholder="Nama dokumen"/>                        
                    </div>
                  </div>                  
                </div>

                <!-- right-side -->
                <div class="col-sm">   
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Keterangan <span class="text-danger text-bold-700">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="doc_desc_inp" id="doc_desc_inp" placeholder="Keterangan"></textarea>
                    </div>
                  </div>      

                  <?php $curval = set_value("doc_attachment_inp"); ?>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Upload Dokumen <span class="text-danger text-bold-700">*</span></label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" data-id="doc_attachment_inp" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file" class="btn btn-info upload" title="Upload"><i class="ft-upload"></i></button> 
                        </span> 
                        <input readonly type="text" class="form-control" id="doc_attachment_inp" name="doc_attachment_inp" value="<?php echo $curval ?>">
                        <span class="btn-group-">
                            <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/document/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file" title="Preview"><i class="fa fa-share"></i></button> 
                            <button type="button" data-id="doc_attachment_inp" data-folder="<?php echo "contract/document" ?>" data-preview="preview_file" class="btn btn-danger removefile">
                              <i class="fa fa-trash"></i>
                            </button> 
                        </span>                         
                      </div>                    
                    </div>
                  </div>              
                </div>
                
              </div> 
            </div>

            <div class="table-responsive">
              <table class="table table-bordered" id="dok_table">
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
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                    $no = 1;
                    if(isset($document) && !empty($document)){
                      foreach ($document as $key => $value) { 
                      $myid = $key+1;
                  ?>

                  <tr>   
                    <td><?php echo $no++; ?></td>                      
                    <td>
                      <input type="hidden" value="<?php echo $value['name_input'] ?>" name="doc_name[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="doc_name">
                      <?php echo $value['name_input'] ?>
                    </td>                         
                    <td>
                      <input type="hidden" value="<?php echo $value['filename'] ?>" name="doc_attachment[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="doc_attachment">
                      <a href='<?php echo site_url("log/download_attachment/contract/document/".$value['filename']) ?>' target="_blank"><?php echo $value['filename'] ?></a>                      
                    </td>   
                    <td class="text-center">
                        <div class="custom-switch custom-switch-info">
                          <input type="checkbox" name="doc_req_e_sign[<?php echo $myid ?>]" class="custom-control-input" disabled id="color-switch-10" <?php echo ($value['req_e_sign'] == "on") ? "checked" : "" ?>>
                          <label class="custom-control-label" for="color-switch-10"></label>
                        </div>  
                    </td>  
                    <td>
                      <input type="hidden" value="<?php echo $value['signor'] ?>" name="doc_name_signor[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="doc_name_signor">
                      <?php echo $value['signor'] ?>
                    </td>  
                    <td>
                      <input type="hidden" value="<?php echo $value['upload_date'] ?>" name="upload_date_inp[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="upload_date_inp">
                      <?php echo $value['upload_date'] ?>
                    </td>    
                    <td>
                      <input type="hidden" value="<?php echo $value['description'] ?>" name="doc_desc[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="doc_desc">
                      <?php echo $value['description'] ?>
                    </td>    
                    <td class="text-center">
                        <div class="custom-switch custom-switch-info">
                          <input type="checkbox" name="doc_vendor[<?php echo $myid ?>]" class="custom-control-input" disabled id="color-switch-11" <?php echo ($value['publish'] == "on") ? "checked" : "" ?>>
                          <label class="custom-control-label" for="color-switch-11"></label>
                        </div>  
                    </td>              
                    <td>
                      <button data-no="<?php echo $myid ?>" class="btn btn-warning btn-sm edit_dok" type="button">
                        <i class="fa fa-edit"></i>
                        <?php  ?>
                        <input type="hidden" name="doc_id_inp[<?php echo $myid ?>]" value="<?php echo $myid ?>"/>
                      </button>
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
                  <label class="col-sm-4 control-label text-right">User <span class="text-danger text-bold-700">*</span> </label>
                  <div class="col-sm-8">
                    <select class="form-control select2" name="user_inp" id="user_inp" style="width: 100%">
                      <option value="">Pilih</option>
                      <?php foreach($adm_user as $v) { ?>
                        <option value="<?php echo $v['complete_name'];?>"><?php echo $v['complete_name'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Jabatan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="jabatan_inp" id="jabatan_inp" placeholder="Jabatan">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Divisi <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="divisi_inp" id="divisi_inp" placeholder="Nama divisi">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Perusahaan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="perusahaan_inp" id="perusahaan_inp" placeholder="Nama perusahaan">
                  </div>
                </div>
              </div>

              <!-- right-side -->
              <div class="col-sm">             
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">No. Telpon <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" maxlength="13" class="form-control" name="telp_inp" id="telp_inp" placeholder="Nomor telepon">
                  </div>
                </div>  
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Email <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" name="email_inp" id="email_inp" placeholder="Email">
                  </div>
                </div>   
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Keterangan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="person_keterangan_inp" id="person_keterangan_inp" placeholder="Keterangan"></textarea>
                  </div>
                </div>               
              </div>
              
            </div> 

          </div>

          <div class="table-responsive">
            <table class="table table-bordered" id="person_table">
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
                  <th>Aksi</th>
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
                    <input type="hidden" value="<?php echo $value['cp_nama_lengkap'] ?>" name="user[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="user">
                    <?php echo $value['cp_nama_lengkap'] ?>
                  </td>
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_jabatan'] ?>" name="jabatan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="jabatan">
                    <?php echo $value['cp_jabatan'] ?>
                  </td>
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_divisi'] ?>" name="divisi[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="divisi">
                    <?php echo $value['cp_divisi'] ?>
                  </td>
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_nama_perusahaan'] ?>" name="perusahaan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="perusahaan">
                    <?php echo $value['cp_nama_perusahaan'] ?>
                  </td>
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_no_telp'] ?>" name="telp[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="telp">
                    <?php echo $value['cp_no_telp'] ?>
                  </td>                 
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_email'] ?>" name="email[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="email">
                    <?php echo $value['cp_email'] ?>
                  </td>                 
                  <td>
                    <input type="hidden" value="<?php echo $value['cp_note'] ?>" name="person_keterangan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="person_keterangan">
                    <?php echo $value['cp_note'] ?>
                  </td>                 
                  <td>
                    <button data-no="<?php echo $myid ?>" class="btn btn-warning btn-sm edit_person" type="button">
                      <i class="fa fa-edit"></i>
                      <?php  ?>
                      <input type="hidden" name="person_id[<?php echo $myid ?>]" value="<?php echo $myid ?>"/>
                    </button>
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

<script type="text/javascript">

  $(document).ready(function(){

    $(".action_dok").click(function(){ 

      var url_file = '<?php echo site_url("log/download_attachment/contract/document/") ?>';
      var current_dok = $("#current_dok").val();
      var no = current_dok;
      var doc_vendor = $("#doc_vendor_inp").val();
      var doc_req_e_sign = $("#doc_req_e_sign_inp").val();
      var doc_name = $("#doc_name_inp").val();
      var doc_desc = $("#doc_desc_inp").val();
      var doc_attachment = $("#doc_attachment_inp").val();
      var isCheckedSign = "";
      var isCheckedVendor = "";

      var today = new Date();
      var upload_date = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate() + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

      if(doc_req_e_sign == "on") {
        isCheckedSign = "checked";
      }

      if(doc_vendor == "on") {
        isCheckedVendor = "checked";
      }

      if(current_dok == ""){
        if (getMaxDataNo(".edit_dok") == null) {
          no = 1;
        }else{
          no = getMaxDataNo(".edit_dok")+1;
        }

      } else{ }

      if (doc_name == "" || doc_desc == "" || doc_attachment == ""){

        alert("Data tidak boleh kosong.");

      } else {
  
        var html = "<tr>";
            html += "<td>"+no+"</td>";
            html += "<td class='text-left'><input type='hidden' class='doc_name' data-no='"+no+"' name='doc_name["+no+"]' value='"+doc_name+"'/>"+doc_name+"</td>";
            html += "<td class='text-right'><input type='hidden' class='doc_attachment' data-no='"+no+"' name='doc_attachment["+no+"]' value='"+doc_attachment+"'/><a href='"+url_file+doc_attachment+"' target='_blank'>"+doc_attachment+"</a></td>";            
            html += "<td class='text-center'><div class='custom-switch custom-switch-info'><input type='checkbox' name='doc_req_e_sign["+no+"]' class='doc_req_e_sign["+no+"] custom-control-input' "+isCheckedSign+" ><label class='custom-control-label' for='doc_req_e_sign["+no+"]'></label></div></td>";
            html += "<td class='text-left'><input type='hidden' class='signor' data-no='"+no+"' name='signor["+no+"]' value=''/></td>";
            html += "<td class='text-left'><input type='hidden' class='upload_date' data-no='"+no+"' name='upload_date["+no+"]' value=''/>"+upload_date+"</td>";
            html += "<td class='text-left'><input type='hidden' class='doc_desc' data-no='"+no+"' name='doc_desc["+no+"]' value='"+doc_desc+"'/>"+doc_desc+"</td>";            
            html += "<td class='text-center'><div class='custom-switch custom-switch-info'><input type='checkbox' name='doc_vendor["+no+"]' class='doc_vendor["+no+"] custom-control-input' "+isCheckedVendor+" ><label class='custom-control-label' for='doc_vendor["+no+"]'></label></div></td>";
            html += "<td><button type='button' class='btn btn-warning btn-sm edit_dok' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>"; 
            html += "</tr>";

        $("#dok_table").append(html);
        $("#current_dok").val("");
        $("#doc_name_inp").val("");
        $("#doc_desc_inp").val("");
        $("#doc_attachment_inp").val("");
      }

    });

    $(document.body).on("click",".empty_dok",function(){
      $("#current_dok").val("");     
      $("#doc_name_inp").val("");
      $("#doc_desc_inp").val("");
      $("#doc_attachment_inp").val("");
    });

    $(document.body).on("click",".edit_dok",function(){
      var no = $(this).attr('data-no');
      var doc_vendor = $(".doc_vendor[data-no='"+no+"']").val();
      var doc_req_e_sign = $(".doc_req_e_sign[data-no='"+no+"']").val();
      var doc_name = $(".doc_name[data-no='"+no+"']").val();
      var doc_desc = $(".doc_desc[data-no='"+no+"']").val();
      var signor = $(".signor[data-no='"+no+"']").val();
      var upload_date = $(".upload_date[data-no='"+no+"']").val();
      var doc_attachment = $(".doc_attachment[data-no='"+no+"']").val();
      
      $("#current_dok").val(no);
      $("#doc_vendor_inp").val(doc_vendor);
      $("#doc_req_e_sign_inp").val(doc_req_e_sign);
      $("#doc_name_inp").val(doc_name);
      $("#doc_desc_inp").val(doc_desc);
      $("#doc_attachment_inp").val(doc_attachment);
      
      
      $(this).parent().parent().remove();

      return false;

    });

  })  

</script>

<script type="text/javascript">

  $(document).ready(function(){

      // Basic Select2 select
      $(".select2").select2();

      $(".action_person").click(function(){ 

        var current_person = $("#current_person").val();
        var no = current_person;
        var user = $("#user_inp").val();          
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

          alert("Jabatan tidak boleh kosong.");

        } else if(user == ""){

          alert("User tidak boleh kosong.");

        } else if(divisi == ""){

          alert("Divisi tidak boleh kosong.");

        } else if(perusahaan == ""){

          alert("Perusahaan tidak boleh kosong.");

        } else if(telp == ""){

          alert("Nomor Telepon tidak boleh kosong.");

        } else if(email == ""){

          alert("Email tidak boleh kosong.");

        } else if(person_keterangan == ""){

          alert("Keterangan tidak boleh kosong.");

        } else {

          var html = "<tr>";
              html += "<td>"+no+"</td>";
              html += "<td class='text-left'><input type='hidden' class='user' data-no='"+no+"' name='user["+no+"]' value='"+user+"'/>"+user+"</td>";
              html += "<td class='text-left'><input type='hidden' class='jabatan' data-no='"+no+"' name='jabatan["+no+"]' value='"+jabatan+"'/>"+jabatan+"</td>";
              html += "<td class='text-left'><input type='hidden' class='divisi' data-no='"+no+"' name='divisi["+no+"]' value='"+divisi+"'/>"+divisi+"</td>";
              html += "<td class='text-left'><input type='hidden' class='perusahaan' data-no='"+no+"' name='perusahaan["+no+"]' value='"+perusahaan+"'/>"+perusahaan+"</td>";
              html += "<td class='text-left'><input type='hidden' class='telp' data-no='"+no+"' name='telp["+no+"]' value='"+telp+"'/>"+telp+"</td>";
              html += "<td class='text-left'><input type='hidden' class='email' data-no='"+no+"' name='email["+no+"]' value='"+email+"'/>"+email+"</td>";
              html += "<td class='text-left'><input type='hidden' class='person_keterangan' data-no='"+no+"' name='person_keterangan["+no+"]' value='"+person_keterangan+"'/>"+person_keterangan+"</td>";
              html += "<td><button type='button' class='btn btn-warning btn-sm edit_person' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>"; 
              html += "</tr>";

          $("#person_table").append(html);
          $("#user_inp").val("");
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
        $("#user_inp").val("");
        $("#jabatan_inp").val("");
        $("#divisi_inp").val("");
        $("#perusahaan_inp").val("");
        $("#telp_inp").val("");
        $("#email_inp").val("");
        $("#person_keterangan_inp").val("");
      });

      $(document.body).on("click",".edit_person",function(){
        var no = $(this).attr('data-no');
        var user = $(".user[data-no='"+no+"']").val();
        var jabatan = $(".jabatan[data-no='"+no+"']").val();
        var divisi = $(".divisi[data-no='"+no+"']").val();
        var perusahaan = $(".perusahaan[data-no='"+no+"']").val();
        var telp = $(".telp[data-no='"+no+"']").val();
        var email = $(".email[data-no='"+no+"']").val();
        var person_keterangan = $(".person_keterangan[data-no='"+no+"']").val();
        
        $("#current_person").val(no);
        $("#user_inp").val(user);
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

  function getMaxDataNo(selector) {
    var min=null, max=null;
    $(selector).each(function() {
      var no_pp = parseInt($(this).attr('data-no'), 10);
      if ((max===null) || (no_pp > max)) { max = no_pp; }
    });
    return max;
  }

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

  function isShowAddDok() {
		var div_add = document.getElementById("showAddDok");
		var div_btn = document.getElementById("showButtonDok");
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

  // Restricts input for the given textbox to the given inputFilter.
  function setInputFilter(textbox, inputFilter) {
    ["input"].forEach(function(event) {
        textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
            this.value = "";
        }
        });
    });
    }

    // Install input filters.
    setInputFilter(document.getElementById("telp_inp"), function(value) {
    return /^-?\d*$/.test(value); });

</script>
