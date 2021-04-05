 <!-- Sidebar toggle button-->
 <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
   <span class="sr-only">Toggle navigation</span>
 </a>

 <div class="navbar-custom-menu">
   <ul class="nav navbar-nav">
     <!-- User Account: style can be found in dropdown.less -->
     <li class="dropdown user user-menu">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
         <span class="hidden-xs"><?= session()->get('nama_user'); ?></span>
       </a>
       <ul class="dropdown-menu">
         <!-- User image -->
         <li class="user-header">
           <img src="<?= base_url('foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

           <p>
             <?= session()->get('nama_user'); ?>
             <small>Member since Nov. 2012</small>
           </p>
         </li>
         <!-- Menu Footer-->
         <li class="user-footer">
           <div class="pull-left">
             <a href="#" class="btn btn-default btn-flat">Profile</a>
           </div>
           <div class="pull-right">
             <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
           </div>
         </li>
       </ul>
     </li>
   </ul>
 </div>
 </nav>
 </header>
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <?= $title ?>
       <small>Control panel</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="<?= base_url('home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active"><?= $title ?></li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">