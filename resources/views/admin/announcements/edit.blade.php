@extends('layouts.admin')

@section('content')
    <h2 class="mb-5">
        Ενημέρωση Ανακοίνωσης
    </h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Τίτλος Ανακοίνωσης</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                        id="title" placeholder="Δώστε Τ΄ίτλο Ανακοίνωσης" value="{{ $announcement->title }}">

                    <!-- Error -->
                    @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Περιγραφή</label>
                    <input id="description" type="hidden" name="description" value="{!!  $announcement->description !!}">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="teachers">Καθηγητές</label>
                    <select class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" name="teacher_id"
                        id="teachers">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacher->id == $announcement->teacher_id)
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

                <div class="form-group tect-center">
                    <button type="submit" class="btn btn-success">Ενημέρωση Ανακοίνωσης</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
@endsection
