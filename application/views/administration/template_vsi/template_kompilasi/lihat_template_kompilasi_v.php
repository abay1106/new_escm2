<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $period ?></h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">        			
        			<?php include 'page_question_v.php'; ?>
					<hr>
					<br>
        			<?php include 'page_importance_v.php'; ?>
					<hr>
					<br>
        			<?php include 'page_satisfaction_v.php'; ?>
					<hr>
					<br>
        			<?php include 'page_weight_v.php'; ?>
					<hr>
					<br>
        			<?php include 'page_weight_plus_v.php'; ?>
					<hr>
					<br>
        			<?php include 'page_percentage_v.php'; ?>
        			<hr>
        			<br>
        			<?php include 'page_chart_v.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>