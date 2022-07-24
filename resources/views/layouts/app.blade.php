@extends('layouts.base')

@section('body')
@include('components.global.navbar')
<div class="w-full">
    <div class="w-1/5"></div>
    <div class="w-4/5">@yield('content')</div>
</div>


@isset($slot)
{{ $slot }}
@endisset
@endsection