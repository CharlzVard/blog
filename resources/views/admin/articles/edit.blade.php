@extends('admin.layouts.app')

@section('title',"CVBlog | Редактирование статьи")

@section('content')
 
<form action="{{route('admin.article.update', $article)}}" method="post">
	@csrf
	@method('PUT')
	@include('admin.articles.partials.form')
</form>

@endsection