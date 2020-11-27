@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Επεξεργασία Λογαριασμού
    </h2>

    @if (count($errors) > 0)
        <ul class="list-group mb-3">
            @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger mb-3">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif


    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Ονοματεπώνυμο</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Δώστε Ονοματεπώνυμο"
                value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Δώστε Email"
                value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password">Κωδικός</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <label for="phone">Τηλέφωνο</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Δώστε Τηλέφωνο"
                value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label for="gender">Φύλο</label>
            <select class="form-control" name="gender" id="gender">
                @foreach ($genders as $gender)
                    <option value="{{ $gender }}" @if ($gender == $user->teacher->gender)
                        selected
                @endif>{{ $gender == 'male' ? 'Αρσενικό' : 'Θυλικό' }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Επεξεργασία Λογαριασμού</button>
        </div>
    </form>
@endsection

@section('scripts')

    <script>
        flatpickr('#grade_day', {
            // enableTime: true,
            enableSeconds: true,
        });

    </script>

@endsection
