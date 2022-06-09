<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
        <div>
            <b class="font-black">Eventful</b> | Administrator
        </div>
    </div>
    <div class="menu is-menu-main">
        <ul class="menu-list">
            <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">User Management</p>
        <ul class="menu-list">
            <li class="{{ (request()->is('admin/users/owner*')) ? 'active' : '' }}">
                <a href="{{ route('users.all', ['role' => 'owner']) }}">
                    <span class="icon"><i class="mdi mdi-briefcase-account"></i></span>
                    <span class="menu-item-label">Owners</span>
                </a>
            </li>
            <li class="{{ (request()->is('admin/users/tenant*')) ? 'active' : '' }}">
                <a href="{{ route('users.all', ['role' => 'tenant']) }}">
                    <span class="icon"><i class="mdi mdi-book"></i></span>
                    <span class="menu-item-label">Tenants</span>
                </a>
            </li>
        </ul>
        <p class="menu-label">Building Management</p>
        <ul class="menu-list">
            <li>
                <a href="#" class="">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Building List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('types.index') }}" class="">
                    <span class="icon"><i class="mdi mdi-view-list"></i></span>
                    <span class="menu-item-label">Building Types</span>
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
