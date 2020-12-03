@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-center">

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Επεξεργασία Επιπέδου Μαθήματος
                </div>
                <div class="card-body">
                    <form action="{{ route('level.update', $level->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Όνομα Επιπέδου</label>
                            <input type="text" class="form-control {{ $errors->has('level_name') ? 'is-invalid' : '' }}"
                                name="level_name" id="name" value="{{ $level->level_name }}"
                                placeholder="Δώστε Όνομα Επιπέδου">

                            <!-- Error -->
                            @if ($errors->has('level_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Ενημέρωση</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
