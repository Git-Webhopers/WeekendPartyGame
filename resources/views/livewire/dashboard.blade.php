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
                                @if($user->status=='Online')
                                <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900"> {{ $user->status }}</span>
                                @else
                                <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900"> {{ $user->status }}</span>
                                @endif
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                {{ count($user->playersFlippedMe($game->id)) }}
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
    @if($game)
    @if($game->users()->where('user_id', auth()->user()->id)->exists())
    <div class="col-span-3 px-4 py-4">
        <div class="flex flex-wrap">
            @foreach($cards as $card)
            <a href="#" wire:click="flip({{$card['id']}})">
                <x-game.card cardId="{{$card['id']}}" flipped="{{ $flipped }}" avatar="{{ $card['avatar'] }}" name="{{ $card['name'] }}" />
            </a>
            @endforeach
        </div>
    </div>
    @else
    @if(auth()->user()->role=='Admin')
    <div class="col-span-3 px-64 py-32">
        <div class="w-96 h-96 bg-green-300 rounded-full p-8">
            <button type="button" class="cursor-not-allowed text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-full text-2xl text-center p-4 w-80 h-80">
                Hey ADMIN, Login with Player ID To Play The Game !
            </button>
        </div>
    </div>
    @else
    <div class="col-span-3 px-64 py-32">
        <div class="w-96 h-96 bg-purple-300 rounded-full p-8">
            <button wire:click="addMe" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full text-3xl text-center w-80 h-80">
                ENTER THE GAME
            </button>
        </div>
    </div>
    @endif
    @endif
    @else
    @if(auth()->user()->role=='Admin')
    <div class="col-span-3 px-64 py-32">
        <div class="w-96 h-96 bg-purple-300 rounded-full p-8">
            <button wire:click="createGame" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full text-3xl text-center w-80 h-80">
                START GAME
            </button>
        </div>
    </div>
    @else
    <div class="col-span-3 px-64 py-32">
        <div class="w-96 h-96 bg-yellow-300 rounded-full p-8">
            <button type="button" class="cursor-not-allowed text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 shadow-lg shadow-yellow-500/50 dark:shadow-lg dark:shadow-yellow-800/80 font-medium rounded-full p-4 text-2xl text-center w-80 h-80">
                Admin is starting the Game, Please Wait ...
            </button>
        </div>
    </div>
    @endif
    @endif

</div>