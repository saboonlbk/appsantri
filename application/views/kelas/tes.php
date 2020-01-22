<div class="box box-success ">
	<div class="box-header">
		<h3 class="box-title text-capitalize"><?php echo $this->uri->segment(2) ?> data</h3>
		<div class="box-tools pull-right">
			<button type="button" name="btn-hapus" id="btn-hapus" class="btn btn-default btn-flat"> <i class="fa fa-trash"></i>Hapus terpilih</button>
			<a class="btn btn-success btn-flat" role="button" data-toggle="modal" data-target="#tambahKelas">
				<i class="fa fa-plus"></i> Tambah data
			</a>
		</div>
	</div>
	<div class="box-body">
		<table id="data-table" class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="text-capitalize">id</th>
					<th class="text-capitalize">nama kelas</th>
					<th class="text-capitalize">aksi</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

