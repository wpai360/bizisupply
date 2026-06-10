<!-- Premium Supplier Profile & Performance Scorecard -->
<div class="container-fluid" style="padding: 24px; background: #f8fafc; font-family: 'Inter', sans-serif;">
  
  <div style="margin-bottom: 20px;">
    <a href="<?php echo base_url('buyer/processOrder');?>/<?php echo $offerid; ?>" class="btn-back">
      <i class="fa fa-arrow-left"></i> Back to Order
    </a>
  </div>

  <?php if ($this->session->flashdata('message')): ?>        
    <div class="alert alert-info"><?php echo $this->session->flashdata('message'); ?></div>
  <?php endif; ?>

  <style>
    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      color: #475569;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .btn-back:hover {
      background: #f1f5f9;
      color: #1e293b;
      text-decoration: none;
      transform: translateX(-4px);
    }
    .profile-card {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
      padding: 30px;
      margin-bottom: 30px;
    }
    .avatar-wrapper {
      position: relative;
      width: 130px;
      height: 130px;
      margin: 0 auto 20px auto;
    }
    .avatar-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #eff6ff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .badge-verified {
      position: absolute;
      bottom: 0;
      right: 0;
      background: #10b981;
      color: white;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 3px solid #ffffff;
      font-size: 14px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .profile-title {
      font-size: 26px;
      font-weight: 800;
      color: #1e293b;
      text-align: center;
      margin-top: 10px;
      margin-bottom: 5px;
    }
    .profile-subtitle {
      color: #64748b;
      font-size: 14px;
      text-align: center;
      margin-bottom: 25px;
    }
    .info-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .info-item {
      display: flex;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px dashed #e2e8f0;
      font-size: 14px;
    }
    .info-label {
      color: #64748b;
      font-weight: 500;
    }
    .info-val {
      color: #1e293b;
      font-weight: 600;
      text-align: right;
    }
    .scorecard-card {
      background: linear-gradient(135deg, #1e293b, #0f172a);
      color: white;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      position: relative;
      overflow: hidden;
    }
    .scorecard-card::after {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
      pointer-events: none;
    }
    .scorecard-header {
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding-bottom: 15px;
      margin-bottom: 20px;
    }
    .scorecard-title {
      font-size: 18px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: #38bdf8;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .metric-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .metric-info {
      flex: 1;
    }
    .metric-name {
      font-size: 14px;
      font-weight: 600;
      color: #e2e8f0;
      margin-bottom: 6px;
    }
    .progress-bar-container {
      background: rgba(255,255,255,0.1);
      border-radius: 9999px;
      height: 8px;
      width: 85%;
      overflow: hidden;
    }
    .progress-bar-fill {
      height: 100%;
      background: linear-gradient(to right, #38bdf8, #818cf8);
      border-radius: 9999px;
      transition: width 0.4s ease;
    }
    .metric-value {
      font-size: 20px;
      font-weight: 800;
      color: #38bdf8;
      width: 60px;
      text-align: right;
    }
    .feedback-section {
      background: #ffffff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 30px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    }
    .feedback-title {
      font-size: 20px;
      font-weight: 800;
      color: #1e293b;
      margin-bottom: 20px;
      border-bottom: 2px solid #eff6ff;
      padding-bottom: 10px;
    }
    .feedback-card {
      background: #f8fafc;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 15px;
      border: 1px solid #e2e8f0;
    }
    .feedback-author {
      font-weight: 700;
      color: #1e293b;
      font-size: 15px;
    }
    .star-gold {
      color: #fbbf24;
    }
    .star-gray {
      color: #cbd5e1;
    }
    .feedback-content {
      color: #475569;
      font-size: 14px;
      margin-top: 8px;
      line-height: 1.5;
    }
  </style>

  <?php
    // Fetch and aggregate scores
    $this->db->select('*');
    $this->db->from('buyer_feedback');
    $this->db->where('buyer_feedback.user_id', $result['id']);
    $querys = $this->db->get()->result();

    $total_reviews = count($querys);
    $avg_rating = 5.0;
    $avg_quality = 5.0;
    $avg_delivery = 5.0;
    $avg_attitude = 5.0;

    if ($total_reviews > 0) {
      $sum_rating = 0;
      $sum_quality = 0;
      $sum_delivery = 0;
      $sum_attitude = 0;
      foreach ($querys as $q) {
        $sum_rating += (float)$q->average;
        $sum_quality += (float)$q->good_quality;
        $sum_delivery += (float)$q->delivery_speed;
        $sum_attitude += (float)$q->attitute;
      }
      $avg_rating = round($sum_rating / $total_reviews, 1);
      $avg_quality = round($sum_quality / $total_reviews, 1);
      $avg_delivery = round($sum_delivery / $total_reviews, 1);
      $avg_attitude = round($sum_attitude / $total_reviews, 1);
    }
  ?>

  <div class="row">
    <!-- Left Column: Profile Card -->
    <div class="col-md-4">
      <div class="profile-card">
        <div class="avatar-wrapper">
          <?php 
            $src = ($result['supplier_image']) ? base_url('uploads/'.$result['supplier_image']) : base_url('assets/theme/dist/img/user2-160x160.jpg');
          ?>
          <img src="<?= $src; ?>" class="avatar-img" alt="Supplier Avatar">
          <div class="badge-verified" title="Verified Supplier">
            <i class="fa fa-check"></i>
          </div>
        </div>

        <h2 class="profile-title"><?php echo htmlspecialchars($result['name']); ?></h2>
        <p class="profile-subtitle">Supplier Profile</p>

        <ul class="info-list">
          <li class="info-item">
            <span class="info-label"><i class="fa fa-envelope-o"></i> Email</span>
            <span class="info-val"><?php echo htmlspecialchars($result['email']); ?></span>
          </li>
          <li class="info-item">
            <span class="info-label"><i class="fa fa-id-card-o"></i> ABN</span>
            <span class="info-val"><?php echo htmlspecialchars($result['ABN']); ?></span>
          </li>
          <li class="info-item">
            <span class="info-label"><i class="fa fa-map-marker"></i> Address</span>
            <span class="info-val"><?php echo htmlspecialchars($result['address']); ?></span>
          </li>
          <li class="info-item">
            <span class="info-label"><i class="fa fa-phone"></i> Phone</span>
            <span class="info-val"><?php echo htmlspecialchars($result['Mphone']); ?></span>
          </li>
          <li class="info-item">
            <span class="info-label"><i class="fa fa-map-o"></i> State</span>
            <span class="info-val"><?php echo htmlspecialchars($result['state']); ?></span>
          </li>
          <li class="info-item">
            <span class="info-label"><i class="fa fa-globe"></i> Website</span>
            <span class="info-val">
              <a href="https://<?php echo htmlspecialchars($result['website']); ?>" target="_blank" style="color: #3b82f6; text-decoration: none;">
                <?php echo htmlspecialchars($result['website']); ?>
              </a>
            </span>
          </li>
        </ul>

        <div style="margin-top: 25px; font-size: 14px; line-height: 1.6; color: #475569; border-top: 1px solid #f1f5f9; padding-top: 15px;">
          <strong>Description:</strong><br>
          <?php echo nl2br(htmlspecialchars($result['description'])); ?>
        </div>
      </div>
    </div>

    <!-- Right Column: Performance Scorecard & Feedback -->
    <div class="col-md-8">
      
      <!-- Performance Scorecard -->
      <div class="scorecard-card">
        <div class="scorecard-header">
          <h3 class="scorecard-title">
            <i class="fa fa-shield"></i> Trust Network & Performance Scorecard
          </h3>
        </div>

        <!-- Metric 1: Overall Average -->
        <div class="metric-row">
          <div class="metric-info">
            <div class="metric-name">Overall Rating Score</div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" style="width: <?= ($avg_rating / 5) * 100; ?>%;"></div>
            </div>
          </div>
          <div class="metric-value"><?= $avg_rating; ?> / 5</div>
        </div>

        <!-- Metric 2: Product Quality -->
        <div class="metric-row">
          <div class="metric-info">
            <div class="metric-name">Product/Service Quality</div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" style="width: <?= ($avg_quality / 5) * 100; ?>%; background: linear-gradient(to right, #10b981, #34d399);"></div>
            </div>
          </div>
          <div class="metric-value"><?= $avg_quality; ?> / 5</div>
        </div>

        <!-- Metric 3: Delivery Speed -->
        <div class="metric-row">
          <div class="metric-info">
            <div class="metric-name">Delivery Speed & SLA Compliance</div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" style="width: <?= ($avg_delivery / 5) * 100; ?>%; background: linear-gradient(to right, #f59e0b, #fbbf24);"></div>
            </div>
          </div>
          <div class="metric-value"><?= $avg_delivery; ?> / 5</div>
        </div>

        <!-- Metric 4: Communication & Attitude -->
        <div class="metric-row">
          <div class="metric-info">
            <div class="metric-name">Service, Support & Attitude</div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" style="width: <?= ($avg_attitude / 5) * 100; ?>%; background: linear-gradient(to right, #8b5cf6, #a78bfa);"></div>
            </div>
          </div>
          <div class="metric-value"><?= $avg_attitude; ?> / 5</div>
        </div>
      </div>

      <!-- Feedback List -->
      <div class="feedback-section">
        <h3 class="feedback-title">
          <i class="fa fa-comments-o"></i> Buyer Feedback & Reviews (<?= $total_reviews; ?>)
        </h3>

        <?php if (!empty($querys)): ?>
          <?php foreach ($querys as $val): ?>
            <div class="feedback-card">
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <span class="feedback-author"><i class="fa fa-user-circle"></i> <?= htmlspecialchars($val->username); ?></span>
                <div>
                  <?php 
                    $stars = round((float)$val->average); 
                    for ($s = 1; $s <= 5; $s++) {
                      if ($s <= $stars) {
                        echo '<i class="fa fa-star star-gold"></i>';
                      } else {
                        echo '<i class="fa fa-star star-gray"></i>';
                      }
                    }
                  ?>
                  <span style="margin-left: 5px; font-weight: bold; color: #475569;"><?= $val->average; ?></span>
                </div>
              </div>
              <div class="feedback-content">
                <?= nl2br(htmlspecialchars($val->rate)); ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="text-center text-muted" style="padding: 40px 0;">
            <i class="fa fa-info-circle" style="font-size: 24px; margin-bottom: 8px;"></i>
            <p>No feedback ratings received by this supplier yet.</p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>

</div>