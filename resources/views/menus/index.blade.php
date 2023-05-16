<x-guest-layout>

    <section class="pt-4 pb-12 bg-gray-50">
        <div class="mt-4 text-center">
            <h3 class="text-2xl font-bold">Our Menu</h3>
            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
              TODAY'S SPECIALITY</h2>
          </div>
        <div class="container grid gap-4 mx-auto lg:grid-cols-3">
            @foreach ($menus as $menu)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
             <img class="w-full h-48" src="{{asset('menus/'.$menu->image)}}"
               alt="Image" />
             <div class="px-6 py-4">
               
               <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{$menu->name}}</h4>
               <p class="leading-normal text-gray-700">{{$menu->description}}</p>
             </div>
             <div class="flex items-center justify-between p-4">
               <span class="text-xl text-green-600">{{$menu->price}}</span>
             </div>
           </div>
                
            @endforeach
          
          
        </div>
      </section>

</x-guest-layout>    