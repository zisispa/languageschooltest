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



    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('group.update', $group->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="group_name">Όνομα Τάξης</label>
                    <input type="text" class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}"
                        name="group_name" id="group_name" placeholder="Δώστε Όνομα Τάξης" value="{{ $group->group_name }}">

                    <!-- Error -->
                    @if ($errors->has('group_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('group_name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="level_id">Επίπεδο</label>
                    <select class="form-control {{ $errors->has('level_id') ? 'is-invalid' : '' }}" name="level_id"
                        id="level_id">
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @if ($level->id == $group->group_id)
                                selected
                        @endif
                        >{{ $level->level_name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('level_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('level_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject">Μάθημα</label>
                    <select class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" name="subject_id"
                        id="subject">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" @if ($subject->id == $group->subject_id)
                                selected
                        @endif
                        >{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('subject_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="teachers">Καθηγητές</label>
                    <select class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" name="teacher_id"
                        id="teachers">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacher->id == $group->teacher_id)
                                selected
                        @endif
                        >{{ $teacher->user->name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('teacher_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('teacher_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="student">Μαθητές</label>
                    <select class="multiple-js form-control {{ $errors->has('students') ? 'is-invalid' : '' }}"
                        name="students[]" id="student" multiple="multiple">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" @if ($group->hasStudent($student->id))
                                selected
                        @endif

                        >{{ $student->user->name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('students'))
                        <div class="invalid-feedback">
                            {{ $errors->first('students') }}
                        </div>
                    @endif
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Ενημέρωση Τάξης</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.multiple-js').select2();
        });

    </script>
@endsection
