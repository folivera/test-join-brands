@extends('layout.main')
@section('content')
    <form method="POST" action="/password/reset">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}" />
        <h1 class="mb-4 text-center">Reset password</h1>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>

            <div class="col-md-6">
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" value="{{ $email ?? old('email') }}" maxlength="255" autofocus autocomplete="email" />
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" maxlength="100" autocomplete="password" />
            </div>
        </div>

        <div class="form-group row">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password Confirmation</label>

            <div class="col-md-6">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Confirmation" maxlength="100" autocomplete="new-password" />
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary" type="submit">Reset Password</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>
@endsection