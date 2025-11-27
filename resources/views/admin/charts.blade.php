<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')

  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
      min-height: 100vh;
    }

    .content-wrapper {
      padding: 2rem;
    }

    /* Header Card */
    .analytics-header {
      background: white;
      border-radius: 1.25rem;
      padding: 1.75rem;
      margin-bottom: 1.75rem;
      box-shadow: 0 6px 20px rgba(102,126,234,0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .analytics-header h2 {
      margin: 0;
      font-size: 1.75rem;
      font-weight: 800;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .analytics-header p {
      margin: 0;
      color: #6b7280;
    }

    /* Success Alert */
    .modern-alert {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      border-radius: 1rem;
      color: white;
      padding: 1rem 1.25rem;
      margin-bottom: 1.25rem;
      box-shadow: 0 10px 30px rgba(16,185,129,0.15);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .modern-alert .close {
      background: none;
      border: none;
      color: white;
      font-size: 1.25rem;
      cursor: pointer;
      opacity: 0.95;
    }

    /* Chart Cards */
    .charts-grid {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 1.25rem;
    }

    .chart-card {
      grid-column: span 6;
      background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.95));
      border-radius: 1rem;
      padding: 1rem;
      box-shadow: 0 8px 30px rgba(17,24,39,0.04);
      min-height: 420px;
      display: flex;
      flex-direction: column;
    }

    .chart-card .card-title {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 0.75rem;
    }

    .card-title h3 {
      margin: 0;
      font-size: 1.05rem;
      color: #111827;
      font-weight: 700;
    }

    .card-sub {
      color: #6b7280;
      font-size: 0.9rem;
    }

    /* Make charts responsive */
    #piechart, #barchart {
      flex: 1;
      width: 100%;
      height: 100%;
      min-height: 320px;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .chart-card { grid-column: span 12; }
    }
  </style>

  <!-- Google Chart Library -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      // PIE CHART DATA
      var pieData = google.visualization.arrayToDataTable([
        ['Category', 'Count'],
        ['Books',  {{ $books }}],
        ['Orders', {{ $orders }}],
        ['Users',  {{ $users }}]
      ]);

      var pieOptions = {
        title: 'Bookstore Distribution',
        pieHole: 0.38,
        backgroundColor: 'transparent',
        chartArea: { left:20, top:40, width:'90%', height:'75%' },
        legend: { position: 'right', textStyle: { color: '#374151' } },
        slices: { 0: { color: '#6366F1' }, 1: { color: '#10B981' }, 2: { color: '#EF4444' } }
      };

      var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
      pieChart.draw(pieData, pieOptions);

      // BAR CHART DATA
      var barData = google.visualization.arrayToDataTable([
        ["Label", "Total", { role: "style" }],
        ["Books",  {{ $books }}, "#4F46E5"],
        ["Orders", {{ $orders }}, "#16A34A"],
        ["Users",  {{ $users }}, "#DC2626"]
      ]);

      var barOptions = {
        title: "Totals by Category",
        backgroundColor: 'transparent',
        legend: { position: "none" },
        chartArea: { left:50, top:60, width:'85%', height:'70%' },
        vAxis: { minorGridlines: { count: 0 } },
        hAxis: { textStyle: { color: '#374151' } }
      };

      var barChart = new google.visualization.ColumnChart(document.getElementById('barchart'));
      barChart.draw(barData, barOptions);
    }

    // Redraw charts on window resize to keep responsiveness
    window.addEventListener('resize', function() {
      if (typeof drawCharts === 'function') drawCharts();
    });
  </script>
</head>

<body>
<div class="container-scroller">

  @include('admin.sidebar')

  <div class="container-fluid page-body-wrapper">

    @include('admin.header')

    <div class="main-panel">
      <div class="content-wrapper">

        @if(session()->has('message'))
        <div id="success-alert" class="modern-alert">
          <div>
            <strong>✓ Success!</strong> {{ session()->get('message') }}
          </div>
          <button type="button" class="close" onclick="this.parentElement.remove()">×</button>
        </div>

        <script>
          setTimeout(function(){
            var alertEl = document.getElementById('success-alert');
            if (!alertEl) return;
            alertEl.style.transition = 'opacity 0.45s ease';
            alertEl.style.opacity = '0';
            setTimeout(function(){
              if (alertEl.parentNode) alertEl.parentNode.removeChild(alertEl);
            }, 450);
          }, 3000);
        </script>
        @endif

        <div class="analytics-header">
          <div>
            <h2>Analytics Dashboard</h2>
            <p class="card-sub">Overview of books, orders and users</p>
          </div>
          <div class="card-sub">Updated: {{ now()->format('d M Y H:i') }}</div>
        </div>

        <div class="charts-grid">
          <div class="chart-card">
            <div class="card-title">
              <h3>Distribution (Pie)</h3>
              <div class="card-sub">Top categories</div>
            </div>
            <div id="piechart"></div>
          </div>

          <div class="chart-card">
            <div class="card-title">
              <h3>Counts (Bar)</h3>
              <div class="card-sub">Compare totals</div>
            </div>
            <div id="barchart"></div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

@include('admin.script')
</body>
</html>
