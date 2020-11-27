@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Τμήματος
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείται να δείτε το τμήμα στο οποίο ανήκετε
        </a>.
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->level->level_name }}</td>
                                <td>{{ $group->teacher->user->name }}</td>
                                <td>{{ $group->subject->subject_name }}</td>
                                <td>{{ $group->students->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
