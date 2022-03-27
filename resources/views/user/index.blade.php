@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('title', 'User')

@section('content')
<div class="flex justify-between">
    <p class="text-2xl font-semibold">Data User</p>
    <button type="button" data-modal-toggle="modal-add-user" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah User</button>
</div>

@if ($errors->any())
    <div class="p-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="overflow-x-auto mt-5">
    <div class="inline-block py-2 min-w-full">
        <div class="overflow-hidden">
            <table id="table" class="min-w-full border-separate table-spacing">
                <thead class="bg-primary dark:bg-primary">
                    <tr>
                        <th scope="col"
                            class="rounded-l-lg py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            #
                        </th>
                        <th scope="col"
                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            ID User
                        </th>
                        <th scope="col"
                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            Nama
                        </th>
                        <th scope="col"
                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            Username
                        </th>
                        <th scope="col"
                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            Nomor HP
                        </th>
                        <th scope="col"
                            class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                            Role
                        </th>
                        <th scope="col"
                            class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usr)
                        <tr
                            class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                            <td
                                class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $usr['id']}}
                            </td>
                            <td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                {{ $usr['name'] }}
                            </td>
                            <td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $usr['username'] }}
                            </td>
                            <td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{$usr['phone']}}
                            </td>
                            <td
                                class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{$usr['role']}}
                            </td>
                            <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                                <div class="inline-flex" role="group">
                                    <form
                                        action="{{ route('admin.user.delete', $usr['id']) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('user._create')
@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
            $('#table').removeClass('dataTable');
        });
    </script>
@endsection
