<table width="100%" cellpadding="10" cellspacing="0">
    <tr>
        <td width="50%" valign="top">
            <h2 style="margin-bottom: 10px;">Customer Information</h2>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>{{ $customer->name ?? '' }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $customer->email ?? '' }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{ $customer->phone ?? '' }}</td>
                </tr>
                <tr>
                    <td>Shipping Address:</td>
                    <td>{{ $order->address->shippingAddress->fullAddress ?? '' }}</td>
                </tr>
                <tr>
                    <td>Billing Address:</td>
                    <td>{{ $order->address->billingAddress->fullAddress ?? '' }}</td>
                </tr>
            </table>
        </td>
        <td width="50%" valign="top">
            <h2 style="margin-bottom: 10px;">Order Details</h2>
            <table>
                <tr>
                    <td>Order ID:</td>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <td>Order Date:</td>
                    <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                </tr>
                <tr>
                    <td>Order Status:</td>
                    <td>{{ config('general.order_statuses.' . $order->status) }}</td>
                </tr>
                <tr>
                    <td>Total Amount:</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<h2>Items Ordered</h2>
<table width="100%" cellpadding="10" cellspacing="0" border="1">
    <thead>
        <tr>
            <th align="left">Product</th>
            <th align="center">Quantity</th>
            <th align="right">Price</th>
            <th align="right">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->orderItems as $item)
        <tr>
            <td>{{ $item->product->name ?? '' }}</td>
            <td align="center">{{ $item->quantity }}</td>
            <td align="right">${{ number_format($item->price, 2) }}</td>
            <td align="right">${{ number_format($item->quantity * $item->price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table width="100%" cellpadding="10" cellspacing="0">
    <tr>
        <td width="70%" align="right"><strong>Order Total:</strong></td>
        <td width="30%" align="right"><strong>${{ number_format($order->total_price ?? 0, 2) }}</strong></td>
    </tr>
</table>