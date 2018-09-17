@extends('admin.layouts.app')

@section('title',"CVBlog | Добавление категории")

@section('content')
 
<form action="{{ route('admin.category.store') }}" method="post">
	@csrf
	@include('admin.categories.partials.form')
</form>

@endsection