<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="#">About</a></li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="/">
                <div>
                    <img src="img/icons.png" alt="ikon" class="h-10 w-10">
                </div>
                Eventful
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">
            @auth
            @if (Auth::user()->role == 'tenant')
            <a class="inline-block no-underline hover:text-black" href="{{ route('tenant.profile') }}">
                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <circle fill="none" cx="12" cy="7" r="3" />
                    <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                </svg>
            </a>
            @endif

            <form class="inline-block no-underline hover:text-black hover:underline py-2 px-4" method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <span>Logout</span>
                </a>
            </form>
            @else
            <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('login') }}">Login</a>
            <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
