<div class="wrapper wrapper-content animated fadeInRight">
  <form method="post" action="<?php echo site_url($controller_name."/submit_pembuatan_permintaan_pengadaan");?>"  class="form-horizontal ajaxform">

<?php 
foreach ($content as $key => $value) {

	include(VIEWPATH."procurement/proses_pengadaan/".$value['awc_type']."/".$value['awc_file'].".php");
}

?>

<?php 
$i = 0;
include(VIEWPATH."/comment_workflow_attachment_v.php") ?>

<div class="card">				
  <div class="card-content">
    <div class="card-body">			
      <?php echo buttonsubmit('procurement/daftar_pekerjaan',lang('back'),lang('save')) ?>
    </div>
  </div>
</div>

</form>

</div>