<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroup" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-users"></i>
        <span>Τάξεις</span>
    </a>
    <div id="collapseGroup" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('group.index') }}">Πίνακας Τάξεων</a>
            <a class="collapse-item" href="{{ route('group.create') }}">Δημειουργία Τάξης</a>
        </div>
    </div>
</li>
