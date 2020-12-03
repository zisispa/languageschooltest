<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudents" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-user-graduate"></i>
        <span>Μαθητές</span>
    </a>
    <div id="collapseStudents" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('student.index') }}">Πίνακας Μαθητών</a>
            <a class="collapse-item" href="{{ route('student.create') }}">Δημιουργία Μαθητή</a>
        </div>
    </div>
</li>
