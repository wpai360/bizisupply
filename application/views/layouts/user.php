<!DOCTYPE html>
<html>
  <?php $this->view('partials/user/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->view('partials/user/header'); ?>

  <!-- Left side column. contains the logo and sidebar -->
    <? if($common['active'] == 'buyer') { ?>
  <aside class="main-sidebar buyer-sidebar">
  <?}else{?><aside class="main-sidebar supplier-sidebar"><?}?>
   <?php $this->view('partials/user/sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php $this->view('partials/user/subTop'); ?>
   <?php echo $contents;?>
  </div>

  <?php $this->view('partials/user/footer'); ?>
</body>
</html>
