<?php $urlaction = ($last_comment['activity'] == 1012 ? '/submit_join_pengadaan' : '/submit_ubah_permintaan_pengadaan'); 
?>

<div class="wrapper wrapper-content animated fadeInRight">

<form method="post" action="<?php echo site_url($controller_name.$urlaction);?>"  class="form-horizontal ajaxform">

<input type="hidden" name="id" value="<?php echo $id ?>">

<?php 

foreach ($content as $key => $value) {
	include($value['awc_type']."/".$value['awc_file'].".php");
}

?>

<?php 
$i = 0;
include(VIEWPATH."/comment_workflow_attachment_v.php") ?>

<?php echo buttonsubmit('procurement/daftar_pekerjaan',lang('back'),lang('save')) ?>

</form>

</div>
<?php
  	//haqim
	include VIEWPATH.'procurement/proses_pengadaan/chat_pr_v.php';
	//end
?>