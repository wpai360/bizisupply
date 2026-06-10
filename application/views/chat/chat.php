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

      <!-- Counter Offer Panel -->
      <div id="counterOfferPanel" style="display:none; background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 15px; border-bottom: 1px solid #e2e8f0;">
        <h5 style="margin-top:0; font-weight:700; color:#1e293b;"><i class="fa fa-handshake-o"></i> Create Counter-Offer</h5>
        <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:flex-end;">
          <div style="flex:1; min-width:120px;">
            <label style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">Product No (1-10)</label>
            <select id="co_product_index" style="width:100%; padding:6px; border-radius:6px; border:1px solid #cbd5e1; height:34px;">
              <?php for($p=1; $p<=10; $p++): ?>
                <option value="<?= $p; ?>">Product <?= $p; ?></option>
              <?php endfor; ?>
            </select>
          </div>
          <div style="flex:1; min-width:120px;">
            <label style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">New Target Price ($)</label>
            <input type="number" step="0.01" id="co_price" placeholder="45.00" style="width:100%; padding:6px; border-radius:6px; border:1px solid #cbd5e1; height:34px;">
          </div>
          <div style="flex:1; min-width:120px;">
            <label style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">Target Quantity</label>
            <input type="number" id="co_qty" placeholder="100" style="width:100%; padding:6px; border-radius:6px; border:1px solid #cbd5e1; height:34px;">
          </div>
          <div style="flex:2; min-width:200px;">
            <label style="font-size:11px; color:#64748b; display:block; margin-bottom:4px;">Negotiation Note</label>
            <input type="text" id="co_notes" placeholder="e.g. Best price for bulk..." style="width:100%; padding:6px; border-radius:6px; border:1px solid #cbd5e1; height:34px;">
          </div>
          <button type="button" id="sendCounterOfferBtn" class="btn btn-primary" style="height:34px; padding:0 15px; border-radius:6px; font-weight:600; background:#3b82f6;">
            Send Offer Card
          </button>
        </div>
      </div>

      <form id="chatForm">
      <div class="chat-message clearfix">
        <textarea name="message" id="message" placeholder ="Type your message" rows="3"></textarea> 
        <div style="display:flex; justify-content:space-between; align-items:center; margin-top:10px;">
          <button type="button" id="toggleCounterOffer" class="btn" style="background:#e0f2fe; color:#0369a1; font-weight:600; border:none; padding:8px 15px; border-radius:6px;">
            <i class="fa fa-handshake-o"></i> Counter-Offer
          </button>
          <button type="submit" class="btn btn-primary" style="background:#3c8dbc; padding:8px 20px; border-radius:6px;">Send</button>
        </div>
      </div> <!-- end chat-message -->
      </form>
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


  <script type="text/javascript">

    $(document).ready( function (){
      var id;

      $('#toggleCounterOffer').click(function(){
        $('#counterOfferPanel').slideToggle();
      });

      $('#sendCounterOfferBtn').click(function(){
        var pIdx = $('#co_product_index').val();
        var price = $('#co_price').val();
        var qty = $('#co_qty').val();
        var notes = $('#co_notes').val();

        if(!price || !qty) {
          alert('Please enter price and quantity.');
          return;
        }

        // Format message: [COUNTER_OFFER] product_index:X | price:Y | qty:Z | text:Notes
        var coMsg = '[COUNTER_OFFER] product_index:' + pIdx + ' | price:' + price + ' | qty:' + qty + ' | text:' + notes;

        $.ajax({
          type: 'POST',
          url : "<?php echo base_url('welcome/chatSave');?>",
          data : { userId : '<?php echo $chatUser->id; ?>', reqId: '<?php echo $reqId; ?>', message : coMsg },
          success : function (result){
            $('#co_price').val('');
            $('#co_qty').val('');
            $('#co_notes').val('');
            $('#counterOfferPanel').slideUp();
          },
          error : function (err){
            console.log('error>>',err);
          }
        });
      });

      $('#chatForm').submit( function (e){
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

    function respondCounterOffer(chatId, action) {
      var url = action === 'accept' ? "<?php echo base_url('welcome/accept-counter-offer');?>" : "<?php echo base_url('welcome/decline-counter-offer');?>";
      
      $.ajax({
        type: 'POST',
        url: url,
        data: { chat_id: chatId },
        dataType: 'json',
        success: function(res) {
          if(res.success) {
            // Instantly clear/reload chat messages
            if($('.messageDiv').find('li').attr('attrId')){
              var lastId = $('.messageDiv').find('li').last().attr('attrId');
              $.ajax({
                type: 'POST',
                url : "<?php echo base_url('welcome/chatAjax');?>",
                data : { userId : '<?php echo $chatUser->id; ?>', reqId: '<?php echo $reqId; ?>', id: lastId },
                success : function (result){
                  if(result){
                    $(".messageDiv").append(result);
                  }
                }
              });
            }
          } else {
            alert(res.message);
          }
        },
        error: function(err) {
          console.log('Error responding to counter offer', err);
        }
      });
    }
  </script>