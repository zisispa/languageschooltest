@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Διαχειριστών
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειριστείτε όλους τους διαχειριστές.
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
                            <th>Δικαίωμα</th>
                            <th>Επεξεργασία Διαχειριστή</th>
                            <th>Διαγραφή Διαχειριστή</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="text-center">
                                <td>{{ $admin->user->name }}</td>
                                <td>{{ $admin->user->email }}</td>
                                <td>{{ $admin->gender == 'male' ? 'Αρσενικό' : 'Θυλικό' }}</td>
                                <td>{{ $admin->roleStudentName($admin->user->role_id) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.edit', $admin->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
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
