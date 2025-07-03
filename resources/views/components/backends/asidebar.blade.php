<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @switch(auth()->user()->role)
            @case('admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? '' : 'collapsed' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @break

            @case('agent')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.agent.dashboard') ? '' : 'collapsed' }}"
                        href="{{ route('admin.agent.dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @break
        @endswitch
      

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.booking.*') ? '' : 'collapsed' }}" data-bs-target="#booking-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="booking-nav" class="nav-content collapse {{ request()->routeIs('admin.booking.*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.booking.index') }}"
                        class="{{ request()->routeIs('admin.booking.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Booking</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.booking.list') }}"
                        class="{{ request()->routeIs('admin.booking.list') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Booking List</span>
                    </a>
                </li>

            </ul>
        </li><!-- End booking Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.room.*') ? '' : 'collapsed' }}" data-bs-target="#room-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Rooms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="room-nav" class="nav-content collapse {{ request()->routeIs('admin.room.*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.room.index') }}"
                        class="{{ request()->routeIs('admin.room.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Room</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.room.create') }}"
                        class="{{ request()->routeIs('admin.room.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Create Room</span>
                    </a>
                </li>

            </ul>
        </li><!-- End room Nav -->



        <li class="nav-heading">Room Extras</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.category.index') ? '' : 'collapsed' }}"
                href="{{ route('admin.category.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Category</span>
            </a>
        </li><!-- End Category Page Nav -->
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.feature.index') ? '' : 'collapsed' }}"
                href="{{ route('admin.feature.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Feature</span>
            </a>
        </li><!-- End Feature Page Nav --> --}}




        <li class="nav-heading">Pages</li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->



    </ul>
    {{-- <div class="mt-3 text-center">
        <p class="text-secondary fst-italic">made by <a href="#">mahfuzul islam</a></p>
    </div> --}}

</aside><!-- End Sidebar-->
