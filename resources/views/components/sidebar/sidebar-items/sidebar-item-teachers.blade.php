<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Καθηγητές</span>
    </a>
    <div id="collapseTeacher" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('teacher.index') }}">Πίνακας Καθηγητών</a>
            <a class="collapse-item" href="{{ route('teacher.create') }}">Δημειουργία Καθηγητή</a>
        </div>
    </div>
</li>
