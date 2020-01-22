<div align="center">
	<img src="<?= base_url() ?>upload/kop.jpg" alt="kop surat">
</div>
<h3 align="center">Biodata Santri</h3>
<table  class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td style="padding: 5 5 5 5">NIS</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->nis ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">nama</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->nama ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">tempat, tanggal lahir</td>
			<td style="padding: 5 5 5 5"><?= $detail->tempat_lahir.', '.date('d-m-Y', strtotime($detail->tgl_lahir)) ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">jenis kelamin</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->jk ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">anak ke</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->anak_ke ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">jumlah saudara</td>
			<td style="padding: 5 5 5 5">kandung: <?php echo $detail->kandung ?> orang,  tiri: <?php echo $detail->tiri ?> orang</td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">alamat lengkap</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->alamat_santri ?></td>
		</tr>
		<?php if ($detail->kelas_id!=""): ?>
			<tr>
				<td style="padding: 5 5 5 5">Kelas</td>
				<?php foreach ($kelas as $kel): ?>
					<?php if ($detail->kelas_id==$kel->id): ?>
						<td style="padding: 5 5 5 5"><?php echo $kel->nama_kelas ?></td>
					<?php endif ?>
				<?php endforeach ?>
			</tr>
		<?php endif ?>
		<tr>
			<th colspan="2" style="padding: 5 5 5 5">Orang tua/wali</th>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">nama orang tua</td>
			<td style="padding: 5 5 5 5">ayah: &emsp;<?= $detail->nama_ayah ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">ibu: &emsp;&ensp;<?= $detail->nama_ibu ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">Umur</td>
			<td style="padding: 5 5 5 5">ayah: &emsp;<?= $detail->umur_ayah?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">ibu: &emsp;&ensp;<?= $detail->umur_ibu?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">pekerjaan</td>
			<td style="padding: 5 5 5 5">ayah: &emsp;<?php echo $detail->pekerjaan_ayah ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">ibu: &emsp;&ensp;<?php echo $detail->pekerjaan_ibu ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">pendidikan terakhir</td>
			<td style="padding: 5 5 5 5">ayah: &emsp;<?php echo $detail->pendidikan_ayah ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">ibu: &emsp;&ensp;<?php echo $detail->pendidikan_ibu ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">alamat</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->alamat_orang_tua ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">no. hp</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->no_hp ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">nama wali</td>
			<td style="padding: 5 5 5 5">1. <?php echo $detail->nama_wali_1 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">2. <?php echo $detail->nama_wali_2 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">status kekeluargaan</td>
			<td style="padding: 5 5 5 5">1. <?php echo $detail->status_kekeluargaan_1 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">2. <?php echo $detail->status_kekeluargaan_2 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">alamat lengkap</td>
			<td style="padding: 5 5 5 5">1. <?php echo $detail->alamat_1 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">2. <?php echo $detail->alamat_2 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">no. hp</td>
			<td style="padding: 5 5 5 5">1. <?php echo $detail->no_hp_1 ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5"></td>
			<td style="padding: 5 5 5 5">2. <?php echo $detail->no_hp_2 ?></td>
		</tr>
		<tr>
			<th style="padding: 5 5 5 5" colspan="2">masuk asrama ini</th>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">dari sekolah/madrasah</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->nama_sekolah ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">tanggal</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->tanggal ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">diterima di kelas</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->diterima_di_kelas ?></td>
		</tr>
		<tr>
			<td style="padding: 5 5 5 5">nilai STTB/Ijazah</td>
			<td style="padding: 5 5 5 5"><?php echo $detail->nilai ?></td>
		</tr>
	</tbody>
</table>