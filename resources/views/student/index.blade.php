@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Καλώς ήρθες {{ auth()->user()->name }}
    </h1>
    {{-- <p class="mb-4">
        Σε αυτό το πίνακα μπορείτε να δείτε όλες τις βαθμολογίες.
    </p> --}}

    <div class="row mt-5">
        <h4>Εβδομαδιαίο πρόγραμμα</h4>

        <table></table>
    </div>


@endsection
