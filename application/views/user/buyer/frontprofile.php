


<?php
if ($this->session->flashdata('message')) {
    ?>        
          <?php echo $this->session->flashdata('message')?>
<?php
} ?>

 <style>
 .form4 {
    width: 75%;
}
.pull-left.form4 label {
    font-size: 21px;
}


.checked {
  color: orange;
}

</style>
   

<div class="container">

</div>
<h4>
<b>Profile 



</b></h4>
<div class="row mt-3 supp">

  <div class="col-sm-2">
    <div class="user2 image">
    <?php //if($user->image){
       // $src=base_url('assets/uploads/profile/'.$user->image);
    
   // }else{
   //$src=base_url('assets/theme/dist/img/user2-160x160.jpg');
   // }
?>
    <!--  <img src="<?//= //$src;?>" class="img-circle" alt="User Image" style="width: 150px;"> -->
    
	
	   
	
          <?php
         // print_r($result);
          if ($result['buyer_image']) {
              $src=base_url('uploads/'.$result['buyer_image']); ?>
          
			
  <?php
          } else {
              $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
          }?>
    
     <img src="<?php echo $src;?>" class="img-circle" alt="User Image" style="width: 150px;"/>

	
    </div>
  </div>



  <!-- Modal -->
   
  <div class="pull-left form4">
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Name </label>
        <h3><?php echo  $result['name']; ?></h3>
      </div>

      <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
      <h3><?php echo $result['email']; ?></h3>
      </div>
	  
	  
     <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">ABN</label>
       <h3><?php echo $result['ABN']; ?></h3>
       </div>
	   
	   
	   <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Address</label> 
	  <h3><?php echo $result['address']; ?></h3>
	  
	   </div>
	    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Phone</label> 
	  <h3><?php echo $result['Mphone']; ?></h3>
	  
	   </div>
	   
	   <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">State</label> 
	  <h3><?php echo $result['state']; ?> </h3>
	  
	   </div>
	
       <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Website</label> 
	  <h3><a href="https://<?php echo $result['website']; ?>"><?php echo $result['website']; ?> </a></h3>
	  
	   </div>

         
	   <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Description</label> 
	  <h3><?php echo $result['description']; ?></h3>
	  
	   </div>
	   
	 
	   
	   
	   
	   <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Rating </label> 
	  <h3>   <?php
       
       
	   $query = $this->db->select_sum('feedback.star_rating')->from('feedback')->where('feedback.user_id', $result['id'])->get();
	   
       $this->db->select('*');
       $this->db->from('feedback');
       $this->db->join('users', 'feedback.user_id = users.id');
       $this->db->where('feedback.user_id', $result['id']);
       $querys = $this->db->get()->result();

       $row = $query->result();
       $total_reviews= count($querys);

      // $total_sum=[];
       $total_sum = $row[0]->star_rating;
       $avrage = $total_sum/$total_reviews;
        
       $roundfig= round($avrage);

         if ($roundfig == 1) {
             echo'<span class="fa fa-star checked"></span><span class="fa fa-star" ></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
         } elseif ($roundfig == 2) {
             echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
         } elseif ($roundfig == 3) {
             echo'<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>';
         } elseif ($roundfig == 4) {
             echo'<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star"></span>';
         } elseif ($roundfig == 5) {
             echo'<span class="fa fa-star checked"></span>
		 <span class="fa fa-star  checked"></span>
		 <span class="fa fa-star checked"></span>
		 <span class="fa fa-star checked"></span> 
		 <span class="fa fa-star checked"></span>';
         }
         
          echo  "(".$roundfig.")" ;
         
         
    
       
      ?></h3>
	  
	  <?php  foreach ($querys as $value) {
          echo "<h3><b>$value->username</b></h3>";
          //print_r($value->star_rating);
        
          if ($value->star_rating == 1) {
              echo'<span class="fa fa-star checked"></span>
		 <span class="fa fa-star" ></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>';
          } elseif ($value->star_rating == 2) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
          } elseif ($value->star_rating == 3) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
          } elseif ($value->star_rating == 4) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star"></span>';
          } elseif ($value->star_rating == 5) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>';
          }
          echo "<br>";
        
          echo "$value->rate";
          echo "</hr>";
      }
      ?>
     
     
	   </div> 
	   
  </div></div>
   


















    </script>
  
    