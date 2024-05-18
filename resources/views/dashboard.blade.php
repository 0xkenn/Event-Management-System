<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div
    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="width: 20em; margin: 0 0 0 2em"
  >
    <div
      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
    >
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
        ></path>
      </svg>
    </div>
    <div>
      <p
        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
      >
        Total Events
      </p>
      <p
        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
      >
        {{$allEvents}}
      </p>
    </div>
  </div>

  <div
    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="width: 20em; margin: 0 0 0 2em"
  >
    <div
      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
    >
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
        ></path>
      </svg>
    </div>
    <div>
      <p
        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
      >
        Upcoming Events
      </p>
      <p
        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
      >
        {{$upcomingEvent}}
      </p>
    </div>
  </div>

  <div
    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="width: 20em; margin: 0 0 0 2em"
  >
    <div
      class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
    >
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path
          d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
        ></path>
      </svg>
    </div>
    <div>
      <p
        class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
      >
        Finished Events
      </p>
      <p
        class="text-lg font-semibold text-gray-700 dark:text-gray-200"
      >
        {{$finishedEvent}}
      </p>
    </div>
  </div>
    </div>

  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div style="width: 80%; margin: auto;">
                  
                    <canvas id="chart"></canvas>
                </div>
            
               
            </div>
        </div>
    </div>
    

    <script>
     var labels = {!! json_encode($labels) !!};
     var allData = {!! json_encode($allData) !!};
     var userData = {!! json_encode($userData) !!};
     
      document.addEventListener('DOMContentLoaded', function() {
          var ctx = document.getElementById('chart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
      labels: labels,
      datasets: [{
        label: 'Total Events in Year 2024',
        backgroundColor: "rgba(38, 185, 154, 0.31)",
        borderColor : "rgba(38, 185, 154, 0.7)",
        data: allData,
        
        borderWidth: 1
      },
      {
                            label: 'Your Events in 2024', // Label for the second dataset
                            backgroundColor: "rgba(255, 99, 132, 0.2)",
                            borderColor: "rgba(255, 99, 132, 1)",
                            data: userData,
                            borderWidth: 1
                        }],
      
    },
    
            
          });
          
      });
  </script>
     

</x-app-layout>
 