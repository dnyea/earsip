<div class="row">
  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?= $totalArsip; ?></h3>
        <p>File Arsip</p>
      </div>
      <div class="icon">
        <i class="fa fa-file-code-o"></i>
      </div>
      <a href="<?= base_url('arsip'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $totalUser; ?></h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="fa  fa-user"></i>
      </div>
      <a href="<?= base_url('user'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= $totalDepartemen; ?></h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="fa fa-briefcase"></i>
      </div>
      <a href="<?= base_url('departemen'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

</div>