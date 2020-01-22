<div class="box box-success">
	<div class="box-header">
		<h3 class="box-title text-capitalize">
			<?php if($this->uri->segment(1)=='santri_baru') echo 'data santri baru'; else echo 'data santri lama'; ?>
		</h3>
		<div class="box-tools pull-right">
			<a href="<?= base_url('catatan_santri/exportExcel') ?>" class="btn btn-flat btn-default" role="button">
				<span class="fa fa-file"></span> Export Excel
			</a>
			<button type="button" name="btn-hapus" id="btn-hapus" class="btn btn-default btn-flat"> <i class="fa fa-trash"></i>Hapus terpilih</button>
			<a class="btn btn-success btn-flat" role="button" href="<?php echo base_url($this->uri->segment(1).'/tambah') ?>"><i class="fa fa-plus"></i> Tambah data</a>
		</div>
	</div>
	<div class="box-body">
		<table id="dataTable" class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><input type="checkbox" name="check-all" id="check-all"></th>
					<th class="text-capitalize">no</th>
					<th class="text-capitalize">nis</th>
					<th class="text-capitalize">nama</th>
					<th class="text-capitalize">catatan</th>
					<th class="text-capitalize">jenis</th>
					<th class="text-capitalize">keterangan</th>
					<th class="text-capitalize">tanggal awal</th>
					<th class="text-capitalize">tanggal akhir</th>
					<th class="text-capitalize">tempo</th>
					<th class="text-capitalize">aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;?>
				<?php foreach ($isi as $val): ?>
					<tr id="tr_<?= $val->id ?>">
						<td><input type='checkbox' class='check-item' name='id' value="<?= $val->id ?>"></td>
						<td><?php echo $no++ ?></td>
						<td><?php echo $val->nis ?></td>
						<td><?php echo $val->nama ?></td>
						<td><?php echo $val->catatan ?></td>
						<td><?php echo $val->jenis ?></td>
						<td><?php echo $val->keterangan ?></td>
						<td><?php echo $val->tgl_awal ?></td>
						<td><?php echo $val->tgl_akhir ?></td>
						<td><?php echo $val->tempo ?></td>
						<td>
							<a href="<?php echo base_url('catatan_santri/ubah/'.$val->id) ?>" class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="ubah"><i class="fa fa-edit"></i> </a>
							<a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat hapus" id="<?php echo $val->id ?>" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash" ></i> </a>
							<!-- <a href="<?php echo base_url('santri/detail/'.$val->id) ?>" class="btn btn-xs btn-default btn-flat" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye"></i> </a> -->
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
