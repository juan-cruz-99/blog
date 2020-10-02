<div class="card mb-4">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
    <h2 class="card-title">{{ $post->title }}</h2>
    <p class="card-text">{{ $post->content }}</p>
    <a href="{{ route('posts.show',['post'=>$post]) }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
    {{ $post->created_at->diffForHumans() }}
    <a href="#">Start Bootstrap</a>
    </div>
</div>