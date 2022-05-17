@extends('layout.main')
@section('content')
    <form method="POST" action="/update-email">
        {{ csrf_field() }}
        <h1 class="mb-4 text-center">Change email</h1>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Current E-mail Address</label>
            <div class="col-md-6">
                <input type="email" class="form-control" placeholder="E-mail Address" value="{{ auth()->user()->email ?? old('email') }}" disabled />
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">New E-mail Address</label>
            <div class="col-md-6">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" value="{{ $email ?? old('email') }}" maxlength="255" autofocus autocomplete="email" />
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary" type="submit">Update email</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>
@endsection