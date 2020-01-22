<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $santri_baru ?></h3>

				<p class="text-capitalize">Santri Baru</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="<?php echo base_url('santri_baru')?>" class="small-box-footer">selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h3><?php echo $santri_aktif ?></h3>

				<p class="text-capitalize">Santri Aktif</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="<?php echo base_url('santri_aktif')?>" class="small-box-footer">selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php echo $kelas ?></h3>

				<p>Kelas</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="<?php echo base_url('kelas/tampilSantri') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3><?php echo $catatan_santri ?></h3>

				<p>Catatan Santri</p>
			</div>
			<div class="icon">
				<i class="fa fa-graduation-cap"></i>
			</div>
			<a href="<?php echo base_url('catatan_santri') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	

</div>