<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style>
    /* Page background and spacing */
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    }

    .content-wrapper {
      padding: 1.75rem;
    }

    /* Success Alert */
    .modern-alert {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      border: none;
      border-radius: 1rem;
      color: white;
      padding: 1rem 1.25rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 10px 30px rgba(16, 185, 129, 0.15);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .modern-alert .close {
      color: white;
      opacity: 0.95;
      font-size: 1.25rem;
      background: none;
      border: none;
      cursor: pointer;
    }

    /* Header card */
    .products-header {
      background: #fff;
      border-radius: 1rem;
      padding: 1.25rem 1.25rem;
      margin-bottom: 1.25rem;
      box-shadow: 0 6px 20px rgba(0,0,0,0.04);
      text-align: left;
    }
    .products-header h2 {
      margin: 0;
      font-size: 1.25rem;
      font-weight: 800;
      color: #2d3748;
    }
    .products-header p { margin:0; color:#718096; font-size:0.9rem; }

    /* Table container */
    .table-container {
      background: #fff;
      border-radius: 1rem;
      padding: .5rem;
      box-shadow: 0 6px 20px rgba(0,0,0,0.04);
      max-height: calc(100vh - 250px);
      overflow: auto;
    }

    /* Modern table */
    .modern-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      min-width: 980px;
    }
    .modern-table thead {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      position: sticky;
      top: 0;
      z-index: 10;
    }
    .modern-table thead th {
      color: white;
      padding: .9rem .75rem;
      font-weight: 700;
      text-transform: uppercase;
      font-size: .75rem;
      text-align: left;
      border: none;
      white-space: nowrap;
    }
    .modern-table tbody tr {
      border-bottom: 1px solid #f1f5f9;
      transition: background .18s ease, box-shadow .18s ease;
    }
    .modern-table tbody tr:hover {
      background: linear-gradient(90deg,#fbfdff 0%,#fff 100%);
      box-shadow: 0 2px 8px rgba(102,126,234,0.05);
    }
    .modern-table tbody td {
      padding: .85rem .75rem;
      color: #2d3748;
      vertical-align: middle;
      font-size: .95rem;
    }

    /* Thumbnails */
    .order-thumb {
      width: 72px;
      height: 72px;
      object-fit: cover;
      border-radius: .6rem;
      box-shadow: 0 6px 18px rgba(0,0,0,0.06);
      cursor: pointer;
    }

    /* Quantity badge */
    .quantity-badge {
      display:inline-block;
      padding:.45rem .7rem;
      border-radius: 999px;
      font-weight:700;
      font-size:.85rem;
      white-space:nowrap;
    }
    .quantity-high { background:#d1fae5; color:#065f46; }
    .quantity-medium { background:#fef3c7; color:#92400e; }
    .quantity-low { background:#fee2e2; color:#991b1b; }

    /* Price */
    .product-price { font-weight:800; color:#667eea; }
    .original-price { font-size:.85rem; color:#9ca3af; text-decoration:line-through; display:block; }

    /* Status badges */
    .status-badge {
      padding:.35rem .6rem;
      border-radius: .6rem;
      font-weight:700;
      font-size:.8rem;
      display:inline-block;
    }
    .status-paid { background:#d1fae5; color:#065f46; }
    .status-pending { background:#fef3c7; color:#92400e; }
    .status-neutral { background:#f1f5f9; color:#4a5568; }

    /* Action column buttons */
    .action-cell { min-width:160px; width:160px; }
    .action-buttons { display:flex; flex-direction:column; gap:.45rem; }
    .btn-action {
      border:none;
      border-radius:.6rem;
      padding:.55rem .6rem;
      font-weight:700;
      font-size:.85rem;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:.5rem;
      cursor:pointer;
    }
    .btn-primary { background: linear-gradient(135deg,#3b82f6 0%,#1d4ed8 100%); color:#fff; }
    .btn-muted { background:#edf2f7; color:#2d3748; }
    .btn-info   { background: linear-gradient(135deg,#06b6d4 0%,#0891b2 100%); color:#fff; }

    /* Image modal */
    .image-modal {
      display:none;
      position:fixed;
      inset:0;
      background: rgba(0,0,0,0.85);
      z-index:9999;
      align-items:center;
      justify-content:center;
      cursor:zoom-out;
    }
    .image-modal.active { display:flex; }
    .modal-image { max-width:92%; max-height:92%; border-radius:1rem; box-shadow:0 20px 60px rgba(0,0,0,0.6); }

    /* Responsive tweaks */
    @media (max-width: 1100px) {
      .modern-table { min-width: 900px; }
    }
    @media (max-width: 820px) {
      .modern-table { min-width: 760px; }
      .action-cell { min-width:140px; width:140px; }
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">

          <!-- Success Alert -->
          @if(session()->has('message'))
          <div id="success-alert" class="modern-alert">
            <div>
              <strong>✓ Success!</strong> {{ session()->get('message') }}
            </div>
            <button type="button" class="close" onclick="this.parentElement.remove()">×</button>
          </div>
          <script>
            setTimeout(function(){
              var el = document.getElementById('success-alert');
              if (!el) return;
              el.style.transition = 'opacity .45s ease';
              el.style.opacity = '0';
              setTimeout(function(){ if (el.parentNode) el.parentNode.removeChild(el); }, 450);
            }, 3500);
          </script>
          @endif

          <!-- Header -->
          <div class="products-header d-flex justify-content-between align-items-center">
            <div>
              <h2>📦 All Orders</h2>
              <p>Overview of recent orders and statuses</p>
            </div>

            <!-- Search -->
            <form class="form-inline" action="{{ url('search_orders') }}" method="GET">
              @csrf
              <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Search orders..." value="{{ request('search') ?? '' }}">
                <div class="input-group-append">
                  <button class="btn btn-muted" type="submit">Search</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Table container -->
          <div class="table-container">
            @if($orders->count() > 0)
            <table class="modern-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Payment</th>
                  <th>Delivery</th>
                  <th>Image</th>
                  <th class="action-cell">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>
                  <td>{{ $order->name }}</td>
                  <td style="min-width:200px;">{{ $order->email }}</td>
                  <td>{{ $order->phone }}</td>
                  <td style="min-width:180px;">{{ $order->address }}</td>
                  <td style="min-width:180px; font-weight:700; color:#1a202c;">{{ $order->product_title }}</td>
                  <td>
                    <span class="quantity-badge {{ $order->quantity > 50 ? 'quantity-high' : ($order->quantity > 10 ? 'quantity-medium' : 'quantity-low') }}">
                      {{ $order->quantity }}
                    </span>
                  </td>
                  <td>
                    <div class="product-price">₹{{ number_format($order->price, 2) }}</div>
                  </td>

                  <td>
                    @php $p = strtolower($order->payment_status); @endphp
                    @if($p == 'paid' || $p == 'completed')
                      <span class="status-badge status-paid">{{ $order->payment_status }}</span>
                    @elseif($p == 'pending')
                      <span class="status-badge status-pending">{{ $order->payment_status }}</span>
                    @else
                      <span class="status-badge status-neutral">{{ $order->payment_status }}</span>
                    @endif
                  </td>

                  <td>
                    @php $d = strtolower($order->delivery_status); @endphp
                    @if($d == 'processing')
                      <span class="status-badge status-pending">{{ ucfirst($order->delivery_status) }}</span>
                    @elseif($d == 'delivered')
                      <span class="status-badge status-paid">{{ ucfirst($order->delivery_status) }}</span>
                    @else
                      <span class="status-badge status-neutral">{{ ucfirst($order->delivery_status) }}</span>
                    @endif
                  </td>

                  <td>
                    @if($order->image)
                      <img src="/productimage/{{ $order->image }}" alt="product" class="order-thumb" onclick="openImageModal(this.src)">
                    @else
                      <div style="width:72px;height:72px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;border-radius:.6rem;color:#718096">No image</div>
                    @endif
                  </td>

                  <td class="action-cell">
                    <div class="action-buttons">
                      @if (strtolower($order->delivery_status) == 'processing')
                        <a class="btn-action btn-primary" onclick="return confirm('Mark this order as delivered?')" href="{{ url('delivered', $order->id) }}">
                          Mark Delivered
                        </a>
                      @else
                        <a class="btn-action btn-muted" href="javascript:void(0)">
                          Delivered
                        </a>
                      @endif

                      <a class="btn-action btn-muted" href="{{ url('print_pdf', $order->id) }}">PDF</a>
                      <a class="btn-action btn-info" href="{{ url('send_email', $order->id) }}">Email</a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-state" style="padding:2rem;text-align:center;">
              <div style="font-size:2.25rem;opacity:.6;margin-bottom:.5rem">📭</div>
              <h4 style="margin:.25rem 0;color:#4a5568">No Orders Found</h4>
              <p style="color:#718096">There are no orders matching your criteria.</p>
            </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Image Modal -->
  <div class="image-modal" id="imageModal" onclick="closeImageModal()">
    <img src="" alt="Order Product" class="modal-image" id="modalImage">
  </div>

  @include('admin.script')

  <script>
    // Auto-close alert handled above; add modal and keyboard support
    function openImageModal(src) {
      document.getElementById('modalImage').src = src;
      document.getElementById('imageModal').classList.add('active');
    }
    function closeImageModal() {
      document.getElementById('imageModal').classList.remove('active');
    }
    document.addEventListener('keydown', function(e){
      if (e.key === 'Escape') closeImageModal();
    });
  </script>
</body>
</html>