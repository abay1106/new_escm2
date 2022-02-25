<?php $contract_type = (isset($kontrak['contract_type'])) ? $kontrak["contract_type"] : "";
//if($contract_type != "HARGA SATUAN"){ ?>

  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header border-bottom pb-2">
          <div class="btn-group-sm float-left">
              <span class="card-title text-bold-600 mr-2">Milestone / Termin Pembayaran</span> <span><a onclick="isShowAddTermin()" class="btn btn-info btn-sm"><i class="ft-plus"></i> Tambah</a></span>            
            </div>
            <div class="btn-group-sm float-right" id="showButtonTermin" style="display: none">
              <a class="btn btn-info action_milestone">Simpan</a>
              <a class="btn btn-danger empty_milestone" title="Hapus"><i class="ft-trash"></i></a>            
              <input type="hidden" id="current_milestone" value=""/>   
            </div>
        </div>

        <div class="card-content">
          <div class="card-body">

            <div id="showAddTermin" style="display: none">            

              <div class="row mb-2">
                <!-- left-side -->
                <div class="col-sm">
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Deskripsi</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="deskripsi_milestone_inp" id="deskripsi_milestone_inp" placeholder="Pembayaran tahap I"></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Progress (%)</label>
                    <div class="col-sm-4">
                      <input class="form-control money" name="bobot_milestone_inp" id="bobot_milestone_inp" maxlength="4" placeholder="Maksimal 100%">
                    </div>
                    <div class="col-sm-4">
                      <input class="form-control money" name="nilai_milestone_inp" id="nilai_milestone_inp" maxlength="4" placeholder="nilai">
                    </div>
                  </div>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Target Tanggal</label>
                    <div class="col-sm-6">
                      <div class="input-group date">                        
                        <input type="date" name="tanggal_milestone_inp" id="tanggal_milestone_inp" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- right-side -->
                <div class="col-sm">     
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Keterangan</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="keterangan_inp" placeholder="Keterangan"></textarea>
                    </div>
                  </div>                          
                  <?php $curval = set_value("milestone_file_inp"); ?>
                  <div class="row form-group">
                    <label class="col-sm-4 control-label text-right">Upload Dokumen</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" data-id="milestone_file_inp" data-folder="<?php echo "contract/milestone" ?>" data-preview="preview_file2" class="btn btn-info upload">...</button> 
                        </span> 
                        <input readonly type="text" class="form-control" id="milestone_file_inp" name="milestone_file_inp" value="<?php echo $curval ?>">
                        <span class="input-group-btn">
                        <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/milestone/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file2"><i class="fa fa-share"></i></button> 
                        </span> 
                      </div>
                    </div>
                  </div>                                      
                </div>
                
              </div> 

            </div>

            <div class="table-responsive">
              <table class="table table-bordered" id="milestone_table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Nilai</th>
                    <th>Progress (%)</th>
                    <th>Tanggal Target</th>
                    <th>Lampiran</th>
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
  </div>

  <script type="text/javascript">

    $(document).ready(function(){

      $(".action_milestone").click(function(){

        var url_file = '<?php echo site_url("log/download_attachment/contract/milestone/") ?>';
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
        var nilai_milestone = $("#nilai_milestone_inp").val();
        var tanggal = $("#tanggal_milestone_inp").val();
        var bobot = moneytoint($("#bobot_milestone_inp").val());
        var keterangan = $("#keterangan_inp").val();
        var milestone_file = $("#milestone_file_inp").val();

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
          html += "<td><input type='hidden' class='deskripsi_milestone' data-no='"+no+"' name='deskripsi_milestone["+no+"]' value='"+deskripsi+"'/>"+deskripsi+"</td>";
          html += "<td class='money'><input type='hidden' class='nilai_milestone' data-no='"+no+"' name='nilai_milestone["+no+"]' value='"+nilai_milestone+"'/>"+nilai_milestone+"</td>";
          html += "<td class='money'><input type='hidden' class='milestone_percent' data-no='"+no+"' name='milestone_percent["+no+"]' value='"+bobot+"'/>"+bobot+"</td>";
          html += "<td><input type='hidden' class='milestone_date' data-no='"+no+"' name='milestone_date["+no+"]' value='"+tanggal+"'/>"+tanggal+"</td>";
          html += "<td class='text-right'><input type='hidden' class='milestone_file' data-no='"+no+"' name='milestone_file["+no+"]' value='"+milestone_file+"'/><a href='"+url_file+milestone_file+"'>"+milestone_file+"</a></td>";
          html += "<td><input type='hidden' class='keterangan' data-no='"+no+"' name='keterangan["+no+"]' value='"+keterangan+"'/>"+keterangan+"</td>";
          html += "<td><button type='button' class='btn btn-info btn-sm edit_milestone' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>";
          html += "</tr>";

          $("#milestone_table").append(html);
          $("#deskripsi_milestone_inp").val("");
          $("#tanggal_milestone_inp").val("");
          $("#bobot_milestone_inp").val("");
          $("#keterangan_inp").val("");
          $("#milestone_file_inp").val("");
          $("#current_milestone").val("");
          $("#nilai_milestone_inp").val("");
          
        }

      });

      $(document.body).on("click",".empty_milestone",function(){

        $("#deskripsi_milestone_inp").val("");
        $("#tanggal_milestone_inp").val("");
        $("#bobot_milestone_inp").val("");
        $("#keterangan_inp").val("");
        $("#milestone_file_inp").val("");
        $("#current_milestone").val("");
        $("#nilai_milestone_inp").val("");

      });

      $(document.body).on("click",".edit_milestone",function(){

        var no = $(this).attr('data-no');
        var deskripsi = $(".deskripsi_milestone[data-no='"+no+"']").val();
        var nilai_milestone = $(".nilai_milestone[data-no='"+no+"']").val();
        var bobot = $(".milestone_percent[data-no='"+no+"']").val();
        var tanggal = $(".milestone_date[data-no='"+no+"']").val();
        var milestone_file = $(".milestone_file[data-no='"+no+"']").val();
        var keterangan = $(".keterangan[data-no='"+no+"']").val();

        $("#current_milestone").val(no);
        $("#deskripsi_milestone_inp").val(deskripsi);
        $("#nilai_milestone_inp").val(nilai_milestone);
        $("#tanggal_milestone_inp").val(tanggal);
        $("#bobot_milestone_inp").val(bobot);
        $("#milestone_file_inp").val(milestone_file);
        $("#keterangan_inp").val(keterangan);

        $(this).parent().parent().remove();

        return false;

      });

    })

    function isShowAddTermin() {
      var div_add = document.getElementById("showAddTermin");
      var div_btn = document.getElementById("showButtonTermin");
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

<?php //} ?>