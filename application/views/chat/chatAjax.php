  <?php 
if(count($chat)){
  foreach ($chat as $key => $chats) {

if($chatUser->id != $chats->from){ ?>

  <li class="clearfix" attrId = "<?php echo $chats->id;?>">
            <div class="message-data align-right">      
              <span class="message-data-time" ><?php echo time_elapsed_string($chats->send);?></span> &nbsp; &nbsp;
              <span class="message-data-name" >You</span> <i class="fa fa-circle me"></i>           
            </div>
            <div class="message other-message float-right">
              <?php echo trim($chats->message);?>
            </div>
          </li>
        <?php 

 }else{ 
 if($chatUser->image){
        $src=base_url('assets/uploads/profile/'.$chatUser->image);
    }else{
   $src=base_url('assets/theme/dist/img/user2-160x160.jpg');
    }
?>
          <li attrId = "<?php echo $chats->id;?>">
            <div class="message-data">
           <img src="<?= $src;?>" alt="avatar" class="im_t" />
              <span class="message-data-name"><i class="fa fa-circle online"></i> <?php if($chatUser->username){ ?>
     <?php echo ucfirst($chatUser->username);?>
  <?php } ?></span>
              <span class="message-data-time"><?php echo time_elapsed_string($chats->send);?></span>
            </div>

            <div class="message my-message">
             <?php echo trim($chats->message);?>
            </div>
          </li>



</p>
<?php 
}
}
}
?>


<?php
function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
    );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
