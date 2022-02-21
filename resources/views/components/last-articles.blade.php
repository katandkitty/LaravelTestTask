<div>
    <div class="row row-cols-1 row-cols-md-3">
        @forelse($articles as $article)
            <div class="col mb-4">
                <div class="card h-100">
                  <img src="https://via.placeholder.com/300x200" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><a href="./articles/{{ $article->id }}">{{ $article->title }}</a></h5>
                    <p class="card-text">{{ substr($article->body, 0, 200) }}</p>
                  </div>
                </div>
            </div>
        @empty
            <p class="text-warning">No articles available</p>
        @endforelse
    </div>
</div>