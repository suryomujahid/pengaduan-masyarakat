@extends('layout.app')

@section('content')
<div class="flex justify-between">
    <p class="text-lg font-semibold">Ngadu Nasib</p>
    <div class="relative">
      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg width="15" height="15" class="DocSearch-Search-Icon" viewBox="0 0 20 20"><path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path></svg>
      </div>
      <input type="text" id="search-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Ticket ID">
    </div>
</div>

    <div class="my-4">
        <div class="flex flex-wrap justify-around">
            @foreach($complaints as $complaint)
            <a href="{{route('complaint.detail', $complaint['id'])}}" class="mr-2 my-2 flex flex-col items-center bg-white rounded-lg border shadow-md md:flex-row w-full max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full h-96 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('storage/'.$complaint['photo'])}}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$complaint['title']}}</h5>
                    <p class="mb-1 font-normal text-xs text-gray-500 dark:text-gray-400">
                        Ticket ID: {{$complaint['id']}} | {{$complaint['created_at']}} | {{$complaint['status']}}
                    </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{substr($complaint['content'], 0, 56) . '...'}}</p>
                </div>
            </a>
            @endforeach

        </div>
    </div>
@endsection
