
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Header Vendor</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="ibox-content">
			<input style="display: none" name="comment_id" value="<?php echo $comment ?>">

				<?php
				 $curval = $data["vendor_name"]; ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Vendor</label>
					<div class="col-sm-9">
						<p class="form-control-static" id="vendor_name_inp"><a href="<?php echo site_url('vendor/daftar_vendor/lihat_detail_vendor/'.$data['vendor_id']) ?>" target="_blank"><?php echo $curval ?></a></p>
					</div>
				</div>

				<?php $curval = $data["address_street"]; ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-9">
						<p class="form-control-static" id="address_street_inp"><?php echo $curval ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Survei</label>
					<div class="col-sm-5">
						<div class="i-checks">
						  <label class=""> 
						    <div class="<?php echo $survey['y'] ?>" style="position: relative;">
						      <input type="checkbox" value="3" name="survey_inp" id="data" class="survei" data-tipe="sw" style="position: absolute; opacity: 0;" disabled>
						      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
						      </ins>
						    </div>
						    <i></i>&nbsp;&nbsp; Rekomendasi Survei
						  </label>
						</div>
						<div class="i-checks">
						  <label class=""> 
						    <div class="<?php echo $survey['n']?>" style="position: relative;">
						      <input type="checkbox" value="4" name="survey_inp" id="data" class="survei" data-tipe="mw" style="position: absolute; opacity: 0;" disabled>
						      <ins class="iCheck-helper" checked style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
						      </ins>
						    </div> 
						    <i></i>&nbsp;&nbsp; Rekomendasi Tidak Survei
						  </label>
						</div> 
                    </div>
				</div>
				<?php
				 if ((strlen($data['survey_recom']) > 33)) {
					$curval = $data['survey_recom'] ?>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Lampiran Rekomendasi</label>
				  <div class="col-sm-5">
				    <p class="form-control-static">
				      <?php if ($curval != "") { ?>
				        <a href="<?php echo site_url("log/download_attachment/activation/survei/".$curval) ?>" target="_blank">
				        <?php echo $curval ?>
				    <?php } else {?>
				          -
				        <?php } ?>
				      </a>
				    </p>
				  </div>
				</div>
				<?php } ?>

				<?php if ($data['state_now'] == "2") { ?>
	   			<div class="form-group">
	  				<label class="col-sm-3 control-label">Tanggal Survey *</label>
						<div class="col-sm-3">
	            		<div class="input-group date">
	                		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	                		<input type="text" name="survey_date_inp" class="form-control survey_date valid"  id="survey_date" value="" aria-invalid="false" required>
	   					</div>
	   				</div>
	   			</div>
	   			<?php } ?>

	   			<?php if ($data['state_now'] == "1" && $data['survey_result'] != NULL) { ?>
	   			<div class="form-group">
	  				<label class="col-sm-3 control-label">Tanggal Survey</label>
						<div class="col-sm-3">
	            		<div class="input-group date">
	            			<p class="form-control-static"><?php echo $data['survey_date'] ?></p>
	   					</div>
	   				</div>
	   			</div>

	   			<div class="form-group">
	   			  <label class="col-sm-3 control-label">Lampiran Hasil Survey</label>
	   			  <div class="col-sm-5">
	   			    <p class="form-control-static">
	   			      <?php if ($curval != "") { ?>
	   			        <a href="<?php echo site_url("log/download_attachment/activation/hasil/".$curval) ?>" target="_blank">
	   			        <?php echo $data['survey_result'] ?>
	   			    <?php } else {?>
	   			          -
	   			        <?php } ?>
	   			      </a>
	   			    </p>
	   			  </div>
	   			</div>
	   			<?php } ?>

				<?php if ($data['state_now'] == "2") {
					$curval = "" ?>
				<div class="form-group" id="attachment_div">
					<label class="col-sm-3 control-label">Lampiran Hasil Survei *</label>
					<div class="col-sm-7">
				    	<div class="input-group">
				      		<span class="input-group-btn">
				        		<button type="button" data-id="doc_attachment2_inp" data-folder="<?php echo "activation/hasil" ?>" data-preview="preview_file" class="btn btn-primary upload">
				          			<i class="fa fa-cloud-upload"></i>
				        		</button> 
				        		<button type="button" data-id="doc_attachment2_inp" data-folder="<?php echo "activation/hasil" ?>" data-preview="preview_file" class="btn btn-danger removefile">
				          			<i class="fa fa-remove"></i>
				        		</button> 
				      		</span> 
				      		<input readonly type="text" class="form-control" id="doc_attachment2_inp" name="doc_attachment2_inp" value="<?php echo $curval ?>">
				      		<span class="input-group-btn">
				        		<button type="button" data-url="<?php echo site_url("log/download_attachment/activation/hasil/".$curval) ?>" class="btn btn-primary preview_upload" id="preview_file">
				          			<i class="fa fa-share"></i>
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
				<?php } ?>

				<?php if ($activity_id > 6092) { ?>
				<?php $curval = ""; ?>
				<div class="form-group">
					<label class="col-md-3 control-label">Status *</label>
					<div class="col-md-2">
						<select class="form-control" name="reg_isactivate_inp" required>
							<option value="" readonly>--Pilih--</option>
							<?php 
							foreach($pilihan as $key => $val){
								$selected = "";//($key == $curval) ? "selected" : ""; 
								?>
								<option <?php echo $selected ?> value="<?php echo $key ?>"><?php echo $val ?></option>
								<?php } ?>
							</select>
					</div>
				</div>

					<?php $curval = ""; ?>
				<div class="form-group">
					<label class="col-md-3 control-label">Kantor Daftar *</label>
					<div class="col-md-4">
						<select class="form-control" name="district_inp" required>
							<option value="" readonly>--Pilih--</option>
							<?php 
							foreach($district as $key => $val){
								$selected = ($val['district_id'] == $curval) ? "selected" : ""; 
								?>
								<option <?php echo $selected ?> value="<?php echo $val['district_id'] ?>"><?php echo $val['district_name'] ?></option>
								<?php } ?>
							</select>
					</div>
				</div> 

			<!-- 	<div class="form-group">
					<label class="col-md-3 control-label">COT *</label>
					<div class="col-md-4">
						<select class="form-control" name="cot_inp" required>
							<option value="" readonly>--Pilih--</option>
							<?php 
							//foreach($cot as $key => $val){
							//	$selected = ($val['cot_id'] == $curval) ? "selected" : ""; 
								?>
								<option <?php //echo $selected ?> value="<?php //echo $val['cot_id'] ?>"><?php //echo $val['jenis_nasabah'] ?></option>
								<?php //} ?>
							</select>
					</div>
				</div> -->
				



				<div class="form-group">
					<label class="col-sm-3 control-label">COT *</label>
					<div class="col-sm-5">

						<?php foreach ($cot as $key => $value) { ?>
		                	<div class="i-checks">
		                		<label class=""> 
			                		<div class="icheckbox_square-green" style="position: relative;">
			                			<input type="checkbox"  value="<?php echo $value['cot_id'] ?>" name="cot_inp[]" id="cots" class="cots" style="position: absolute; opacity: 0;">
			                				<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
			                				</ins>
			            			</div> <i></i> <?php echo $value['jenis_nasabah']; ?>
			            		</label>
		            		</div>

						<?php } ?>
	                	<!-- 
	            		<div class="i-checks">
	            			<label class=""> 
		            			<div class="icheckbox_square-green" style="position: relative;">
		            				<input type="checkbox"  value="3" name="survey_inp" id="data" class="survei" data-tipe="sw" style="position: absolute; opacity: 0;">
		            					<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
		            					</ins>
		        				</div> <i></i> Option two checked 
		        			</label>
	        			</div> -->
	                </div>
				</div>

				<div class="form-group">
						
					

				</div>


				<div class="form-group">
					<label class="col-md-3 control-label">Jenis *</label>
					<div class="col-md-4">
						<select class="form-control" name="jenis_inp" required>
							<option value="" readonly>--Pilih--</option>
							<?php 
							foreach($jenis as $key => $val){
								$selected = ($val['acj_id'] == $curval) ? "selected" : ""; 
								?>
								<option <?php echo $selected ?> value="<?php echo $val['acj_id'] ?>"><?php echo $val['acj_name'] ?></option>
								<?php } ?>
							</select>
					</div>
				</div>
				
				<!-- <div class="form-group">
					<label class="col-md-3 control-label">Kelompok *</label>
					<div class="col-md-4">
						<select class="form-control" name="kelompok_inp" required>
							<option value="" readonly>--Pilih--</option>
							<?php 
							//foreach($kelompok as $key => $val){
								//$selected = ($val['ack_id'] == $curval) ? "selected" : ""; 
								?>
								<option <?php //echo $selected ?> value="<?php //echo $val['ack_id'] ?>"><?php //echo $val['ack_name'] ?></option>
								<?php //} ?>
							</select>
					</div>
				</div> -->
<!-- 
				<div class="form-group">
					<label class="col-md-3 control-label">COT *</label>
					<div class="col-md-4">
						<select class="form-control" name="cot_inp" readonly disabled>
							<option selected value="<?php //echo $data['cot_id'] ?>"><?php //echo $data['cot'] ?></option>
						</select>
					</div>
				</div>
 -->
				<?php if($data["customer_code"]==NULL || $data["customer_code"]==''){;?>	
				<?php $curval = ""?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kode Nasabah</label>
					<div class="col-sm-9">
						<p class="form-control-static" id="customer_code_inp">Auto Generate</p>
					</div>
				</div>
				<?php } ?>

			  <?php if($data["customer_code"]!=NULL){;?>
				<?php $curval = $data["customer_code"]; ?>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kode Nasabah</label>
					<div class="col-sm-9">
						<p class="form-control-static" id="customer_code_inp"><?php echo $curval ?></p>
					</div>
				</div>

			  <?php }?>

			<!-- <?php $curval = $data["survey_date"]; ?>
			 <div class="form-group">
  				<label class="col-sm-3 control-label">Tanggal Survey</label>
					<div class="col-sm-3">
            		<div class="input-group date">
                		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                		<input type="text" name="survey_date_inp" class="form-control survey_date valid" value="<?php echo $curval ?>" required="" id="survey_date" value="" aria-required="true" aria-invalid="false"  readonly disabled>
   					</div>
   				</div>
   			</div> -->

   			<!-- <div class="form-group">
  				<label class="col-sm-3 control-label">Tanggal Survey</label>
					<div class="col-sm-3">
            		<div class="input-group date">
                		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                		<input type="text" name="survey_date_inp" class="form-control survey_date valid"  id="survey_date" value="" aria-invalid="false">
   					</div>
   				</div>
   			</div>
 -->

			  <?php }?>
				</div>
			</div>
		</div>
	</div>

<script>
	$('.survey_date').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"})

	 $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    // radioClass: 'iradio_square-green',
                });
            });

</script>