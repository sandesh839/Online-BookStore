<div class="main-panel">
  <div class="content-wrapper" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%); min-height: 100vh;">

    <!-- Welcome Header -->
    <div class="welcome-header mb-4">
      <div class="welcome-card">
        <div class="welcome-content">
          <div class="welcome-text">
            <span class="welcome-badge">👋 Hello Admin</span>
            <h1 class="welcome-title">Welcome Back!</h1>
            <p class="welcome-subtitle">Here's what's happening with your bookstore today.</p>
          </div>
          <div class="welcome-illustration">
            <div class="floating-book book-1">📚</div>
            <div class="floating-book book-2">📖</div>
            <div class="floating-book book-3">📕</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
      
      <!-- Total Books -->
      <div class="stat-card stat-card-primary">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_products ?? 0 }}">0</h3>
            <p class="stat-label">Total Books</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 85%"></div>
            </div>
            <span class="stat-change positive">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="18 15 12 9 6 15"></polyline>
              </svg>
              12% from last month
            </span>
          </div>
        </div>
      </div>

      <!-- Total Orders -->
      <div class="stat-card stat-card-success">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_orders ?? 0 }}">0</h3>
            <p class="stat-label">Total Orders</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 92%"></div>
            </div>
            <span class="stat-change positive">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="18 15 12 9 6 15"></polyline>
              </svg>
              18% from last month
            </span>
          </div>
        </div>
      </div>

      <!-- Total Customers -->
      <div class="stat-card stat-card-info">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_customers ?? 0 }}">0</h3>
            <p class="stat-label">Total Customers</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 78%"></div>
            </div>
            <span class="stat-change positive">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="18 15 12 9 6 15"></polyline>
              </svg>
              15% from last month
            </span>
          </div>
        </div>
      </div>

      <!-- Total Revenue -->
      <div class="stat-card stat-card-warning">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_revenue ?? 0 }}">₹0</h3>
            <p class="stat-label">Total Revenue</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 95%"></div>
            </div>
            <span class="stat-change positive">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="18 15 12 9 6 15"></polyline>
              </svg>
              22% from last month
            </span>
          </div>
        </div>
      </div>

      <!-- Delivered Orders -->
      <div class="stat-card stat-card-teal">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_delivered ?? 0 }}">0</h3>
            <p class="stat-label">Delivered Orders</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 88%"></div>
            </div>
            <span class="stat-change positive">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="18 15 12 9 6 15"></polyline>
              </svg>
              9% from last month
            </span>
          </div>
        </div>
      </div>

      <!-- Processing Orders -->
      <div class="stat-card stat-card-purple">
        <div class="stat-card-inner">
          <div class="stat-icon-wrapper">
            <div class="stat-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
            </div>
          </div>
          <div class="stat-content">
            <h3 class="stat-number" data-target="{{ $total_processing ?? 0 }}">0</h3>
            <p class="stat-label">Processing Orders</p>
            <div class="stat-progress">
              <div class="progress-bar" style="width: 65%"></div>
            </div>
            <span class="stat-change negative">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
              5% from last month
            </span>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<style>
/* Welcome Header */
.welcome-header {
  animation: fadeInDown 0.6s ease-out;
}

.welcome-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border-radius: 1.5rem;
  padding: 2rem;
  box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
  position: relative;
  overflow: hidden;
}

.welcome-card::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 400px;
  height: 400px;
  background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
  border-radius: 50%;
}

.welcome-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  z-index: 1;
}

.welcome-text {
  flex: 1;
}

.welcome-badge {
  display: inline-block;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 2rem;
  font-size: 0.9rem;
  font-weight: 600;
  margin-bottom: 1rem;
}

.welcome-title {
  color: white;
  font-size: 2.5rem;
  font-weight: 800;
  margin: 0.5rem 0;
}

.welcome-subtitle {
  color: rgba(255, 255, 255, 0.9);
  font-size: 1.1rem;
  margin: 0;
}

.welcome-illustration {
  display: flex;
  gap: 1rem;
  position: relative;
}

.floating-book {
  font-size: 3rem;
  animation: float 3s ease-in-out infinite;
}

.book-1 { animation-delay: 0s; }
.book-2 { animation-delay: 0.5s; }
.book-3 { animation-delay: 1s; }

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-15px); }
}

/* Stats Grid */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}

/* Stat Cards */
.stat-card {
  background: white;
  border-radius: 1.5rem;
  padding: 1.75rem;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  animation: fadeInUp 0.6s ease-out backwards;
}

.stat-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  border-radius: 1.5rem 1.5rem 0 0;
}

.stat-card-primary::before { background: linear-gradient(90deg, #667eea, #764ba2); }
.stat-card-success::before { background: linear-gradient(90deg, #10b981, #059669); }
.stat-card-info::before { background: linear-gradient(90deg, #3b82f6, #1d4ed8); }
.stat-card-warning::before { background: linear-gradient(90deg, #f59e0b, #d97706); }
.stat-card-teal::before { background: linear-gradient(90deg, #14b8a6, #0d9488); }
.stat-card-purple::before { background: linear-gradient(90deg, #8b5cf6, #6d28d9); }

.stat-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }
.stat-card:nth-child(5) { animation-delay: 0.5s; }
.stat-card:nth-child(6) { animation-delay: 0.6s; }

.stat-card-inner {
  display: flex;
  gap: 1.5rem;
}

.stat-icon-wrapper {
  flex-shrink: 0;
}

.stat-icon {
  width: 70px;
  height: 70px;
  border-radius: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
  transform: scale(1.1) rotate(5deg);
}

.stat-card-primary .stat-icon { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
.stat-card-success .stat-icon { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; }
.stat-card-info .stat-icon { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white; }
.stat-card-warning .stat-icon { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; }
.stat-card-teal .stat-icon { background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%); color: white; }
.stat-card-purple .stat-icon { background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); color: white; }

.stat-content {
  flex: 1;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 800;
  color: #1a202c;
  margin: 0 0 0.5rem 0;
  line-height: 1;
}

.stat-label {
  color: #718096;
  font-size: 0.95rem;
  font-weight: 600;
  margin: 0 0 1rem 0;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.stat-progress {
  height: 6px;
  background: #f1f5f9;
  border-radius: 1rem;
  overflow: hidden;
  margin-bottom: 0.75rem;
}

.progress-bar {
  height: 100%;
  border-radius: 1rem;
  transition: width 1s ease-out;
}

.stat-card-primary .progress-bar { background: linear-gradient(90deg, #667eea, #764ba2); }
.stat-card-success .progress-bar { background: linear-gradient(90deg, #10b981, #059669); }
.stat-card-info .progress-bar { background: linear-gradient(90deg, #3b82f6, #1d4ed8); }
.stat-card-warning .progress-bar { background: linear-gradient(90deg, #f59e0b, #d97706); }
.stat-card-teal .progress-bar { background: linear-gradient(90deg, #14b8a6, #0d9488); }
.stat-card-purple .progress-bar { background: linear-gradient(90deg, #8b5cf6, #6d28d9); }

.stat-change {
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
  font-size: 0.85rem;
  font-weight: 600;
}

.stat-change.positive { color: #10b981; }
.stat-change.negative { color: #ef4444; }

/* Animations */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
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

/* Responsive */
@media (max-width: 768px) {
  .welcome-title {
    font-size: 1.75rem;
  }

  .welcome-illustration {
    display: none;
  }

  .stats-grid {
    grid-template-columns: 1fr;
  }

  .stat-number {
    font-size: 2rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Counter Animation
  const counters = document.querySelectorAll('.stat-number');
  
  counters.forEach(counter => {
    const target = parseInt(counter.getAttribute('data-target'));
    const isRevenue = counter.textContent.includes('₹');
    const duration = 2000;
    const increment = target / (duration / 16);
    let current = 0;

    const updateCounter = () => {
      if (current < target) {
        current += increment;
        const value = Math.ceil(Math.min(current, target));
        counter.textContent = isRevenue ? `₹${value.toLocaleString()}` : value.toLocaleString();
        requestAnimationFrame(updateCounter);
      } else {
        counter.textContent = isRevenue ? `₹${target.toLocaleString()}` : target.toLocaleString();
      }
    };

    setTimeout(updateCounter, 300);
  });

  // Animate progress bars
  setTimeout(() => {
    document.querySelectorAll('.progress-bar').forEach(bar => {
      bar.style.width = bar.style.width;
    });
  }, 500);
});
</script>