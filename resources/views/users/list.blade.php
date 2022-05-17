@extends('layout.main')
@section('content')
	<h1 class="mb-4 text-center">Users</h1>
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->status ?? 'ND' }} <a href="/user/{{$user->id}}/status"><i class="fa-solid fa-user-pen"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection