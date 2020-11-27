@extends('layouts.admin')

@section('content')
    <h2 class="mb-5 text-gray-800">
        <i class="fas fa-bullhorn"></i>
        Ανακοινώσεις
    </h2>
    <p class="mb-3 mt-4 text-gray-800">
        Παρακάτω βλέπεται τις προσωπικές και γενικές ανακοινώσεις.
    </p>

    @if ($general_announcements->count() > 0)
        <div id="accordion">
            @foreach ($general_announcements as $announcement)
                <div class="card mb-3">
                    <div class="card-header bg-gradient-primary" id="heading{{ $announcement->id }}">
                        <a class="btn collapsed" data-toggle="collapse" data-target="#collapse{{ $announcement->id }}"
                            aria-expanded="false" aria-controls="collapse{{ $announcement->id }}">
                            <div class="text-center">
                                <p class="font-weight-bold text-white">{{ $announcement->title }}</p>
                            </div>
                        </a>
                    </div>

                    <div id="collapse{{ $announcement->id }}" class="collapse"
                        aria-labelledby="heading{{ $announcement->id }}" data-parent="#accordion">
                        <div class="card-body mx-2">
                            <div class="row d-flex justify-content-between align-items-center">
                                <p class="font-weight-bold">Υποβλήθηκε από: {{ $announcement->teacher->user->name }}</p>
                                <p>{{ $announcement->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="row mt-3">
                                <p class="font-weight-normal">{!! $announcement->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $general_announcements->links() }}
        </div>
    @else
        <p class="text-center my-5">Δεν υπάρχουν προσωπικές ή γενικές ανακοινώσεις.</p>
    @endif



    <hr class="my-5">
    <p class="mb-3 mt-4 text-gray-800">
        Παρακάτω βλέπεται τις ανακοινώσεις που υπάρχουν στο τμήμα σας.
    </p>
    @if ($group_announcements > 0)
        <div id="accordion">
            @foreach ($group_announcements as $group_announcement)
                @foreach ($group_announcement as $announcement)
                    <div class="card mb-3">
                        <div class="card-header bg-gradient-primary" id="heading{{ $announcement->id }}">
                            <a class="btn collapsed" data-toggle="collapse" data-target="#collapse{{ $announcement->id }}"
                                aria-expanded="false" aria-controls="collapse{{ $announcement->id }}">
                                <div class="text-center">
                                    <p class="font-weight-bold text-white">{{ $announcement->title }}</p>
                                </div>
                            </a>
                        </div>

                        <div id="collapse{{ $announcement->id }}" class="collapse"
                            aria-labelledby="heading{{ $announcement->id }}" data-parent="#accordion">
                            <div class="card-body mx-2">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <p class="font-weight-bold">Υποβλήθηκε από: {{ $announcement->teacher->user->name }}</p>
                                    <p>{{ $announcement->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="row mt-3">
                                    <p class="font-weight-normal">{!! $announcement->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        {{-- <div class="d-flex justify-content-center">
            {{ $group_announcements->links() }}
        </div> --}}
    @else
        <p class="text-center my-5">Δεν υπάρχουν ανακοινώσεις στο τμήμα σου.</p>
    @endif
@endsection
