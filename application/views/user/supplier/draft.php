<?php if($viewOffer[0]->sp_image3 != NULL){
    ?>
			<div class="input_fields_wrap" >
		 		<?php echo form_open_multipart('welcome/do_upload'); ?>
				<label for="comment" class="prod-label">Image 3:</label> 
				<input class="supplier-image" type="file" name="image3" value="" id='3' >
				<img   id="cu3" width="100" height="80" src="<?= base_url(); ?>uploads/<?php echo $viewOffer[0]->sp_image3?>"><i class="fa fa-trash" aria-hidden="true" id="image3" style="font-size:30px;color:red;" ></i><br>
			</div>
<?php
}else{
    ?>
			<div class="input_fields_wrap" >
		 		<?php echo form_open_multipart('welcome/do_upload'); ?>
				<label for="comment" class="prod-label">Image 3:</label> 
				<input class="supplier-image" type="file" name="image3" value="" id='3' >
				<img   id="cu3" width="100" height="80" src="https://dummyimage.com/300x200/000/fff.jpg&text=no+image"><i class="fa fa-trash" aria-hidden="true" id="image3" style="font-size:30px;color:red;" ></i><br>
			</div>
<?php
}?>