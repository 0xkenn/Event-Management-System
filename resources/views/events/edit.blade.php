<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('New Event') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('events.update', $event) }}" x-data="{
                university: null,
                venueId: @js($event->venue_id),
                venues: @js($event->university->venues),
                onUniversityChange(event) {
                    axios.get(`/universities/${event.target.value}`).then(res => {
                        this.venues = res.data
                    })
            
                }
            }"
                enctype="multipart/form-data" class="p-4 bg-black dark:bg-slate-800 rounded-md">
                @csrf
                @method('PUT')
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('title', $event->title) }}">
                        @error('title')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="university_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            option</label>
                        <select id="university_id" x-on:change="onUniversityChange" name="university_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Choose a university</option>
                            @foreach ($universities as $university)
                                <option value="{{ $university->id }}" @selected($university->id === $event->university_id)>{{ $university->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('university_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="venue_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                            option</label>
                        <select id="venue_id" name="venue_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <template x-for="venue in venues" :key="venue.id">
                                <option x-bind:value="venue.id" x-text="venue.name" :selected="venue.id === venueId">
                                </option>
                            </template>
                        </select>
                        @error('venue_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input" type="file" name="image">
                        @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                  
                  
                    <div>
                        <label for="start_time"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                            Time</label>
                        <input type="datetime-local" id="start_time" name="start_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('start_time', $event->start_time) }}">
                        @error('start_time')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="end_time"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                            Time</label>
                        <input type="datetime-local" id="end_time" name="end_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ old('end_time', $event->end_time) }}">
                        @error('end_time')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $event->description }}</textarea>
                        @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               
                <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
