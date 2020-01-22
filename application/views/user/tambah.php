<div class="box box-success ">
	<div class="box-header with-border">
		<h3 class="box-title text-capitalize"><?php echo $this->uri->segment(2) ?> data</h3>
		<div class="box-tools pull-right">
			<a href="<?php echo base_url($this->uri->segment(1)) ?>" role="button" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i></a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8">
				<form class="form-horizontal" method="post" action="<?php echo base_url($this->uri->segment(1).'/'.$this->uri->segment(2)) ?>" enctype="multipart/form-data">
					<!-- nama -->
					<div class="form-group <?php if(form_error('nama')) echo 'has-error' ?>">
						<label class="col-md-4 control-label">Nama</label>
						<div class="col-md-8">
							<input type="text" name="nama" class="form-control"  value="<?php echo set_value('nama') ?>">
							<small class="text text-danger"><?php echo form_error('nama'); ?></small>
						</div>
					</div>

					<!-- jenis kelamin -->
					<div class="form-group <?php if(form_error('jenis_kelamin')) echo 'has-error' ?>">
						<label class="col-md-4 control-label">Jenis Kelamin</label>
						<div class="col-md-8">
							<input type="radio"  name="jenis_kelamin" class="flat-red"  value="L" <?php if(set_value('jenis_kelamin')=='L') echo "checked"; ?>> Laki - laki  	
							<input type="radio"  name="jenis_kelamin" class="flat-red"  value="P" <?php if(set_value('jenis_kelamin')=='P') echo "checked"; ?>> Perempuan	
							<small class="text text-danger"><?php echo form_error('jenis_kelamin'); ?></small>
						</div>
					</div>

					<!-- username -->
					<div class="form-group <?php if(form_error('username')) echo 'has-error' ?>">
						<label class="col-md-4 control-label">username</label>
						<div class="col-md-8">
							<input type="text" name="username" class="form-control"  value="<?php echo set_value('username') ?>">
							<small class="text text-danger"><?php echo form_error('username'); ?></small>
						</div>
					</div>

					<!-- password -->
					<div class="form-group <?php if(form_error('password')) echo 'has-error' ?>">
						<label class="col-md-4 control-label">password</label>
						<div class="col-md-8">
							<input type="password" name="password" class="form-control"  value="<?php echo set_value('password') ?>">
							<small class="text text-danger"><?php echo form_error('password'); ?></small>
						</div>
					</div>

					<!-- level -->
					<div class="form-group <?php if(form_error('level')) echo 'has-error' ?>">
						<label class="col-md-4 control-label">level</label>
						<div class="col-md-8">
							<select name="level" class="form-control select2">
								<option value=""></option>
								<option value="SA" <?php if(set_value('level')=='SA') echo "selected"; ?>>Super Admin</option>
								<option value="A" <?php if(set_value('level')=='A') echo "selected"; ?>>Admin</option>
							</select>
							<small class="text text-danger"><?php echo form_error('level'); ?></small>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<input type="file" name="foto" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-4 col-md-offset-4">
							<button class="btn btn-success btn-flat" type="submit" name="simpan"><i class="fa fa-save"></i> Simpan</button>
							<button class="btn btn-default btn-flat" type="reset"><i class="fa fa-cancel"></i> Atur ulang</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
