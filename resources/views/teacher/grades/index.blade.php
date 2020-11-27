@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Πίνακας Βαθμολογιών
    </h1>

    @if ($groups->count() > 0)
        <p class="mb-4">
            Σε αυτό το πίνακα μπορείται να δείτε όλες τις βαθμολογίες των τμημάτων σας.
        </p>

        <div class="form-group">
            <label for="group">Επέλεξε Εξάμηνο</label>
            <select class="form-control" name="group_id" id="group">
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- DataTales Example -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Μαθητής</th>
                                <th>Βαθμοί</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <p class="font-bold text-center mt-5">Δεν υπάρχουν καταχωρημένα τμήματα.</p>
    @endif
@endsection

@section('scripts')

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
                            return str +=
                                `<tr><td>${element.user.name}</td><td><a class="btn btn-info" href="/teachergrades/${group_id}/${element.id}">Δείτε τους βαθμούς</a></td></tr>`;
                        });
                        return tbody.innerHTML = str;
                    }
                });
            }
        });

    </script>
@endsection
