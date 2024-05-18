<x-main-layout>
    <div class="m-2 p-2 flex justify-between">
        <h3 class="mb-4 text-2xl font-bold text-indigo-700">{{ $event->title }}</h3>
        
    </div>
    <div class="mb-16 flex flex-wrap">
        <div class="mb-6 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-6/12 lg:pr-6">
            <div class="flex flex-col">
                <div class="ripple relative overflow-hidden rounded-lg bg-cover bg-[50%] bg-no-repeat shadow-lg dark:shadow-black/20"
                    data-te-ripple-init data-te-ripple-color="light">
                    <img src="{{ asset('/storage/' . $event->image) }}" class="w-full" alt="Louvre"  style="height: 25em"/>
                    <a href="#!">
                        <div
                            class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsl(0,0%,98.4%,0.2)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                        </div>
                    </a>
                </div>
                @auth
                    <div class="flex space-x-2 p-4" x-data="{
                         savedEvent: @js($savedEvent),
                        
                        onHandleSavedEvent() {
                            axios.post(`/events-saved/{{ $event->id }}`).then(res => {
                                this.savedEvent = res.data
                            });
                        },
                    }">
                     
                        <button type="button" @click="onHandleSavedEvent"
                            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center 'bg-blue-600 hover:bg-blue-600'"
                            :class="savedEvent ? 'bg-green-700 hover:bg-green-800 focus:ring-green-300' : 'focus:ring-red-500 bg-red-600 hover:bg-red-600'">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-3.5 h3.5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>
                         Save
                        </button>
                        
                    </div>
                @endauth
               
               
            </div>
        </div>

        <div class="w-full shrink-0 grow-0 lg:w-6/12 lg:pl-6 bg-slate-600 rounded-md p-2" style="height: 15em">
            <div class="flex space-x-2 justify-end text-white">
                
                <span class="mx-2   ">{{\Carbon\Carbon::parse($event->start_date)->isoFormat('MMM,  Do YYYY')  }}</span>  
            </div>  
            <p class="mb-6 text-m text-yellow-600 dark:text-orange-200">
                Starts at: <time>{{  \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</time> <br>  <br>
                End at: <time>{{  \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</time>
            </p>
            {{-- <p>
                @foreach ($event->tags as $tag)
                    <span class="p-1 m-1 bg-indigo-300 rounded">{{ $tag->name }}</span>
                @endforeach
            </p> --}}
            <p class="mb-6 mt-4 text-neutral-500 dark:text-neutral-300">
                {{ $event->description }}
            </p>
            <div class="flex justify-end" >
                <div class="flex flex-col" style="padding: 5em 0 0 0">
                    <div class="mb-4 flex items-center text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>

                        <div class="text-yellow-300">{{ $event->university->name }}, {{ $event->venue->name }}</div>
                    </div>
                </div>
                
            </div>
            <div class="flex flex-col p-4">
                <span class="text-indigo-600 font-semibold">Host Info</span>
                <div class="flex space-x-4 mt-6 bg-slate-200 p-2 rounded-md">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></span>
                    <div class="flex flex-col">
                        <span class="text-2xl">{{ $event->user->name }}</span>
                        <span class="text-2xl">{{ $event->user->email }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-main-layout>

