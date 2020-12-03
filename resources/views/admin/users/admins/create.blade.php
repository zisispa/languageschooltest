@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Διαχειριστή
    </h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST" class="needs-validation">
                @csrf
                <div class="form-group">
                    <label for="name">Ονοματεπώνυμο<span class="badge text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                        id="name" placeholder="Δώστε Όνομα Διαχειριστή">

                    <!-- Error -->
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email<span class="badge text-danger">*</span></label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                        id="email" placeholder="Δώστε Email">

                    <!-- Error -->
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Κωδικός<span class="badge text-danger">*</span></label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" id="password" placeholder="Δώστε Κωδικό">

                    <!-- Error -->
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="gender">Φύλο<span class="badge text-danger">*</span></label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        @foreach ($genders as $gender)
                            <option value="{{ $gender }}">{{ $gender == 'male' ? 'Αρσενικό' : 'Φυλικό' }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('gender'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Δημιουργία Διαχειριστή</button>
                </div>
            </form>
        </div>
    </div>

@endsection
