<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= session()->get('nama_user'); ?></p>

      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="<?= base_url('home'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i>
          <span>Arsip</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('arsip'); ?>"><i class="fa  fa-folder-open"></i> Data Arsip</a></li>
          <li><a href="<?= base_url('arsip/add'); ?>"><i class="fa fa- fa-plus"></i> Tambah Arsip </a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="<?= base_url('departemen/index'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Departemen</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('departemen'); ?>"><i class="fa  fa-folder-open"></i> Data Departemen</a></li>
          <!-- <li><a href="<?= base_url('departemen/add'); ?>"><i class="fa  fa-plus"></i> Tambah Departemen</a></li> -->
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-info"></i> <span>Kategori</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('kategori'); ?>"><i class="fa  fa-folder-open"></i> Data Kategori</a></li>
        </ul>
      </li>

      <?php if (session()->get('level') == 1) : ?>
        <li class="header">LABELS</li>
        <li class=>
          <a href="<?= base_url('user'); ?>">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li>

      <?php endif ?>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>