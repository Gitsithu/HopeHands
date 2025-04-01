@extends('frontend.layouts.master')

@section('title', 'Receivers')

@section('content')
    <div class="text-center">
        <!-- Tab Navigation -->
        <div class="mt-8 flex justify-center space-x-4">
            <a href="{{ route('donators') }}"
                class="px-6 py-3 bg-gray-300 text-black text-sm font-lignt rounded-lg hover:bg-gray-400">
                အလှူရှင်
            </a>
            <a href="{{ route('receivers') }}" class="px-6 py-3 bg-[#44991a] text-sm text-white font-light rounded-lg">
                အကူအညီတောင်းခံသူ
            </a>
            <a href="{{ route('articles') }}" class="px-6 py-3 bg-gray-300 text-black text-sm font-light rounded-lg hover:bg-gray-400">
                သတင်းများ
            </a>
        </div>

        <!-- Receivers Content -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-black">အကူအညီတောင်းခံသူများ</h2>
            <p class="mt-2 text-gray-700">သင်လိုအပ်သောအကူအညီကိုရှာပါ</p>
            @include('frontend.pages.partials.receivers-content')
        </div>
    </div>
@endsection