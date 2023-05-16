<x-guest-layout>

    <section class="pt-4 pb-12 bg-gray-50">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">Our Menu</h3>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
              TODAY'S SPECIALITY</h2>
          </div>
        <div class="container grid gap-4 mx-auto lg:grid-cols-3">
            @foreach ($categories as $category)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{ asset('categories/' . $category->image) }}"
                  alt="Image" />
                <div class="px-6 py-4">
                  <a href="{{route('categories.show' , $category->id)}}">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">{{$category->name}}</h4>
                  </a>
                  
                </div>
              
              </div>
            @endforeach
          
          
        </div>
      </section>

</x-guest-layout>    