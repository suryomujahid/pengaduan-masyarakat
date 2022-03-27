@extends('layout.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
@endsection

@section('content')
    <p class="text-2xl font-semibold">Laporan Pengaduan</p>

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
                                ID Tiket
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Nama
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Judul
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Isi Pengaduan
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Foto
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Waktu Dibuat
                            </th>
                            <th scope="col"
                                class="py-6 px-6 text-xs font-medium tracking-wider text-left text-white uppercase dark:text-gray-400">
                                Status
                            </th>
                            <th scope="col"
                                class="rounded-r-lg py-6 px-6 text-xs font-medium tracking-wider text-center text-white uppercase dark:text-gray-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complaint)
                            <tr
                                class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                <td
                                    class="rounded-l-lg py-6 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $complaint['id']}}
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $complaint['name'] }}
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <div class="whitespace-normal w-20">
                                        {{ $complaint['title'] }}
                                    </div>
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <div class="whitespace-normal w-24">
                                        {{ substr($complaint['content'], 0, 20) . '...' }}
                                    </div>
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <img class="w-24 " src="{{ asset('storage/'.$complaint['photo'])}}"></img>
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $complaint['created_at'] }}
                                </td>
                                <td
                                    class="py-6 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $complaint['status'] }}
                                </td>
                                <td class="rounded-r-lg py-6 px-6 text-sm text-center font-medium flex-nowrap">
                                    <div class="inline-flex" role="group">
                                        <a target="_blank" href="{{route('complaint.detail', $complaint['id'])}}" class="text-white bg-primary opacity-90 hover:bg-blue-900 focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-primary dark:hover:bg-blue-900 dark:focus:ring-blue-700">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        @if ($user->role === 'ADMIN')
                                        <a target="_blank" href="{{route('complaint.print', $complaint['id'])}}" class="text-white bg-primary opacity-90 hover:bg-blue-900 focus:ring-4 focus:ring-blue-700 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-primary dark:hover:bg-blue-900 dark:focus:ring-blue-700">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                        @endif
                                        @if ($user->role === 'STAFF')
                                        <button onclick="btnChangeStatus('{{$complaint['id']}}', '{{$complaint['status']}}')" type="button" data-modal-toggle="modal-status"
                                            class="text-white bg-yellow-400 opacity-90 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form
                                            action="{{ route('complaint.delete', $complaint['id']) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-white bg-red-700 opacity-90 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('complaint._change_status')
@endsection

@section('script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
            $('#table').removeClass('dataTable');
        });

        function btnChangeStatus(id, status) {
            let route = '{{route('complaint.update', 'BJIRkaowka')}}';
            route = route.replace('BJIRkaowka', id);

            $(`#modal-status #status option`).attr('selected', false);
            $(`#modal-status #status option[value='${status}']`).attr('selected', 'selected');
            $("#modal-status form").attr("action", route);
        }
    </script>
@endsection
