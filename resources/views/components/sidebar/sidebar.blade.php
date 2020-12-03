<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    @if (auth()->user()->role_id == 1)

        <!-- Title of the Page -->
        <a class="sidebar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-text mx-3">Συστημα Ανακοινωσεων</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Display Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Αρχική</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Display Students -->
        @include('components.sidebar.sidebar-items.sidebar-item-students')

        <!-- Display Teachers-->
        @include('components.sidebar.sidebar-items.sidebar-item-teachers')

        <!-- Display Admins-->
        @include('components.sidebar.sidebar-items.sidebar-item-admins')

        <hr class="sidebar-divider">

        <!-- Display Grades -->
        @include('components.sidebar.sidebar-items.sidebar-item-grades')

        <hr class="sidebar-divider">

        <!-- Display Groups -->
        @include('components.sidebar.sidebar-items.sidebar-item-groups')

        <hr class="sidebar-divider">

        <!-- Display Announcement -->
        @include('components.sidebar.sidebar-items.sidebar-item-announcements')

        <hr class="sidebar-divider">

        <!-- Display Subjects -->
        @include('components.sidebar.sidebar-items.sidebar-item-subjects')

        <!-- Display Levels -->
        @include('components.sidebar.sidebar-items.sidebar-item-levels')

    @endif

    @if (auth()->user()->role_id == 2)

        <!-- Title of the Page -->
        <a class="sidebar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-text mx-3">Συστημα Ανακοινωσεων</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Display Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Αρχική</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Display Grades -->
        @include('components.sidebar.sidebar-items.sidebar-item-grades')

        <hr class="sidebar-divider">

        <!-- Display Groups -->
        @include('components.sidebar.sidebar-items.sidebar-item-groups')

        <hr class="sidebar-divider">

        <!-- Display Announcement -->
        @include('components.sidebar.sidebar-items.sidebar-item-announcements')
    @endif

    @if (auth()->user()->role_id == 3)

        <!-- Title of the Page -->
        <a class="sidebar-brand d-flex align-items-center" href="{{ route('student-homepage') }}">
            <div class="sidebar-brand-text mx-3">Συστημα Ανακοινωσεων</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Display Announcement -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-announcements')

        <hr class="sidebar-divider">
        <!-- Display Grades -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-grades')


        <hr class="sidebar-divider">
        <!-- Display Groups -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-contact')

    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
