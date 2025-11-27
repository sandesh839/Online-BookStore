<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .card {
            border-radius: 12px;
        }
        .form-label {
            font-weight: 600;
        }
        img.product-image {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 4px;
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

                <div class="container mt-5">
                    <div class="card p-4 shadow-sm">
                        <h2 class="text-center mb-4">Edit Product</h2>

                        <form action="{{ url('/edit_product_confirm', $product->id) }}" 
                              method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label">Product Title</label>
                                <input type="text" class="form-control" 
                                       name="title" value="{{ $product->title }}" required>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" rows="3" required>
                                    {{ $product->description }}
                                </textarea>
                            </div>

                            <!-- Price + Discount -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Price (Rs)</label>
                                    <input type="number" class="form-control"
                                           name="price" value="{{ $product->price }}" min="0" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Discount Price (Rs)</label>
                                    <input type="number" class="form-control"
                                           name="discount_price" value="{{ $product->discount_price }}" min="0">
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label class="form-label">Product Quantity</label>
                                <input type="number" class="form-control"
                                       name="quantity" value="{{ $product->quantity }}" min="0" required>
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label">Product Category</label>
                                <select class="form-select" name="category" required>

                                    <!-- Selected category -->
                                    <option value="{{ $product->category }}" selected>
                                        {{ $product->category }}
                                    </option>

                                    <!-- Other categories -->
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->category_name }}">
                                            {{ $cat->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Current Image -->
                            <div class="mb-3">
                                <label class="form-label">Current Product Image</label><br>
                                <img src="/productimage/{{ $product->image }}" 
                                     class="product-image" height="120" width="120">
                            </div>

                            <!-- Change Image -->
                            <div class="mb-3">
                                <label class="form-label">Change Product Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <!-- Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-50">
                                    Update Product
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
</body>
</html>
