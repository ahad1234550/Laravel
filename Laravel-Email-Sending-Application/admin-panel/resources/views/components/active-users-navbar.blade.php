<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
    <div class="p-6 text-gray-900">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">{{ __('Active Users') }}</h3>
        <ul>
            @foreach($activeUsers as $user)
                <li class="mb-2">{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
</div>
