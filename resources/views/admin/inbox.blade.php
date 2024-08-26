@extends('layouts.admin')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <h1 class="text-3xl">Inbox</h1>

    <div class="relative overflow-x-auto sm:rounded-lg mt-8">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center pb-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <form action="{{ route('mails.index') }}" method="GET">
                    <div
                        class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search for items">
                </form>
            </div>
            <button id="delete-button" type="button" disabled
                class="ml-2 transition focus:outline-none text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 disabled:opacity-50"
                data-modal-target="delete-modal" data-id="" data-modal-toggle="delete-modal">Hapus</button>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subjek
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mails->sortByDesc('created_at') as $mail)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input type="checkbox"
                                    class="checkbox-row w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                    data-id="{{ $mail->id }}">
                                <label class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $mail->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $mail->subject }}
                        </td>
                        <td class="px-6 py-4">
                        </td>
                        <td class="px-6 py-4">
                        </td>
                        <td class="px-6 py-4">
                            <button class="expand-row font-medium text-blue-600 hover:underline">Details</button>
                        </td>
                    </tr>
                    <tr class="expandable-row bg-gray-50 hidden">
                        <td colspan="6" class="p-4">Dari:<a class="" href="mailto:{{ $mail->email }}">
                                <span class="hover:text-blue-700 transition">{{ $mail->email }}</span></a>
                            <p class="mt-6">Pesan:</p>
                            <p>{{ $mail->description }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Delete modal -->
    <div id="delete-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus
                    </h3>
                    <button type="button"
                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="delete-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p>Apakah anda yakin untuk menghapus data ini?</p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <form id="delete-form" method="POST" action="/admin/mail/delete">
                        @csrf
                        <input type="hidden" name="ids" id="delete-ids" value="">
                        <button type="submit"
                            class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
                    </form>
                    <button data-modal-hide="delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.expand-row').forEach(button => {
            button.addEventListener('click', () => {
                const expandableRow = button.closest('tr').nextElementSibling;
                if (expandableRow.classList.contains('hidden')) {
                    expandableRow.classList.remove('hidden');
                } else {
                    expandableRow.classList.add('hidden');
                }
            });
        });

        document.getElementById('checkbox-all-search').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.checkbox-row');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            toggleDeleteButton();
        });

        const checkboxes = document.querySelectorAll('.checkbox-row');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', toggleDeleteButton);
        });

        function toggleDeleteButton() {
            const deleteButton = document.getElementById('delete-button');
            const anyChecked = document.querySelectorAll('.checkbox-row:checked').length > 0;
            deleteButton.disabled = !anyChecked;
            updateDeleteIds();
        }

        function updateDeleteIds() {
            const checkedCheckboxes = document.querySelectorAll('.checkbox-row:checked');
            const ids = Array.from(checkedCheckboxes).map(checkbox => checkbox.dataset.id);
            document.getElementById('delete-ids').value = ids.join(',');
        }

        $(document).ready(function() {
            $('#delete-button').click(function() {
                const checkedCheckboxes = document.querySelectorAll('.checkbox-row:checked');
                const ids = Array.from(checkedCheckboxes).map(checkbox => checkbox.dataset.id);
                $('#delete-ids').val(ids.join(','));
                $('#delete-modal').modal('show');
            });
        });
    </script>
@endsection
