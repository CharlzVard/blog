@extends('admin.layouts.app')

@section('title',"CVBlog | Добавление статьи")

@section('content')
 
<form action="{{route('admin.article.store')}}" method="post">
	@csrf
	@include('admin.articles.partials.form')
</form>

@endsection