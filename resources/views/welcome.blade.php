@extends('layouts.app')

@section('title',"CVBlog | Блог товарища C.V., в котором он хранит свои мысли")
@section('keywords',"Blog,Charlz,Vard,PHP,HTML,CSS,XML,JavaScript,Laravel, статьи, категории, лабуда")
@section('canonical',url()->current())

@section('content')

    <div class="jumbotron" style="margin-top: -24px;">
      <div class="container">
        <h1 class="display-3">-C.V. Blog!</h1>
        <blockquote class="blockquote">
          <p class="mb-0">Here is information, the priority of which is not high enough to remember it.</p>
        </blockquote>
        <p class="lead">
          <a class="btn btn-outline-dark btn-lg" href="{{ route('articles') }}" role="button">Оно тебе не надо &raquo;</a>
        </p>
      </div>
    </div>

    <div class="container">
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

      <hr>

      <div class="col-12"><p>©Vard, 2007-{{ date("Y") }}</p></div>

    </div>
@endsection