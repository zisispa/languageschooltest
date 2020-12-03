@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Βαθμολογιών
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειριστείτε όλες τις βαθμολογίες.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Όνομα Μαθητή</th>
                            <th>Βαθμός</th>
                            <th>Περιγραφή</th>
                            <th>Ημερομηνία</th>
                            <th>Καθηγητής</th>
                            <th>Μάθημα</th>
                            <th>Επεξεργασία Βαθμολογίας</th>
                            <th>Διαγραφή Βαθμολογίας</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                            <tr class="text-center">
                                <td>{{ $grade->student->user->name }}</td>
                                <td>{{ $grade->value }}</td>
                                <td>{{ $grade->grade_name }}</td>
                                <td>{{ Str::limit($grade->grade_day, $limit = 10, $end = ' ') }}</td>
                                <td>{{ $grade->teacher->user->name }}</td>
                                <td>{{ $grade->subject->subject_name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('grade.edit', $grade->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('grade.destroy', $grade->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Διαγραφή</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
