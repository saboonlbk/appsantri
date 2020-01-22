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
		<table id="dataTable" class="table table-bordered table-striped table-hover dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><input type="checkbox" name="check-all" id="check-all"></th>
					<th class="text-capitalize">no</th>
					<th class="text-capitalize">nama kelas</th>
					<th class="text-capitalize">aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;?>
				<?php foreach ($isi as $val): ?>
					<tr id="tr_<?= $val->id ?>">
						<td><input type='checkbox' class='check-item' name='id' value="<?= $val->id ?>"></td>
						<td><?php echo $no++ ?></td>
						<td><?php echo $val->nama_kelas ?></td>
						<td>
							<a href="javascript:void(0)" class="btn btn-xs btn-warning btn-flat" data-toggle="modal" data-target="#ubahKelas" data-id="<?= $val->id ?>" datap-placement="top" title="ubah" data-show="tip">
								<i class="fa fa-edit"></i> 
							</a>
							<a href="javascript:void(0)" class="btn btn-xs btn-danger btn-flat hapus" id="<?php echo $val->id ?>" data-toggle="tooltip" data-placement="top" title="hapus">
								<i class="fa fa-trash" ></i> 
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- modal tambah kelas -->
<div class="modal fade" id="tambahKelas" role="dialog">
	<div class="modal-dialog" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Kelas</h4>
			</div>
			<form class="form" method="post" action="<?php echo base_url('kelas/prosesTambah'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_kelas" class="control-label">Nama Kelas</label>
						<input type="text" name="nama_kelas" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" name="submit">Simpan</button>
					<button type="reset" class="btn btn-default btn-flat" name="reset" data-dismiss="modal">Batal</button>

					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal ubah kelas -->
<div class="modal fade" id="ubahKelas" role="dialog">
	<div class="modal-dialog" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Kelas</h4>
			</div>
			<form class="form" method="post" action="<?php echo base_url('kelas/prosesUbah'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama_kelas" class="control-label">Nama Kelas</label>
						<input type="text" name="nama_kelas" id="nama_kelas" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" name="submit">Simpan</button>
					<button type="reset" class="btn btn-default btn-flat" name="reset" data-dismiss="modal">Batal</button>
					<input type="hidden" name="id" id="idKelas" value="">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {

		$('#ubahKelas').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            console.log(id);
            $.ajax({
            	type : 'post',
            	url : '<?= base_url() ?>kelas/ubah',
            	data :  {id: id},
            	success : function(data){
            		$('#nama_kelas').val(data);
            		$('#idKelas').val(id);
            		console.log(data);
            	}
            });
        });
	})
</script>


<?php if ($this->session->flashdata('oke')): ?>
	<script type="text/javascript">
		alert('<?= $this->session->flashdata('oke'); ?>');
	</script>
<?php endif ?>
