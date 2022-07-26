<div class="grid grid-cols-4 gap-4" x-data>
    <div class="p-4">
        <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Online Players</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($users as $user)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                @if($user->avatar)
                                <image src="{{asset('storage/'.$user->avatar)}}" class="w-16 h-16 rounded-full" />
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $user->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $user->email }}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ $score ?? '0' }}
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="py-3 sm:py-4">
                        All Players are Offline
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-span-3 px-4 py-4">
        <div class="flex flex-wrap">
            @foreach($cards as $card)
            <x-game.card avatar="{{ $card->avatar }}" name="{{ $card->name }}" bio="{{ $card->bio ?? 'I am a Gamehoper' }}" />
            @endforeach
        </div>
    </div>
</div>