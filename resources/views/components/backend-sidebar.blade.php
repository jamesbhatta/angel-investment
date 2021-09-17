<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo flex-md-grow-1 text-center">
                <a href="{{ url('/') }}" target="_blank"><img src="{{ siteLogoUrl() }}" alt="{{ siteName() }}" srcset="" style="height: 50px; filter: brightness(0);"></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item  {{ setActive('admin.dashboard') }}">
                <a href="/admin/dashboard" class='sidebar-link'>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.investments.*') }}">
                <a href="/backend/investments" class='sidebar-link'>
                    <i class="bi bi-cash-stack"></i>
                    <span>Investments</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('admin.pitches.*') }}">
                <a href="/admin/pitches" class='sidebar-link'>
                    <i class="bi bi-list-stars"></i>
                    <span>Pitches</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.transactions.*') }}">
                <a href="/transactions" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Transactions</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.users.*') }}">
                <a href="/backend/users" class='sidebar-link'>
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="sidebar-title">SETUP</li>

            <li class="sidebar-item {{ setActive('backend.countries.*') }}">
                <a href="/backend/countries" class='sidebar-link'>
                    <i class="bi bi-map"></i>
                    <span>Countries</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.industries.*') }}">
                <a href="/backend/industry" class='sidebar-link'>
                    <i class="bi bi-briefcase"></i>
                    <span>Industries</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.testimonials.*') }}">
                <a href="/backend/testimonial" class='sidebar-link'>
                    <i class="bi bi-briefcase"></i>
                    <span>Testimonials</span>
                </a>
            </li>

            <li class="sidebar-item {{ setActive('backend.settings.*') }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-sliders"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item {{ setActive('backend.settings.general.*') }}">
                        <a href="/backend/settings/general">General</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">API</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Homepage</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('system.logs') }}" class='sidebar-link' target="_blank">
                    <i class="bi bi-bug"></i>
                    <span>System Logs</span>
                </a>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
