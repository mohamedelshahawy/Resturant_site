<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.categories.create') }}"
                    class="px-4 py-2 bg-indigo-500  hover:bg-indigo-700 rounded-lg text-white"> Create Category </a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                process
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            
                        
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category->id}}
                              </th>
                              <td class="px-6 py-4">
                                {{$category->name}}

                            </td>
                            <td class="px-6 py-4">
                                {{$category->description}}

                            </td>
                            <td class="px-6 py-4">
                               <img style="height: 50px;" src="/categories/{{$category->image}}"> 

                            </td>
                           
                            <td class="px-6 py-4">
                                    <a href="categories/{{$category->id}}/edit"
                                    class="px-4 py-2 rounded-lg font-medium bg-green-500 hover:bg-green-700 text-white   hover:underline">Edit</a>
                                    <form action="categories/{{$category->id}}" method="POST"
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
</x-admin-layout>
