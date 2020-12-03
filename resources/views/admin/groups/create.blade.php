@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Tάξης
    </h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('group.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="group_name">Όνομα Τάξης<span class="badge text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('group_name') ? 'is-invalid' : '' }}"
                        name="group_name" id="group_name" placeholder="Δώστε Όνομα Τάξης">

                    <!-- Error -->
                    @if ($errors->has('group_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('group_name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="level_id">Επίπεδο<span class="badge text-danger">*</span></label>
                    <select class="form-control {{ $errors->has('level_id') ? 'is-invalid' : '' }}" name="level_id"
                        id="level_id">
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level_name }}</option>
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
                    <label for="subject">Μάθημα<span class="badge text-danger">*</span></label>
                    <select class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" name="subject_id"
                        id="subject">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
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
                    <label for="teachers">Καθηγητές<span class="badge text-danger">*</span></label>
                    <select class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" name="teacher_id"
                        id="teachers">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>

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
                    <label for="student">Μαθητές<span class="badge text-danger">*</span></label>
                    <select
                        class="js-example-basic-multiple form-control {{ $errors->has('students') ? 'is-invalid' : '' }}"
                        name="students[]" id="student" multiple="multiple">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('students'))
                        <div class="invalid-feedback">
                            {{ $errors->first('students') }}
                        </div>
                    @endif
                </div>

                {{-- <div class="row">
                    <div class="form-group ml-3 mr-3">
                        <label for="start_time">Έναρξη μαθήματος<span class="badge text-danger">*</span></label>
                        <input type="time" name="start_time" class="form-control" id="start_time">
                    </div>
                    <div class="form-group">
                        <label for="end_time">Τέλος μαθήματος<span class="badge text-danger">*</span></label>
                        <input type="time" name="end_time" class="form-control" id="end_time">
                    </div>
                </div> --}}


                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Δημιουργία Τάξης</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
@endsection
