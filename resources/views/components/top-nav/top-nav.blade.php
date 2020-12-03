<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <!-- Nav Item - Alerts -->
        @auth
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    @if (auth()
            ->user()
            ->unreadNotifications->groupBy('notifiable_type')
            ->count() > 0)
                        <span
                            class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
                    @endif
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Ειδοποιησεις
                    </h6>

                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('student_view_announcements') }}">
                            <div class="mr-3">
                                {{ $notification->markAsRead() }}
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-bullhorn text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    {{ Str::limit($notification->data['announcement']['created_at'], $limit = 10, $end = ' ') }}
                                </div>
                                <span class="font-weight-bold">{{ $notification->data['announcement']['title'] }}</span>
                            </div>
                        </a>

                    @endforeach

                    <a class="dropdown-item text-center small text-gray-500"
                        href="{{ route('student_view_announcements') }}">Δείτε όλες τις
                        ειδοποιησεις</a>
                </div>
            </li>
        @endauth

        <div class="topbar-divider d-none d-sm-block"></div>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg mr-2 text-primary"></i>
                <span class="font-weight-bold mr-2 d-none d-lg-inline text-gray-600 small">
                    @if (Auth::check())
                        {{ auth()->user()->name }}
                    @endif
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user.profile.show', auth()->user()->slug) }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Λογαριασμός
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Αποσύνδεση
                </a>
            </div>
        </li>

    </ul>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Αποσύνδεση</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Είστε σίγουροι ότι θέλετε να αποσυνδεθείτε?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Ακύρωση</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-danger">Αποσύνδεση</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>
