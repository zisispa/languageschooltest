@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Καθηγητών
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειριστείτε όλους τους καθηγητές.
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
                            <th>Δικαίωμα</th>
                            <th>Επεξεργασία Καθηγητή</th>
                            <th>Διαγραφή Καθηγητή</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr class="text-center">
                                <td>{{ $teacher->user->name }}</td>
                                <td>{{ $teacher->user->email }}</td>
                                <td>{{ $teacher->gender == 'male' ? 'Αρσενικό' : 'Θυλικό' }}</td>
                                <td>{{ $teacher->phone == null ? '-' : $teacher->phone }}</td>
                                <td>{{ $teacher->roleTeacherName($teacher->user->role_id) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST">
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
