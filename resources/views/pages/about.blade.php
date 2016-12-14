@extends('app')

@section('content')

	<h1>About me, {{$first}} {{$last}}</h1>
	<p>Fillter stuff</p>

	@if (count($people))
		<h3>People I Like:</h3>

		<ul>
			@foreach ($people as $person)
				<li>{{ $person }}</li>
			@endforeach
		</ul>
	@endif

	<!-- Margert grace gabreil -->

@stop