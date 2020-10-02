<div class="card my-4">
    <h5 class="card-header">Last visited</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            @foreach ($posts as $post)
                <li>
                    <a href="{{route('posts.show', ['post' => $post->id])}}">
                        {{$post->title}}
                    </a>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
</div>