<div class="box box-success">
	<div class="box-header">
		<h3 class="box-title text-capitalize">
			<?php if($this->uri->segment(1)=='santri_baru') echo 'data santri baru'; else echo 'data santri lama'; ?>
		</h3>
		<div class="box-tools pull-right">
			<?php if ($this->uri->segment(1)=='santri_aktif'): ?>
				<a href="<?= base_url('santri/exportExcel/lama') ?>" class="btn btn-flat btn-default" role="button">
					<span class="fa fa-file"></span> Export Excel
				</a>
			<?php endif ?>
			<?php if ($this->uri->segment(1)=='santri_baru'): ?>
				<a href="<?= base_url('santri/exportExcel/baru') ?>" class="btn btn-flat btn-default" role="button">
					<span class="fa fa-file"></span> Export Excel
				</a>
			<?php endif ?>
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
					<th class="text-capitalize">tempat & tanggal lahir</th>
					<th class="text-capitalize">JK</th>
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
						<td><?php echo $val->tempat_lahir.', '.date('d-m-Y', strtotime($val->tgl_lahir)) ?></td>
						<td><?php echo $val->jk ?></td>
						<td>
							<a href="<?php echo base_url('santri/ubah/'.$val->id) ?>" class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="ubah"><i class="fa fa-edit"></i> </a>
							<a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat hapus" id="<?php echo $val->id ?>" data-toggle="tooltip" data-placement="top" title="hapus"><i class="fa fa-trash" ></i> </a>
							<a href="<?php echo base_url('santri/detail/'.$val->id) ?>" class="btn btn-xs btn-default btn-flat" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa fa-eye"></i> </a>
							<a href="<?php echo base_url('santri/exportPDF/'.$val->id) ?>" class="btn btn-success btn-flat btn-xs " data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="fa fa-print"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
