<x-mail::message>
# Order Status Update - Order #{{ $order->id }}

Hello {{ $customer->name ?? '' }},

We wanted to let you know that the status of your order (Order ID: **#{{ $order->id }}**) has been updated.

@include('emails.orders.order-summary')

<x-mail::button :url="route('frontend.orders.details', $order->id)">
View Order Details
</x-mail::button>

If you have any questions or need further assistance regarding your order, please don't hesitate to contact us.

@include('emails.partials.regards')
</x-mail::message>
