<div class="box box-success ">
	<div class="box-header with-border">
		<h3 class="box-title text-capitalize">Detail</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
		</div>
	</div>
	<div class="box-body">
		<table class="table table-striped table-hover text-capitalize">
			<tr>
				<td>NIS</td>
				<td><?php echo $detail->nis ?></td>
			</tr>
			<tr>
				<td>nama</td>
				<td><?php echo $detail->nama ?></td>
			</tr>
			<tr>
				<td>tempat, tanggal lahir</td>
				<td><?= $detail->tempat_lahir.', '.date('d-m-Y', strtotime($detail->tgl_lahir)) ?></td>
			</tr>
			<tr>
				<td>jenis kelamin</td>
				<td><?php echo $detail->jk ?></td>
			</tr>
			<tr>
				<td>anak ke</td>
				<td><?php echo $detail->anak_ke ?></td>
			</tr>
			<tr>
				<td>jumlah saudara</td>
				<td>kandung: <?php echo $detail->kandung ?> orang,  tiri: <?php echo $detail->tiri ?> orang</td>
			</tr>
			<tr>
				<td>alamat lengkap</td>
				<td><?php echo $detail->alamat_santri ?></td>
			</tr>
			<?php if ($detail->kelas_id!=""): ?>
				<tr>
					<td>Kelas</td>
					<?php foreach ($kelas as $kel): ?>
						<?php if ($detail->kelas_id==$kel->id): ?>
							<td><?php echo $kel->nama_kelas ?></td>
						<?php endif ?>
					<?php endforeach ?>
				</tr>
			<?php endif ?>
			<tr>
				<th colspan="2">Orang tua/wali</th>
			</tr>
			<tr>
				<td>nama orang tua</td>
				<td>ayah: &emsp;<?= $detail->nama_ayah ?></td>
			</tr>
			<tr>
				<td></td>
				<td>ibu: &emsp;&ensp;<?= $detail->nama_ibu ?></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td>ayah: &emsp;<?= $detail->umur_ayah?></td>
			</tr>
			<tr>
				<td></td>
				<td>ibu: &emsp;&ensp;<?= $detail->umur_ibu?></td>
			</tr>
			<tr>
				<td>pekerjaan</td>
				<td>ayah: &emsp;<?php echo $detail->pekerjaan_ayah ?></td>
			</tr>
			<tr>
				<td></td>
				<td>ibu: &emsp;&ensp;<?php echo $detail->pekerjaan_ibu ?></td>
			</tr>
			<tr>
				<td>pendidikan terakhir</td>
				<td>ayah: &emsp;<?php echo $detail->pendidikan_ayah ?></td>
			</tr>
			<tr>
				<td></td>
				<td>ibu: &emsp;&ensp;<?php echo $detail->pendidikan_ibu ?></td>
			</tr>
			<tr>
				<td>alamat</td>
				<td><?php echo $detail->alamat_orang_tua ?></td>
			</tr>
			<tr>
				<td>no. hp</td>
				<td><?php echo $detail->no_hp ?></td>
			</tr>
			<tr>
				<td>nama wali</td>
				<td>1. <?php echo $detail->nama_wali_1 ?></td>
			</tr>
			<tr>
				<td></td>
				<td>2. <?php echo $detail->nama_wali_2 ?></td>
			</tr>
			<tr>
				<td>status kekeluargaan</td>
				<td>1. <?php echo $detail->status_kekeluargaan_1 ?></td>
			</tr>
			<tr>
				<td></td>
				<td>2. <?php echo $detail->status_kekeluargaan_2 ?></td>
			</tr>
			<tr>
				<td>alamat lengkap</td>
				<td>1. <?php echo $detail->alamat_1 ?></td>
			</tr>
			<tr>
				<td></td>
				<td>2. <?php echo $detail->alamat_2 ?></td>
			</tr>
			<tr>
				<td>no. hp</td>
				<td>1. <?php echo $detail->no_hp_1 ?></td>
			</tr>
			<tr>
				<td></td>
				<td>2. <?php echo $detail->no_hp_2 ?></td>
			</tr>
			<tr>
				<th colspan="2">masuk asrama ini</th>
			</tr>
			<tr>
				<td>dari sekolah/madrasah</td>
				<td><?php echo $detail->nama_sekolah ?></td>
			</tr>
			<tr>
				<td>tanggal</td>
				<td><?php echo $detail->tanggal ?></td>
			</tr>
			<tr>
				<td>diterima di kelas</td>
				<td><?php echo $detail->diterima_di_kelas ?></td>
			</tr>
			<tr>
				<td>nilai STTB/Ijazah</td>
				<td><?php echo $detail->nilai ?></td>
			</tr>
		</table>

	</div>
	<div class="box-footer">
		<div class="pull-right">
			<a href="<?php echo base_url('santri/exportPDF/'.$detail->id) ?>" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Cetak</a>
			<a href="<?php echo base_url('santri/ubah/'.$detail->id) ?>" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i> ubah</a>
			<a href="javascript:void()" class="btn btn-danger btn-flat hapus" id="<?php echo $detail->id ?>"><i class="fa fa-trash"></i> hapus</a>
		</div>
	</div>
</div>