@extends('app');

@section('content')
	@if ($first == 'Jackie')
		<h2>Hi Jackie!</h2>
	@else
		<h2>Hi Stranger!</h2>
	@endif
	<h1>Contact Me!</h1> 
@stop

@section('footer')
	<script type="text/javascript">alert('hi!');</script>
@stop