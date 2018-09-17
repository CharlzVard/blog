@extends('admin.layouts.app')

@section('title',"CVBlog | Категории")

@section('content')

<div class="d-flex pb-2 mb-3 border-bottom">
	<h1 class="h2">Категории</h1>
</div>
<div class="row pb-3">
	<div class="col-md-4">
		<a href="{{route('admin.category.create')}}" class="btn btn-primary form-control"><i class="fas fa-folder-plus"></i>
 Создать категорию</a>
	</div>
	<div class="col-md-4">

	</div>
	<div class="col-md-4">

	</div>
</div>
<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead>
			<th>Наименование</th>
			<th>Публикация</th>
			<th class="text-right">Действие</th>
		</thead>
		<tbody>
			@forelse ($categories as $category)
			<tr>
				<td>{{$category->title}}</td>
				<td>{{($category->published)?'Опубликовано':'Не опубликовано'}}</td>
				<td class="text-right">
					<div class="btn-group" role="group" aria-label="Basic example">
						<a href="{{route('admin.category.edit', $category)}}" class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
						<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#Modal{{ $category->id }}"><i class="fa fa-trash"></i></button>
						<div class="modal fade" id="Modal{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Удалить категорию?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body text-left">
										Вы действительно хотите удалить категорию "{{ $category->title }}"?
									</div>
									<div class="modal-footer">
										<form action="{{ route('admin.category.destroy',$category) }}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger">Удалить</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</td>
			</tr>
			@empty
			<tr>
				<td colspan="3" class="text-center"><h4>Данные отсутствуют</h4></td>
			</tr>
			@endforelse
		</tbody>
	</table>
	{{ $categories->links('vendor.pagination.bootstrap-4') }}
</div>

@endsection