<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmins" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-user-cog"></i>
        <span>Διαχειριστές</span>
    </a>
    <div id="collapseAdmins" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.index') }}">Πίνακας Διαχειριστών</a>
            <a class="collapse-item" href="{{ route('admin.create') }}">Δημιουργία Διαχειριστή</a>
        </div>
    </div>
</li>
