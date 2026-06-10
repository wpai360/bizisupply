<?php 
if(count($chat)){
  foreach ($chat as $key => $chats) {
    $msg_text = trim($chats->message);
    $is_counter_offer = (strpos($msg_text, '[COUNTER_OFFER]') === 0);
    $is_accepted = (strpos($msg_text, '[COUNTER_OFFER_ACCEPTED]') === 0);
    $is_declined = (strpos($msg_text, '[COUNTER_OFFER_DECLINED]') === 0);

    // Helper to parse counter offer string
    $co_data = [];
    if ($is_counter_offer) {
      $parts = explode('|', str_replace('[COUNTER_OFFER]', '', $msg_text));
      foreach ($parts as $part) {
        $kv = explode(':', trim($part), 2);
        if (count($kv) === 2) {
          $co_data[trim($kv[0])] = trim($kv[1]);
        }
      }
    }

    if($chatUser->id != $chats->from){ 
      // Sent by the current user (renders on the right side)
      ?>
      <li class="clearfix" attrId = "<?php echo $chats->id;?>">
        <div class="message-data align-right">      
          <span class="message-data-time" ><?php echo time_elapsed_string($chats->send);?></span> &nbsp; &nbsp;
          <span class="message-data-name" >You</span> <i class="fa fa-circle me"></i>           
        </div>
        <div class="message other-message float-right" style="max-width: 80%; text-align: left; padding: 15px; border-radius: 12px;">
          <?php if ($is_counter_offer): ?>
            <div style="background: rgba(255,255,255,0.15); padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.3);">
              <h5 style="margin-top:0; font-weight:700; color:#38bdf8; text-transform:uppercase; font-size:11px; letter-spacing:0.05em;">
                <i class="fa fa-handshake-o"></i> Counter-Offer Sent
              </h5>
              <p style="margin: 4px 0; font-size: 13px;"><strong>Product Index:</strong> <?= isset($co_data['product_index']) ? $co_data['product_index'] : '1'; ?></p>
              <p style="margin: 4px 0; font-size: 13px;"><strong>Proposed Price:</strong> $<?= isset($co_data['price']) ? number_format((float)$co_data['price'], 2) : '0.00'; ?></p>
              <p style="margin: 4px 0; font-size: 13px;"><strong>Quantity:</strong> <?= isset($co_data['qty']) ? $co_data['qty'] : '0'; ?></p>
              <?php if (!empty($co_data['text'])): ?>
                <p style="margin: 6px 0 0 0; font-style: italic; font-size: 12px; color: #e2e8f0;">"<?= htmlspecialchars($co_data['text']); ?>"</p>
              <?php endif; ?>
              <div style="margin-top:10px; font-size:11px; color:#cbd5e1;">Waiting for partner response...</div>
            </div>
          <?php elseif ($is_accepted): ?>
            <div style="color: #4ade80; font-weight: bold;">
              <i class="fa fa-check-circle"></i> <?= htmlspecialchars(str_replace('[COUNTER_OFFER_ACCEPTED]', '', $msg_text)); ?>
            </div>
          <?php elseif ($is_declined): ?>
            <div style="color: #f87171; font-weight: bold;">
              <i class="fa fa-times-circle"></i> <?= htmlspecialchars(str_replace('[COUNTER_OFFER_DECLINED]', '', $msg_text)); ?>
            </div>
          <?php else: ?>
            <?php echo trim($chats->message);?>
          <?php endif; ?>
        </div>
      </li>
      <?php 
    } else { 
      // Sent by the other user (renders on the left side)
      $src = ($chatUser->image) ? base_url('assets/uploads/profile/'.$chatUser->image) : base_url('assets/theme/dist/img/user2-160x160.jpg');
      ?>
      <li attrId = "<?php echo $chats->id;?>">
        <div class="message-data">
          <img src="<?= $src;?>" alt="avatar" class="im_t" />
          <span class="message-data-name"><i class="fa fa-circle online"></i> 
            <?php if($chatUser->username){ echo ucfirst($chatUser->username); } ?>
          </span>
          <span class="message-data-time"><?php echo time_elapsed_string($chats->send);?></span>
        </div>

        <div class="message my-message" style="max-width: 80%; padding: 15px; border-radius: 12px; background: #e0f2fe; color: #0369a1;">
          <?php if ($is_counter_offer): ?>
            <div style="background: #ffffff; padding: 12px; border-radius: 8px; border: 1px solid #bae6fd; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
              <h5 style="margin-top:0; font-weight:700; color:#0284c7; text-transform:uppercase; font-size:11px; letter-spacing:0.05em;">
                <i class="fa fa-handshake-o"></i> Counter-Offer Received
              </h5>
              <p style="margin: 4px 0; font-size: 13px; color:#334155;"><strong>Product Index:</strong> <?= isset($co_data['product_index']) ? $co_data['product_index'] : '1'; ?></p>
              <p style="margin: 4px 0; font-size: 13px; color:#334155;"><strong>Proposed Price:</strong> $<?= isset($co_data['price']) ? number_format((float)$co_data['price'], 2) : '0.00'; ?></p>
              <p style="margin: 4px 0; font-size: 13px; color:#334155;"><strong>Quantity:</strong> <?= isset($co_data['qty']) ? $co_data['qty'] : '0'; ?></p>
              <?php if (!empty($co_data['text'])): ?>
                <p style="margin: 6px 0 0 0; font-style: italic; font-size: 12px; color: #475569;">"<?= htmlspecialchars($co_data['text']); ?>"</p>
              <?php endif; ?>
              
              <!-- Action buttons for counter offer -->
              <div style="margin-top: 12px; display: flex; gap: 8px;">
                <button type="button" class="btn btn-xs btn-success" onclick="respondCounterOffer(<?= $chats->id; ?>, 'accept')" style="padding:4px 10px; font-weight:700; border-radius:4px; font-size:11px;">
                  Accept
                </button>
                <button type="button" class="btn btn-xs btn-danger" onclick="respondCounterOffer(<?= $chats->id; ?>, 'decline')" style="padding:4px 10px; font-weight:700; border-radius:4px; font-size:11px;">
                  Decline
                </button>
              </div>
            </div>
          <?php elseif ($is_accepted): ?>
            <div style="color: #16a34a; font-weight: bold;">
              <i class="fa fa-check-circle"></i> <?= htmlspecialchars(str_replace('[COUNTER_OFFER_ACCEPTED]', '', $msg_text)); ?>
            </div>
          <?php elseif ($is_declined): ?>
            <div style="color: #dc2626; font-weight: bold;">
              <i class="fa fa-times-circle"></i> <?= htmlspecialchars(str_replace('[COUNTER_OFFER_DECLINED]', '', $msg_text)); ?>
            </div>
          <?php else: ?>
            <?php echo trim($chats->message);?>
          <?php endif; ?>
        </div>
      </li>
      <?php 
    }
  }
}

if (!function_exists('time_elapsed_string')) {
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
}
?>
