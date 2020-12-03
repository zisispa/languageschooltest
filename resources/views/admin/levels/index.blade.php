@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Eισαγωγή Επιπέδου Μαθήματος
                </div>
                <div class="card-body">
                    <form action="{{ route('level.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Όνομα Επιπέδου</label>
                            <input type="text" class="form-control {{ $errors->has('level_name') ? 'is-invalid' : '' }}"
                                name="level_name" id="name" placeholder="Δώστε Όνομα Επιπέδου">

                            <!-- Error -->
                            @if ($errors->has('level_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level_name') }}
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
                    Πίνακας Επιπέδων Μαθημάτων
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Όνομα Επιπέδου</th>
                                    <th>Επεξεργασία Επιπέδου</th>
                                    <th>Διαγραφή Επιπέδου</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr class="text-center">
                                        <td>{{ $level->level_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('level.edit', $level->id) }}"
                                                class="btn btn-info btn-sm">Επεξεργασία</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('level.destroy', $level->id) }}" method="POST">
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
