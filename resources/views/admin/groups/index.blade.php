@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Τάξεων
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειρηστείται όλες τις τάξεις.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Όνομα Τάξης</th>
                            <th>Επίπεδο</th>
                            <th>Καθηγητής</th>
                            <th>Μάθημα</th>
                            <th>Σύνολο Μαθητών</th>
                            <th>Bαθμολογία Τάξης</th>
                            <th>Επεξεργασία Τάξης</th>
                            <th>Διαγραφή Τάξης</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr class="text-center">
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->level->level_name }}</td>
                                <td>{{ $group->teacher->user->name }}</td>
                                <td>{{ $group->subject->subject_name }}</td>
                                <td>{{ $group->students->count() }}</td>
                                <td class="text-center">
                                    <a href="{{ route('group.show', $group->id) }}"
                                        class="btn btn-success btn-sm">Bαθμολογία</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('group.edit', $group->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('group.destroy', $group->id) }}" method="POST">
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
