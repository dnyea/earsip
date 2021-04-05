<div class="row">
  <div class="cpl-sm-12">
    <table class="table">
      <tr>
        <th width="100px"> No Arsip </th>
        <th width="30px"> : </th>
        <td><?= $arsip['no_arsip']; ?></td>
        <th width="120px"> Tanggal Upload </th>
        <th width="30px"> : </th>
        <td><?= $arsip['tgl_upload']; ?></td>
      </tr>
      <tr>
        <th> Nama Arsip </th>
        <th> : </th>
        <td><?= $arsip['nama_arsip']; ?></td>
        <th width="120px"> Tanggal Update</th>
        <th width="30px"> : </th>
        <td><?= $arsip['tgl_update']; ?></td>
      </tr>
      <tr>
        <th width="100px"> Departemen </th>
        <th width="30px"> : </th>
        <td><?= $arsip['nama_departemen']; ?></td>
        <th width="120px"> User </th>
        <th width="30px"> : </th>
        <td><?= $arsip['nama_user']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-sm-12">
    <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']); ?>" width="100%" height="800px" style="border:1px solid black;">
    </iframe>
  </div>
</div>