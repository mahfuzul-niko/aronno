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
            <a class="nav-link {{ request()->routeIs('admin.category.*') ? '' : 'collapsed' }}"
                data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav"
                class="nav-content collapse {{ request()->routeIs('admin.category.*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.index') }}"
                        class="{{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Category Nav -->








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
