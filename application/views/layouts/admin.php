<!DOCTYPE html>
<html>
  <?php $this->view('partials/admin/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->view('partials/admin/header'); ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <?php $this->view('partials/admin/sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php $this->view('partials/admin/subTop'); ?>
   <?php echo $contents;?>
  </div>

  <?php $this->view('partials/admin/footer'); ?>
</body>
</html>