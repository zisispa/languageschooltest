@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Ανακοίνωσης
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


    <form action="{{ route('announcement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Τίτλος Ανακοίνωσης</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Δώστε Τίτλο Ανακοίνωσης">
        </div>

        <div class="form-group">
            <label for="description">Περιγραφή</label>
            <input id="description" type="hidden" name="description">
            <trix-editor input="description"></trix-editor>
        </div>

        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>

            </select>
        </div>

        <div class="form-check my-4">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="announcement_all" id="" value="checkedValue">
                Γενική Ανακοίνωση
            </label>
        </div>

        <div class="form-group">
            <label for="student">Μαθητές</label>
            <select class="js-example-basic-multiple form-control" name="students[]" id="student" multiple="multiple">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="group">Τάξεις</label>
            <select class="js-example-basic-multiple form-control" name="groups[]" id="group" multiple="multiple">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Δημιουργία Ανακοίνωσης</button>
        </div>
    </form>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
@endsection
