<div class="box">
	<div class="box-header with-border">
		<div class="col-md-4">
			<select id="kelas" class="kelas form-control">
				<option value=""></option>
				<?php foreach ($kelass as $kelas): ?>
					<option value="<?= $kelas->id ?>"><?= $kelas->nama_kelas ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="pull-right">
			<button type="button" id="btn-simpan-kelas" class="btn btn-flat btn-success"><i class="fa fa-plus-circle"></i> Tambah terpilih</button>
			<button class="btn btn-default" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
		</div>
	</div>
	<div class="box-body">
		<table id="dataTable" class="table table-hover table-responsive table-striped table-border">
			<thead>
				<tr class="text-capitalize">
					<th><input type="checkbox" name="check-all" id="check-all"></th>
					<th>nis</th>
					<th>nama</th>
					<th>Jenis Kelamin</th>
					<th>Status</th>
					<th>Alamat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($santris as $santri): ?>
					<tr>
						<td><input type='checkbox' class='check-item' name='id' value="<?= $santri->id ?>"></td>
						<td><?= $santri->nis ?></td>
						<td><?= $santri->nama ?></td>
						<td><?= $santri->jk ?></td>
						<td><span class="btn btn-xs btn-flat btn-success"><?= $santri->status ?></span></td>
						<td><?= $santri->alamat ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<div class="box-footer"></div>
</div>								