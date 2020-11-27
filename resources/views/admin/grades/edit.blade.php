@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Επεξεργασία Βαθμού
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


    <form action="{{ route('grade.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="grade_name">Περιγραφή Βαθμού</label>
            <input type="text" class="form-control" name="grade_name" id="grade_name" placeholder="Δώστε Περιγραφή Βαθμού"
                value="{{ $grade->grade_name }}">
        </div>

        <div class="form-group">
            <label for="grade_day">Ημερομηνία Βαθμού</label>
            <input type="text" class="form-control" name="grade_day" id="grade_day" placeholder="Επέλεξε Ημερομηνία Βαθμού"
                value="{{ $grade->grade_day }}">
        </div>

        <div class="form-group">
            <label for="value">Βαθμολογία</label>
            <input type="text" class="form-control" name="value" id="value" placeholder="Δώστε Βαθμολογία"
                value="{{ $grade->value }}">
        </div>

        <div class="form-group">
            <label for="semesters">Εξάμηνο</label>
            <select class="form-control" name="semester" id="semesters">
                <option value="1">Εξάμηνο 1ο</option>
                <option value="2">Εξάμηνο 2ο</option>
                <option value="3">Εξάμηνο 3ο</option>
            </select>
        </div>

        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @if ($teacher->id == $grade->teacher_id)
                        selected
                @endif
                >{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subjects">Μαθήμα</label>
            <select class="form-control" name="subject_id" id="subjects">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" @if ($subject->id == $grade->subject_id)
                        selected
                @endif
                >{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="students">Τμήματα</label>
            <select class="form-control" name="student_id" id="students">
                <option>Επέλεξε τμήμα</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @if ($student->id == $grade->student_id)
                        selected
                @endif
                >{{ $student->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Επεξεργασία Βαθμού</button>
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
