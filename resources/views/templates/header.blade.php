<nav class="navbar-blur navbar-expand-lg py-2 navbar navbar-light">
    <div class="container w-full">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-dark fw-bold" href="#">
            <span class="text-primary fs-3">Detik</span>
            <span class="text-warning">Com</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <form action="{{ route('searchtitle') }}" method="GET" id="searchtitle" class="d-flex me-auto">
                <input name="title" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-1" href="{{ route('homeindex') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-1" href="{{ route('homeindex') }}#topik">Topic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-1" href="{{ route('homeindex') }}#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-2" href="{{ route('training') }}">All Training</a>
                </li>
                @if (Auth::guard('user')->check() || Auth::guard('admin')->check())
                @if (Auth::guard('user')->check())
                <li class="nav-item">
                    <a class="nav-link nav-link-hover" href="#">My Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-2" href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                @elseif(Auth::guard('admin')->check())
                <li class="nav-item">
                    <a class="nav-link nav-link-hover me-2" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                @endif
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-light px-2" aria-labelledby="dropdownMenuButton1">
                            @if (Auth::guard('user')->check())
                            <li>
                                <span class="dropdown-item fw-bold">
                                    <i class="bi bi-person-fill"></i>&nbsp; |
                                    Hello {{ Auth::guard('user')->user()->first_name
                                    }}
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="username" value="{{ Auth::user()->username }}">
                                <li>
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-left"></i>&nbsp; | Logout
                                    </button>
                                </li>
                            </form>
                            @else
                            <li>
                                <a href="#" class="dropdown-item fw-bold">
                                    Hello <span class="text-primary">{{ Auth::guard('admin')->user()->first_name
                                        }}</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <input type="hidden" name="username"
                                    value="{{ Auth::guard('admin')->user()->username }}">
                                <li>
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-left"></i>&nbsp; | Logout
                                    </button>
                                </li>
                            </form>
                            @endif
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item me-2 mb-2">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#modalregister">
                        Register
                    </button>
                </li>
                <li class="nav-item me-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modallogin">
                        Login
                    </button>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
{{-- Start Modal Login --}}
<div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="modalLoginLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal Login --}}

{{-- Start Modal Register --}}
<div class="modal fade" id="modalregister" tabindex="-1" aria-labelledby="modalregisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="modalregisterLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-vcard-fill"></i>
                            </span>
                            <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="first_name" class="form-label">First Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                            <label for="last_name" class="form-label">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-fill-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-envelope-at-fill"></i>
                            </span>
                            <input type="email" id="email" class="form-control" placeholder="email" aria-label="email"
                                name="email" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-calendar3"></i>
                            </span>
                            <input type="date" id="birth_date" class="form-control" placeholder="birth_date"
                                aria-label="birth_date" name="birth_date" aria-describedby="basic-addon1">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal Register --}}
