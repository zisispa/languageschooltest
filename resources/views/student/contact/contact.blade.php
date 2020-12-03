@extends('layouts.admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">
        Φόρμα Επικοινωνίας
    </h1>
    <p class="mb-4">
        Μέσο την φόρμας μπορείτε να κάνετε οποιαδήποτε ερώτηση.
    </p>
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-1">
                <div class="card-body">
                    <form action="{{ route('user.contact.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Ονοματεπώνυμο<span class="badge text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                name="name" id="name" placeholder="Δώστε Ονοματεπώνυμο">
                            <!-- Error -->
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="badge text-danger">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email" id="title" placeholder="Δώστε το email σας">
                            <!-- Error -->
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="body">Μήνυμα<span class="badge text-danger">*</span></label>
                            <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                id="body" cols="30" rows="5" placeholder="Δώστε Μήνυμα"></textarea>
                            <!-- Error -->
                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('body') }}
                                </div>
                            @endif

                        </div>
                        <div class="mt-3">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-block">Αποστολή</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
