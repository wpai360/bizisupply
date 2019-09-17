<a href="<?php echo base_url('buyer/processOrder');?>/<?php echo $offerid; ?>">BACK</a>

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
.user-rating {
    direction: rtl;
    font-size: 20px;
    unicode-bidi: bidi-override;
    padding: 10px 30px;
    display: inline-block;
}
.user-rating input {
    opacity: 0;
    position: relative;
    left: -15px;
    z-index: 2;
    cursor: pointer;
}
.user-rating span.star:before {
    color: #777777;
    content:"ï€†";
    /*padding-right: 5px;*/
}
.user-rating span.star {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    position: relative;
    z-index: 1;
}
.user-rating span {
    margin-left: -15px;
}
.user-rating span.star:before {
    color: #777777;
    content:"\f006";
    /*padding-right: 5px;*/
}
.user-rating input:hover + span.star:before, .user-rating input:hover + span.star ~ span.star:before, .user-rating input:checked + span.star:before, .user-rating input:checked + span.star ~ span.star:before {
    color: #ffd100;
    content:"\f005";
}

.selected-rating{
    color: #ffd100;
    font-weight: bold;
    font-size: 3em;
}


.checked {
  color: orange;
}

</style>

<div class="container">

</div>
<h4>
<b>Profiles 



</b></h4>
<div class="row mt-3 supp">

  <div class="col-sm-2">
     <div class="pull-right image">
       <?php if ($result['supplier_image']) {
      $src=base_url('uploads/'.$result['supplier_image']);
 ?>
  
			
  <?php
  } else {
      $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
  }?>
      <img src="<?= $src;?>" class="rounded-circle" alt="User Image" style="width: 150px;">
    
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
	  <hr> 
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Rating </label> 
	  <h3> 
	  <?php
       $query = $this->db->select_sum('buyer_feedback.average')->from('buyer_feedback')->where('buyer_feedback.user_id', $result['id'])->get();
      
      
       $this->db->select('*');
       $this->db->from('buyer_feedback');
       $this->db->join('users', 'buyer_feedback.user_id = users.id');
       $this->db->where('buyer_feedback.user_id', $result['id']);
       $querys = $this->db->get()->result();
       
      
           
      $row = $query->result();
      $total_reviews= count($querys);
       
      // $total_sum=[];
      $total_sum = $row[0]->average;
      $avrage = $total_sum/$total_reviews;
      $roundfig= round($avrage);
         
         if ($roundfig == 1) {
             echo'<span class="fa fa-star checked"></span><span class="fa fa-star" ></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
         } elseif ($roundfig == 2) {
             echo'<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
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
        
          if ($value->average == 1) {
              echo'<span class="fa fa-star checked"></span>
		 <span class="fa fa-star" ></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>
		 <span class="fa fa-star"></span>';
          } elseif ($value->average == 2) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
          } elseif ($value->average == 3) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star"></span> <span class="fa fa-star"></span>';
          } elseif ($value->average == 4) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star"></span>';
          } elseif ($value->average == 5) {
              echo'<span class="fa fa-star checked"></span><span class="fa fa-star  checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>';
          }
          echo "<br>";
        
          echo "$value->rate";
          echo "</hr>";
      }
      ?>
	  

        
  </div></div>
  
  
  
   












<script>
$('#user-rating-form').on('change','[name="rating"]',function(){
	$('#selected-rating').text($('[name="rating"]:checked').val());
});


    </script>
  
    