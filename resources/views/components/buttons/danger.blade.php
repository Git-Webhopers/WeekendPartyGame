@props([
'name' => 'Button',
'href' => '#',
'type' => 'button'
])
<a href="{{$href}}" type="{{$type}}" {{$attributes->merge(["class"=>"text-white hover:bg-gradient-to-l font-bold bg-gradient-to-br from-yellow-500 via-red-500 to-red-600 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-8 py-2 text-center flex justify-center"])}}>
    {{ $name}}
</a>