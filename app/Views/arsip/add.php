<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Arsip</h3>

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
        <?php echo form_open_multipart('arsip/insert');
        // <!-- Random Nomer Arsip -->
        helper('text');
        $no_arsip = date('Ymds') . random_string('alnum', 4);
        ?>
        <div class="form-group">
          <label for="nama_arsip">Nama Arsip</label>
          <input type="text" name="nama_arsip" id="nama_arsip" class="form-control" placeholder="Nama Arsip" required value="<?= old('nama_arsip'); ?>">
        </div>
        <div class="form-group">
          <label for="no_arsip">Nomer Arsip</label>
          <input type="text" value="<?= $no_arsip; ?>" name="no_arsip" id="no_arsip" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="password">Kategori</label>
          <select name="id_kategori" id="kategori" class="form-control">
            <option value="">--Pilih Kategori--</option>
            <?php foreach ($kategori as $key => $value) { ?>
              <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="deskrepsi">Deskrepsi</label>
          <input type="text" name="deskrepsi" id="deskrepsi" class="form-control" placeholder="Deskrepsi" required value="<?= old('deskrepsi'); ?>">
        </div>
        <div class=" form-group">
          <label for="file_arsip">File Arsip</label>
          <input type="file" name="file_arsip" id="file_arsip" class="form-control" required>
          <h6 class="text-danger"><b>File Harus PDF</b></h6>
          <h6 class="text-danger"><b>Maksimal 2mb</b></h6>
        </div>
        <div class="form-group ">
          <a href="<?= base_url('arsip') ?>" class="btn btn-default">Kembali</a>
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