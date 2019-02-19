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
          <input type="text" value="<?php echo set_value('product_name'); ?>" class="form-control prod-input" id="validationTooltip01" placeholder="Product Name" name="product_name" autocomplete="off">        
            <?php echo form_error('product_name');?>
        </div>
        
        <div class="col-md-6 mb-3 prod-name">
          <label for="validationTooltip02" class="prod-label">Serial Number:</label>         
          <input type="text" value="<?php echo set_value('serial_no'); ?>" class="form-control prod-input" id="validationTooltip02"  placeholder="689-102" name="serial_no" autocomplete="off">
           <?php echo form_error('serial_no');?>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip03" class="prod-label">Size:</label>
         <input type="text" value="<?php echo set_value('size'); ?>" class="form-control prod-input" name="size" id="validationTooltip03" autocomplete="off" placeholder="108mm x 500m">
        <?php echo form_error('size');?>
      </div>
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer04" class="prod-label">Color:</label>
          <select name="color" class="custom-select is-valid color prod-input" id="validationServer04">
              <option value="">Select Color</option>
              <option value="1" <?php echo set_select('color', 1); ?>>Blue</option>
              <option value="2" <?php echo set_select('color', 2); ?>>Red</option>
              <option value="3" <?php echo set_select('color', 3); ?>>Green</option>
              <option value="4" <?php echo set_select('color', 4); ?>>Yellow</option>
              <option value="5" <?php echo set_select('color', 5); ?>>Pink</option>
              <option value="6" <?php echo set_select('color', 6); ?>>Black</option>
              <option value="7" <?php echo set_select('color', 7); ?>>White</option>
              <option value="8" <?php echo set_select('color', 8); ?>>Orange</option>
              <option value="9" <?php echo set_select('color',9); ?>>Grey</option>
          </select>
          <?php echo form_error('color');?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip05" class="prod-label">Quantity:</label>
         <input type="text" value="<?php echo set_value('quantity'); ?>" class="form-control prod-input" name="quantity" id="validationTooltip05" autocomplete="off" placeholder="6">
        <?php echo form_error('quantity');?>
      </div>
      <div class="col-md-6 pt-3 prod-name">
        <label for="validationServer06" class="prod-label">Brands:</label>
          <select name="brand[]" multiple="multiple" class="custom-select is-valid color prod-input" id="validationServer06">
            <option value ="1" <?php echo set_select('brand', 1); ?>>Cyclone</option>
            <option value ="2" <?php echo set_select('brand', 2); ?>>Herdsman</option>
            <option value ="3" <?php echo set_select('brand', 3); ?>>OK</option>
            <option value ="4" <?php echo set_select('brand', 4); ?>>Redbrand</option>
            <option value ="5" <?php echo set_select('brand', 5); ?>>Sheffield</option>
            <option value ="6" <?php echo set_select('brand', 6); ?>>Waratah</option>
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
                <option <?php echo set_select('category', $categoryValue->id); ?> value ="<?php echo $categoryValue->id; ?>"><?php echo $categoryValue->name; ?></option>
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
                <option <?php echo set_select('category', $typeValue->id); ?> value ="<?php echo $typeValue->id; ?>"><?php echo $typeValue->name; ?></option>
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
        <textarea name="description" class="form-control is-valid prod-text" rows="4" id="comment" placeholder="Hight Tensil Barbed"><?php echo set_value('description'); ?></textarea>
        <?php echo form_error('description');?>
      </div>      
    </div>
    <div class="row">
      <div class="col-md-6 mb-3 prod-name">
        <label for="validationTooltip09" class="prod-label">Date Required:</label>
        <input type="date" value="<?php echo set_value('date'); ?>" name="date" class="form-control prod-input" id="validationTooltip09" placeholder="Date">
         <?php echo form_error('date');?>
      </div>
      <div class="col-md-6 mb-3 prod-name">
        <div class="sub-t">        
          <button type="submit" name="requestQuote" class="btn btn-sub">Submit</button>      
        </div>
      </div>
    </div>
    </form>
</div>
