<!DOCTYPE html>
<html lang="id">
<head>
    @include('layout.head')
    @yield('head')
    <title>
        @hasSection('title')
            @yield('title') -
        @endif
        Pengaduan Masyarakat
    </title>
</head>
<body>
    @php
        $isAuth = Route::currentRouteName() === 'index' || Route::currentRouteName() === 'complaint' || Route::currentRouteName() === 'complaint.create' || Route::currentRouteName() === 'complaint.detail';
    @endphp
    <div class="relative min-h-screen flex">
        @if(!$isAuth)
            @include('layout.admin.sidebar.index')
        @endisset
        <div class="flex-1 bg-gray-100">
            @if(!$isAuth)
                @include('layout.admin.navbar')
            @else
                @include('layout.public.navbar')
            @endif
            <main class="w-11/12 mx-auto my-8 p-4 bg-white rounded-lg">
                @include('components.alert')
                @yield('content')
            </main>
        </div>
    </div>

    @if ($isAuth)
        @include('layout.public.footer')
    @endif
    @include('layout.script')
    @yield('script')
</body>
</html>
