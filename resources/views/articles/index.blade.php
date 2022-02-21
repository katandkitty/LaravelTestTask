@extends('layouts.app')
@section('content')
    @include('navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                @forelse($articles as $article)
                    <a href="./articles/{{ $article->id }}">
                        <div class="card mb-3">
                            <img src="https://via.placeholder.com/600x400" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ substr($article->body, 0, 200) }}</p>
                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-warning">No article available</p>
                @endforelse
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection