@extends('admin.layouts.app')

@section('title',"CVBlog | Dashboard")

@section('content')
 
<div class="d-flex pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<h2>Information</h2>

<ul class="list-group">
  <li class="list-group-item">Users: {{ \App\User::count() }}</li>
  <li class="list-group-item">Categories: {{ \App\Category::count() }}</li>
  <li class="list-group-item">Articles: {{ \App\Article::count() }}</li>
</ul>

@endsection