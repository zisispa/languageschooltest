@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Επεξεργασία Βαθμού
    </h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('grade.update', $grade->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="grade_name">Περιγραφή Βαθμού</label>
                    <input type="text" class="form-control {{ $errors->has('grade_name') ? 'is-invalid' : '' }}"
                        name="grade_name" id="grade_name" placeholder="Δώστε Περιγραφή Βαθμού"
                        value="{{ $grade->grade_name }}">

                    <!-- Error -->
                    @if ($errors->has('grade_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('grade_name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="grade_day">Ημερομηνία Βαθμού</label>
                    <input type="text" class="form-control {{ $errors->has('grade_day') ? 'is-invalid' : '' }}"
                        name="grade_day" id="grade_day" placeholder="Επέλεξε Ημερομηνία Βαθμού"
                        value="{{ $grade->grade_day }}">

                    <!-- Error -->
                    @if ($errors->has('grade_day'))
                        <div class="invalid-feedback">
                            {{ $errors->first('grade_day') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="value">Βαθμολογία</label>
                    <input type="text" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value"
                        id="value" placeholder="Δώστε Βαθμολογία" value="{{ $grade->value }}">

                    <!-- Error -->
                    @if ($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="semesters">Εξάμηνο</label>
                    <select class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}" name="semester"
                        id="semesters">
                        <option value="1">Εξάμηνο 1ο</option>
                        <option value="2">Εξάμηνο 2ο</option>
                        <option value="3">Εξάμηνο 3ο</option>
                    </select>

                    <!-- Error -->
                    @if ($errors->has('semester'))
                        <div class="invalid-feedback">
                            {{ $errors->first('semester') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="teachers">Καθηγητές</label>
                    <select class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" name="teacher_id"
                        id="teachers">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacher->id == $grade->teacher_id)
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
                    <label for="subjects">Μαθήμα</label>
                    <select class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" name="subject_id"
                        id="subjects">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" @if ($subject->id == $grade->subject_id)
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
                    <label for="students">Τμήματα</label>
                    <select class="form-control {{ $errors->has('student_id') ? 'is-invalid' : '' }}" name="student_id"
                        id="students">
                        <option>Επέλεξε τμήμα</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" @if ($student->id == $grade->student_id)
                                selected
                        @endif
                        >{{ $student->user->name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('student_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('student_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Επεξεργασία Βαθμού</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        flatpickr('#grade_day', {
            // enableTime: true,
            enableSeconds: true,
        });

    </script>

@endsection
