@extends('frontend.layouts.master')

@section('title', 'Main Page')

@section('content')
<div class="text-center">
    <!-- Tab Navigation -->
    <div class="mt-8 flex justify-center space-x-4">
        <a href="{{ route('donators') }}" 
           class="px-6 py-3 font-semibold rounded-lg transition {{ request()->is('donators') ? 'bg-black text-white' : 'bg-gray-300 text-black hover:bg-gray-400' }}">
           အလှူရှင်
        </a>
        <a href="{{ route('receivers') }}" 
           class="px-6 py-3 font-semibold rounded-lg transition {{ request()->is('receivers') ? 'bg-black text-white' : 'bg-gray-300 text-black hover:bg-gray-400' }}">
           အလှူခံပုဂ္ဂိုလ်
        </a>
    </div>

    <!-- Default content (can be empty or show instructions) -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-black">Welcome to MyApp</h2>
        <p class="mt-2 text-gray-700">Please select a tab above to continue</p>
    </div>
</div>
@endsection