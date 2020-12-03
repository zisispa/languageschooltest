@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Δημιουργία Ανακοίνωσης
    </h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('announcement.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Τίτλος Ανακοίνωσης<span class="badge text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                        id="title" placeholder="Δώστε Τίτλο Ανακοίνωσης">
                    <!-- Error -->
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="description">Περιγραφή<span class="badge text-danger">*</span></label>
                    <input id="description" type="hidden" name="description"
                        class="{{ $errors->has('description') ? 'is-invalid' : '' }}">
                    <trix-editor input="description"></trix-editor>

                    <!-- Error -->
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
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

                <div class="form-check my-4">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="announcement_all" id="" value="checkedValue">
                        Γενική Ανακοίνωση
                    </label>

                    <!-- Error -->
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('announcement_all') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="student">Μαθητές</label>
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

                <div class="form-group">
                    <label for="group">Τάξεις</label>
                    <select class="js-example-basic-multiple form-control {{ $errors->has('groups') ? 'is-invalid' : '' }}"
                        name="groups[]" id="group" multiple="multiple">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                        @endforeach
                    </select>

                    <!-- Error -->
                    @if ($errors->has('groups'))
                        <div class="invalid-feedback">
                            {{ $errors->first('groups') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Δημιουργία Ανακοίνωσης</button>
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
