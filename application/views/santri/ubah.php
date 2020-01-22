<div class="box box-success ">
	<div class="box-header with-border">
		<h3 class="box-title text-capitalize"><?php echo $this->uri->segment(2) ?> data</h3>
		<div class="box-tools pull-right">
			<a href="<?php echo base_url($this->uri->segment(1)) ?>" role="button" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i></a>
		</div>
	</div>
	<form class="form form-horizontal" method="post" action="" id="form-ubah">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-success ">
						<div class="box-header with-border">
							<h3 class="box-title">Data Santri</h3>
						</div>
						<div class="box-body text-capitalize">
							<!-- nis -->
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">nis</label>
								<div class="col-sm-9">
									<input type="text" name="nis" id="nis" class="form-control" required="" value="<?php echo $santri->nis ?>" readonly>
								</div>
							</div>
							<!-- nama -->
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">nama</label>
								<div class="col-sm-9">
									<input type="text" name="nama" id="nama" class="form-control text-capitalize" required="" value="<?php echo $santri->nama ?>">
								</div>
							</div>
							<!-- tempat dan tanggal lahir -->
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">tempat lahir</label>
								<div class="col-sm-9">
									<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required="" value="<?php echo $santri->tempat_lahir ?>">

								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">tgl lahir</label>
								<div class="col-sm-9">
									<input type="text" name="tgl_lahir" id="tanggalLahir" class="form-control" required="" value="<?php echo $santri->tgl_lahir ?>">
								</div>
							</div>
							<!-- jenis kelamin -->
							<div class="form-group"> 
								<label class="control-label col-sm-3 col-sm-3">jenis kelamin</label>
								<div class="col-sm-9">

									<input type="radio" name="jk" id="jk" class="flat-red" value="laki-laki" required="" <?php if($santri->jk=='laki-laki') echo "checked"; ?>> Laki-laki     
									<input type="radio" name="jk" id="jk" class="flat-red" value="perempuan" required="" <?php if($santri->jk=='perempuan') echo "checked"; ?>> Perempuan

								</div>
							</div>
							<!-- anak ke	 -->
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">anak ke</label>
								<div class="col-sm-9">
									<input type="text" name="anak_ke" id="anak_ke" class="form-control" required="" value="<?php echo $santri->anak_ke ?>">
								</div>
							</div>
							<!-- saudara kandung dan tiri-->
							<div class="form-group">
								<label class="control-label col-sm-3 col-sm-3">saudara kandung</label>
								<div class="col-sm-9">
									<input type="number" name="saudara_kandung" id="saudara_kandung" class="form-control" value="<?php echo $santri->saudara_kandung ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">saudara tiri</label>
								<div class="col-sm-9">
									<input type="number" name="saudara_tiri" id="saudara_tiri" class="form-control" value="<?php echo $santri->saudara_tiri ?>">
								</div>
							</div>
							<!-- alamat lengkap -->
							<div class="form-group">
								<label class="control-label col-sm-3">alamat lengkap</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="alamat" id="alamat" required="">
										<?php echo $santri->alamat ?>
									</textarea>
								</div>
							</div>
							<?php if ($santri->status=='lama'): ?>
								<div class="form-group">
									<label class="control-label col-sm-3">Kelas</label>
									<div class="col-sm-9">
										<select class="form-control select2" name="kelas" required="">
											<?php foreach ($kelas as $kelas): ?>
												<option value="<?php echo $kelas->id ?>" <?php if($santri->kelas_id==$kelas->id)  echo "selected" ?>><?php echo $kelas->nama_kelas ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							<?php endif ?>
						</div>
					</div>
					<div class="box box-success  text-capitalize">
						<div class="box-header with-border">
							<h3 class="box-title">Data wali</h3>
						</div>
						<div class="box-body">
							<!-- nama wali -->
							<div class="form-group">
								<label class="control-label col-md-3">nama wali</label>
								<div class="col-md-9">
									<input type="text" name="nama_wali_1" class="form-control" placeholder="wali 1" value="<?php echo $wali->nama_wali_1 ?>">
									<input type="text" name="nama_wali_2" class="form-control"  placeholder="wali 2" value="<?php echo $wali->nama_wali_2 ?>">
								</div>
							</div>
							<div class="form-group">
								<!-- status kekeluargaan -->
								<label class="control-label col-md-3">status kekeluargaan</label>
								<div class="col-md-9">
									<input type="text" name="status_kekeluargaan_1" class="form-control"  placeholder="wali 1" value="<?php echo $wali->status_kekeluargaan_1 ?>">
									<input type="text" name="status_kekeluargaan_2" class="form-control"  placeholder="wali 2" value="<?php echo $wali->status_kekeluargaan_2 ?>">
								</div>
							</div>
							<div class="form-group">
								<!-- alamat -->
								<label class="control-label col-md-3">alamat</label>
								<div class="col-md-9">
									<input type="text" name="alamat_1" class="form-control"  placeholder="wali 1" value="<?php echo $wali->alamat_1 ?>">
									<input type="text" name="alamat_2" class="form-control" placeholder="wali 2" value="<?php echo $wali->alamat_2 ?>">
								</div>
							</div>
							<!-- no.hp -->
							<div class="form-group">
								<label class="control-label col-md-3">no.hp</label>
								<div class="col-md-9">
									<input type="text" name="no_hp_1" class="form-control"  placeholder="wali 1" value="<?php echo $wali->no_hp_1 ?>">
									<input type="text" name="no_hp_2" class="form-control"  placeholder="wali 2" value="<?php echo $wali->no_hp_2 ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-success  text-capitalize">
						<div class="box-header with-border">
							<h3 class="box-title">Data orang tua</h3>
						</div>
						<div class="box-body">
							<!-- nama ayah -->
							<div class="form-group">
								<label class="control-label col-sm-3">nama ayah</label>
								<div class="col-sm-9">
									<input type="text" name="nama_ayah" class="form-control" required="" value="<?php echo $orang_tua->nama_ayah ?>">
								</div>
							</div>
							<!-- umur -->
							<div class="form-group">
								<label class="control-label col-sm-3">umur ayah</label>
								<div class="col-sm-9">
									<input type="number" name="umur_ayah" class="form-control" required="" value="<?php echo $orang_tua->umur_ayah ?>">
								</div>
							</div>
							<!-- pekerjaan_ayah -->
							<div class="form-group">
								<label class="control-label col-sm-3">pekerjaan ayah</label>
								<div class="col-sm-9">
									<input type="text" name="pekerjaan_ayah" class="form-control" required="" value="<?php echo $orang_tua->pekerjaan_ayah ?>">
								</div>
							</div>
							<!-- pendidikan_ayah -->
							<div class="form-group">
								<label class="control-label col-sm-3">pendidikan ayah</label>
								<div class="col-sm-9">
									<select class="form-control select2" name="pendidikan_ayah" required="">
										<option value="<?php echo $orang_tua->pendidikan_ayah ?>" selected ><?php echo $orang_tua->pendidikan_ayah ?></option>
										<option value="SD">SD</option>
										<option value="SMP / MTs">SMP / MTs</option>
										<option value="SMA / SMK / MA">SMA / SMK / MA</option>
										<option value="S1 / S2 / S3">S1 / S2 / S3</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>
							<!-- nama_ibu -->
							<div class="form-group">
								<label class="control-label col-sm-3">nama ibu</label>
								<div class="col-sm-9">
									<input type="text" name="nama_ibu" class="form-control" required="" value="<?php echo $orang_tua->nama_ibu ?>">
								</div>
							</div>
							<!-- umur_ibu -->
							<div class="form-group">
								<label class="control-label col-sm-3">umur ibu</label>
								<div class="col-sm-9">
									<input type="number" name="umur_ibu" class="form-control" required="" value="<?php echo $orang_tua->umur_ibu ?>">
								</div>
							</div>
							<!-- pekerjaan_ibu -->
							<div class="form-group">
								<label class="control-label col-sm-3">pekerjaan ibu</label>
								<div class="col-sm-9">
									<input type="text" name="pekerjaan_ibu" class="form-control" required="" value="<?php echo $orang_tua->pekerjaan_ibu ?>">
								</div>
							</div>
							<!-- pendidikan_ibu -->
							<div class="form-group">
								<label class="control-label col-sm-3">pendidikan ibu</label>
								<div class="col-sm-9">
									<select class="form-control select2" name="pendidikan_ibu" required="">
										<option value="<?php echo $orang_tua->pendidikan_ibu ?>" selected ><?php echo $orang_tua->pendidikan_ibu ?></option>
										<option value="SD">SD</option>
										<option value="SMP / MTs">SMP / MTs</option>
										<option value="SMA / SMK / MA">SMA / SMK / MA</option>
										<option value="S1 / S2 / S3">S1 / S2 / S3</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>
							<!-- alamat -->
							<div class="form-group">
								<label class="control-label col-sm-3">alamat</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="alamat" required="">
										<?php echo $orang_tua->alamat ?>
									</textarea>
								</div>
							</div>
							<!-- no_hp -->
							<div class="form-group">
								<label class="control-label col-sm-3">no. hp</label>
								<div class="col-sm-9">
									<input type="text" name="no_hp" class="form-control" value="<?php echo $orang_tua->no_hp ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="box box-success  text-capitalize">
						<div class="box-header with-border">
							<h3 class="box-title">Data sekolah asal</h3>
						</div>
						<div class="box-body">
							<!-- nama sekolah/madrasah -->
							<div class="form-group">
								<label class="control-label col-sm-3">nama sekolah / madrasah</label>
								<div class="col-sm-9">
									<input type="text" name="nama_sekolah" class="form-control" required="" value="<?php echo $asal_sekolah->nama_sekolah ?>">
								</div>
							</div>
							<!-- tanggal -->
							<div class="form-group">
								<label class="control-label col-sm-3">tanggal</label>
								<div class="col-sm-9">
									<input type="text" name="tanggal" class="form-control" id="tanggalTerima" value="<?php echo $asal_sekolah->tanggal ?>">
								</div>
							</div>
							<!-- diterima di kelas -->
							<div class="form-group">
								<label class="control-label col-sm-3">diterima di kelas</label>
								<div class="col-sm-9">
									<input type="text" name="diterima_di_kelas" class="form-control" value="<?php echo $asal_sekolah->diterima_di_kelas ?>">
								</div>
							</div>
							<!-- nilai sttb -->
							<div class="form-group">
								<label class="control-label col-sm-3">nilai STTB/Ijazah</label>
								<div class="col-sm-9">
									<input type="text" name="nilai" class="form-control" value="<?php echo $asal_sekolah->nilai ?>">
								</div>
							</div>
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
				<input type="hidden" name="id" value="<?php echo $santri->id ?>">
				<input type="hidden" name="status" value="<?php echo $santri->status ?>">
			</div>
		</div>
	</form>
</div>

