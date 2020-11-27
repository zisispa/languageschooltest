@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Ενημέρωση Ανακοίνωσης
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


    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Τίτλος Ανακοίνωσης</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Δώστε Τ΄ίτλο Ανακοίνωσης"
                value="{{ $announcement->title }}">
        </div>

        <div class="form-group">
            <label for="description">Περιγραφή</label>
            <textarea class="form-control" name="description" id="description" cols="30"
                rows="5">{{ $announcement->description }}
            </textarea>
        </div>

        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @if ($teacher->id == $announcement->teacher_id)
                        selected
                @endif
                >{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Ενημέρωση Ανακοίνωσης</button>
        </div>
    </form>
@endsection
