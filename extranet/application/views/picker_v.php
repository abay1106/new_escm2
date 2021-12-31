
<!-- Modal -->
<?php $idpick = (isset($isnego) == TRUE) ? "picker_pick_nego" : "picker_pick" ?>
<div class="modal fade" id="picker" tabindex="-1" role="dialog" aria-labelledby="pickerLabel">
  <div class="modal-dialog modal-lg" style="width:90%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="pickerLabel"><?php echo $this->lang->line('Pilih Data'); ?></h4>
      </div>
      <div class="modal-body">
        <div id="picker_content" width="100%" height="480px;"></div>
        <input type="hidden" name="picker_id" id="picker_id">
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" id=<?php echo $idpick ?>><?php echo $this->lang->line('Simpan'); ?></button>
        <button type="button" class="btn btn-default" id="dismiss" data-dismiss="modal"><?php echo $this->lang->line('Keluar'); ?></button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  // $(document).ready(function(){
  //   $("#picker_pick").click(function(){
  //     button_disabled();
  //   });
  
  // function button_disabled(){
  //   $("#picker_pick").prop("disabled", true);
  //   $("#dismiss").prop("disabled", true);
  //   $("#picker_pick").text("Sedang Mengirim ..."); 
  // }
  
  // function button_enabled(){
  //   $("#picker_pick").prop("disabled", false);
  //   $("#dismiss").prop("disabled", false);
  //   $("#picker_pick").text("Simpan");  
  // }

  // })

</script>