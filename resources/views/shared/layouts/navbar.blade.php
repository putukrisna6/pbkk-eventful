<nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item mobile-aside-button">
            <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
        </a>
        <div class="navbar-item">
            <img src="{{ asset('img/icons.png') }}" alt="ikon" class="h-10 w-10">
        </div>
    </div>
    <div class="navbar-brand is-right">
        <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
            <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item dropdown has-divider has-user-avatar">
                <a class="navbar-link">
                    <div class="user-avatar">
                        <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe"
                            class="rounded-full">
                    </div>
                    <div class="is-user-name"><span>{{ Auth::user()->name }}</span></div>
                    <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="navbar-dropdown">
                    <a href="#" class="navbar-item">
                        <span class="icon"><i class="mdi mdi-account"></i></span>
                        <span>My Profile</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-settings"></i></span>
                        <span>Settings</span>
                    </a>
                    <a class="navbar-item">
                        <span class="icon"><i class="mdi mdi-email"></i></span>
                        <span>Messages</span>
                    </a>
                    <hr class="navbar-divider">
                    <form class="navbar-item " method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <span class="icon"><i class="mdi mdi-logout"></i></span>
                            <span>Log Out</span>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>
