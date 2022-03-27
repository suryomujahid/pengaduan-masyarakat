<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
    <li>
        <a href="{{ route('dashboard') }}"
            class="{{ Route::currentRouteName() === 'dashboard' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : '' }}
            flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-chart-pie text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Laporan Pengaduan</span>
        </a>
    </li>
    @if ($user->role === 'ADMIN')
    <li>
        <a href="{{ route('admin.index') }}"
            class="{{ Route::currentRouteName() === 'admin.index' ? 'border-l-8 border-l-primary bg-gray-100 -ml-2' : '' }}
            flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-chart-pie text-lg text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Data Petugas</span>
        </a>
    </li>
    @endif
<ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
    <li>
        {{-- <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="icon-home"></i><span>Dashboard</span></a></li> --}}
        <a href="{{ route('logout') }}"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <i
                class="fa-solid fa-arrow-right-from-bracket text-lg text-red-500 transition duration-75 dark:text-red-400 group-hover:text-red-900 dark:group-hover:text-white"></i>
            <span class="ml-3">Keluar</span>
        </a>
    </li>
</ul>
