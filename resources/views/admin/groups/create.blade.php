@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Tάξης
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


    <form action="{{ route('group.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="group_name">Όνομα Τάξης</label>
            <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Δώστε Όνομα Τάξης">
        </div>

        <div class="form-group">
            <label for="level_id">Επίπεδο</label>
            <select class="form-control" name="level_id" id="level_id">
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject">Μάθημα</label>
            <select class="form-control" name="subject_id" id="subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                {{-- @foreach ($teachers as $teacher)
                @endforeach --}}
            </select>
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
            <button type="submit" class="btn btn-success">Δημιουργία Τάξης</button>
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
