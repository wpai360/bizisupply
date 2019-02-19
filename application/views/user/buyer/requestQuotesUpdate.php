<?php 
    if($this->session->flashdata('message')){
      echo '<p class="text-success">'.$this->session->flashdata('message').'</p>';
    }
?>
<div class="col-sm-12">
    <a class="btn btn-info" href="<?php echo base_url('buyer/view-requestQuotes');?>"><i class="fa fa-list"></i>&nbsp;&nbsp;View RequestQuotes Lists</a>
</div>
<div class="forn-respond">
  <form class="form-horizontal formPost prod-form" method="POST" enctype="multipart/form-data"> 
    <div class="row">
        <div class="col-md-6 mb-3 prod-name">
          <label for="validationTooltip01" class="prod-label">Product Name:</label>
          <input type="text" value="<?php echo (isset($RequestQuotesUpdate->product_name))? $RequestQuotesUpdate->product_name : "" ;   ?>" class="form-control prod-input" id="validationTooltip01" placeholder="Product Name" name="product_name" autocomplete="off">        
            <?php echo form_error('product_name');?>
        </div>
        
        <div class="col-md-6 mb-3 prod-name">
          <label for="validationTooltip02" class="prod-label">Serial Number:</label>         
          <input type="text" value="<?php echo (isset($RequestQuotesUpdate->serial_no))? $RequestQuotesUpdate->serial_no : "" ;   ?>" class="form-control prod-input" id="validationTooltip02"  placeholder="689-102" name="serial_no" autocomplete="off">
           <?php echo form_error('serial_no');?>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip03" class="prod-label">Size:</label>
         <input type="text" value="<?php echo (isset($RequestQuotesUpdate->size))? $RequestQuotesUpdate->size : "" ;   ?>" class="form-control prod-input" name="size" id="validationTooltip03" autocomplete="off" placeholder="108mm x 500m">
        <?php echo form_error('size');?>
      </div>
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer04" class="prod-label">Color:</label>
          <select name="color" class="custom-select is-valid color prod-input" id="validationServer04">
              <option value="">Select Color</option>
              <option value="1" <?php if($RequestQuotesUpdate->color=='1'){ ?> selected="selected" <?php } ?>>Blue</option>
              <option value="2" <?php if($RequestQuotesUpdate->color=='2'){ ?> selected="selected" <?php } ?>>Red</option>
              <option value="3" <?php if($RequestQuotesUpdate->color=='3'){ ?> selected="selected" <?php } ?>>Green</option>
              <option value="4" <?php if($RequestQuotesUpdate->color=='4'){ ?> selected="selected" <?php } ?>>Yellow</option>             
              <option value="5" <?php if($RequestQuotesUpdate->color=='5'){ ?> selected="selected" <?php } ?>>Pink</option>
              <option value="6" <?php if($RequestQuotesUpdate->color=='6'){ ?> selected="selected" <?php } ?>>Black</option>
              <option value="7" <?php if($RequestQuotesUpdate->color=='7'){ ?> selected="selected" <?php } ?>>White</option>
              <option value="8" <?php if($RequestQuotesUpdate->color=='8'){ ?> selected="selected" <?php } ?>>Orange</option>
              <option value="9" <?php if($RequestQuotesUpdate->color=='9'){ ?> selected="selected" <?php } ?>>Grey</option>
          </select>
          <?php echo form_error('color');?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip05" class="prod-label">Quantity:</label>
         <input type="text" value="<?php echo (isset($RequestQuotesUpdate->quantity))? $RequestQuotesUpdate->quantity : "" ;   ?>" class="form-control prod-input" name="quantity" id="validationTooltip05" autocomplete="off" placeholder="6">
        <?php echo form_error('quantity');?>
      </div>
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer06" class="prod-label">Brands:</label>
        <?php $brandExp = explode(',', $RequestQuotesUpdate->brand); ?>
          <select name="brand[]" multiple="multiple" class="custom-select is-valid color prod-input" id="validationServer06">
            <option value ="1" <?php if (in_array("1", $brandExp)){ ?>selected <?php } ?>>Cyclone</option>
            <option value ="2" <?php if (in_array("2", $brandExp)){ ?>selected <?php } ?>>Herdsman</option>
            <option value ="3" <?php if (in_array("3", $brandExp)){ ?>selected <?php } ?>>OK</option>
            <option value ="4" <?php if (in_array("4", $brandExp)){ ?>selected <?php } ?>>Redbrand</option>
            <option value ="5" <?php if (in_array("5", $brandExp)){ ?>selected <?php } ?>>Sheffield</option>
            <option value ="6" <?php if (in_array("6", $brandExp)){ ?>selected <?php } ?>>Waratah</option>
          </select>
          <?php echo form_error('brand');?>
      </div>
    </div>
    <div class="row">   
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer07" class="prod-label">Category:</label>
          <select name="category" class="custom-select is-valid color prod-input" id="validationServer07">
            <option value ="">Select Category</option>
            <?php
              if(!empty($category)){
                foreach ($category as $categoryValue) { ?>
                <option <?php if($RequestQuotesUpdate->category==$categoryValue->id){ ?> selected="selected" <?php } ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?></option>
            <?php }
                }
             ?>            
          </select>
          <?php echo form_error('category');?>
      </div>
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer08" class="prod-label">Types:</label>
          <select name="types" class="custom-select is-valid color prod-input" id="validationServer08">
            <option value ="">Select Type</option>
            <?php
              if(!empty($type)){
                foreach ($type as $typeValue) { ?>
                <option <?php if($RequestQuotesUpdate->types==$typeValue->id){ ?> selected="selected" <?php } ?> value ="<?php echo $typeValue->id; ?>"><?php echo $typeValue->name; ?></option>
            <?php }
                }
             ?>  
          </select>
          <?php echo form_error('types');?>
      </div>
    </div>
    <div class="row">
            <div class="col-md-12  mb-3 prod-name">
        <label for="comment" class="prod-label">Description:</label>
        <textarea name="description" class="form-control is-valid prod-text" rows="4" id="comment" placeholder="Hight Tensil Barbed"><?php echo (isset($RequestQuotesUpdate->description))? $RequestQuotesUpdate->description : "" ;   ?></textarea>
        <?php echo form_error('description');?>
      </div>      
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip09" class="prod-label">Date Required:</label>
        <input type="date" value="<?php echo (isset($RequestQuotesUpdate->date))? $RequestQuotesUpdate->date : "" ;?>" name="date" class="form-control prod-input" id="validationTooltip09" placeholder="Date">
         <?php echo form_error('date');?>
      </div>
      <div class="col-md-6 mb-3 prod-name">
        <div class="sub-t">        
          <button type="submit" name="UpdaterequestQuotes" class="btn btn-sub">Update</button>      
        </div>
      </div>
    </div>
    </form>
</div>

