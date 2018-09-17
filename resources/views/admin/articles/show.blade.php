@extends('admin.layouts.app')

@section('title','CVBlog | '. $article->title)

@section('content')

{!! $article->description !!}

<div style="clear: both;"></div>

<hr />

@if($article->meta_keywords)
@foreach(explode(",",$article->meta_keywords) as $tag)
	<a href="{{ route('tag',$tag) }}">#{{ $tag }}</a>
@endforeach
<hr />
@endif

<div class="text-center mb-3">
	<a class="btn btn-primary" href="{{ route('admin.article.edit',$article) }}">Редактировать</a>
	<input class="btn btn-secondary" type="button" onclick="history.back();" value="Назад"/>
</div>

@endsection