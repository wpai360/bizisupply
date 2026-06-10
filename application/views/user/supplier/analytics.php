<!-- Modern BiziSupply Sales Analytics for Suppliers -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  :root {
    --bg-gradient-start: #f8fafc;
    --bg-gradient-end: #f1f5f9;
    --card-bg: #ffffff;
    --text-primary: #1e293b;
    --text-secondary: #64748b;
    --accent-blue: #0ea5e9;
    --accent-indigo: #6366f1;
    --success: #10b981;
    --warning: #f59e0b;
    --border-color: #e2e8f0;
  }

  .analytics-wrapper {
    background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
    padding: 24px;
    font-family: 'Inter', system-ui, sans-serif;
    color: var(--text-primary);
    min-height: 100vh;
  }

  .analytics-header {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .analytics-title {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -0.025em;
    background: linear-gradient(to right, var(--accent-blue), var(--accent-indigo));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .analytics-subtitle {
    font-size: 14px;
    color: var(--text-secondary);
    margin-top: 4px;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
  }

  .stat-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: var(--accent-blue);
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  }

  .stat-card:hover::before {
    opacity: 1;
  }

  .stat-card.indigo::before {
    background: var(--accent-indigo);
  }

  .stat-card.success::before {
    background: var(--success);
  }

  .stat-label {
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-secondary);
  }

  .stat-value {
    font-size: 32px;
    font-weight: 800;
    margin-top: 8px;
    letter-spacing: -0.05em;
  }

  .chart-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 24px;
    margin-bottom: 30px;
  }

  .chart-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
  }

  .chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .chart-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--text-primary);
  }

  .table-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--border-color);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);
  }

  .premium-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
  }

  .premium-table th {
    text-align: left;
    padding: 12px 16px;
    background: #f8fafc;
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid var(--border-color);
  }

  .premium-table td {
    padding: 16px;
    border-bottom: 1px solid var(--border-color);
    color: var(--text-primary);
    font-size: 14px;
  }

  .premium-table tr:hover {
    background-color: #f8fafc;
  }

  .badge-ui {
    display: inline-flex;
    align-items: center;
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 12px;
    font-weight: 600;
  }

  .badge-ui.blue {
    background: #e0f2fe;
    color: #0369a1;
  }
</style>

<div class="analytics-wrapper">
  <div class="analytics-header">
    <div>
      <h1 class="analytics-title">Supplier Sales & Funnel Analytics</h1>
      <p class="analytics-subtitle">Track your bidding funnel, monthly performance, ratings, and top buyers.</p>
    </div>
  </div>

  <!-- Stats Grid -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-label">Total Bids Sent</div>
      <div class="stat-value"><?= isset($win_rate->total_bids) ? $win_rate->total_bids : 0; ?></div>
    </div>
    <div class="stat-card indigo">
      <div class="stat-label">Accepted Offers</div>
      <div class="stat-value"><?= isset($win_rate->accepted_bids) ? $win_rate->accepted_bids : 0; ?></div>
    </div>
    <div class="stat-card success">
      <div class="stat-label">Bidding Win Rate</div>
      <div class="stat-value">
        <?php 
          $total = isset($win_rate->total_bids) ? (int)$win_rate->total_bids : 0;
          $accepted = isset($win_rate->accepted_bids) ? (int)$win_rate->accepted_bids : 0;
          echo $total > 0 ? round(($accepted / $total) * 100, 1) . '%' : '0%';
        ?>
      </div>
    </div>
    <div class="stat-card">
      <div class="stat-label">Average Buyer Rating</div>
      <div class="stat-value" style="color: var(--warning);">
        ★ <?= isset($avg_rating->avg_rating) && $avg_rating->avg_rating > 0 ? $avg_rating->avg_rating : '5.0'; ?>
      </div>
    </div>
  </div>

  <!-- Charts Grid -->
  <div class="chart-grid">
    <div class="chart-card">
      <div class="chart-header">
        <h2 class="chart-title">Bids Placed by Category</h2>
      </div>
      <div style="height: 300px; position: relative;">
        <canvas id="categoryChart"></canvas>
      </div>
    </div>

    <div class="chart-card">
      <div class="chart-header">
        <h2 class="chart-title">Monthly Bid Volume</h2>
      </div>
      <div style="height: 300px; position: relative;">
        <canvas id="monthlyTrendChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Top Buyers List -->
  <div class="table-card">
    <div class="chart-header">
      <h2 class="chart-title">Top Engaged Buyers</h2>
    </div>
    <table class="premium-table">
      <thead>
        <tr>
          <th>Buyer Username</th>
          <th>Total Transactions</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($top_buyers)): ?>
          <?php foreach ($top_buyers as $b): ?>
            <tr>
              <td><strong><?= htmlspecialchars($b->username); ?></strong></td>
              <td><span class="badge-ui blue"><?= $b->order_count; ?> Orders</span></td>
              <td>
                <span class="text-muted">Direct business connection</span>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center text-muted">No buyer engagement data yet.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Category Chart
    const catCtx = document.getElementById('categoryChart').getContext('2d');
    const catData = <?= json_encode($bids_by_cat); ?>;
    
    const catLabels = catData.map(item => item.name || 'Uncategorized');
    const catValues = catData.map(item => item.bid_count);

    new Chart(catCtx, {
      type: 'doughnut',
      data: {
        labels: catLabels.length ? catLabels : ['No Data'],
        datasets: [{
          data: catValues.length ? catValues : [1],
          backgroundColor: [
            '#0ea5e9', '#6366f1', '#10b981', '#f59e0b', '#ec4899', '#64748b'
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right',
            labels: {
              boxWidth: 12,
              font: { family: "'Inter', sans-serif" }
            }
          }
        }
      }
    });

    // 2. Monthly Trend Chart
    const trendCtx = document.getElementById('monthlyTrendChart').getContext('2d');
    const trendData = <?= json_encode($monthly_bids); ?>;
    
    const trendLabels = trendData.map(item => item.month_label);
    const trendValues = trendData.map(item => item.total_bids);

    new Chart(trendCtx, {
      type: 'bar',
      data: {
        labels: trendLabels.length ? trendLabels : ['No Data'],
        datasets: [{
          label: 'Bids Placed',
          data: trendValues.length ? trendValues : [0],
          backgroundColor: '#6366f1',
          borderRadius: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: { stepSize: 1 }
          }
        }
      }
    });
  });
</script>
