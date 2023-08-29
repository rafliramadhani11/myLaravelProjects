<!-- SIDEBAR -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}  " aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/bukus">
                    <span data-feather="book" class="align-text-bottom"></span>
                    Semua Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/bukus*') ? 'active' : ''  }} " aria-current="page" href="/dashboard/bukus">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Buku Saya
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>
                Administrator
            </span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/kategoris*') ? 'active' : ''  }} " aria-current="page" href="/dashboard/kategoris">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Semua Kategori Buku
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>
<!-- --------------------- -->
