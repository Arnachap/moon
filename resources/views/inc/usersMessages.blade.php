@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="user-message red page-title p-3">
            <p class="text-white">
                {{ $error }}
            </p>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="user-message green page-title p-3">
        <p class="text-white">
            {{ session('success') }}
        </p>
    </div>
@endif

@if(session('error'))
    <div class="user-message red page-title p-3">
        <p class="text-white">
            {{ session('error') }}
        </p>
    </div>
@endif