<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/app-assets/css/pages/charts-apex.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets'); ?>/app-assets/vendors/css/apexcharts.css">

<section class="users-list-wrapper">
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 danger">2 %</h3>
								<span><?php echo $this->lang->line('persentase_efisiensi'); ?></span>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-briefcase danger font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 success">156</h3>
								<span><?php echo $this->lang->line('jumlah_rfq_aktif'); ?></span>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-user success font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 warning">249</h3>
								<span><?php echo $this->lang->line('jumlah_pengadaan'); ?></span>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-pie-chart warning font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 primary">730</h3>
								<span><?php echo $this->lang->line('jumlah_vendor_aktif'); ?></span>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-life-buoy primary font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="card-header">
							<h4 class="card-title">Jumlah Vendor Terverifikasi CQSMS / Vendor Terdaftar</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<ul class="list-group mb-3">
									<li class="list-group-item">
										<span>Jasa Sewa</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;" >85 </span> / <span style="color: #FF4800;" >  87</span></span>
									</li>
									<li class="list-group-item">
										<span>Jasa Lainnya (transporter, dll di luar jasa konstruksi dan konsultan)</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;">133</span> / <span style="color: #FF4800;" > 143</span></span>
									</li>
									<li class="list-group-item">
										<span>Jasa Mandor</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;">50 </span>/ <span style="color: #FF4800;" > 68</span></span>
									</li>
									<li class="list-group-item">
										<span>Jasa Konsultan</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;">50</span> / <span style="color: #FF4800;" > 52</span></span>
									</li>
									<li class="list-group-item">
										<span>Jasa Konstruksi (Subkon)</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;">130</span> / <span style="color: #FF4800;" > 146</span></span>
									</li>
									<li class="list-group-item">
										<span>Barang (Vendor, Supplier)</span>
										<span class="badge bg-light-gray float-right"><span style="color: #004899;">200 </span>/ <span style="color: #FF4800;" > 234</span></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Diagram Verifikasi CQSMS Vendor</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<div id="column-chart-hse"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 danger">2 Hari</h3>
								<h5>Rata - Rata Waktu Pengadaan</h5>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-calendar danger font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<div class="media">
							<div class="media-body text-left">
								<h3 class="mb-1 info">Rp. 2.456.000.000</h3>
								<h5>Nilai Kontrak</h5>
							</div>
							<div class="media-right align-self-center">
								<i class="ft-book-open info font-large-2 float-right"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Column Chart starts -->
		<div class="col-xl-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Column Chart</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<div id="column-chart"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Column Chart ends -->

		<!-- Bar Chart starts -->
		<div class="col-xl-6 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Bar Chart</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<div id="bar-chart"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Bar Chart ends -->
	</div>
</section>

<script src="<?php echo base_url('assets'); ?>/app-assets/vendors/js/apexcharts.min.js"></script>

<script>
	$(document).ready(function() {
		var $primary = "#975AFF",
			$success = "#40C057",
			$info = "#2F8BE6",
			$warning = "#F77E17",
			$danger = "#F55252",
			$label_color_light = "#EAF0F9";
			$label_color_last = "#F55252";

		var themeColors = [$primary, $info, $warning, $success, $label_color_light,$label_color_last];

		//-------------- Column Chart starts --------------

		var columnChartOptions = {
			chart: {
				height: 350,
				type: 'bar',
			},
			colors: themeColors,
			plotOptions: {
				bar: {
					horizontal: false,
					endingShape: 'rounded',
					columnWidth: '55%',
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			series: [{
				name: 'Net Profit',
				data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
			}, {
				name: 'Revenue',
				data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
			}, {
				name: 'Free Cash Flow',
				data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
			}],
			legend: {
				offsetY: -10
			},
			xaxis: {
				categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
			},
			yaxis: {
				title: {
					text: '$ (thousands)'
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
					formatter: function(val) {
						return "$" + val + " thousands"
					}
				}
			}
		}
		var columnChart = new ApexCharts(
			document.querySelector("#column-chart"),
			columnChartOptions
		);
		columnChart.render();


		var columnChartOptionsHse = {
			chart: {
				height: 350,
				type: 'bar',
				stacked: false,
				
			},
			colors: ['#004899','#FF4800'],
			plotOptions: {
				bar: {
					horizontal: false,
					endingShape: 'rounded',
					columnWidth: '55%',
					distributed: false,
				},
			},
			dataLabels: {
				enabled: false
			},
			stroke: {
				show: true,
				width: 2,
				colors: ['transparent']
			},
			series: [{
					name: 'Jumlah Terverifikasi',
					data: [85, 133, 50, 50, 130, 234],
					//colors : ['bl']
				},
				{
					name: 'Jumlah Terdaftar',
					data: [87, 143, 68, 52, 146, 234]
				},
			],
			legend: {
				offsetY: -10,
				//show : false
			},
			xaxis: {
				title: {
					text: 'Kategori Vendor'
				},
				categories: ['Jasa Sewa', 'Jasa Lainnya (transporter, dll di luar jasa konstruksi dan konsultan)', 'Jasa Mandor', 'Jasa Konsultan', 'Jasa Konstruksi (Subkon)', 'Barang (Vendor, Supplier)'],
				labels: {
					style: {
					//colors: themeColors,
					fontSize: '12px'
					}
					
					
				}
			},
			yaxis: {
				title: {
					text: 'Jumlah Vendor'
				}
			},
			fill: {
				opacity: 1,
				//colors: themeColors
			},
			tooltip: {
				y: {
					formatter: function(val) {
						return val
					}
				}
			}
		}
		var columnChartHse = new ApexCharts(
			document.querySelector("#column-chart-hse"),
			columnChartOptionsHse
		);
		columnChartHse.render();


		//-------------- Bar Chart starts --------------

		var barChartOptions = {
			chart: {
				height: 350,
				type: 'bar',
			},
			colors: themeColors,
			plotOptions: {
				bar: {
					horizontal: true,
				}
			},
			dataLabels: {
				enabled: false
			},
			series: [{
				data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
			}],
			xaxis: {
				categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
				tickAmount: 5
			}
		}
		var barChart = new ApexCharts(
			document.querySelector("#bar-chart"),
			barChartOptions
		);
		barChart.render();
	});
</script>
