@extends('app')

@section('content')

	<h1>{{ $article->title }}</h1>
	<article>{{ $article->body }}</article>
	<a href="{{ action('ArticlesController@edit',[$article->id]) }}">Edit Article</a>

	@unless ($article->tags->isEmpty())
		<h5>
			@foreach ($article->tags as $tag)
				<li>
					{{ $tag->name }}
				</li>
			@endforeach
		</h5>
	@endunless
@stop