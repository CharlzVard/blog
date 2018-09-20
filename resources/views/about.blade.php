@extends('layouts.app')

@section('title',"CVBlog | About")
@section('canonical',url()->current())

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
									<h1>О проекте</h1>
								</div>
                <div class="card-body">
									<p>На данном ресурсе находится блог товарища C.V.</p>
									<p>Вообще, блог расчитан исключительно для Его личного пользования, но, возможно, и ты найдёшь здесь информацию, которая тебе пригодится.</p>
									<p>В любом случае, привет, и вэлкам отсюда!</p>
									<p>♥, -C.V.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection