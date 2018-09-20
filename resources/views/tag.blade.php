@extends('layouts.app')

@section('title',"CVBlog | Поиск по тегу $tag")
@section('canonical',url()->current())

@section('content')

<div class="container">
	<div class="card">
		<div class="card-header text-center">
			<h1 class="mb-1">Статьи с тегом "{{ $tag }}"</h1>
		</div>
		<div class="card-body">
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
				<h4>Статей не найдено.</h4>
				@endforelse
			</div>
		</div>
		<div class="card-footer text-muted">
			{{ $articles->links('vendor.pagination.bootstrap-4') }}
		</div>
	</div>
</div>

@endsection