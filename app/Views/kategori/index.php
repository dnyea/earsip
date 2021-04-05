<div class="row">
  <div class="col-md-12">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Kategori</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah Kategori</button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Berhasil!</h4>';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        }
        ?>
        <table class="table tabel-bordered" id="example1">
          <thead>
            <tr>
              <th width="80px"> No </th>
              <th> Kategori</th>
              <th width="100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($kategori as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td>
                  <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kategori'] ?>">Edit</button>
                  <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kategori'] ?>">Delete</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kategori</h4>

      </div>
      <div class="modal-body">
        <?php echo form_open('kategori/add') ?>
        <div class="form-group">
          <label for="kategori">kategori</label>
          <input type="text" class="form-control" id="kategori" placeholder="Masukan Kategori" name="nama_kategori" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      <?php echo form_close() ?>
    </div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->

</div>
<!--  End Modal Tambah -->

<!-- Modal Update -->
<?php foreach ($kategori as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_kategori'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kategori</h4>

        </div>
        <div class="modal-body">
          <?php echo form_open('kategori/edit/' . $value['id_kategori']) ?>
          <div class="form-group">
            <label for="kategori">kategori</label>
            <input type="text" class="form-control" id="kategori" placeholder="Masukan Kategori" name="nama_kategori" required value="<?= $value['nama_kategori']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <?php echo form_close() ?>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<!-- End Modal Update -->

<?php foreach ($kategori as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_kategori'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Kategori</h4>

        </div>
        <div class="modal-body">
          <?php echo form_open('kategori/delete/' . $value['id_kategori']) ?>
          <p>Yakin ingin menghapus data Kategori <b>
              <? $value['nama_kategori'] ?>
            </b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </div>
        <?php echo form_close() ?>
      </div>

      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>