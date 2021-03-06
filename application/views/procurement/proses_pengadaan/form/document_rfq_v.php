<section>		
  <div class="row">
    <div class="col-12">
      <div class="card">
        
        <div class="card-header border-bottom pb-2">
            <h4 class="card-title">Lampiran Dokumen</h4>
        </div>

        <div class="card-content">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-12">
                  <center>
                    <a class="btn btn-info tambah_dok">Tambah Lampiran</a>
                    <br/>
                    <br/>
                  </center>
                  </div>
                  </div>

                  <div id="lampiran_container">

                  <?php 
                  $sisa = 5;
                  if(isset($document) && !empty($document)){
                  foreach ($document as $k => $v) {
                    $show = ($k == 0 || !empty($v['ptd_file_name'])) ? "" : "display:none;";
                    ?>

                    <div class="row lampiran" style="<?php echo $show ?>" data-no="<?php echo $k ?>">
                      <div class="col-lg-12">
                          <div class="card">
            
                            <div class="card-header border-bottom pb-2">
                                <h4 class="card-title float-left">Dokumen #<?php echo $k ?></h4>
                                <a class="tutup float-right" data-no="<?php echo $k ?>">
                                  <i class="fa fa-times"></i>
                                </a>
                            </div>

                            <div class="card-content">
                              <div class="card-body">
                                  <?php $curval = (isset($v['ptd_category'])) ? $v['ptd_category'] :  set_value("doc_category_inp[$k]"); ?>
                                  <div class="row form-group">
                                    <label class="col-sm-1 control-label"><?php echo lang('category') ?></label>
                                    <div class="col-sm-4">
                                      <select class="form-control" name="doc_category_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                                        <option value=""><?php echo lang('choose') ?></option>
                                        <?php foreach($doc_category as $key => $val){
                                        $selected = ($val['ldc_name'] == $curval) ? "selected" : ""; 
                                        ?>
                                        <option <?php echo $selected ?> value="<?php echo $val['ldc_name'] ?>"><?php echo $val['ldc_name'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <?php $curval = (isset($v['ptd_file_name'])) ? $v['ptd_file_name'] :  set_value("doc_attachment_inp[$k]"); ?>
                                  <label class="col-sm-1 control-label"><?php echo lang('attachment') ?></label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <span class="input-group-btn">
                                        <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo $dir ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-info upload">
                                          <i class="fa fa-cloud-upload"></i> Upload
                                        </button>
                                        <button type="button" data-url="<?php echo site_url('log/download_attachment/'.$dir.'/'.$curval) ?>" class="btn btn-info preview_upload" id="preview_file_<?php echo $k ?>">
                                          <i class="fa fa-share"></i> Preview
                                        </button> 
                                      </span> 
                                      <input readonly type="text" class="form-control" id="doc_attachment_inp_<?php echo $k ?>" name="doc_attachment_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                                      <span class="input-group-btn">
                                          <!-- haqim -->
                                          <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo $dir ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-danger removefile">
                                            <i class="fa fa-trash"></i> Delete
                                          </button> 
                                        </span> 
                                      </div>
                                      <div class="col-sm-0" style="margin-top: 5px;">
                                        <?php $curval = set_value("doc_type_inp[$k]"); ?>
                                        <select class="form-control" style=" border-color: grey" name="doc_type_inp[<?php echo $k ?>]">
                                          <?php $selected = ($curval == 0) ? "selected" : "" ?>
                                          <option <?php echo $selected ?> value="0">Dokumen Internal</option>
                                          <?php $selected = ($curval == 1) ? "selected" : "" ?>
                                          <option <?php echo $selected ?> value="1">Dokumen Vendor</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-0" style="font-size: 11px">
                                      <i>Max file 5 MB 
                                        <br>
                                        Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
                                      </i>
                                    </div>
                                  </div>
                                  </div>

                                  <?php $curval = (isset($v['ptd_description'])) ? $v['ptd_description'] :  set_value("doc_desc_inp[$k]"); ?>

                                  <div class="row form-group">
                                  <label class="col-sm-1 control-label"><?php echo lang('description') ?></label>
                                  <div class="col-sm-11">
                                    <textarea class="form-control" maxlength="1000" name="doc_desc_inp[<?php echo $k ?>]"><?php echo $curval ?></textarea>
                                  </div>
                                  </div>

                                  <?php $curval = (isset($v['ptd_id'])) ? $v['ptd_id'] :  ""; ?>
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
                    <div class="col-lg-12">
                        <div class="card">                
                            <div class="card-header border-bottom pb-2">
                                <h4 class="card-title float-left">Dokumen #<?php echo $k ?></h4>
                                <?php if($k > 0){ ?>
                                    <a class="tutup float-right" data-no="<?php echo $k ?>">
                                    <i class="fa fa-times"></i>
                                  </a>
                                <?php } ?>
                            </div>

                            <div class="card-content">
                              <div class="card-body">
                                  <?php $curval = set_value("doc_category_inp[$k]"); ?>
                                    <div class="row form-group">
                                      <label class="col-sm-1 control-label"><?php echo lang('category') ?></label>
                                      <div class="col-sm-4">
                                        <select class="form-control" name="doc_category_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                                          <option value=""><?php echo lang('choose') ?></option>
                                          <?php foreach($doc_category as $key => $val){
                                          $selected = ($val['ldc_name'] == $curval) ? "selected" : ""; 
                                          ?>
                                          <option <?php echo $selected ?> value="<?php echo $val['ldc_name'] ?>"><?php echo $val['ldc_name'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <?php $curval = set_value("doc_attachment_inp[$k]"); ?>
                                    <label class="col-sm-1 control-label"><?php echo lang('attachment') ?></label>
                                    <div class="col-sm-6">
                                      <div class="input-group">
                                        <span class="input-group-btn">
                                          <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo $dir ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-info upload">
                                            <i class="fa fa-cloud-upload"></i> Upload
                                          </button>
                                          <button type="button" data-url="<?php echo site_url('log/download_attachment/procurement/'.$curval) ?>" class="btn btn-info preview_upload" id="preview_file_<?php echo $k ?>">
                                            <i class="fa fa-share"></i> Preview
                                          </button> 
                                        </span> 
                                        <input readonly type="text" class="form-control" id="doc_attachment_inp_<?php echo $k ?>" name="doc_attachment_inp[<?php echo $k ?>]" value="<?php echo $curval ?>">
                                        <span class="input-group-btn">
                                          <button type="button" data-id="doc_attachment_inp_<?php echo $k ?>" data-folder="<?php echo $dir ?>" data-preview="preview_file_<?php echo $k ?>" class="btn btn-danger removefile">
                                            <i class="fa fa-trash"></i> Delete
                                          </button> 
                                        </span> 
                                      </div>
                                      <div class="col-sm-0" style="margin-top: 5px;">
                                        <?php $curval = set_value("doc_type_inp[$k]"); ?>
                                        <select class="form-control" style=" border-color: grey" name="doc_type_inp[<?php echo $k ?>]">
                                          <?php $selected = ($curval == 0) ? "selected" : "" ?>
                                          <option <?php echo $selected ?> value="0">Dokumen Internal</option>
                                          <?php $selected = ($curval == 1) ? "selected" : "" ?>
                                          <option <?php echo $selected ?> value="1">Dokumen Vendor</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-0" style="font-size: 11px">
                                      <i>Max file 5 MB 
                                        <br>
                                        Tipe file : doc, docx, xls, xlsx, ppt, pptx, pdf, jpg, jpeg, PNG, Zip, rar, tgz, 7zip, tar
                                      </i>
                                    </div>
                                  </div>
                                </div>

                                <?php $curval = set_value("doc_desc_inp[$k]"); ?>
                                <div class="row form-group">
                                  <label class="col-sm-1 control-label"><?php echo lang('description') ?></label>
                                  <div class="col-sm-11">
                                    <textarea class="form-control" maxlength="1000" name="doc_desc_inp[<?php echo $k ?>]"><?php echo $curval ?></textarea>
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
</section>

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
