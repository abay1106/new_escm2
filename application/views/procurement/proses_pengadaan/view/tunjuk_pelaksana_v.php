<div class="row">
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5>Buyer</h5>
        <?php $curval = (isset($permintaan['pr_buyer']))? $permintaan['pr_buyer'] : null; ?>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama *</label>
            <div class="col-sm-8">
            <p class="form-control-static"><?php echo $curval ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>