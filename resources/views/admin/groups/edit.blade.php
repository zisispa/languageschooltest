@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Ενημέρωση Tάξης
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


    <form action="{{ route('group.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="group_name">Όνομα Τάξης</label>
            <input type="text" class="form-control" name="group_name" id="group_name" placeholder="Δώστε Όνομα Τάξης"
                value="{{ $group->group_name }}">
        </div>

        <div class="form-group">
            <label for="level_id">Επίπεδο</label>
            <select class="form-control" name="level_id" id="level_id">
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}" @if ($level->id == $group->group_id)
                        selected
                @endif
                >{{ $level->level_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject">Μάθημα</label>
            <select class="form-control" name="subject_id" id="subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" @if ($subject->id == $group->subject_id)
                        selected
                @endif
                >{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @if ($teacher->id == $group->teacher_id)
                        selected
                @endif
                >{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="student">Μαθητές</label>
            <select class="multiple-js form-control" name="students[]" id="student" multiple="multiple">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" @if ($group->hasStudent($student->id))
                        selected
                @endif

                >{{ $student->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Ενημέρωση Τάξης</button>
        </div>
    </form>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.multiple-js').select2();
        });

    </script>
@endsection
