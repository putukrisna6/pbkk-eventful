<x-app-layout>
    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">

        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
            <img class="w-full" alt="building image" src="{{ 'data:image/png;base64,' . $building->image }}" />
        </div>

        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-6">
                <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">
                    {{ $building->name }}</h1>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Address</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300">{{ $building->address }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('rent') }}" enctype="multipart/form-data">
                @csrf
                <div class="py-4 border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Options</p>
                </div>
                <div class="pb-4 border-b border-gray-200 flex items-center ">
                    <div>
                        @foreach ($building->options as $option)
                        <div class="form-check space-y-1">
                            <input
                                class="form-check-input rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="radio" name="option_id" id="option1" checked value="{{ $option->id }}">
                            <div class="flex justify-between items-center ">
                                <label class="form-check-label inline-block text-gray-800" for="option1">
                                    {{ $option->name }}
                                </label>
                                <div class="ml-20">
                                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300">Rp.{{ number_format($option->price ,2,",",".") }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit"
                    class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    <svg class="mr-3 text-white dark:text-gray-900" width="16" height="17" viewBox="0 0 16 17"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.02301 7.18999C7.48929 6.72386 7.80685 6.12992 7.93555 5.48329C8.06425 4.83666 7.9983 4.16638 7.74604 3.55724C7.49377 2.94809 7.06653 2.42744 6.51835 2.06112C5.97016 1.6948 5.32566 1.49928 4.66634 1.49928C4.00703 1.49928 3.36252 1.6948 2.81434 2.06112C2.26615 2.42744 1.83891 2.94809 1.58665 3.55724C1.33439 4.16638 1.26843 4.83666 1.39713 5.48329C1.52583 6.12992 1.8434 6.72386 2.30968 7.18999L4.66634 9.54749L7.02301 7.18999Z"
                            stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.66699 4.83333V4.84166" stroke="currentColor" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M13.69 13.8567C14.1563 13.3905 14.4738 12.7966 14.6025 12.15C14.7312 11.5033 14.6653 10.8331 14.413 10.2239C14.1608 9.61476 13.7335 9.09411 13.1853 8.72779C12.6372 8.36148 11.9926 8.16595 11.3333 8.16595C10.674 8.16595 10.0295 8.36148 9.48133 8.72779C8.93314 9.09411 8.5059 9.61476 8.25364 10.2239C8.00138 10.8331 7.93543 11.5033 8.06412 12.15C8.19282 12.7966 8.51039 13.3905 8.97667 13.8567L11.3333 16.2142L13.69 13.8567Z"
                            stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.333 11.5V11.5083" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Rent
                </button>
            </form>

            <div class="w-full">
                <p class="text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">
                    {{ $building->text }}</p>
                <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Building Location</p>
                <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input disabled name="latitude" id="latitude" type="text" value="{{ $building->latitude }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input disabled name="longitude" id="longitude" type="text" value="{{ $building->longitude }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div id="map" style="height: 500px"></div>
            </div>
            <div class="border-b py-4 border-gray-200 pt-10">
                <div data-menu class="flex justify-between items-center cursor-pointer">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-300">{{ $building->phone }}</p>
                    <button
                        class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                        role="button" aria-label="show or hide">
                        <svg class="transform text-gray-300 dark:text-white" width="10" height="6" viewBox="0 0 10 6"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300" id="sect">
                    If you have any questions on choosing the best package for you, please contact us.</div>
            </div>
        </div>
    </div>



    <script>
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function() {
                let element = main.parentElement.parentElement;
                let andicators = main.querySelectorAll("svg");
                let child = element.querySelector("#sect");
                child.classList.toggle("hidden");
                andicators[0].classList.toggle("rotate-180");
            });
        }
    </script>
    <script>
        function handleEvent(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        }

        function initMap() {
            var latnya = document.getElementById('latitude').value;
            var longinya = document.getElementById('longitude').value;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: {
                    lat: parseFloat(latnya),
                    lng: parseFloat(longinya)
                }
            });
            var geocoder = new google.maps.Geocoder();

            var marker = new google.maps.Marker({
                map: map,
                position: {
                    lat: parseFloat(latnya),
                    lng: parseFloat(longinya)
                }
            });

            marker.addListener('drag', handleEvent);
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTnAg_gwZ-GQxB6xC0h2cY4TDFYU28ov8&callback=initMap"></script>
</x-app-layout>
