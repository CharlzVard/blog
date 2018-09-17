<div class="form-group">
	<label for="">Заголовок</label>
	<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title ?? ""}}" required>
</div>


<div class="form-group">
	<label for="">Категория</label>
	<select class="form-control select2" name="categories[]" multiple="multiple">
  	@include('admin.articles.partials.categories', ['categories' => $categories])
	</select>
</div>


<div class="form-group">
	<label for="">Краткое описание</label>
	<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short ?? ""}}</textarea>
</div>


<div class="form-group">
	<label for="">Полное описание</label>
	<textarea class="form-control" id="redactor" name="description">{{$article->description ?? ""}}</textarea>
</div>


<div class="form-group">
	<label for="">Статус</label>
	<select class="form-control" name="published">
	  @if (isset($article->id))
	    <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
	    <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
	  @else
	    <option value="0">Не опубликовано</option>
	    <option value="1">Опубликовано</option>
	  @endif
	</select>
</div>


<div class="form-group">
	<label for="">Мета заголовок</label>
	<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{$article->meta_title ?? ""}}">
</div>


<div class="form-group">
	<label for="">Мета описание</label>
	<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{$article->meta_description ?? ""}}">
</div>


<div class="form-group">
	<label for="">Ключевые слова</label>
	<select class="form-control tags" multiple="multiple" name="meta_keywords[]">
		@isset($article->meta_keywords)
			@foreach(explode(',', $article->meta_keywords) as $keyword)
			    <option selected="">{{ $keyword }}</option>
			@endforeach
		@else
			<option>Life</option>
			<option>Memory</option>
			<option>WEB</option>
		@endisset
	</select>
</div>


<input class="form-control" type="hidden" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug ?? ""}}" readonly="">


<hr />


<div class="row justify-content-center mb-3">
	<div class="col text-center">
		<button type="submit" class="btn btn-primary mr-1">Сохранить</button>
		<a href="{{ URL::previous() }}" class="btn btn-outline-secondary">Назад</a>
	</div>
</div>

