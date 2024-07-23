<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
    <div class="p-6 text-gray-900">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-4">{{ __('Inactive Users') }}</h3>
        <ul>
            @foreach($inactiveUsers as $user)
                <li class="mb-2">
                    {{ $user->name }} ({{ $user->email }})
                    <form action="{{ route('users.activate', $user->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-white text-blue-500 border border-blue-500 px-4 py-2 rounded inline-flex items-center">
                            {{ __('Activate') }}
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
