@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Eισαγωγή Βαθμού
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


    <form action="{{ route('grade.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="grade_name">Περιγραφή Βαθμού</label>
            <input type="text" class="form-control" name="grade_name" id="grade_name" placeholder="Δώστε Περιγραφή Βαθμού">
        </div>

        <div class="form-group">
            <label for="grade_day">Ημερομηνία Βαθμού</label>
            <input type="text" class="form-control" name="grade_day" id="grade_day" placeholder="Επέλεξε Ημερομηνία Βαθμού">
        </div>

        <div class="form-group">
            <label for="value">Βαθμολογία</label>
            <input type="text" class="form-control" name="value" id="value" placeholder="Δώστε Βαθμολογία">
        </div>

        <div class="form-group">
            <label for="teachers">Καθηγητές</label>
            <select class="form-control" name="teacher_id" id="teachers">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subjects">Μαθήμα</label>
            <select class="form-control" name="subject_id" id="subjects">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="groups">Τμήματα</label>
            <select class="form-control" name="groups" id="groups">
                <option>Επέλεξε τμήμα</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->levelSubjectName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="students">Μαθητές</label>
            <select class="form-control tags-selector" name="students[]" id="students" multiple>
            </select>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-success">Eισαγωγή Βαθμού</button>
        </div>
    </form>
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

        $('#groups').change(function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/getstudents') }}/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        data.forEach(element => {
                            console.log(element);
                        });

                        var tbody = document.getElementById('students');
                        var option = '';
                        data.forEach(element => {
                            return option +=
                                `<option value="${element.id}">${element.studentName}</option>`;
                        });


                        return tbody.innerHTML = option;
                    }
                });
            }
        });

    </script>

@endsection
