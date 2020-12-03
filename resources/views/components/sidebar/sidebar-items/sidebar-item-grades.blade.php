<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGrades" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-star"></i>
        <span>Βαθμοί</span>
    </a>
    <div id="collapseGrades" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item"
                href="{{ auth()->user()->role_id == 2 ? route('teachergrades') : route('grade.index') }}">Πίνακας
                Βαθμολογίου</a>
        </div>
    </div>
</li>
