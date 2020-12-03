@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Μαθητών
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειριστείτε όλους τους μαθητές.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Ονοματεπώνυμο</th>
                            <th>Email</th>
                            <th>Φύλο</th>
                            <th>Τηλέφωνο</th>
                            <th>Διεύθυνση</th>
                            <th>Δικαίωμα</th>
                            <th>Επεξεργασία Μαθητή</th>
                            <th>Διαγραφή Μαθητή</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr class="text-center">
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->gender == 'male' ? 'Αρσενικό' : 'Θυλικό' }}</td>
                                <td>{{ $student->phone == null ? '-' : $student->phone }}</td>
                                <td>{{ $student->current_address == null ? '-' : $student->current_address }}</td>
                                <td>{{ $student->roleStudentName($student->user->role_id) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('student.edit', $student->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
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
