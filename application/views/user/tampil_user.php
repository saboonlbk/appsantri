<div class="box box-success ">
	<div class="box-header">
		<h3 class="box-title text-capitalize"><?php echo $this->uri->segment(2) ?> data</h3>
		<div class="box-tools pull-right">
			<button type="button" name="btn-hapus" id="btn-hapus" class="btn btn-default btn-flat"> <i class="fa fa-trash"></i>Hapus terpilih</button>
			<a class="btn btn-success btn-flat" role="button" href="<?php echo base_url($this->uri->segment(1).'/tambah') ?>"><i class="fa fa-plus"></i> Tambah data</a>
		</div>
	</div>
	<div class="box-body">
		<table id="dataTable" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><input type="checkbox" name="check-all" id="check-all"></th>
					<th class="text-capitalize">no</th>
					<th class="text-capitalize">nama</th>
					<th class="text-capitalize">jenis kelamin</th>
					<th class="text-capitalize">username</th>
					<th class="text-capitalize">level</th>
					<th class="text-capitalize">aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($user as $val): ?>
					<tr id="tr_<?= $val->id ?>">
						<td><input type='checkbox' class='check-item' name='id' value="<?= $val->id ?>"></td>
						<td><?php echo $no++ ?></td>
						<td><?php echo $val->nama ?></td>
						<td>
							<?php if ($val->jenis_kelamin=='L'): ?>
								Laki-laki
								<?php else: ?>
									Perempuan
								<?php endif ?>
								<td><?php echo $val->username ?></td>
								<td>
									<?php if ($val->level=='SA'): ?>
										Super Admin
										<?php else: ?>
											Admin
										<?php endif ?>
									</td>
									<td>
										<a href="#" class="btn btn-xs btn-danger btn-flat hapus" id="<?php echo $val->id ?>" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash" ></i> </a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>