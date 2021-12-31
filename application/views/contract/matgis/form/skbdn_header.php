<input type="hidden" name="contract_id" value="<?php echo $header['contract_id']?>">
<input type="hidden" name="wo_id" value="<?php echo $header['wo_id']?>">
<input type="hidden" name="wo_number" value="<?php echo $header['wo_number']?>">
<input type="hidden" name="wo_notes" value="<?php echo $header['wo_notes']?>">
<?php $curval = (isset($header['ctr_skbdn_no'])) ? $header['ctr_skbdn_no'] : ""; ?>
<div class="form-group">
  <label class="col-sm-2 control-label">No. SKBDN *</label>
  <div class="col-sm-8">
      <input type="text" name="skbdn_number" id="ctr_skbdn_no" class="form-control" value="<?php echo $curval ?>">
  </div>
</div>
<?php $curval = (isset($header['ctr_skbdn_penerbit'])) ? $header['ctr_skbdn_penerbit'] : ""; ?>
<div class="form-group">
  <label class="col-sm-2 control-label">SKBDN Penerbit*</label>
  <div class="col-sm-8">
      <input type="text" name="skbdn_penerbit" id="ctr_skbdn_penerbit" class="form-control" value="<?php echo $curval ?>">
  </div>
</div>
<?php $curval = (isset($header['contract_number'])) ? $header['contract_number'] : ""; ?>
<div class="form-group">
  <label class="col-sm-2 control-label">NO Kontrak</label>
  <div class="col-sm-8">
      <p class="form-control-static"><?php echo $curval ?></p>
  </div>
</div>
<?php $curval = (isset($header['wo_number'])) ? $header['wo_number'] : ""; ?>
<div class="form-group">
  <label class="col-sm-2 control-label">NO PO</label>
  <div class="col-sm-8">
      <p class="form-control-static"><?php echo $curval ?></p>
  </div>
</div>
<?php $curval = (isset($header['ctr_skbdn_tanggal_terbit'])) ?  date("Y-m-d",strtotime($header["ctr_skbdn_tanggal_terbit"])) : date('Y-m-d'); ?>
<div class="form-group">
  <label class="col-sm-2 control-label">Tanggal Terbit SKBDN*</label>
  <div class="col-sm-4">
      <div class="input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="date" name="ctr_skbdn_tanggal_terbit" id="ctr_skbdn_tanggal_terbit" class="form-control" value="<?php echo $curval ?>">
      </div>
  </div>
</div>
<script type="text/javascript">
//alert($('#userfile').val());
</script>
