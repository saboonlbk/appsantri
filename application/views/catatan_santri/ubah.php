<div class="box box-success ">
	<div class="box-header with-border">
		<h3 class="box-title text-capitalize"><?php echo $this->uri->segment(2) ?> data</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
		</div>
	</div>
	<form class="form form-horizontal" method="post" action="" id="form-ubah">
		<div class="box-body">
			<div class="row text-capitalize">
				<div class="col-md-6">
					<!-- santri -->
					<div class="form-group">
						<label class="control-label col-sm-3">Santri</label>
						<div class="col-sm-9">
							<select class="form-control select2" name="santri_id" required="">
								<option value=""></option>
								<?php foreach ($santris as $santri): ?>
									<option value="<?= $santri->id ?>" <?php if($row->santri_id==$santri->id) echo "selected" ?>><?= '( '.$santri->nis.') '. $santri->nama ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<!-- catatan -->
					<div class="form-group">
						<label class="control-label col-sm-3">catatan</label>
						<div class="col-sm-9">
							<textarea name="catatan" class="form-control" required=""><?= $row->catatan ?></textarea>
						</div>
					</div>

					<!-- jenis -->
					<div class="form-group">
						<label class="control-label col-sm-3">jenis</label>
						<div class="col-sm-9">
							<select class="form-control select2" name="jenis" required="">
								<option value=""></option>
								<option value="kasus" <?php if($row->jenis =='Kasus') echo 'selected'; ?>>kasus</option>
								<option value="prestasi"  <?php if($row->jenis =='Prestasi') echo 'selected'; ?>>prestasi</option>
							</select>
						</div>
					</div>

					<!-- keterangan -->
					<div class="form-group">
						<label class="control-label col-sm-3">keterangan</label>
						<div class="col-sm-9">
							<textarea name="keterangan" class="form-control" required=""><?= $row->keterangan ?></textarea>
						</div>
					</div>

					<!-- tanggal awal -->
					<div class="form-group">
						<label class="control-label col-sm-3 col-sm-3">tanggal awal</label>
						<div class="col-sm-9">
							<input type="text" name="tgl_awal" id="tgl_awal" class="form-control" required="" value="<?= $row->tgl_awal ?>">
						</div>
					</div>

					<!-- tanggal awal -->
					<div class="form-group">
						<label class="control-label col-sm-3 col-sm-3">tanggal awal</label>
						<div class="col-sm-9">
							<input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" required="" value="<?= $row->tgl_akhir ?>">
						</div>
					</div>

					<!-- tombol -->
					<div class="form-group">
						<label class="control-label col-sm-3 col-sm-3"></label>
						<div class="col-sm-9">
							<button class="btn btn-flat btn-danger btn-sm" id="btn-cek">cek tempo</button>
						</div>
					</div>

					<!-- tempo -->
					<div class="form-group">
						<label class="control-label col-sm-3 col-sm-3">tempo</label>
						<div class="col-sm-9">
							<input type="text" name="tempo"  id="tempo" class="form-control" required="" value="<?= $row->tempo ?>" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="pull-right">
				<button class="btn btn-success btn-flat" type="submit" name="simpan">
					<i class="fa fa-save"></i> Simpan data 
				</button>
				<input type="hidden" name="id" value="<?= $row->id ?>">
			</div>
		</div>
	</form>
</div>


