<x-app-layout>
    <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right" style="max-width:1600px; height: 32rem; background-image: url('https://images.unsplash.com/photo-1518105380041-090a9e826c56?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1600&q=80');">
        <div class="container mx-auto">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start px-20 tracking-wide">
                <h1 class="text-white text-2xl my-4">Look at some of our best picks.</h1>
                <a class="text-xl inline-block no-underline text-white border-b border-white leading-relaxed hover:text-red-400 hover:border-red-400" href="#">Products</a>
            </div>
        </div>
    </section>

    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl md:ml-96"
                        href="#">
                        Store
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                        <div class="flex border-2 rounded-md border-gray-400">
                            <input type="text" class="px-4 py-2 w-80" placeholder="Search...">
                                <button class="flex items-center justify-center px-4 border-l border-gray-400">
                                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                                    </svg>
                                </button>
                            </input>
                        </div>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="flex flex-row">
                <div class="w-full md:w-1/3 xl:w-1/4 h-max p-6 flex flex-row">
                    <div class="rounded h-max w-96 p-4 border-2 border-gray-200">
                        <div class="flex items-center justify-between mt-4">
                            <p class="font-medium font-bold">
                                Filters
                            </p>
                            <button class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md">
                                Reset Filter
                            </button>
                        </div>

                        <div class="py-10">
                            <hr class="bg-gray-300 border-2">
                        </div>

                        <div class="flex flex-col">
                            <p class="font-medium">
                                Lokasi
                            </p>
                            <div class="pt-4">
                                <select class="px-4 py-3 w-full rounded-md bg-gray-300 border-transparent focus:border-gray-400 focus:bg-white focus:ring-0 text-sm">
                                <option value="Jakarta">Jakarta</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Malang">Malang</option>
                                <option value="Semarang">Semarang</option>
                                </select>
                            </div>

                            <div class="py-10">
                                <hr class="bg-gray-300 border-2">
                            </div>

                            <p class="font-medium">
                                Kategori
                            </p>
                            <div class="flex flex-col">
                                <div class="pt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5">
                                        <span class="ml-3 text-md">Building</span>
                                    </label>
                                </div>
                                <div class="pt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5">
                                        <span class="ml-3 text-md">Facilities</span>
                                    </label>
                                </div>
                                <div class="pt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5">
                                        <span class="ml-3 text-md">Tower</span>
                                    </label>
                                </div>
                                <div class="pt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5">
                                        <span class="ml-3 text-md">Planetarium</span>
                                    </label>
                                </div>
                                <div class="pt-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox h-5 w-5">
                                        <span class="ml-3 text-md">Apartment</span>
                                    </label>
                                </div>
                            </div>

                            <div class="py-10">
                                <hr class="bg-gray-300 border-2">
                            </div>

                            <p class="font-medium">
                                Harga
                            </p>

                            <div class="flex flex-col">
                                <div class="flex items-center ml-0.5 mt-5">
                                    <input type="text" placeholder="Rp. .." class="px-8 py-3 w-full rounded-md bg-gray-300 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                </div>
                            </div>
                            <p class="text-medium text-center pt-5">
                                to
                            </p>

                            <div class="flex flex-col">
                                <div class="flex items-center ml-0.5 mt-5">
                                    <input type="text" placeholder="Rp. .." class="px-8 py-3 w-full rounded-md bg-gray-300 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                <div class="flex flex-row">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1552239730-061a5b908da3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Telkomsel Tower Jogjakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <div class="flex flex-row">
                                    <p class="pt-1 text-gray-900 line-through">Rp. 450.000.000/Day</p>
                                    <p class="pl-2 pt-1 text-red-900">Rp. 390.000.000/Day</p>
                                </div>
                                
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1521493051-ae3735fbc1d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Ritz Hotel Jakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <div class="flex flex-row">
                                    <p class="pt-1 text-gray-900 line-through">Rp. 650.000.000/Day</p>
                                    <p class="pl-2 pt-1 text-red-900">Rp. 450.000.000/Day</p>
                                </div>
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1571931237305-7818cf1f0646?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">World Trade Center Jakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 1.250.000.000/Day</p>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1529474598517-9d37484d01d8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Maspion Building, Surabaya</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 450.000.000/Day</p>
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1592402205407-d3eb3ac803fc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">BCA Building, Jakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 650.000.000/Day</p>
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1563464867970-88b48ed7dfd2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Aare Facility, Malang</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <div class="flex flex-row">
                                    <p class="pt-1 text-gray-900 line-through">Rp. 250.000.000/Day</p>
                                    <p class="pl-2 pt-1 text-red-900">Rp. 200.000.000/Day</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1578831021381-d413f2e6f969?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Plaza Indonesia, Jakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 1.150.000.000/Day</p>
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1575946760368-98ce992aae84?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Tweazal Planetarium, Jakarta</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 2.250.000.000/Day</p>
                            </a>
                        </div>

                        <div class="w-full md:w-1/2 xl:w-1/3 p-6 flex flex-col">
                            <a href="#">
                                <img class="hover:grow hover:shadow-lg"
                                    src="https://images.unsplash.com/photo-1515757340325-0059a5e475f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=400&q=80">
                                <div class="pt-3 flex items-center justify-between">
                                    <p class="">Ricochet Hotel, Semarang</p>
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </div>
                                <p class="pt-1 text-gray-900">Rp. 450.000.000/Day</p>
                            </a>
                        </div>
                    </div>
                </div>
                

            
            </div>

        </div>

    </section>

    <!-- <section class="bg-white py-8">

        <div class="container py-8 px-6 mx-auto">

            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8"
                href="#">
                About
            </a>

            <p class="mt-8 mb-8">This template is inspired by the stunning nordic minamalist design - in
                particular:
                <br>
                <a class="text-gray-800 underline hover:text-gray-900" href="http://savoy.nordicmade.com/"
                    target="_blank">Savoy Theme</a> created by <a class="text-gray-800 underline hover:text-gray-900"
                    href="https://nordicmade.com/">https://nordicmade.com/</a> and <a
                    class="text-gray-800 underline hover:text-gray-900" href="https://www.metricdesign.no/"
                    target="_blank">https://www.metricdesign.no/</a>
            </p>

            <p class="mb-8">Lorem ipsum dolor sit amet, consectetur <a href="#">random link</a> adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Vel risus commodo viverra
                maecenas accumsan lacus vel facilisis volutpat. Vitae aliquet nec ullamcorper sit. Nullam eget felis
                eget nunc lobortis mattis aliquam. In est ante in nibh mauris. Egestas congue quisque egestas diam in.
                Facilisi nullam vehicula ipsum a arcu. Nec nam aliquam sem et tortor consequat. Eget mi proin sed libero
                enim sed faucibus turpis in. Hac habitasse platea dictumst quisque. In aliquam sem fringilla ut. Gravida
                rutrum quisque non tellus orci ac auctor augue mauris. Accumsan lacus vel facilisis volutpat est velit
                egestas dui id. At tempor commodo ullamcorper a. Volutpat commodo sed egestas egestas fringilla. Vitae
                congue eu consequat ac.</p>

        </div>

    </section> -->

</x-app-layout>
