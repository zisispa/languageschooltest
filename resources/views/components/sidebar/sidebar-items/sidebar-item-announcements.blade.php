<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnnouncement"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-bullhorn"></i>
        <span>Ανακοινώσεις</span>
    </a>
    <div id="collapseAnnouncement" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('announcement.index') }}">Πίνακας Ανακοινώσεων</a>
            <a class="collapse-item" href="{{ route('announcement.create') }}">Δημιουργία Ανακοιν/σης</a>
        </div>
    </div>
</li>
