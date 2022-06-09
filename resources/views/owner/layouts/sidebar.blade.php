<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            <b class="font-black">Eventful</b> | Building Owner
        </div>
    </div>
    <div class="menu is-menu-main">
        <ul class="menu-list">
            <li class="{{ (request()->is('owner/dashboard*')) ? 'active' : '' }}">
                <a href="{{ route('owner.dashboard') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Building Management</p>
        <ul class="menu-list">
            <li class="{{ (request()->is('owner/buildings*')) ? 'active' : '' }}">
                <a href="{{ route('buildings.index') }}" class="">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">List</span>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <span class="icon"><i class="mdi mdi-playlist-check"></i></span>
                    <span class="menu-item-label">Approval Queue</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
