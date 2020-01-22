<div class="box box-success">
	<div class="box-body">
		<div class="col-md-3">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
				<select class="select2 form-control" id="kelas">
					<option value=""></option>
					<?php foreach ($kelas as $kel): ?>
						<option value="<?= $kel->id ?>"><?= $kel->nama_kelas ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" name="tahun" id="tahun" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<button type="button" class="btn btn-success btn-flat" id="btn-tampil"><i class="fa fa-eye"></i> Tampilkan</button>
			<button type="button" class="btn btn-default btn-flat" id="btn-reset"><i class="fa fa-refresh"></i> Atur Ulang</button>
			<button type="button" class="btn btn-default btn-flat" id="btn-export"><span class="fa fa-file"></span> Export Excel</button>
			<a href="<?= base_url('kelas/tambahSantri') ?>"class="btn btn-success btn-flat">
				<i class="fa fa-plus-circle"></i> tambah santri
			</a>
		</div>
		
	</div>
</div>
<div class="box box-success ">
	<div class="box-header with-border">
		<div class="pull-right">
			
		</div>
	</div>
	<div class="box-body">
		<!-- <div id="tampilSemua">
			<table id="dataTable" class="table table-hover table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="text-capitalize">no</th>
						<th class="text-capitalize">nis</th>
						<th class="text-capitalize">nama</th>
						<th class="text-capitalize">jenis kelamin</th>
						<th class="text-capitalize">kelas</th>
						<th class="text-capitalize">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($santri as $santri): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $santri->nis ?></td>
							<td><?= $santri->nama ?></td>
							<td><?= $santri->jk ?></td>
							<?php foreach ($kelas as $kel): ?>
								<?php if ($kel->id==$santri->kelas_id): ?>
									<td><?= $kel->nama_kelas ?></td>
								<?php endif ?>
								
							<?php endforeach ?>
							<?php if ($santri->kelas_id=='0'): ?>
								<td><span class="btn btn-danger btn-xs">belum punya kelas</span></td>
							<?php endif ?>
							<td>
								<button type="button" class="btn btn-xs btn-flat bg-navy" data-toggle="modal" data-target="#gantiKelas" data-id="<?= $santri->id ?>" data-show="tip" data-placement="top" title="Ganti kelas"><i class="fa fa-exchange"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div> -->
		<div id="tampil"></div>
	</div>
</div>

<div class="modal fade" id="gantiKelas" role="dialog">
	<div class="modal-dialog" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ganti Kelas</h4>
			</div>
			<form class="form" method="post" action="<?php echo base_url('kelas/prosesUbahKelas'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="kelas" class="control-label">Pilih Kelas tujuan</label>
						<select class="form-control" name="kelas">
							<?php foreach ($kelas as $kel): ?>
								<option value="<?= $kel->id ?>"><?= $kel->nama_kelas ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-flat" name="submit">Simpan</button>
					<button type="reset" class="btn btn-default btn-flat" name="reset" data-dismiss="modal">Batal</button>
					<input type="hidden" name="id" id="idSantri" value="">
					<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {

		$('#gantiKelas').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            console.log(id);
            $("#idSantri").val(id);
        });
	})
</script>
