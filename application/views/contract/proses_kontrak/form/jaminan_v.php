<div class="row">
  <div class="col-12">
    <div class="card">
      
      <div class="card-header border-bottom pb-2">
          <div class="btn-group-sm float-left">
            <span class="card-title text-bold-600 mr-2">Jaminan</span> <span><a onclick="isShowAddJaminan()" class="btn btn-info btn-sm"><i class="ft-plus"></i> Tambah</a></span>            
          </div>
          <div class="btn-group-sm float-right" id="showButtonJaminan" style="display: none">
            <a class="btn btn-info btn-sm action_item">Simpan</a>
            <a class="btn btn-danger btn-sm empty_item" title="Hapus"><i class="ft-trash"></i></a>
            <input type="hidden" id="current_item" name="current_item" value=""/>                  
          </div>          
      </div>

      <div class="card-content">
        <div class="card-body">          

          <div id="showAddJaminan" style="display: none">
            <div class="row mb-2">
              <!-- left-side -->
              <div class="col-sm">
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Jenis Jaminan <span class="text-danger text-bold-700">*</span> </label>
                  <div class="col-sm-6">
                    <select class="form-control" name="jenis_jaminan_inp" id="jenis_jaminan_inp">
                      <option value="">Pilih</option>
                      <option value="Jaminan Pelaksanaan">Jaminan Pelaksanaan</option>
                      <option value="Jaminan Lain">Jaminan Lain</option>
                    </select>
                  </div>
                </div>

                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Tipe Jaminan <span class="text-danger text-bold-700">*</span> </label>
                  <div class="col-sm-6">
                    <select class="form-control" name="tipe_jaminan_inp" id="tipe_jaminan_inp">
                      <option value="">Pilih</option>
                      <option value="Bank Garansi">Bank Garansi</option>
                      <option value="Bank Lain">Bank Lain</option>
                    </select>
                  </div>
                </div>

                <?php $curval = set_value("nama_perusahaan_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Nama Perusahaan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" maxlength="40" name="nama_perusahaan_inp" id="nama_perusahaan_inp" value="<?php echo $curval ?>" placeholder="Nama perusahaan">              
                  </div>
                </div>

                <?php $curval = set_value("nomor_jaminan_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Nomor Jaminan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" maxlength="40" name="nomor_jaminan_inp" id="nomor_jaminan_inp" value="<?php echo $curval ?>" placeholder="Nomor jaminan">              
                  </div>
                </div>

                <?php $curval = set_value("alamat_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Alamat <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" maxlength="150" name="alamat_inp" id="alamat_inp" value="<?php echo $curval ?>" placeholder="Alamat">              
                  </div>
                </div>

              </div>

              <!-- right-side -->
              <div class="col-sm">
                <?php $curval = set_value("mulai_berlaku_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Mulai Berlaku <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-4">
                    <div class="input-group date">
                      <input type="date" name="mulai_berlaku_inp" id="mulai_berlaku_inp" class="form-control" value="<?php echo $curval ?>">
                    </div>
                  </div>
                </div>

                <?php $curval = set_value("berlaku_hingga_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Berlaku Hingga <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-4">
                    <div class="input-group date">
                      <input type="date" name="berlaku_hingga_inp" class="form-control" id="berlaku_hingga_inp" value="<?php echo $curval ?>">
                    </div>
                  </div>
                </div>   
                
                <?php $curval = set_value("nilai_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Nilai Jaminan <span class="text-danger text-bold-700">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control money" maxlength="40" name="nilai_inp" id="nilai_inp" value="<?php echo $curval ?>" placeholder="25.000.0000">              
                  </div>
                </div>   

                <?php $curval = set_value("jaminan_file_inp"); ?>
                <div class="row form-group">
                  <label class="col-sm-4 control-label text-right">Upload Dokumen</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-btn">
                      <button type="button" data-id="jaminan_file_inp" data-folder="<?php echo "contract/jaminan" ?>" data-preview="preview_file" class="btn btn-info upload">...</button> 
                      </span> 
                      <input readonly type="text" class="form-control" id="jaminan_file_inp" name="jaminan_file_inp" value="<?php echo $curval ?>">
                      <span class="input-group-btn">
                      <button type="button" data-url="<?php echo site_url("log/download_attachment/contract/jaminan/".$curval) ?>" class="btn btn-info preview_upload" id="preview_file"><i class="fa fa-share"></i></button> 
                      </span> 
                    </div>
                  </div>
                </div>              
              
              </div>
              
            </div>     
          </div>     

          <div class="table-responsive">
            <table class="table table-bordered" id="item_table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Jaminan</th>
                  <th>Tipe Jaminan</th>
                  <th>Nama Perusahaan</th>
                  <th>Nomor Jaminan</th>
                  <th>Alamat</th>
                  <th>Nilai Jaminan</th>
                  <th>Masa Berlaku</th>
                  <th>Lampiran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>      
                  <?php 
                    $no = 1;
                    if(isset($jaminan) && !empty($jaminan)){
                      foreach ($jaminan as $key => $value) { 
                      $myid = $key+1;
                  ?>

                  <tr>   
                    <td><?php echo $no++; ?></td>                      
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_jenis_jaminan'] ?>" name="jenis_jaminan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="jenis_jaminan">
                      <?php echo $value['cj_jenis_jaminan'] ?>
                    </td>
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_tipe_jaminan'] ?>" name="tipe_jaminan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="tipe_jaminan">
                      <?php echo $value['cj_tipe_jaminan'] ?>
                    </td>
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_nama_perusahaan'] ?>" name="nama_perusahaan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="nama_perusahaan">
                      <?php echo $value['cj_nama_perusahaan'] ?>
                    </td>
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_nomor_jaminan'] ?>" name="nomor_jaminan[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="nomor_jaminan">
                      <?php echo $value['cj_nomor_jaminan'] ?>
                    </td>
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_alamat'] ?>" name="alamat[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="alamat">
                      <?php echo $value['cj_alamat'] ?>
                    </td>
                    <td class="money">
                      <input type="hidden" value="<?php echo inttomoney($value['cj_nilai']) ?>" name="nilai[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="nilai">
                      <?php echo inttomoney($value['cj_nilai']) ?>
                    </td>                  
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_date_start'] ?>" name="mulai_berlaku[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="mulai_berlaku">
                      <input type="hidden" value="<?php echo $value['cj_date_end'] ?>" name="berlaku_hingga[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="berlaku_hingga">
                      <?php echo $value['cj_date_start'] . ' / ' . $value['cj_date_end'] ?>                      
                    </td>                  
                    <td>
                      <input type="hidden" value="<?php echo $value['cj_lampiran'] ?>" name="jaminan_file[<?php echo $myid ?>]" data-no="<?php echo $myid ?>" class="jaminan_file">
                      <a href='<?php echo site_url("log/download_attachment/contract/jaminan/".$value['cj_lampiran']) ?>' target="_blank"><?php echo $value['cj_lampiran'] ?></a>                      
                    </td>                 
                    <td>
                      <button data-no="<?php echo $myid ?>" class="btn btn-warning btn-sm edit_item" type="button">
                        <i class="fa fa-edit"></i>
                        <?php  ?>
                        <input type="hidden" name="jaminan_id[<?php echo $myid ?>]" value="<?php echo $myid ?>"/>
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

    $(".action_item").click(function(){ 

      var url_file = '<?php echo site_url("log/download_attachment/contract/jaminan/") ?>';
      var current_item = $("#current_item").val();
      var no = current_item;
      var jenis_jaminan = $("#jenis_jaminan_inp").val();
      var nama_perusahaan = $("#nama_perusahaan_inp").val();
      var nomor_jaminan = $("#nomor_jaminan_inp").val();
      var alamat = $("#alamat_inp").val();
      var mulai_berlaku = $("#mulai_berlaku_inp").val();
      var berlaku_hingga = $("#berlaku_hingga_inp").val();
      var tipe_jaminan = $("#tipe_jaminan_inp").val();
      var jaminan_file = $("#jaminan_file_inp").val();
      var nilai_int = $("#nilai_inp").autoNumeric('get');

      if(current_item == ""){
        if (getMaxDataNo(".edit_item") == null) {
          no = 1;
        }else{
          no = getMaxDataNo(".edit_item")+1;
        }

      } else{ }

      if (jenis_jaminan == "" || nama_perusahaan == "" || nomor_jaminan == "" || alamat == "" || nilai_int < 1){

        alert("Data tidak boleh kosong.");

      } else {
  
        var html = "<tr>";
            html += "<td>"+no+"</td>";
            html += "<td class='text-left'><input type='hidden' class='jenis_jaminan' data-no='"+no+"' name='jenis_jaminan["+no+"]' value='"+jenis_jaminan+"'/>"+jenis_jaminan+"</td>";
            html += "<td class='text-right'><input type='hidden' class='tipe_jaminan' data-no='"+no+"' name='tipe_jaminan["+no+"]' value='"+tipe_jaminan+"'/>"+tipe_jaminan+"</td>";
            html += "<td class='text-left'><input type='hidden' class='nama_perusahaan' data-no='"+no+"' name='nama_perusahaan["+no+"]' value='"+nama_perusahaan+"'/>"+nama_perusahaan+"</td>";
            html += "<td class='text-right'><input type='hidden' class='nomor_jaminan' data-no='"+no+"' name='nomor_jaminan["+no+"]' value='"+nomor_jaminan+"'/>"+nomor_jaminan+"</td>";
            html += "<td class='text-right'><input type='hidden' class='alamat' data-no='"+no+"' name='alamat["+no+"]' value='"+alamat+"'/>"+alamat+"</td>";
            html += "<td class='text-right'><input type='hidden' class='nilai' data-no='"+no+"' name='nilai["+no+"]' value='"+nilai_int+"'/>"+nilai_int+"</td>";
            html += "<td class='text-right'><input type='hidden' class='mulai_berlaku' data-no='"+no+"' name='mulai_berlaku["+no+"]' value='"+mulai_berlaku+"'/><input type='hidden' class='berlaku_hingga' data-no='"+no+"' name='berlaku_hingga["+no+"]' value='"+berlaku_hingga+"'/>"+mulai_berlaku+ ' / ' +berlaku_hingga+"</td>";
            html += "<td class='text-right'><input type='hidden' class='jaminan_file' data-no='"+no+"' name='jaminan_file["+no+"]' value='"+jaminan_file+"'/><a href='"+url_file+jaminan_file+"'>"+jaminan_file+"</a></td>";
            html += "<td><button type='button' class='btn btn-warning btn-sm edit_item' data-no='"+no+"'><i class='fa fa-edit'></i></button></td>"; 
            html += "</tr>";

        $("#item_table").append(html);
        $("#jenis_jaminan_inp").val("");
        $("#nama_perusahaan_inp").val("");
        $("#nomor_jaminan_inp").val("");        
        $("#alamat_inp").val("");
        $("#mulai_berlaku_inp").val("");
        $("#berlaku_hingga_inp").val("");
        $("#tipe_jaminan_inp").val("");
        $("#nilai_inp").val("");
        $("#jaminan_file_inp").val("");
        $("#current_item").val("");
      }

    });

    $(document.body).on("click",".empty_item",function(){
      $("#current_item").val("");     
      $("#jenis_jaminan_inp").val("");
      $("#nama_perusahaan_inp").val("");
      $("#nomor_jaminan_inp").val("");      
      $("#alamat_inp").val("");
      $("#mulai_berlaku_inp").val("");
      $("#berlaku_hingga_inp").val("");
      $("#tipe_jaminan_inp").val("");
      $("#jaminan_file_inp").val("");
      $("#nilai_inp").val("");
    });

    $(document.body).on("click",".edit_item",function(){
      var no = $(this).attr('data-no');
      var jenis_jaminan = $(".jenis_jaminan[data-no='"+no+"']").val();
      var nama_perusahaan = $(".nama_perusahaan[data-no='"+no+"']").val();
      var nomor_jaminan = $(".nomor_jaminan[data-no='"+no+"']").val();
      var alamat = $(".alamat[data-no='"+no+"']").val();
      var mulai_berlaku = $(".mulai_berlaku[data-no='"+no+"']").val();
      var berlaku_hingga = $(".berlaku_hingga[data-no='"+no+"']").val();
      var tipe_jaminan = $(".tipe_jaminan[data-no='"+no+"']").val();
      var jaminan_file = $(".jaminan_file[data-no='"+no+"']").val();
      var nilai = $(".nilai[data-no='"+no+"']").val();
      
      $("#current_item").val(no);
      $("#jenis_jaminan_inp").val(jenis_jaminan);
      $("#nama_perusahaan_inp").val(nama_perusahaan);
      $("#nomor_jaminan_inp").val(nomor_jaminan);
      $("#alamat_inp").val(alamat);
      $("#mulai_berlaku_inp").val(mulai_berlaku);
      $("#berlaku_hingga_inp").val(berlaku_hingga);
      $("#tipe_jaminan_inp").val(tipe_jaminan);
      $("#jaminan_file_inp").val(jaminan_file);
      $("#nilai_inp").val(inttomoney(nilai));
      
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

  function isShowAddJaminan() {
		var div_add = document.getElementById("showAddJaminan");
		var div_btn = document.getElementById("showButtonJaminan");
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
