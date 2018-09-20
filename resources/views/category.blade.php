@extends('layouts.app')

@section('title',"CVBlog | $category->title")
@section('meta_description',"Здесь находится информация по категории $category->title, приоритет которой недостаточно высокий, чтобы её запоминать. -C.V.")
@section('meta_keywords',"Blog,Charlz,Vard,PHP,HTML,CSS,XML,JavaScript,Laravel, категории")
@section('canonical',url()->current())

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header text-center">
			<h1 class="mb-3">Статьи категории {{ $category->title }} </h1>
			@component('components.breadcrumb')
			@slot('parents', $parents)
			@slot('active') {{ "Все категории" }} @endslot
			@slot('category', $category)
			@endcomponent
		</div>

		<div class="card-body">
			@if(count($categories)>0)
			<div class="row">
				<div class="col mb-3">
					<div class="card">
						<div class="card-body"> 
							<div class="btn-group btn-group-sm" role="group">		
								@forelse($categories as $category)
									<a class="btn btn-secondary" href="{{ route('category',$category->slug) }}">{{ $category->title }}</a>								
								@empty
								@endforelse
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			<div class="row">
				@forelse($articles as $article)
				<div class="col-md-4">
					<div class="card mb-3 article">
						<div class="card-body">
							<h4 class="card-title">{{ $article->title }}</h4>
							<p class="card-text">
								{!! $article->description_short !!}
							</p>
							<div class="row align-items-end">
				              <div class="col"><a href="{{ route('articleShow',$article->slug) }}" class="btn btn-sm btn-secondary">Read more &raquo;</a></div>
				              <div class="col"><p class="small m-0 text-right">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->format('d.m.Y / H:i') }}</p></div>
				            </div>
						</div>
					</div>
				</div>
				@empty
				<div class="col"><h4 class="mt-5 mb-5">Тут ничего нет. Это странно. Либо база нае#нулась, либо это первый запуск.</h4></div>
				@endforelse
			</div>
		</div>
		<div class="card-footer text-muted">
			{{ $articles->links('vendor.pagination.bootstrap-4') }}
		</div>
	</div>
</div>

@endsection