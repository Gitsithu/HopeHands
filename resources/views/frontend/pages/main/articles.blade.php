@extends('frontend.layouts.master')

@section('title', 'Articles')

@section('content')
<div class="text-center">
    <!-- Tab Navigation -->
    <div class="mt-8 flex justify-center space-x-4">
        <a href="{{ route('donators') }}" class="px-6 py-3  bg-gray-300 text-black text-sm font-light rounded-lg hover:bg-gray-400">
            အလှူရှင်
        </a>
        <a href="{{ route('receivers') }}" class="px-6 py-3 bg-gray-300 text-black text-sm font-light rounded-lg hover:bg-gray-400">
            အကူအညီတောင်းခံသူ
        </a>
        <a href="{{ route('articles') }}" class="px-6 py-3 bg-[#44991a] text-white text-sm font-light rounded-lg">
            သတင်းများ
        </a>
    </div>

    <!-- Donators Content -->
    <div class="mt-8">
        @include('frontend.pages.partials.articles-content')
    </div>
</div>
@endsection