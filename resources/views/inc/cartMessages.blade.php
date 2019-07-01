@if(session('success'))
    <div class="cart-messages page-title p-3">
        <p class="text-white">
            {{ session('success') }}
        </p>
    </div>
@endif