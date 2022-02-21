@extends('layouts.app')
@section('content')
    @include('navbar')
    <div class="background">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center pt-5">
                    <h1 class="display-one mt-5">Успех</h1>
                    <p>Для молодых и успешных</p>
                </div>
            </div>
        </div>
    </div>
    <x-LastArticles :articles="$articles" />
@endsection