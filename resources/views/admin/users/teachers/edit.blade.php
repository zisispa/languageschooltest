@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Επεξεργασία Καθηγητή
    </h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Ονοματεπώνυμο</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                        id="name" placeholder="Δώστε Όνομα Μαθητή" value="{{ $teacher->user->name }}">
                    <!-- Error -->
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                        id="email" placeholder="Δώστε Email" value="{{ $teacher->user->email }}">
                    <!-- Error -->
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="old_password">Παλιός Κωδικός<span class="badge text-danger">*</span></label>

                    <input type="password" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}"
                        name="old_password" id="old_password" placeholder="Δώστε Παλίο Κωδικό">
                    @if ($errors->has('old_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('old_password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Νέος Κωδικός</label>

                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        name="password" id="password" placeholder="Δώστε Νέο Κωδικό">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Tηλέφωνο</label>
                    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone"
                        id="phone" placeholder="Δώστε Τηλέφωνο" value="{{ $teacher->phone }}">
                    <!-- Error -->
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="gender">Φύλο</label>
                    <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        @foreach ($genders as $gender)
                            <option value="{{ $gender }}" @if ($teacher->gender == $gender)
                                selected
                        @endif>{{ $gender == 'male' ? 'Αρσενικό' : 'Φυλικό' }}</option>
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
                    <button type="submit" class="btn btn-success">Επεξεργασία Καθηγητή</button>
                </div>
            </form>
        </div>
    </div>

@endsection
