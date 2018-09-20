@extends('layouts.app')

@section('title',"CVBlog | Блог товарища C.V., в котором он хранит свои мысли")
@section('canonical',url()->current())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(date("H")>=0 && date("H")<7)
                        <p class="m-0">Привет, полуночник!</p>
                    @elseif(date("H")>=7 && date("H")<11)
                        <p class="m-0">Утро доброе, {{ \Auth::user()->name }}! Выпей кофе.</p>
                    @elseif(date("H")>=11 && date("H")<15)
                        <p class="m-0">Привет, {{ \Auth::user()->name }}! Как работа?</p>
                    @elseif(date("H")>=15 && date("H")<17)
                        <p class="m-0">Скоро домой, {{ \Auth::user()->name }}...</p>
                    @elseif(date("H")>=17 && date("H")<24)
                        <p class="m-0">{{ \Auth::user()->name }}, оно тебе точно надо?</p>
										@endif
										
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
