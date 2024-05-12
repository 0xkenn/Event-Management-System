<x-main-layout>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All gallerys</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-3">
                @foreach ($galleries as $gallery)
                  

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{asset('storage/' . $gallery->image)}}" alt="{{$gallery->caption}}" style="height: 15em; width: 25em"/>
    </a>
    
</div>

                @endforeach
            </div>
            {{$galleries->links()}}
        </div>
    </section>
</x-main-layout>
