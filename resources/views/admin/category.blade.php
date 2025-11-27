<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.css')
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    }

    .content-wrapper {
      padding: 2rem;
    }

    /* Success Alert */
    .modern-alert {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      border: none;
      border-radius: 1rem;
      color: white;
      padding: 1.25rem 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
      animation: slideInDown 0.5s ease-out;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .modern-alert .close {
      color: white;
      opacity: 0.9;
      font-size: 1.5rem;
      font-weight: 300;
      background: none;
      border: none;
      cursor: pointer;
    }

    /* Header Section */
    .products-header {
      background: white;
      border-radius: 1.5rem;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      animation: fadeInUp 0.6s ease-out;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .header-content h2 {
      font-size: 1.75rem;
      font-weight: 900;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin: 0;
    }

    .header-content p {
      color: #718096;
      font-size: 0.95rem;
      margin: 0;
    }

    /* Add Category Form */
    .add-category-form {
      display: flex;
      gap: 0.5rem;
      align-items: center;
      flex-wrap: wrap;
    }

    .add-category-form input[type="text"] {
      padding: 0.6rem 0.75rem;
      border-radius: 0.6rem;
      border: 1px solid #e2e8f0;
      min-width: 220px;
      outline: none;
      transition: box-shadow 0.15s, border-color 0.15s;
    }

    .add-category-form input[type="text"]:focus {
      box-shadow: 0 6px 18px rgba(102,126,234,0.12);
      border-color: #667eea;
    }

    .btn-add {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      padding: 0.6rem 0.9rem;
      border: none;
      border-radius: 0.6rem;
      font-weight: 700;
      cursor: pointer;
    }

    /* Table Container */
    .table-container {
      background: white;
      border-radius: 1.5rem;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      animation: fadeInUp 0.7s ease-out;
    }

    .modern-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
    }

    .modern-table thead {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .modern-table thead th {
      color: white;
      padding: 1rem;
      font-weight: 700;
      text-transform: uppercase;
      font-size: 0.85rem;
      letter-spacing: 0.5px;
      border: none;
      text-align: left;
    }

    .modern-table tbody tr {
      border-bottom: 1px solid #f1f5f9;
      transition: all 0.3s ease;
    }

    .modern-table tbody tr:hover {
      background: linear-gradient(90deg, #f8faff 0%, #fff 100%);
      box-shadow: 0 2px 8px rgba(102, 126, 234, 0.05);
    }

    .modern-table tbody td {
      padding: 1rem;
      color: #2d3748;
      font-size: 0.95rem;
      vertical-align: middle;
    }

    .action-cell {
      min-width: 160px;
      width: 160px;
    }

    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }

    .btn-action {
      padding: 0.5rem 0.75rem;
      border: none;
      border-radius: 0.5rem;
      font-weight: 600;
      font-size: 0.85rem;
      cursor: pointer;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: white;
    }

    .btn-delete {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem 2rem;
    }

    .empty-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      opacity: 0.6;
    }

    .empty-state h4 {
      color: #4a5568;
      font-size: 1.25rem;
      margin-bottom: 0.5rem;
    }

    .empty-state p {
      color: #718096;
      margin: 0;
    }

    /* Animations */
    @keyframes slideInDown {
      from { transform: translateY(-100%); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Scrollbar */
    .table-container {
      max-height: calc(100vh - 260px);
      overflow-y: auto;
    }

    .table-container::-webkit-scrollbar { width: 8px; }
    .table-container::-webkit-scrollbar-thumb {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 10px;
    }

    @media (max-width: 800px) {
      .add-category-form { width: 100%; }
      .header-content { width: 100%; }
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
              var alertEl = document.getElementById('success-alert');
              if (!alertEl) return;
              alertEl.style.transition = 'opacity 0.5s ease';
              alertEl.style.opacity = '0';
              setTimeout(function(){
                if (alertEl.parentNode) alertEl.parentNode.removeChild(alertEl);
              }, 500);
            }, 3500);
          </script>
          @endif

          <!-- Header + Add Form -->
          <div class="products-header">
            <div class="header-content">
              <h2>📂 Categories</h2>
              <p>Manage your site categories</p>
            </div>

            <form action="{{ url('/add_category') }}" method="POST" class="add-category-form">
              @csrf
              <input type="text" name="category" placeholder="Write Category Name" required>
              <button type="submit" class="btn-add">Add Category</button>
            </form>
          </div>

          <!-- Table Container -->
          <div class="table-container">
            @if(count($data) > 0)
            <table class="modern-table">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th class="action-cell">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $item)
                <tr>
                  <td>
                    <div class="product-title">{{ $item->category_name }}</div>
                  </td>
                  <td class="action-cell">
                    <div class="action-buttons">
                      <a onclick="return confirm('Are you sure to delete this?')" href="{{ url('delete_category', $item->id) }}" class="btn-action btn-delete">
                        Delete
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-state">
              <div class="empty-icon">📂</div>
              <h4>No Categories Found</h4>
              <p>Add a new category using the form above.</p>
            </div>
            @endif
          </div>

        </div>
      </div>
    </div>
  </div>

  @include('admin.script')
</body>
</html>