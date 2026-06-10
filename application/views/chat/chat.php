<?php 
$userName;
$userImg;

if($chatUser){
 $userName  = $chatUser->username;
 $userImg  = $chatUser->image;
}
?>
<?php if($userImg){
  $src=base_url('assets/uploads/profile/'.$userImg);

}else{
 $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
}
?>


<div class="container clearfix">

    <div class="chat">
      <div class="chat-header clearfix">
        <img src="<?= $src;?>" alt="avatar" class="im_t" />
        
        <div class="chat-about">
          <div class="chat-with">Chat with  
          <?php if($userName){ ?>
          <?php echo ucfirst($userName);?>
          <?php }else{ echo 'User';} ?>
          </div>
        </div>
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul class="messageDiv">
          
        </ul>
        
      </div> <!-- end chat-history -->
      <form>
      <div class="chat-message clearfix">
        <textarea name="message" id="message" placeholder ="Type your message" rows="3"></textarea> 
       <!--  <div class="custom-file file-trans">
		  <span class="camera"><input type="file" class="custom-file-input" id="customFile image"></span>
		</div>	 -->	
        <button type="submit" class="btn">Send</button>

      </div> <!-- end chat-message -->
      </form>
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


  <script type="text/javascript">

    $(document).ready( function (){
      var id;

      $('form').submit( function (e){
      e.preventDefault();
      if($.trim($('#message').val())){

        var mesg = $('#message').val();
        $.ajax({
          type: 'POST',
          url : "<?php echo base_url('welcome/chatSave');?>",
          data : { userId : '<?php echo $chatUser->id; ?>',reqId:'<?php echo $reqId; ?>',message : mesg },
          success : function (result){
            $('#message').val('');
$( "#message" ).focus();
          },
          error : function (err){
            console.log('error>>',err);
          }
        });

      }
    });

//scroll div load old record
$wait = true;
 $(".chat-history").scroll(function(){
if($(this).scrollTop() !== 0){
if(id = $('.messageDiv').find('li').first().attr('attrId')){
 if($wait){
  $wait = false;
  $.ajax({
        type: 'POST',
        url : "<?php echo base_url('welcome/chatScroll');?>",
        data : { userId : '<?php echo $chatUser->id; ?>',reqId:'<?php echo $reqId; ?>',id: id },
        success : function (result){

         if(result){
         $(".messageDiv").prepend(result);
         $wait = true;
        }else{
         $wait = false;
        }
      },
      error : function (err){
        //console.log('err>>',err);
      }
    });

}
}
   } 
  });
 


      setInterval( function (){

      if($('.messageDiv').find('li').attr('attrId')){
         id = $('.messageDiv').find('li').last().attr('attrId');
      }
       $.ajax({
        type: 'POST',
        url : "<?php echo base_url('welcome/chatAjax');?>",
        data : { userId : '<?php echo $chatUser->id; ?>',reqId:'<?php echo $reqId; ?>',id: id },
        success : function (result){
         if(result){
          $(".messageDiv").append(result);

        }
      },
      error : function (err){
        //console.log('err>>',err);
      }
    });

     }, 2000);
    });
  </script>