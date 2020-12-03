@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Eισαγωγή Μαθήματος
                </div>
                <div class="card-body">
                    <form action="{{ route('subject.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Όνομα Μαθήματος</label>
                            <input type="text" class="form-control {{ $errors->has('subject_name') ? 'is-invalid' : '' }}"
                                name="subject_name" id="name" placeholder="Δώστε Όνομα Μαθήματος">

                            <!-- Error -->
                            @if ($errors->has('subject_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Eισαγωγή</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Πίνακας Μαθημάτων
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Όνομα Μαθήματος</th>
                                    <th>Επεξεργασία Μαθήματος</th>
                                    <th>Διαγραφή Μαθήματος</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr class="text-center">
                                        <td>{{ $subject->subject_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subject.edit', $subject->id) }}"
                                                class="btn btn-info btn-sm">Επεξεργασία</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('subject.destroy', $subject->id) }}" method="POST">
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
        </div>
    </div>
@endsection
