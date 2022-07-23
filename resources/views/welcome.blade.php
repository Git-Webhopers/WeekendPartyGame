@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="absolute top-0 right-0 mt-4 mr-4">
        @if (Route::has('login'))
        <div class="space-x-4">
            @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                Log out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <div class="flex items-center justify-center">
        <div class="flex flex-col justify-around">
            <div class="space-y-6">
                <a href="{{ route('home') }}">
                    <x-global.logo class="w-auto h-40 mx-auto text-indigo-600" />
                </a>

                <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                    {{ config('app.name') }}
                </h1>

                <div>
                    <button type="button" class="text-white font-bold bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-lg px-40 py-4 text-center flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2">Start Playing</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection