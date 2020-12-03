@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Όνομα μαθητή
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Βαθμοί</th>
                            <th>Περιγραφή</th>
                            <th>Μάθημα</th>
                            <th>Εξάμηνο</th>
                            <th>Ημερομηνία</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($grades as $grade)
                            <tr>
                                <td>{{ $grade->value }}</td>
                                <td>{{ $grade->grade_name }}</td>
                                <td>{{ $grade->subject->subject_name }}</td>
                                <td>{{ $grade->semester }}o</td>
                                <td>{{ Str::limit($grade->grade_day, $limit = 10, $end = ' ') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')

<script>
    $('#group').change(function() {
        var group_id = $(this).val();
        if (group_id) {
            $.ajax({
                type: "get",
                url: "{{ url('/teachergrades') }}/" + group_id,
                success: function(data) {

                    var tbody = document.getElementById('tbody');
                    var str = '';
                    data.forEach(element => {
                        console.log(element);

                        return str +=
                            `<tr><td>${element.user.name}</td><td><a class="btn btn-info" href="/teachergrades/${group_id}/${element.id}">Δείτε τους βαθμούς</a></td></tr>`;
                    });
                    return tbody.innerHTML = str;
                }
            });
        }
    });

</script>
@endsection --}}

{{-- `
element.studentGrades.forEach(grade => {
return '<li>' + grade.grade_name + '</li>'
});
` --}}

{{-- console.log(element.studentGrades.group_id);
return str +=
`<div class="card mb-3">
    <div class="card-header" id="heading${element.id}">
        // <a class="btn collapsed" data-toggle="collapse" data-target="#collapse${element.id}" aria-expanded="false"
            aria-controls="collapse${element.id}">
            // <p class="font-weight-bold">${element.studentName}</p></a></div>
    <div id="collapse${element.id}" class="collapse" aria-labelledby="heading${element.id}" // data-parent="#accordion">
        <div class="card-body mx-2">
            <div class="column">
                <p>Βαθμολογίες Μαθητή:</p>
                <ul>

                    element.studentGrades.map(el => {
                    return '<li>' + el.grade_name + '</li>'
                    });

                </ul>
            </div>
        </div>
    </div>
</div>`;
}) --}}
