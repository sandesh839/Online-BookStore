<style>
/* Sidebar Base Styles */
.sidebar {
  background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%) !important;
  box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border-right: 1px solid #e2e8f0;
}

/* Brand/Logo Area */
.sidebar-brand-wrapper {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  padding: 1.5rem;
  border-bottom: 3px solid rgba(255, 255, 255, 0.2);
}

/* Profile Section (Updated design for Sandesh Sharma) */
.nav-item.profile {
  background: linear-gradient(135deg, rgba(102,126,234,0.12) 0%, rgba(118,75,162,0.08) 100%);
  padding: 1rem;
  margin: 1rem;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(102, 126, 234, 0.06);
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.nav-item.profile:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 30px rgba(102, 126, 234, 0.1);
}

.profile-pic {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

/* Circular avatar with gradient ring */
.profile-pic .avatar {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  padding: 3px;
  background: linear-gradient(135deg, #667eea, #764ba2);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 6px 18px rgba(102,126,234,0.12);
}

.profile-pic .avatar img {
  width: 56px !important;
  height: 56px !important;
  border-radius: 50%;
  border: 2px solid #fff;
  object-fit: cover;
}

/* Name + role styling */
.profile-name {
  display: flex;
  flex-direction: column;
  gap: 0.1rem;
}

.profile-name h5 {
  color: #2d3748;
  font-weight: 800;
  font-size: 1rem;
  margin: 0;
  letter-spacing: 0.2px;
}

.profile-name .role {
  display: inline-block;
  background: linear-gradient(90deg, rgba(102,126,234,0.12), rgba(118,75,162,0.08));
  color: #4a5568;
  font-size: 0.78rem;
  padding: 0.18rem 0.5rem;
  border-radius: 999px;
  font-weight: 600;
}

/* Small edit/profile actions */
.profile-actions {
  margin-left: auto;
  display: flex;
  gap: 0.5rem;
  align-items: center;
}

#profile-dropdown {
  color: #6b7280;
  font-size: 1.25rem;
  transition: transform 0.3s ease;
}

#profile-dropdown:hover {
  transform: rotate(90deg);
}

/* Dropdown */
.sidebar-dropdown {
  background: white !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 0.75rem !important;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
  padding: 0.4rem !important;
}

/* Navigation Items */
.nav-item.menu-items {
  margin: 0.35rem 1rem;
  transition: all 0.3s ease;
}

.nav-item.menu-items .nav-link {
  padding: 0.9rem 1.25rem;
  border-radius: 0.9rem;
  color: #4a5568 !important;
  font-weight: 600;
  font-size: 0.95rem;
  transition: all 0.28s ease;
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}

.nav-item.menu-items .nav-link::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 4px;
  background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
  transform: scaleY(0);
  transition: transform 0.3s ease;
}

.nav-item.menu-items .nav-link:hover::before,
.nav-item.menu-items .nav-link[aria-expanded="true"]::before {
  transform: scaleY(1);
}

.nav-item.menu-items .nav-link:hover {
  background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 100%);
  color: #667eea !important;
  transform: translateX(5px);
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.12);
}

.nav-item.menu-items .nav-link[aria-expanded="true"] {
  background: linear-gradient(135deg, #e8edff 0%, #f5f0ff 100%);
  color: #667eea !important;
}

/* Menu Icons */
.menu-icon {
  width: 42px;
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
  border-radius: 0.9rem;
  margin-right: 1rem;
  transition: all 0.3s ease;
}

.nav-link:hover .menu-icon {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  transform: scale(1.05) rotate(4deg);
}

.menu-icon i {
  font-size: 1.2rem;
  color: #667eea;
  transition: color 0.3s ease;
}

.nav-link:hover .menu-icon i {
  color: white;
}

/* Menu Title */
.menu-title {
  flex: 1;
  font-size: 0.95rem;
}

/* Menu Arrow */
.menu-arrow {
  margin-left: auto;
  transition: transform 0.3s ease;
  color: #a0aec0;
}

.nav-link[aria-expanded="true"] .menu-arrow {
  transform: rotate(180deg);
  color: #667eea;
}

/* Submenu improved styling for products */
.sub-menu {
  background: linear-gradient(135deg, #ffffff 0%, #fbfbfd 100%);
  border-radius: 0.75rem;
  padding: 0.5rem 0.5rem;
  margin: 0.5rem 0 0.5rem 3.2rem;
  border: 1px solid #eef2ff;
  box-shadow: 0 6px 18px rgba(102,126,234,0.04);
}

.sub-menu .nav-item {
  margin: 0.25rem 0.5rem;
}

/* New product-specific styles */
.sub-menu .nav-link {
  padding: 0.6rem 1rem;
  border-radius: 0.6rem;
  color: #4a5568 !important;
  font-size: 0.92rem;
  font-weight: 700;
  transition: all 0.2s ease;
  position: relative;
  padding-left: 2.2rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.sub-menu .nav-link::before {
  content: '';
  position: absolute;
  left: 0.9rem;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: transparent;
  transition: all 0.18s ease;
  transform: translateX(-6px);
  opacity: 0;
}

.sub-menu .nav-link:hover {
  background: white;
  color: #4f46e5 !important;
  padding-left: 2.8rem;
  box-shadow: 0 6px 18px rgba(79,70,229,0.06);
}

.sub-menu .nav-link:hover::before {
  opacity: 1;
  transform: translateX(0);
  background: linear-gradient(180deg, #667eea, #764ba2);
}

/* Highlight Add Product */
.product-add {
  background: linear-gradient(90deg, rgba(102,126,234,0.06), rgba(118,75,162,0.05));
  border-left: 3px solid rgba(102,126,234,0.18);
}

.product-add .label-new {
  background: linear-gradient(90deg,#10b981,#06b6d4);
  color: #fff;
  font-weight: 800;
  font-size: 0.72rem;
  padding: 0.18rem 0.45rem;
  border-radius: 0.5rem;
  margin-left: auto;
  box-shadow: 0 6px 18px rgba(16,185,129,0.08);
}

/* All products badge (count) */
.all-products-badge {
  background: linear-gradient(90deg,#f59e0b,#ef4444);
  color: #fff;
  font-weight: 800;
  font-size: 0.72rem;
  padding: 0.18rem 0.45rem;
  border-radius: 0.5rem;
  margin-left: auto;
  box-shadow: 0 6px 18px rgba(240,82,82,0.08);
}

/* Active State */
.nav-item.menu-items .nav-link.active {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white !important;
  box-shadow: 0 6px 22px rgba(102, 126, 234, 0.28);
}

.nav-item.menu-items .nav-link.active .menu-icon {
  background: rgba(255, 255, 255, 0.14);
}

.nav-item.menu-items .nav-link.active .menu-icon i {
  color: white;
}

.nav-item.menu-items .nav-link.active .menu-arrow {
  color: white;
}

/* Badge/Notification */
.menu-badge {
  background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
  color: white;
  padding: 0.25rem 0.6rem;
  border-radius: 1rem;
  font-size: 0.75rem;
  font-weight: 700;
  margin-left: auto;
  box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
  animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

/* Divider */
.sidebar-divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
  margin: 1rem 1.5rem;
}

/* Scrollbar */
.sidebar::-webkit-scrollbar {
  width: 6px;
}

.sidebar::-webkit-scrollbar-track {
  background: #f8fafc;
}

.sidebar::-webkit-scrollbar-thumb {
  background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
  border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(180deg, #5568d3 0%, #6a3f8f 100%);
}

/* Animation on load */
@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.nav-item.menu-items {
  animation: slideInLeft 0.4s ease-out backwards;
}

.nav-item.menu-items:nth-child(1) { animation-delay: 0.1s; }
.nav-item.menu-items:nth-child(2) { animation-delay: 0.2s; }
.nav-item.menu-items:nth-child(3) { animation-delay: 0.3s; }
.nav-item.menu-items:nth-child(4) { animation-delay: 0.4s; }
.nav-item.menu-items:nth-child(5) { animation-delay: 0.5s; }
.nav-item.menu-items:nth-child(6) { animation-delay: 0.6s; }

/* Responsive */
@media (max-width: 991px) {
  .sidebar {
    box-shadow: none;
  }
  .profile-pic .avatar { width: 48px; height: 48px; padding: 2px; }
  .profile-pic .avatar img { width: 44px; height: 44px; }
}
</style>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <!-- Add your logo here -->
  </div>
  
  <ul class="nav">
    <!-- Profile Section (updated markup) -->
    <li class="nav-item profile">
      <div class="profile-pic">
        <div class="avatar">
          <img src="{{ asset('admin/assets/images/faces/sandesh 1.jpg') }}" alt="Profile">
        </div>
        <div class="profile-name">
          <h5 class="mb-0 font-weight-normal">Sandesh Sharma</h5>
          <span class="role">Administrator</span>
        </div>
      </div>

      <div class="profile-actions">
        <a href="#" title="Edit profile" class="text-muted" style="font-size:1rem;">
          <i class="mdi mdi-account-edit"></i>
        </a>

        <a href="#" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="mdi mdi-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account Settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do List</p>
            </div>
          </a>
        </div>
      </div>
    </li>

    <div class="sidebar-divider"></div>

    <!-- Dashboard -->
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ url('/redirect') }}">
        <span class="menu-icon">
          <i class="mdi mdi-view-dashboard"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Products (updated markup for Add / All Products) -->
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#productMenu" aria-expanded="false" aria-controls="productMenu">
        <span class="menu-icon">
          <i class="mdi mdi-package-variant"></i>
        </span>
        <span class="menu-title">Products</span>
        <i class="menu-arrow mdi mdi-chevron-down"></i>
      </a>
      <div class="collapse" id="productMenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link product-add" href="{{ url('/view_product') }}">
              <i class="mdi mdi-plus-circle-outline" style="color:#06b6d4;"></i>
              <span>Add Product</span>
              <span class="label-new">NEW</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/show_product') }}">
              <i class="mdi mdi-format-list-bulleted" style="color:#f59e0b;"></i>
              <span>All Products</span>
              {{-- replace 24 with dynamic count if available: {{ $productCount ?? 24 }} --}}
              <span class="all-products-badge">{{ $productCount ?? 24 }}</span>
            </a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Category -->
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ url('view_category') }}">
        <span class="menu-icon">
          <i class="mdi mdi-shape"></i>
        </span>
        <span class="menu-title">Categories</span>
      </a>
    </li>

    <!-- Orders -->
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ url('order') }}">
        <span class="menu-icon">
          <i class="mdi mdi-cart"></i>
        </span>
        <span class="menu-title">Orders</span>
        <span class="menu-badge">12</span>
      </a>
    </li>

    <!-- Charts -->
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{ url('charts') }}">
        <span class="menu-icon">
          <i class="mdi mdi-chart-line"></i>
        </span>
        <span class="menu-title">Analytics</span>
      </a>
    </li>

    <div class="sidebar-divider"></div>

    <!-- Settings (Optional) -->
    <li class="nav-item menu-items">
      <a class="nav-link" href="#">
        {{-- settings placeholder --}}
      </a>
    </li>
  </ul>
</nav>

<script>
// Add active class to current menu item and support submenu highlighting
document.addEventListener('DOMContentLoaded', function() {
  const currentPath = window.location.pathname.replace(/\/+$/, ''); // normalize
  const menuLinks = document.querySelectorAll('.sidebar .nav-link');

  menuLinks.forEach(link => {
    const href = (link.getAttribute('href') || '').replace(/\/+$/, '');
    if (href && href === currentPath) {
      link.classList.add('active');

      // If this is inside a submenu, expand the parent collapse
      const parentCollapse = link.closest('.collapse');
      if (parentCollapse) {
        parentCollapse.classList.add('show');
        const parentLink = document.querySelector(`[href="#${parentCollapse.id}"]`);
        if (parentLink) parentLink.setAttribute('aria-expanded', 'true');
      }
    }
  });

  // Small enhancement: ensure productMenu opens if current is product routes (common case)
  if (currentPath.includes('/view_product') || currentPath.includes('/show_product')) {
    const productCollapse = document.getElementById('productMenu');
    if (productCollapse && !productCollapse.classList.contains('show')) {
      productCollapse.classList.add('show');
      const parentLink = document.querySelector(`[href="#productMenu"]`);
      if (parentLink) parentLink.setAttribute('aria-expanded', 'true');
    }
  }
});
</script>