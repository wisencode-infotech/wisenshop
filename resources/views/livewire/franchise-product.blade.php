<div>
    <h1>Franchise Product Availability</h1>

    @if($availabilities->isEmpty())
        <p>No availability found for this product.</p>
    @else
        @foreach ($availabilities as $userId => $group)
            <div class="user-group border p-4 mb-4 rounded-md shadow">
                <h2 class="text-lg font-semibold">User: {{ optional($group['user'])->name ?? 'Unknown User' }}</h2> <!-- Display user name -->
                @foreach ($group['availabilities'] as $availability)
                    <div class="availability-item border-t border-gray-300 py-2">
                        <p>Product: {{ optional($availability->product)->name ?? 'No product available' }}</p>
                        <p>Variation: {{ optional($availability->variation)->name ?? 'No variation' }}</p>
                        <p>Quantity: {{ $availability->quantity }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
