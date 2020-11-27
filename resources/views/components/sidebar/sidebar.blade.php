<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Title of the Page -->
    <a class="sidebar-brand d-flex align-items-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Συστημα Ανακοινωσεων</div>
    </a>

    <hr class="sidebar-divider my-0">



    @if (auth()->user()->role_id == 1)

        <!-- Display Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Αρχική</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Display Students -->
        @include('components.sidebar.sidebar-items.sidebar-item-students')

        <!-- Display Teachers-->
        @include('components.sidebar.sidebar-items.sidebar-item-teachers')

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

    @if (auth()->user()->role_id == 2)

        <!-- Display Dashboard -->
        <li class="nav-item active">
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

        <!-- Display Announcement -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-announcements')

        <hr class="sidebar-divider">
        <!-- Display Grades -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-grades')

        <hr class="sidebar-divider">
        <!-- Display Groups -->
        @include('components.sidebar.sidebar-items-students.sidebar-item-groups')

    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- Heading -->
{{-- <div class="sidebar-heading">
    Addons
</div> --}}

<!-- Nav Item - Utilities Collapse Menu -->
{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Δικαιώματα</span>
    </a>
    <div id="collapseRoles" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
        </div>
    </div>
</li> --}}


<!-- Nav Item - Charts -->
{{-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> --}}
