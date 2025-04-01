@extends('frontend.layouts.master')

@section('title', 'Donators')

@section('content')
<div class="text-center">
    <!-- Tab Navigation -->
    <div class="mt-8 flex justify-center space-x-4">
        <a href="{{ route('donators') }}" class="px-6 py-3 bg-[#44991a] text-white text-sm font-light rounded-lg">
            အလှူရှင်
        </a>
        <a href="{{ route('receivers') }}" class="px-6 py-3 bg-gray-300 text-sm font-light rounded-lg hover:bg-gray-400">
            အကူအညီတောင်းခံသူ
        </a>
        <a href="{{ route('articles') }}" class="px-6 py-3 bg-gray-300 text-sm font-light rounded-lg hover:bg-gray-400">
            သတင်းများ
        </a>
    </div>

    <!-- Donators Content -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-black">အလှုရှင်များ</h2>
        <p class="mt-2 text-gray-700">တတ်နိုင်သလောက် လှူဒါန်းခြင်းဖြင့် အခြားသူများကို ကူညီပေးပါ။</p>
        
        @include('frontend.pages.partials.donators-content')
    </div>
</div>
@endsection