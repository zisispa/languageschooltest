@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-5 text-gray-800">
        Δώσε Βαθμολογία
    </h1>

    <div class="form-group">
        <label for="grade_name">Περιγραφή</label>
        <input type="text" class="form-control" name="grade_name" id="gradename" placeholder="Δώστε Περιγραφή Βαθμού">
    </div>

    <div class="form-group">
        <label for="grade_day">Ημερομηνία</label>
        <input type="text" class="form-control" name="grade_day" id="gradeday" placeholder="Επέλεξε Ημερομηνία Βαθμού">
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Όνομα Μαθητή</th>
                            <th>Βαθμολογία</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->students as $student)
                            <tr>
                                <td>{{ $student->user->name }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm"
                                        onclick="openModalFunc({{ $student->id }})">Βαθμολόγησε</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="{{ route('grade.index') }}" class="btn btn-success">Ολοκλήρωση Βαθμολογίας</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="gradeModal" tabindex="-1" aria-labelledby="gradeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gradeModalLabel">Βαθμολογία Μαθητή</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('grade.store') }}" method="POST">
                    @csrf
                    <div class="modal-body" id="gradee">
                        <input type="hidden" name="student_id" id="student_id">
                        <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}">


                        <div class="form-group">
                            <label for="value">Βαθμός</label>
                            <input type="text" class="form-control" name="value" id="value"
                                placeholder="Δώστε Περιγραφή Βαθμού">
                        </div>

                        <div class="form-group">
                            <label for="grade_name">Περιγραφή</label>
                            <input type="text" class="form-control" name="grade_name" id="grade_name"
                                placeholder="Δώστε Περιγραφή Βαθμού">
                        </div>

                        <div class="form-group">
                            <label for="grade_day">Ημερομηνία</label>
                            <input type="text" class="form-control" name="grade_day" id="grade_day"
                                placeholder="Επέλεξε Ημερομηνία Βαθμού">
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
                            <label for="teachers">Καθηγητής</label>
                            <select class="form-control" name="teacher_id" id="teachers">
                                <option value="{{ $group->teacher_id }}">
                                    {{ $group->teacher->user->name }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subjects">Μαθήμα</label>
                            <select class="form-control" name="subject_id" id="subjects">
                                <option value="{{ $group->subject->id }}">{{ $group->subject->subject_name }}</option>
                            </select>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Eισαγωγή Βαθμού</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('.tags-selector').select2();
        });

        flatpickr('#grade_day', {
            // enableTime: true,
            enableSeconds: true,
        });

        flatpickr('#gradeday', {
            // enableTime: true,
            enableSeconds: true,
        });

        function openModalFunc(student_id) {

            var nameGrade = $('#gradename').val();
            var dayGrade = $('#gradeday').val();
            var studentId = student_id;

            $('#student_id').val(studentId);
            $('#grade_name').val(nameGrade);
            $('#grade_day').val(dayGrade);

            $('#gradeModal').modal('show'); //The id of the modal to show
        };

    </script>
@endsection
