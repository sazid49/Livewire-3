<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}" href="{{ route('admin.user') }}"
                    wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Users
                </a>
                <a class="nav-link {{ request()->is('admin/post-list') ? 'active' : '' }}"
                    href="{{ route('admin.post') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Post List
                </a>
                <a class="nav-link {{ request()->is('admin/dropdown') ? 'active' : '' }}"
                    href="{{ route('admin.dropdown') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Dropdown
                </a>

                <a class="nav-link {{ request()->is('admin/jobs') ? 'active' : '' }}" href="{{ route('admin.jobs') }}"
                    wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Jobs
                </a>
                <a class="nav-link {{ request()->is('admin/country') ? 'active' : '' }}"
                    href="{{ route('admin.country') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Country
                </a>
                <a class="nav-link {{ request()->is('admin/database-backup') ? 'active' : '' }}"
                    href="{{ route('admin.database.backup') }}" wire:navigate>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Database Backup
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
