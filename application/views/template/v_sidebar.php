	<section class="sidebar">
		<!-- user -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php if ($this->session->userdata('foto')!=""): ?>
					<img src="<?php echo base_url('upload/'.$this->session->userdata('foto')) ?>" class="img-circle" alt="User Image">
					<?php else: ?>
						<?php if ($this->session->userdata('jk')=='L'): ?>
							<img src="<?php echo base_url() ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
							<?php else: ?>
								<img src="<?php echo base_url() ?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
							<?php endif ?>
						<?php endif ?>
					</div>
					<div class="pull-left info">
						<p class="text-capitalize"><?php echo $this->session->userdata('nama'); ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- search -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>

				<!-- menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MENU UTAMA</li>
					<!-- menu beranda -->
					<li class="<?php if($this->uri->segment(1)=="" || $this->uri->segment(1)=='home') echo 'active'; ?>">
						<a href="<?php echo base_url() ?>">
							<i class="fa fa-dashboard"></i> <span>Beranda</span>
						</a>
					</li>
					<!-- santri -->
					<li class="treeview <?php if($this->uri->segment(1)=="santri_baru" || $this->uri->segment(1)=="santri_aktif") echo 'active'; ?>">
						<a href="#">
							<i class="fa fa-users"></i>
							<span>Santri</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?php if($this->uri->segment(1)=="santri_baru") echo "active" ?>">
								<a href="<?php echo base_url('santri_baru') ?>"><i class="fa fa-users"></i> Santri Baru</a>
							</li>
							<li class="<?php if($this->uri->segment(1)=="santri_aktif") echo "active" ?>">
								<a href="<?php echo base_url('santri_aktif') ?>"><i class="fa fa-users"></i> Santri Aktif</a>
							</li>
						</ul>
					</li>
					<!-- kelas -->
					<li class="<?php if($this->uri->segment(1)=="kelas") echo "active" ?>">
						<a href="<?php echo base_url('kelas/tampilSantri') ?>">
							<i class="fa fa-graduation-cap"></i> <span>Kelas</span>
						</a>
					</li>
					<!-- catatan santri -->
					<li class="<?php if($this->uri->segment(1)=="catatan_santri") echo "active" ?>">
						<a href="<?php echo base_url('catatan_santri') ?>">
							<i class="fa  fa-pencil"></i> <span>Catatan santri</span>
						</a>
					</li>

					<?php if ($this->session->userdata('level')=='SA'): ?>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-gear"></i>
								<span>Pengaturan</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="<?php echo base_url('user') ?>"><i class="fa fa-user"></i> User</a>
								</li>
								<li>
									<a href="<?php echo base_url('kelas/tampil') ?>"><i class="fa fa-gear"></i> Kelas</a>
								</li>
							</ul>
						</li>
					<?php endif ?>
				</ul>
			</section>
