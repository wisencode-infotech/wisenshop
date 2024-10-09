<x-mail::message>
# Order Confirmation - Order #{{ $order->id }}

Hello {{ $customer->name }},

Thank you for your order! Here are the details of your order placed on {{ $order->created_at->format('M d, Y') }}.

@include('emails.orders.order-summary')

<x-mail::button :url="route('frontend.orders.details', $order->id)">
View Order
</x-mail::button>

If you have any questions about your order, feel free to contact us.

@include('emails.partials.regards')
</x-mail::message>
