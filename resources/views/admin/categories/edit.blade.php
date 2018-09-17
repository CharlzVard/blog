@extends('admin.layouts.app')

@section('title',"CVBlog | Редактирование категории")

@section('content')
 
<form action="{{ route('admin.category.update', $category) }}" method="post">
	@csrf
	@method('PUT')
	@include('admin.categories.partials.form')
</form>

@endsection