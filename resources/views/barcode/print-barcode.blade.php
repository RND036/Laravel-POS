<!-- resources/views/products/print-barcode.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Print Barcode - {{ $product->product_id }}</title>
    <style>
        .barcode-container {
            text-align: center;
            padding: 20px;
            margin: 20px;
        }
        .product-info {
            margin: 10px 0;
            font-family: Arial, sans-serif;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="barcode-container">
        <div class="product-info">
            <h3>{{ $product->name }}</h3>
            <p>ID: {{ $product->product_id }}</p>
            <p>Price: LKR {{ number_format($product->price, 2) }}</p>
        </div>
        <img src="{{ Storage::disk('public')->url($product->barcode) }}" alt="Product Barcode">
        <button class="no-print" onclick="window.print()">Print Barcode</button>
    </div>
</body>
</html>