@extends('layout.main')
@section('content')
<form method="POST" action="/password/email">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail Address</label>

        <div class="col-md-6">
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="E-mail Address" maxlength="255" required autofocus />
        </div>
    </div><!--form-group-->

    <div class="form-group row mb-4">
        <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary" type="submit">Send Password Reset Link</button>
        </div>
    </div>
    @include('partials.formerrors')
    @if(session()->get('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif
</form>
@endsection