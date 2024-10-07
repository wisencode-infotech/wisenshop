<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif;font-size:12px; }
        .title { text-align: left; margin-bottom: 20px; }
        .logo { text-align: center; margin-bottom: 10px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { background-color: #f4f4f4; text-align: left; }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('assets/frontend/img/logo.png') }}" alt="Logo" height="80">
    </div>
    <div class="title">Pending Orders</div>

    @foreach($pending_orders as $order)
    <div style="border:2px solid black;margin:20px 0;page-break-inside: avoid;">
        <table class="table" >
        <tbody>
            <tr>
                <td><strong>Order ID:</strong></td>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <td><strong>Username:</strong></td> 
                <td>{{ $order->user->name ?? 'N/A' }}</td> 
            </tr>
            <tr>
                <td><strong>Address:</strong></td> 
                <td>{{ $order->address ?? 'Kenny Rigdon, 1234 Main, Apt. 4B, Springfield, ST 54321.' }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            
            @foreach($order->products as $product) <!-- Loop through each product associated with the order -->
            <tr>
                <td>{{ $product->name ?? '' }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->pivot->quantity }}</td> <!-- Use the pivot quantity -->
                <td>{{ number_format($product->price * $product->pivot->quantity, 2) }}</td> <!-- Calculate subtotal for each item -->
            </tr>
            @php $total += $product->price * $product->pivot->quantity; @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong>{{ number_format($total, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>
@endforeach



</body>
</html>
