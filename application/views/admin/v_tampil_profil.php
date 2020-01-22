<div class="row">
  <div class="col-md-5">
    <div class="box box-success">
      <div class="box-body box-profile">
        <div class="container">
          <?php if ($admin->foto!=""): ?>
            <img class="image profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/'.$admin->foto) ?>" alt="User profile picture" width=100 height=100>
          <?php else: ?>
            <?php if ($admin->jenis_kelamin=='L'): ?>
              <img class="image profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/avatar5.png" alt="User profile picture">
            <?php else: ?>
              <img class="image profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/avatar2.png" alt="User profile picture">
            <?php endif ?>
          <?php endif ?>
          <div class="overlay">
            <div class="text">
              <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#ubahFoto">Ubah foto</button>
            </div>
          </div>
        </div>
        
        <h3 class="profile-username text-center"><?php echo $admin->nama ?></h3>
        <?php if ($admin->level=='SA'): ?>
          <p class="text-muted text-center">Super Admin</p>
        <?php else: ?>
          <p class="text-muted text-center">Admin</p>
        <?php endif ?>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Username</b> <a class="pull-right"><?php echo $admin->username ?></a>
          </li>
          <li class="list-group-item">
            <b>Password</b> <a class="pull-right btn btn-xs btn-success" data-toggle="modal" data-target="#modalUbahPass">ganti</a>
          </li>
          <li class="list-group-item">
            <b>Jenis kelamin</b> 
            <a class="pull-right">
              <?php if ($admin->jenis_kelamin=='L'): ?>
                Laki-laki
              <?php else: ?>
                Perempuan
              <?php endif ?>
            </a>
          </li>
        </ul>

        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#modalUpdate"><b>Ganti Profil</b></a>
      </div>
    </div>
  </div>
</div>

<!-- modal ubah profil -->
<div class="modal fade" id="modalUpdate" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Profil</h4>
      </div>
      <form class="form" method="post" action="<?php echo base_url('admin/ubahProfil'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $admin->nama; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">jenis kelamin</label><br>
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="flat-red"  value="L" <?php if($admin->jenis_kelamin=='L') echo "checked"; ?>> Laki - laki    
            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="flat-red"  value="P" <?php if($admin->jenis_kelamin=='P') echo "checked"; ?>> Perempuan
          </div>
          <div class="form-group">
            <label class="control-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $admin->username; ?>">
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

<div class="modal fade" id="modalUbahPass" role="dialog">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah password</h4>
      </div>
      <form class="form" method="post" action="<?php echo base_url('admin/ubahPassword'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <label for="password" class="control-label">Password baru</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
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

<div class="modal fade" id="ubahFoto" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah foto</h4>
      </div>
      <form class="form" method="post" action="<?php echo base_url('admin/ubahFoto'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="foto" class="form-control" accept="jpg">
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

<script>
  $(function(){
    jQuery('#modalUbahPass').validate({
      rules: {
        confirmpassword: {
          equalTo: "#password"
        }
      }
    });
  });
</script>

<?php if ($this->session->flashdata('ubahData')): ?>
  <script>
    alert('<?php echo $this->session->flashdata('ubahData'); ?>')
  </script>
<?php endif ?>

