<div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
      <h5 class="mt-0">
          <small>by </small>
          {{ $comment->user->name}}
          <small>{{$comment->created_at->diffForHumans() }}</small>
        </h5>
      {{$comment->content}}
    </div>
</div>