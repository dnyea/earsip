<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah User</h3>

        <div class="box-tools pull-right">
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <!-- Alert Gagal Tambah Data -->
        <?php
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <ul>
              <?php foreach ($errors as $key => $value) { ?>
                <li><?= esc($value)  ?></li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <!-- End Alert -->
        <?php echo form_open_multipart('user/update/' . $user['id_user']) ?>
        <div class="form-group">
          <label for="nama_user">Nama User</label>
          <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Nama User" value="<?= $user['nama_user']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= $user['email']; ?>" readonly>
        </div>
        <div class=" form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $user['password']; ?>" required>
        </div>
        <div class=" form-group">
          <label for="level">Level</label>
          <select name="level" id="levle" class="form-control">
            <option value="<?= $user['level']; ?>"><?php if ($user['level'] == 1) {
                                                      echo "Admin";
                                                    } else {
                                                      echo 'User';
                                                    }

                                                    ?></option>
            <option value="1">Admin</option>
            <option value="2">User</option>
          </select>
        </div>
        <div class="form-group">
          <label for="dep">Departemen</label>
          <select name="id_departemen" id="dep" class="form-control">
            <option value="<?= $user['id_departemen'] ?>">
              <?= $user['nama_departemen']; ?>
            </option>
            <?php foreach ($departemen as $key => $value) { ?>
              <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
            <?php } ?>

          </select>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <img src="<?= base_url('foto/' . $user['foto']) ?>" alt="" width="50px" class="img-preview">
          </div>
          <div class="col-sm-10">
            <div class=" form-group">
              <label for="foto">Foto</label>
              <input type="file" name="foto" class="form-control" id="sampul" onchange="previewSampul()">
              <label class="custom-file-label" for="foto">Pilih Foto</label>
            </div>
          </div>
        </div>

        <a href="<?= base_url('user') ?>" class="btn btn-default">Kembali</a>
        <button type="submit" class="btn btn-primary pull-right">Tambah</button>

      </div>

      <?php echo form_close() ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<div class="col-md-3">
</div>
</div>