<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Purchase Order #<?= $order->order_random_id; ?></title>
  <style>
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      color: #333;
      margin: 0;
      padding: 40px;
      line-height: 1.5;
    }
    .po-header {
      display: flex;
      justify-content: space-between;
      border-bottom: 3px solid #3b82f6;
      padding-bottom: 20px;
      margin-bottom: 30px;
    }
    .logo-area h1 {
      margin: 0;
      color: #1e3a8a;
      font-size: 28px;
      font-weight: 800;
    }
    .logo-area p {
      margin: 4px 0 0 0;
      color: #64748b;
      font-size: 14px;
    }
    .po-title {
      text-align: right;
    }
    .po-title h2 {
      margin: 0;
      color: #3b82f6;
      font-size: 24px;
      font-weight: 700;
    }
    .po-title p {
      margin: 6px 0 0 0;
      font-weight: bold;
      color: #475569;
    }
    .address-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      margin-bottom: 40px;
    }
    .address-box h3 {
      margin: 0 0 10px 0;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: #64748b;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 6px;
    }
    .address-box p {
      margin: 4px 0;
      font-size: 14px;
      color: #1e293b;
    }
    .details-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 40px;
    }
    .details-table th {
      background: #f8fafc;
      color: #475569;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 12px;
      padding: 12px;
      border-bottom: 2px solid #e2e8f0;
      text-align: left;
    }
    .details-table td {
      padding: 12px;
      border-bottom: 1px solid #e2e8f0;
      font-size: 14px;
      color: #334155;
    }
    .footer-note {
      margin-top: 60px;
      border-top: 1px solid #e2e8f0;
      padding-top: 20px;
      text-align: center;
      font-size: 12px;
      color: #94a3b8;
    }
    @media print {
      body {
        padding: 0;
      }
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>

  <!-- Print Button (HTML Mode helper) -->
  <div class="no-print" style="margin-bottom: 20px; text-align: right;">
    <button onclick="window.print();" style="padding: 10px 20px; background: #3b82f6; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
      Print / Save as PDF
    </button>
  </div>

  <div class="po-header">
    <div class="logo-area">
      <h1>BIZISUPPLY</h1>
      <p>B2B Procurement Platform</p>
    </div>
    <div class="po-title">
      <h2>PURCHASE ORDER</h2>
      <p>PO Number: <?= $order->order_random_id; ?></p>
      <span style="font-size: 12px; color: #64748b;">Generated: <?= $generated_at; ?></span>
    </div>
  </div>

  <div class="address-grid">
    <div class="address-box">
      <h3>Buyer (Issuer)</h3>
      <p><strong><?= htmlspecialchars($buyer->name); ?></strong></p>
      <p>Email: <?= htmlspecialchars($buyer->email); ?></p>
      <p>ABN: <?= htmlspecialchars($buyer->ABN); ?></p>
      <p>Address: <?= htmlspecialchars($buyer->address); ?></p>
      <p>Phone: <?= htmlspecialchars($buyer->Mphone); ?></p>
    </div>
    <div class="address-box">
      <h3>Order Details</h3>
      <p><strong>Prefer Delivery Date:</strong> <?= date('d M Y', strtotime($order->prefer_delivery_data)); ?></p>
      <p><strong>Payment Status:</strong> <?= $order->buyer_payment_mark_paid ? 'Paid' : 'Pending Payment'; ?></p>
      <p><strong>Shipping Status:</strong> <?= $order->buyer_delivery_transit_status ? 'Received' : 'In Transit/Pending'; ?></p>
    </div>
  </div>

  <h3>Items / Requirements Summary</h3>
  <table class="details-table">
    <thead>
      <tr>
        <th style="width: 10%;">Item</th>
        <th>Product Description / Specifications</th>
        <th style="width: 20%; text-align: right;">Required Date</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $item_num = 1;
        for ($v = 1; $v <= 10; $v++) {
          $order_name = 'order_name_' . $v;
          if (!empty($order->$order_name)) {
            ?>
            <tr>
              <td><?= $item_num++; ?></td>
              <td><strong><?= htmlspecialchars($order->$order_name); ?></strong></td>
              <td style="text-align: right;"><?= date('d M Y', strtotime($order->prefer_delivery_data)); ?></td>
            </tr>
            <?php
          }
        }
      ?>
    </tbody>
  </table>

  <div class="footer-note">
    <p>This is a system-generated Purchase Order document from BiziSupply. All terms are subject to platform agreement.</p>
  </div>

</body>
</html>
