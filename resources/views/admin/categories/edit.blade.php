<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="flex m-2 p-2 bg-slate-100 rounded-lg">

                <form action="{{route('admin.categories.update',$category->id)}}" 
                 method="POST" 
                enctype="multipart/form-data"
                class="w-full">
                @method('PUT')

                @csrf
                    <div class="mb-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            name</label>
                        <input type="text" name="name" value="{{$category->name}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              @error('name')
                              <div class="text-sm text-red-400">{{ $message }}</div>
                          @enderror
                    </div>
                    
                  
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">
                            image</label>
                            <div>
                                <img style="height: 50px;" src="/categories/{{$category->image}}"> 
                            </div>
                        <input type="file" name="image" value="{{$category->image}}"
                        
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm 
                            rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                             dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('image')
                              <div class="text-sm text-red-400">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="mb-2">
                        <label  class="block mb-2 text-sm font-medium text-gray-900 ">
                            Description</label>
                        <textarea type="text" name="description" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                              dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{$category->description}}</textarea>
                            @error('description')
                              <div class="text-sm text-red-400">{{ $message }}</div>
                          @enderror
                    </div>
                   
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800
                         focus:ring-4 focus:outline-none focus:ring-blue-300 
                         font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
                         dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                         Update
                    </button>
                </form>

            </div>
        </div>
    </div>
    </x-app-layout>
