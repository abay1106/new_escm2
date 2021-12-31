<div class="wrapper wrapper-content animated fadeInRight">
<form method="post" action="<?php echo site_url($controller_name."/submit_add_grup_brg_smbd");?>"  class="form-horizontal">

  <?php //echo buttonsubmit('commodity/katalog/grup_barang') ?>

  <input type="hidden" name="jumlah" value="<?php echo $jumlah ?>">
  
  <?php for ($i=0; $i < $jumlah; $i++) { ?>

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Form Tambah Grup Barang</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
		
			<div class="form-group">
				<label class="col-sm-2 control-label">Level 1 UNSPSC *</label>
				<div class="col-sm-10">
					<select class="form-control" id="level_1" required>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Level 2 UNSPSC *</label>
				<div class="col-sm-10">
					<select class="form-control" name="level2_inp[<?php echo $i ?>]" id="level_2" required>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Level 3 UNSPSC</label>
				<div class="col-sm-10">
					<select class="form-control" name="level3_inp[<?php echo $i ?>]" id="level_3">
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Level 4 UNSPSC</label>
				<div class="col-sm-10">
					<select class="form-control" name="level4_inp[<?php echo $i ?>]" id="level_4">
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label">Level 1 Sumberdaya *</label>
				<div class="col-sm-10">
					<select class="form-control" name="level1smbd_inp[<?php echo $i ?>]" id="level_1_smbd">
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Level 2 Sumberdaya </label>
				<div class="col-sm-10">
					<select class="form-control" name="level2smbd_inp[<?php echo $i ?>]" id="level_2_smbd">
					</select>
				</div>
			</div>

	      <?php $curval = (isset($v['is_matgis'])) ? $v['is_matgis'] : set_value("is_matgis_inp[$i]");
                ?>
          <div class="form-group">
              <label class="col-sm-2 control-label">Tipe Matgis</label>
              <div class="col-sm-10">
                <p class="form-control-static">
                  <input type="checkbox" name="is_matgis_inp[<?php echo $i ?>]" 
                  value="t" <?php  echo $curval == 't' ? "checked" : ''; ?> >
                </p>
              </div>
            </div>

          <?php $curval = set_value("name_inp[$i]"); ?>
          <div class="form-group">
            <label class="col-sm-2 control-label"><?php echo lang('name') ?> *</label>
            <div class="col-sm-10">
            <textarea class="form-control" required name="name_inp[<?php echo $i ?>]"><?php echo $curval ?></textarea>
           </div>
         </div>

        </div>
      </div>
    </div>
  </div>

  <?php } ?>

  <?php echo buttonsubmit('commodity/katalog/grup_barang',lang('back'),lang('save')) ?>

</form>

</div>

  <script type="text/javascript">

    $(function () {
		
		$.ajax({
          url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?level=1') ?>",
          type:"get",
		  dataType:"json",
		  success: function(data) {
            $.each(data, function(index, row) {
				$("#level_1").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
			});
			
			loadLevel2AndBelow();
          }
        });
	  
	 $("#level_1").change(function(){
		$("#level_2").html("");
		$("#level_3").html("");
		$("#level_4").html("");
		$("#level_1_smbd").html("");
		$("#level_2_smbd").html("");
		loadLevel2AndBelow();  
	  });
	  
	  
	  $("#level_2").change(function(){
	  	$("#level_3").html("");
		$("#level_4").html("");
		$("#level_1_smbd").html("");
		$("#level_2_smbd").html("");
		loadLevel3AndBelow();
	  });

	   $("#level_3").change(function(){
		$("#level_4").html("");
		$("#level_1_smbd").html("");
		$("#level_2_smbd").html("");
		loadLevel4AndBelow();
	  });

	   $("#level_4").change(function(){
	   	$("#level_1_smbd").html("");
		$("#level_2_smbd").html("");
	    loadLevel1SmbdAndBelow();
		// refreshDatatable();
	  });

	  $("#level_1_smbd").change(function(){
		$("#level_2_smbd").html("");
		loadLevel2SmbdAndBelow();
		
	  });

	  $("#level_2_smbd").change(function(){
		$("#level_3_smbd").html("");
		loadLevel3SmbdAndBelow();
		
	  });

    });

	function loadLevel2AndBelow(){
		$.ajax({
				url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?parent='); ?>"+$("#level_1").val(),
				type:"get",
				dataType:"json",
				success: function(data) {
				$.each(data, function(index, row) {
					$("#level_2").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
				});
				
				loadLevel3AndBelow();
				}
			});		
	}

	function loadLevel3AndBelow(){
		$.ajax({
				url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?parent='); ?>"+$("#level_2").val(),
				type:"get",
				dataType:"json",
				success: function(data) {
				$("#level_3").append("<option value=''>Pilih</option>");
				$.each(data, function(index, row) {
					$("#level_3").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
				});
				
				loadLevel4AndBelow();
				}
			});		
	}

	function loadLevel4AndBelow(){
		$.ajax({
				url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?parent='); ?>"+$("#level_3").val(),
				type:"get",
				dataType:"json",
				success: function(data) {
				$("#level_4").append("<option value=''>Pilih</option>");
				$.each(data, function(index, row) {
					$("#level_4").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
				});
				
				loadLevel1SmbdAndBelow();
				}
			});		
	}
	
		function loadLevel1SmbdAndBelow(){
		$.ajax({
          url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?level=1&type=smbd') ?>",
          type:"get",
		  dataType:"json",
		  success: function(data) {
            $.each(data, function(index, row) {
				$("#level_1_smbd").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
			});
			
			loadLevel2SmbdAndBelow();
          }
        });
	}
	function loadLevel2SmbdAndBelow(){
		$.ajax({
				url:"<?php echo site_url('Commodity/dropdown_grup_brg_smbd?type=smbd&parent='); ?>"+$("#level_1_smbd").val(),
				type:"get",
				dataType:"json",
				success: function(data) {
				$("#level_2_smbd").append("<option value=''>--PILIH-- (Kosongkan Jika Ingin Menambah Group Level 2)</option>");
				$.each(data, function(index, row) {
					$("#level_2_smbd").append("<option value='"+row.mat_group_code+"'>"+row.mat_group_code+" - "+row.mat_group_name+"</option>");
				});
				
				// loadLevel3SmbdAndBelow();
				}
			});		
	}

	

  </script>