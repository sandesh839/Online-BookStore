<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .invoice-box {
            max-width: 750px;
            margin: auto;
            padding: 25px 35px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 8px;
        }

        h1, h2, h3 {
            margin: 0;
            padding: 5px 0;
        }

        .header-title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 25px;
            font-weight: bold;
            color: #444;
        }

        .section-title {
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #999;
            width: 200px;
        }

        .info-table, .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .info-table td {
            padding: 6px 4px;
            font-size: 15px;
        }

        .product-table th, .product-table td {
            padding: 10px;
            border: 1px solid #bbb;
            text-align: left;
        }

        .product-table th {
            background: #eee;
            font-weight: bold;
        }

        .product-image {
            margin-top: 10px;
            text-align: center;
        }

        .product-image img {
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            width: 120px;
            height: 120px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">

        <div class="header-title">Order Invoice</div>

        <!-- Customer Info -->
        <h2 class="section-title">Customer Details</h2>
        <table class="info-table">
            <tr>
                <td><strong>Name:</strong> {{ $orders->name }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong> {{ $orders->email }}</td>
            </tr>
            <tr>
                <td><strong>Phone:</strong> {{ $orders->phone }}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong> {{ $orders->address }}</td>
            </tr>
            <tr>
                <td><strong>User ID:</strong> {{ $orders->user_id }}</td>
            </tr>
        </table>

        <!-- Product Info -->
        <h2 class="section-title">Product Details</h2>

        <table class="product-table">
            <tr>
                <th>Product Title</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Payment</th>
                <th>Delivery</th>
            </tr>
            <tr>
                <td>{{ $orders->product_title }}</td>
                <td>{{ $orders->quantity }}</td>
                <td>${{ $orders->price }}</td>
                <td>{{ $orders->payment_status }}</td>
                <td>{{ $orders->delivery_status }}</td>
            </tr>
        </table>

        <div class="product-image">
            <h3>Product Image</h3>
            <img src="productimage/{{ $orders->image }}" alt="Product">
        </div>

    </div>
</body>
</html>






