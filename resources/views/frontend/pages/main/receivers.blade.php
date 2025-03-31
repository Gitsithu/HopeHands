@extends('frontend.layouts.master')

@section('title', 'Receivers')

@section('content')
    <div class="text-center">
        <!-- Tab Navigation -->
        <div class="mt-8 flex justify-center space-x-4">
            <a href="{{ route('donators') }}"
                class="px-6 py-3 bg-gray-300 text-black font-semibold rounded-lg hover:bg-gray-400">
                အလှူရှင်
            </a>
            <a href="{{ route('receivers') }}" class="px-6 py-3 bg-[#44991a] text-white font-semibold rounded-lg">
                အလှူခံပုဂ္ဂိုလ်
            </a>
        </div>

        <!-- Receivers Content -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-black">အလှုခံပုဂ္ဂိုလ်များ</h2>
            <p class="mt-2 text-gray-700">သင်လိုအပ်သောအကူအညီကိုရှာပါ</p>

            @include('frontend.pages.partials.receivers-content')
        </div>
    </div>
@endsection