<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservation.create') }}"
                    class="px-4 py-2 bg-indigo-500 
                    hover:bg-indigo-700 rounded-lg text-white">
                    Create New Reservation </a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                 Name
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephon_Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Geust_Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Table_Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $reservation->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $reservation->first_name }}                                     {{ $reservation->last_name }}

                                </td>
                                
                                <td class="px-6 py-4">
                                    {{ $reservation->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->tel_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->res_data}}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $reservation->geust_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{-- category {{ $post->category->name ?? 'None' }} --}}
                                    {{ $reservation->table->name ?? 'None'}}
                                </td>
                                <td class="px-6 py-4" style="display:block ruby">
                                    <a href="reservation/{{ $reservation->id }}/edit"
                                        class=" px-4 py-2 rounded-lg font-medium bg-green-500 hover:bg-green-700 text-white   hover:underline">Edit</a>
                                    <form action="reservation/{{ $reservation->id }}" method="POST"
                                        style="display: initial;"
                                        class="px-4 py-2 rounded-lg font-medium bg-red-500 hover:bg-red-700 text-white   hover:underline">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-primary" href="" type="submit"
                                            role="button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </x-app-layout>
