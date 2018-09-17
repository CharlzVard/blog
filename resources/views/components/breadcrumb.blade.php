<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb m-0">
  		<li class="breadcrumb-item"><a href="{{ route('articles') }}">Статьи</a></li>
	@forelse($parents as $parent)
	    <li class="breadcrumb-item"><a href="{{ route('category',$parent->slug) }}">{{$parent->title}}</a></li>
	@empty
	@endforelse
	@if($category)
    <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
    @else
    <li class="breadcrumb-item active" aria-current="page">Все категории</li>
	@endif
  </ol>
</nav>