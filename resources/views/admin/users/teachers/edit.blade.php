@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Επεξεργασία Καθηγητή
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


    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Ονοματεπώνυμο</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Δώστε Όνομα Μαθητή"
                value="{{ $teacher->user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Δώστε Email"
                value="{{ $teacher->user->email }}">
        </div>

        <div class="form-group">
            <label for="password">Κωδικός</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Δώστε Κωδικό"
                value="{{ $teacher->user->password }}">
        </div>

        <div class="form-group">
            <label for="phone">Tηλέφωνο</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Δώστε Τηλέφωνο"
                value="{{ $teacher->phone }}">
        </div>

        <div class="form-group">
            <label for="gender">Φύλο</label>
            <select class="form-control" name="gender" id="gender">
                <option value="male">Αρσενικό</option>
                <option value="female">Θηλυκό</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Επεξεργασία Καθηγητή</button>
        </div>
    </form>
@endsection
