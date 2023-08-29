<!-- HEADER -->
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">{{ auth()->user()->nama }}</a>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-link px-3 bg-dark border-0" type="submit">
                        <li>
                            Log Out
                            <span data-feather="log-out" class="align-text-bottom"></span>
                        </li>
                    </button>
                </form>
            </div>
        </div>
    </header>
    <!-- ------------- -->
