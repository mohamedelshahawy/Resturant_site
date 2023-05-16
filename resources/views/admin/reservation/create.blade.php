<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex m-2 p-2 bg-slate-100 rounded-lg">

                <form action="{{ route('admin.reservation.store') }}" method="POST" 
                    class="w-full">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            first name</label>
                        <input type="text" name="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            last name</label>
                        <input type="text" name="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>



                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            email</label>
                        <input type="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                             dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            number</label>
                        <input type="text" name="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            reservation date</label>
                        <input type="datetime-local" name="res_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                             dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('description') border-red-400 @enderror">
                            @error('res_date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            guest_number</label>
                        <input type="text" name="geust_num"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                             dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            Table</label>
                        <div class="mt-1">
                            <select type="text" name="table_id" class=" text-gray-900 form-multiselect block w-full mt-1">
                                @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->name }} ({{$table->geust_num}} Geusts)</option>
                                @endforeach
                            </select>
                        </div>
                    </div>




                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
        </div>
    </div>
    </x-app-layout>
