@extends('layout.app')

@section('content')
<a href="{{route('index')}}" class="mb-6 text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg class="w-5 h-5 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
</a>
<div class="flex flex-wrap flex-row space-x-5">
    <img class="flex-1 max-w-md" src="{{asset('storage/'.$complaint['photo'])}}" alt="" srcset="">
    <div class="flex-1">
        <p class="mb-2 font-normal text-xs text-gray-500 dark:text-gray-400">
            Ticket ID: {{$complaint['id']}} | {{$complaint['created_at']}} | {{$complaint['status']}}
        </p>
        <p class="mb-3 font-semibold text-xl">
            {{$complaint['title']}}
        </p>
        <p class="text-md">
            {{$complaint['content']}}
        </p>
    </div>
</div>

@endsection
