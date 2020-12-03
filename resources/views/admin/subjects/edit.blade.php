@extends('layouts.admin')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Επεξεργασία Μαθήματος
                </div>
                <div class="card-body">
                    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Όνομα Επιπέδου</label>
                            <input type="text" class="form-control {{ $errors->has('subject_name') ? 'is-invalid' : '' }}"
                                name="subject_name" id="name" value="{{ $subject->subject_name }}"
                                placeholder="Δώστε Όνομα Μαθήματος">

                            <!-- Error -->
                            @if ($errors->has('subject_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subject_name') }}
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
