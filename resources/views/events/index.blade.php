<x-app-layout>
   
       
    

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between py-6   " >
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Events') }}
                </h2>
                <div>
                    <a href="{{ route('events.create') }}" class="dark:text-white hover:text-slate-200">New Event</a>
                </div>
            </div>
            
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Start Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Start Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                End Time
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Venue
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $event->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($event->start_time)->isoFormat('MMM Do YYYY') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('h:i:s A') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($event->end_time)->format('h:i:s A') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->venue->name }}
                                </td>
                                <td class="px-6 py-4" style="padding: 0 0 0 5em">
                                    <div class="flex space-x-4">
                                        <a href="{{ route('events.edit', $event) }}"
                                            class="text-green-400 hover:text-green-600"> <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                          >
                                            <path
                                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                            ></path>
                                          </svg></a>
                                        <form method="POST" class="text-red-400 hover:text-red-600"
                                            action="{{ route('events.destroy', $event) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('events.destroy', $event) }}"
                                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                 <svg
                                                 class="w-5 h-5"
                                                 aria-hidden="true"
                                                 fill="currentColor"
                                                 viewBox="0 0 20 20"
                                               >
                                                 <path
                                                   fill-rule="evenodd"
                                                   d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                   clip-rule="evenodd"
                                                 ></path>
                                               </svg>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No events found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
