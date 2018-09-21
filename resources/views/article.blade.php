@extends('layouts.app')

@if($article->meta_title)
@section('title',"CVBlog | $article->meta_title")
@else
@section('title',"CVBlog | $article->title")
@endif
@section('meta_description',$article->meta_description)
@section('meta_keywords',$article->meta_keywords)
@section('canonical',url()->current())

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			@if($article->published)
			<div class="row align-items-center justify-content-between">
				<div class="col"><h1 class="m-0">{!! $article->title !!}</h1></div>
				<div class="col-xl-auto mt-3 mt-xl-0"><p class="text-right m-0">{{ \App\User::whereId($article->created_by)->first()->name }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->format('d.m.Y / H:i') }}</p><p class="m-0 text-right"><small class="text-muted">Просмотров: {{ $article->viewed ?? "0" }} </small></p></div>
			</div>
			@else
			<h5 class="text-center">Ошибка доступа</h5>
			@endif
		</div>
		<div class="card-body">

			@if($article->published)
			{!! $article->description !!}
			<div style="clear: both;"></div>
			@if($article->meta_keywords)
			<hr />
			Теги: 
			@foreach(explode(",",$article->meta_keywords) as $tag)
			<a href="{{ route('tag',$tag) }}">#{{ $tag }}</a>@if(!$loop->last),@else.@endif
			@endforeach
			@endif
			@else
			<h4 class="text-center">#403 <small class="text-muted">Cтраница существует, но её содержание Вам недоступно.</small></h4>
			@endif

		</div>
		<div class="card-footer text-muted">
			<div class="row align-items-center">
				<div class="col">
					@if($prevarticle!==null)
					<a class="" href="{{ route('articleShow',$prevarticle->slug) }}">&laquo; {{ $prevarticle->title }}</a>
					@endif
				</div>
				<div class="col-md-auto text-center mb-xl-0 mt-xl-0 mt-3 mb-3">
					<input class="btn btn-secondary" type="button" onclick="history.back();" value="Назад"/>
					@guest
					@else
					<a class="btn btn-primary" href="{{ route('admin.article.edit',$article) }}">Редактировать</a>
					@endguest
				</div>
				<div class="col text-right">
					@if($nextarticle!==null)
					<a class="" href="{{ route('articleShow',$nextarticle->slug) }}">{{ $nextarticle->title }} &raquo; </a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

/* Responsive images and tables in article by Bootstrap 4 */
<script>
	window.onload = function() {
		var images = document.querySelectorAll('figure > img');
		for(var i = 0; i < images.length; i++){
			images[i].classList.add("img-fluid");
		}
		var tables = document.getElementsByTagName('table');
		for(var i = 0; i < tables.length; i++){
			tables[i].classList.add("table", "table-responsive", "table-bordered", "table-striped");
		}
	}
</script>

@endsection