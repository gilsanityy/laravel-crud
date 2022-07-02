    <nav class="navbar shadow navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="col-6">
                <ul class="nav nav-item">
                    <li class="nav nav-links">
                        <h4>Loremipsum</h4>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <div class="collapse navbar-collapse" id="navbarRightAlignExample">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav nav-links mr-3">Welcome, {{ auth()->user()->name }}</li>
                        <li class="nav-item">
                            <a class="btn btn-danger" aria-current="page" href="{{ route('auth.logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
