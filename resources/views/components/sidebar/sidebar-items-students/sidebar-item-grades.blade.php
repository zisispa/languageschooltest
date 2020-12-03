<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGrades" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-table"></i>
        <span>Η καρτέλα μου</span>
    </a>
    <div id="collapseGrades" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('student_view_grades') }}">Οι βαθμοί μου</a>
            <a class="collapse-item" href="{{ route('student_view_groups') }}">Οι τάξεις μου</a>
        </div>
    </div>
</li>
