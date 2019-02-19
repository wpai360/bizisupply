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
       <div class="col-sm-2"></div>
        <div class="col-sm-10"> 
          <div class="col-sm-8">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </span>
                <input type="text" class="form-control" id="fb" name="fb" placeholder="https://" aria-describedby="sizing-addon1" Value="<?php echo (isset($result['fb']['social_link_url']))? $result['fb']['social_link_url'] : "" ; ?>" >
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
       <div class="col-sm-2"></div>
        <div class="col-sm-10"> 
          <div class="col-sm-8">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </span>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="https://" aria-describedby="sizing-addon1" Value="<?php echo (isset($result['twitter']['social_link_url']))? $result['twitter']['social_link_url'] : "" ; ?>" >
            </div>
          </div>
        </div>
      </div>   
      <div class="form-group">
       <div class="col-sm-2"></div>
        <div class="col-sm-10"> 
          <div class="col-sm-8">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
              </span>
                <input type="text" class="form-control" id="google_plus" name="google_plus" placeholder="https://" aria-describedby="sizing-addon1" Value="<?php echo (isset($result['google_plus']['social_link_url']))? $result['google_plus']['social_link_url'] : "" ; ?>" >
            </div>
          </div>
        </div>
      </div>    
      <div class="form-group">
       <div class="col-sm-2"></div>
        <div class="col-sm-10"> 
          <div class="col-sm-8">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">
                <i class="fa fa-play" aria-hidden="true"></i>
              </span>
                <input type="text" class="form-control" id="google_play" name="google_play" placeholder="https://" aria-describedby="sizing-addon1" Value="<?php echo (isset($result['google_play']['social_link_url']))? $result['google_play']['social_link_url'] : "" ; ?>" >
            </div>
          </div>
        </div>
      </div>  
      <div class="form-group">
       <div class="col-sm-2"></div>
        <div class="col-sm-10"> 
          <div class="col-sm-8">
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1">
                <i class="fa fa-apple" aria-hidden="true"></i>
              </span>
                <input type="text" class="form-control" id="apple_store" name="apple_store" placeholder="https://" aria-describedby="sizing-addon1" Value="<?php echo (isset($result['apple_store']['social_link_url']))? $result['apple_store']['social_link_url'] : "" ; ?>" >
            </div>
          </div>
        </div>
      </div>      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger" name="social_submit">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>
</section>