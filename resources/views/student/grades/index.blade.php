@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Βαθμολογιών
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείται να δείτε όλες τις βαθμολογίες.
    </p>

    <div class="form-group">
        <label for="semesters">Επέλεξε Εξάμηνο</label>
        <select class="form-control" name="semester" id="semesters">
            <option value="1">Εξάμηνο 1ο</option>
            <option value="2">Εξάμηνο 2ο</option>
            <option value="3">Εξάμηνο 3ο</option>
        </select>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Μάθημα</th>
                            <th>Περιγραφή</th>
                            <th>Καθηγητής</th>
                            <th>Βαθμός</th>
                            <th>Ημερομηνία</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{ $grade->subject->subject_name }}</td>
                                <td>{{ $grade->grade_name }}</td>
                                <td>{{ $grade->teacher->user->name }}</td>
                                <td>{{ $grade->value }}</td>
                                <td>{{ Str::limit($grade->grade_day, $limit = 10, $end = ' ') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $('#semesters').change(function() {
            var semester = $(this).val();
            if (semester) {
                $.ajax({
                    type: "get",
                    url: "{{ url('/getgradesbysemester') }}/" + semester,
                    success: function(data) {

                        var tbody = document.getElementById('tbody');
                        var str = '';
                        data.forEach(element => {

                            return str +=
                                `<tr><td>${element.gradeSubjectName}</td> <td>${element.grade_name}</td><td>${element.gradeTeacherName}</td><td>${element.value}</td><td>${element.grade_day}</td></tr>`;
                        });
                        return tbody.innerHTML = str;
                    }
                });
            }
        });

    </script>
@endsection
