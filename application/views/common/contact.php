<!-- Main content -->
<section class="content">

 <div class="tab-pane" id="profile">


  <?php 

     if($this->session->flashdata('message')){
    echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
     }

    ?>
  <div class="col-sm-12">

  <form class="form-horizontal formPost" method="POST" enctype="multipart/form-data"> 


      <div class="form-group">
        <label for="contactNumber" class="col-sm-2 control-label">Contact Number</label>

        <div class="col-sm-10">         
          <div class="col-sm-8">
            <input type="text" value="<?php echo (isset($result->contact_number))? $result->contact_number : "" ; ?>" class="form-control" id="contactNumber" placeholder="Contact Number" required="required" name="contactNumber">
            <?php echo form_error('contactNumber');?>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="contactEmail" class="col-sm-2 control-label">Contact Email</label>

        <div class="col-sm-10">
          <div class="col-sm-8">
            <input type="text" value="<?php echo (isset($result->contact_email))? $result->contact_email : "" ; ?>" class="form-control" id="contactEmail" placeholder="Contact Email" required="required" name="contactEmail">
            <?php echo form_error('contactEmail');?>
          </div>
        </div>
      </div>
      <div class="form-group">

        <label for="contactAddress" class="col-sm-2 control-label">Contact Address</label>

        <div class="col-sm-10">          
          <div class="col-sm-8">
            <textarea class="form-control" placeholder="Contact Address" required="required" name="contactAddress"><?php echo (isset($result->contact_address))? $result->contact_address : "" ; ?></textarea> 
             <?php echo form_error('contactAddress');?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger" name="contact_submit">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
</section>