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
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.6s ease-out;
        }

        .header-content {
            text-align: center;
        }

        .header-content h2 {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0 0 0.5rem 0;
        }

        .header-content p {
            color: #718096;
            font-size: 1rem;
        }

        /* Table Container */
        .table-container {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.7s ease-out;
        }

        /* Modern Table */
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
            padding: 1.25rem 1rem;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border: none;
            text-align: left;
            white-space: nowrap;
        }

        .modern-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .modern-table tbody tr:hover {
            background: linear-gradient(90deg, #f8faff 0%, #fff 100%);
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
        }

        .modern-table tbody td {
            padding: 1.25rem 1rem;
            color: #2d3748;
            font-size: 0.95rem;
            vertical-align: top;
        }

        /* Product Title */
        .product-title {
            font-weight: 700;
            color: #1a202c;
            font-size: 1rem;
            line-height: 1.4;
            word-wrap: break-word;
            max-width: 200px;
        }

        /* Description with Read More */
        .product-description {
            position: relative;
            max-width: 300px;
            color: #718096;
            line-height: 1.6;
        }

        .description-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-wrap: break-word;
        }

        .description-text.expanded {
            display: block;
            -webkit-line-clamp: unset;
        }

        .read-more-btn {
            color: #667eea;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0.25rem 0;
            margin-top: 0.25rem;
            transition: color 0.2s;
        }

        .read-more-btn:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Quantity Badge */
        .quantity-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 0.9rem;
            white-space: nowrap;
        }

        .quantity-high { background: #d1fae5; color: #065f46; }
        .quantity-medium { background: #fef3c7; color: #92400e; }
        .quantity-low { background: #fee2e2; color: #991b1b; }

        /* Price */
        .price-container {
            white-space: nowrap;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #667eea;
        }

        .discount-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #10b981;
        }

        .original-price {
            font-size: 0.85rem;
            color: #9ca3af;
            text-decoration: line-through;
            display: block;
            margin-top: 0.25rem;
        }

        /* Category Badge */
        .category-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
            color: #667eea;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.85rem;
            border: 1px solid #667eea40;
            white-space: nowrap;
        }

        /* Product Image */
        .image-wrapper {
            position: relative;
            display: inline-block;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 0.75rem;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-image:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Image Modal */
        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            animation: fadeIn 0.3s ease;
        }

        .image-modal.active {
            display: flex;
        }

        .modal-image {
            max-width: 90%;
            max-height: 90%;
            border-radius: 1rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        /* Action Buttons - Fixed Width */
        .action-cell {
            min-width: 160px;
            width: 160px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            width: 100%;
        }

        .btn-action {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            white-space: nowrap;
            width: 100%;
        }

        .btn-edit {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h4 {
            color: #4a5568;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #718096;
        }

        /* Animations */
        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Scrollbar */
        .table-container {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        .table-container::-webkit-scrollbar {
            width: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a3f8f 100%);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .modern-table {
                font-size: 0.9rem;
            }

            .product-title {
                max-width: 150px;
            }

            .product-description {
                max-width: 200px;
            }
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

                    <!-- Header Section -->
                    <div class="products-header">
                        <div class="header-content">
                            <h2>📦 All Products</h2>
                            <p>Manage your complete product inventory</p>
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="table-container">
                        @if($products->count() > 0)
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th class="action-cell">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>
                                        <div class="product-title">{{ $item->title }}</div>
                                    </td>
                                    <td>
                                        <div class="product-description">
                                            <div class="description-text" id="desc-{{ $item->id }}">
                                                {{ $item->description }}
                                            </div>
                                            @if(strlen($item->description) > 100)
                                            <button class="read-more-btn" onclick="toggleDescription({{ $item->id }})">
                                                <span id="btn-text-{{ $item->id }}">Read More ↓</span>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="quantity-badge {{ $item->quantity > 50 ? 'quantity-high' : ($item->quantity > 10 ? 'quantity-medium' : 'quantity-low') }}">
                                            {{ $item->quantity }} units
                                        </span>
                                    </td>
                                    <td>
                                        <div class="price-container">
                                            @if($item->discount_price)
                                                <div class="discount-price">₹{{ number_format($item->discount_price, 2) }}</div>
                                                <div class="original-price">₹{{ number_format($item->price, 2) }}</div>
                                            @else
                                                <div class="product-price">₹{{ number_format($item->price, 2) }}</div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="category-badge">{{ $item->category }}</span>
                                    </td>
                                    <td>
                                        <div class="image-wrapper">
                                            <img src="/productimage/{{ $item->image }}" 
                                                 class="product-image" 
                                                 alt="{{ $item->title }}"
                                                 onclick="openImageModal(this.src)">
                                        </div>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-buttons">
                                            <a href="{{ url('edit_product', $item->id) }}" class="btn-action btn-edit">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this product?')" 
                                               href="{{ url('delete_product', $item->id) }}" 
                                               class="btn-action btn-delete">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
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
                            <div class="empty-icon">📦</div>
                            <h4>No Products Found</h4>
                            <p>Your product inventory is empty</p>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <img src="" alt="Product" class="modal-image" id="modalImage">
    </div>

    @include('admin.script')

    <script>
        // Toggle description Read More/Less
        function toggleDescription(id) {
            const descElement = document.getElementById('desc-' + id);
            const btnElement = document.getElementById('btn-text-' + id);
            
            if (descElement.classList.contains('expanded')) {
                descElement.classList.remove('expanded');
                btnElement.textContent = 'Read More ↓';
            } else {
                descElement.classList.add('expanded');
                btnElement.textContent = 'Read Less ↑';
            }
        }

        // Image Modal
        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.add('active');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
</body>
</html>