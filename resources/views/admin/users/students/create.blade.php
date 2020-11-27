@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Μαθητή
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


    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Ονοματεπώνυμο</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Δώστε Όνομα Μαθητή">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Δώστε Email">
        </div>

        <div class="form-group">
            <label for="password">Κωδικός</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Δώστε Κωδικό">
        </div>

        <div class="form-group">
            <label for="phone">Tηλέφωνο</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Δώστε Τηλέφωνο">
        </div>

        <div class="form-group">
            <label for="current_address">Διεύθυνση</label>
            <input type="text" class="form-control" name="current_address" id="current_address"
                placeholder="Δώστε Διεύθυνση">
        </div>

        <div class="form-group">
            <label for="gender">Φύλο</label>
            <select class="form-control" name="gender" id="gender">
                <option value="male">Αρσενικό</option>
                <option value="female">Θηλυκό</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Δημιουργία Μαθητή</button>
        </div>
    </form>
@endsection
