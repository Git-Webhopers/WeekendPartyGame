<div class="p-8">
    <div class="p-4 flex flex-wrap">
        <x-buttons.primary name="All Players" class="text-2xl cursor-not-allowed" />
    </div>
    <hr />
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-lg text-gray-700 uppercase bg-purple-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Player
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Mobile
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-8">
                        <span>Edit</span>
                        <span class="mx-4">|</span>
                        <span>Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="bg-white text-lg border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="flex py-1 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if($user->avatar)
                        <image src="{{$user->avatar ? asset('storage/'.$user->avatar) : ''}}" class="w-16 h-16 rounded-full" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        @endif
                        <span class="py-4 mx-2">{{$user->name}}</span>
                    </th>
                    <td class="py-1 px-6">
                        {{$user->email??'NA'}}
                    </td>
                    <td class="py-1 px-6">
                        {{ $user->mobile??'NA'}}
                    </td>
                    <td class="py-1 px-6">
                        {{$user->status??'Offline'}}
                    </td>
                    <td class="py-1 px-6 items-center flex flex-wrap ">
                        <x-buttons.edit class="mx-1" href="{{ route('users.edit', [ 'user' => $user ]) }}" />
                        <x-buttons.delete class="mx-1" wire:click="delete({{ $user->id }})" />
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    !! No Players Registered !!
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>