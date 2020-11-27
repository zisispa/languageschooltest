@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Ανακοινώσεων
    </h1>
    <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να διαχειριστείτε όλες τις τάξεις.
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Τίτλος Ανακοίνωσης</th>
                            <th>Περιγραφή</th>
                            <th>Από το καθηγητή</th>
                            <th>Επεξεργασία Ανακοίνωσης</th>
                            <th>Διαγραφή Ανακοίνωσης</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                            <tr>
                                <td>{{ Str::limit($announcement->title, $limit = 50, $end = '...') }}</td>
                                <td>{!! Str::limit($announcement->description, $limit = 50, $end = '...') !!}</td>
                                <td>{{ $announcement->teacher->user->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('announcement.edit', $announcement->id) }}"
                                        class="btn btn-info btn-sm">Επεξεργασία</a>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('announcement.destroy', $announcement->id) }}" method="POST">
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
