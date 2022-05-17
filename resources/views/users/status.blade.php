@extends('layout.main')
@section('content')
    <form method="POST" action="/user/update-status">
        {{ csrf_field() }}
        <h1 class="mb-4 text-center">User: {{ $user->name }}</h1>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Status</label>

            <div class="col-md-6">
            	<input type="hidden" name="id" value="{{ $user->id }}">
                <select name="status" class="form-control">
                	<option value="active" @if($user->status == 'active') selected @endif >Active</option>
                	<option value="suspended" @if($user->status == 'suspended') selected @endif >Suspended</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="btn btn-primary" type="submit">Update status</button>
            </div>
        </div>
    @if(session()->get('status'))
    <div class="form-group row mt-4">
    	<div class="alert alert-success col-md-6 offset-md-4" role="alert">
      	{{ session('status') }}
    	</div>
	</div>
    @endif
    </form>
@endsection