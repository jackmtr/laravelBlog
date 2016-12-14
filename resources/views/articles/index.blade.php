@extends('app')

@section('content')

	<h1>Articles</h1>
	
	<h2><a href="{{ action('ArticlesController@create') }}">Create an Article</a>

	@forelse ($articles as $article)
		<article>
			<h2>
				<a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
				<!-- can also do url('/articles', $article->id)-->
			</h2>

			<div class="body">
				{{ $article->body }}
			</div>
			
		</article>
	@empty
		<article>
			<h2>You currently do not have any published articles.</h2>
		</article>
	@endforelse

@stop