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

        /* Form Container */
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.6s ease-out;
        }

        .form-card {
            background: white;
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        /* Header */
        .form-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: #718096;
            font-size: 1rem;
        }

        /* Form Groups */
        .form-group-modern {
            margin-bottom: 1.75rem;
        }

        .form-label-modern {
            display: block;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .label-icon {
            font-size: 1.1rem;
        }

        .required-star {
            color: #ef4444;
        }

        /* Inputs */
        .form-input-modern {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #1a202c;
        }

        .form-input-modern:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        textarea.form-input-modern {
            resize: vertical;
            min-height: 120px;
        }

        /* Grid Layout */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
        }

        .file-upload-input {
            display: none;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 3px dashed #cbd5e0;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .file-upload-label:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .upload-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .upload-text {
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .upload-hint {
            color: #a0aec0;
            font-size: 0.85rem;
        }

        /* Image Preview */
        .image-preview {
            margin-top: 1rem;
            display: none;
            position: relative;
        }

        .preview-img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .remove-image {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: #ef4444;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
        }

        .remove-image:hover {
            background: #dc2626;
            transform: scale(1.1);
        }

        /* Submit Button */
        .submit-section {
            margin-top: 2.5rem;
            display: flex;
            gap: 1rem;
        }

        .btn-submit {
            flex: 1;
            padding: 1.25rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 1rem;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
        }

        .btn-cancel {
            padding: 1.25rem 2rem;
            background: white;
            color: #4a5568;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
        }

        /* Helper Text */
        .helper-text {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #718096;
            display: flex;
            align-items: center;
            gap: 0.35rem;
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

        /* Responsive */
        @media (max-width: 768px) {
            .form-card {
                padding: 2rem 1.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-title {
                font-size: 2rem;
            }

            .submit-section {
                flex-direction: column-reverse;
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

                    <!-- Form Container -->
                    <div class="form-container">
                        <div class="form-card">
                            <!-- Header -->
                            <div class="form-header">
                                <div class="form-icon">📦</div>
                                <h1 class="form-title">Add New Product</h1>
                                <p class="form-subtitle">Fill in the details to add a product to your inventory</p>
                            </div>

                            <!-- Form -->
                            <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Product Title -->
                                <div class="form-group-modern">
                                    <label for="title" class="form-label-modern">
                                        <span class="label-icon">📚</span>
                                        Product Title
                                        <span class="required-star">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-input-modern" 
                                           id="title" 
                                           name="title" 
                                           placeholder="e.g., The Great Gatsby" 
                                           required>
                                    <div class="helper-text">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 16v-4M12 8h.01"></path>
                                        </svg>
                                        Enter a clear and descriptive product name
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group-modern">
                                    <label for="description" class="form-label-modern">
                                        <span class="label-icon">📝</span>
                                        Product Description
                                        <span class="required-star">*</span>
                                    </label>
                                    <textarea class="form-input-modern" 
                                              id="description" 
                                              name="description" 
                                              placeholder="Describe your product in detail..." 
                                              required></textarea>
                                    <div class="helper-text">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M12 16v-4M12 8h.01"></path>
                                        </svg>
                                        Include key features, specifications, and details
                                    </div>
                                </div>

                                <!-- Price Grid -->
                                <div class="form-grid">
                                    <div class="form-group-modern">
                                        <label for="price" class="form-label-modern">
                                            <span class="label-icon">💰</span>
                                            Price (₹)
                                            <span class="required-star">*</span>
                                        </label>
                                        <input type="number" 
                                               class="form-input-modern" 
                                               id="price" 
                                               name="price" 
                                               placeholder="499" 
                                               min="0" 
                                               step="0.01"
                                               required>
                                    </div>

                                    <div class="form-group-modern">
                                        <label for="discount_price" class="form-label-modern">
                                            <span class="label-icon">🏷️</span>
                                            Discount Price (₹)
                                        </label>
                                        <input type="number" 
                                               class="form-input-modern" 
                                               id="discount_price" 
                                               name="discount_price" 
                                               placeholder="399" 
                                               min="0"
                                               step="0.01">
                                    </div>
                                </div>

                                <!-- Quantity and Category -->
                                <div class="form-grid">
                                    <div class="form-group-modern">
                                        <label for="quantity" class="form-label-modern">
                                            <span class="label-icon">📊</span>
                                            Quantity
                                            <span class="required-star">*</span>
                                        </label>
                                        <input type="number" 
                                               class="form-input-modern" 
                                               id="quantity" 
                                               name="quantity" 
                                               placeholder="50" 
                                               min="0" 
                                               required>
                                    </div>

                                    <div class="form-group-modern">
                                        <label for="category" class="form-label-modern">
                                            <span class="label-icon">🗂️</span>
                                            Category
                                            <span class="required-star">*</span>
                                        </label>
                                        <select class="form-input-modern" 
                                                id="category" 
                                                name="category" 
                                                required>
                                            <option value="">Select a category</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="form-group-modern">
                                    <label for="image" class="form-label-modern">
                                        <span class="label-icon">🖼️</span>
                                        Product Image
                                        <span class="required-star">*</span>
                                    </label>
                                    <div class="file-upload-wrapper">
                                        <input type="file" 
                                               class="file-upload-input" 
                                               id="image" 
                                               name="image" 
                                               accept="image/*"
                                               required>
                                        <label for="image" class="file-upload-label" id="fileLabel">
                                            <div class="upload-icon">📤</div>
                                            <div class="upload-text">Click to upload or drag and drop</div>
                                            <div class="upload-hint">PNG, JPG, JPEG (MAX. 2MB)</div>
                                        </label>
                                        <div class="image-preview" id="imagePreview">
                                            <img src="" alt="Preview" class="preview-img" id="previewImg">
                                            <button type="button" class="remove-image" id="removeImage">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Section -->
                                <div class="submit-section">
                                    <button type="button" class="btn-cancel" onclick="window.history.back()">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn-submit">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                            <polyline points="7 3 7 8 15 8"></polyline>
                                        </svg>
                                        Add Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.script')

    <script>
        // Image Preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const fileLabel = document.getElementById('fileLabel');
        const removeImageBtn = document.getElementById('removeImage');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.style.display = 'block';
                    fileLabel.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', function() {
            imageInput.value = '';
            imagePreview.style.display = 'none';
            fileLabel.style.display = 'flex';
        });

        // Drag and Drop
        const fileUploadLabel = document.querySelector('.file-upload-label');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            fileUploadLabel.style.borderColor = '#667eea';
            fileUploadLabel.style.background = '#f0f4ff';
        }

        function unhighlight() {
            fileUploadLabel.style.borderColor = '#cbd5e0';
            fileUploadLabel.style.background = '#f8fafc';
        }

        fileUploadLabel.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            imageInput.files = files;
            
            const event = new Event('change', { bubbles: true });
            imageInput.dispatchEvent(event);
        }

        // Form validation enhancement
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ef4444';
                    setTimeout(() => {
                        field.style.borderColor = '#e2e8f0';
                    }, 2000);
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields');
            }
        });
    </script>
</body>
</html>