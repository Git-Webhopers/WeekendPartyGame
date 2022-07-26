@props([
'name' => 'Button',
'href' => '#',
'type' => 'button'
])
<a href="{{$href}}" type="{{$type}}" {{$attributes->merge(["class"=>"text-white hover:bg-gradient-to-l font-bold bg-gradient-to-br from-yellow-500 via-red-500 to-red-600 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-8 py-2 text-center flex justify-center"])}}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
</a>