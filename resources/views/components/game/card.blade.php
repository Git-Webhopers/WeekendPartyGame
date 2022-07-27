<div x-data="{ flip: false }" x-on:click.debounce.100ms="flip = true" class="w-48 h-56 m-2 bg-transparent cursor-pointer bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="relative w-full h-full">
        <div class="absolute backface-hidden w-full h-full flex flex-col items-center rounded-lg p-4 bg-purple-300">
            @if($avatar ?? false )
            <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="{{ $avatar ? asset('storage/'.$avatar) : ''}}" alt="Bonnie image">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            @endif
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$name ?? ''}}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$bio ?? 'I am a Gamehoper'}}</span>
        </div>
        <div :class="flip ? 'rotate-y-180' : ''" class="absolute duration-1000 preserve-3d backface-hidden w-full h-full p-12 flex flex-col items-center rounded-lg bg-gray-300">
            <span class="text-purple-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    </div>
</div>